<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab;
use App\Models\Kotoba;
use App\Models\Nilai;
use App\Models\DetailNilai;

class RouletteController extends Controller
{
    public function start(Request $request)
    {
        $bab_id = $request->bab_id;
        $level = $request->level;
        $tab = $request->tab;
        $bab = Bab::findOrFail($bab_id);

        session()->forget('kotobas');
        session()->forget('index');
        session()->forget('hasil');
        session()->forget('koreksi_kata');

        if ($tab == 1) {
            $kotobas = Kotoba::where('bab_id', $bab_id)->get()->shuffle()->values();
        } else {
            $totalBab = $bab->id;
            $perBab = (int) floor(50 / $totalBab);

            $kotobas = collect();
            for ($i = 1; $i <= $bab->id; $i++) {
                $kataBab = Kotoba::where('bab_id', $i)
                    ->inRandomOrder()
                    ->limit($perBab)
                    ->get();
                $kotobas = $kotobas->merge($kataBab);
            }

            if ($kotobas->count() < 50) {
                $kurang = 50 - $kotobas->count();
                $idSudahAda = $kotobas->pluck('id')->toArray();
                $tambahan = Kotoba::whereIn('bab_id', range(1, $bab->id))
                    ->whereNotIn('id', $idSudahAda)
                    ->inRandomOrder()
                    ->limit($kurang)
                    ->get();
                $kotobas = $kotobas->merge($tambahan);
            }

            $kotobas = $kotobas->shuffle()->values();
        }

        session([
            'kotobas' => $kotobas,
            'index' => 0,
            'level' => $level,
            'hasil' => [],
            'last_waktu' => 0,
            'last_poin' => '',
            'last_jawaban' => '',
            'bab_id' => $bab_id,
            'tab' => $tab
        ]);

        return redirect()->route('roulette.show');
    }

    public function show()
    {
        $kotobas = session('kotobas');
        $index = session('index', 0);

        if (!$kotobas || count($kotobas) == 0) return redirect()->route('home');
        if ($index >= count($kotobas)) return redirect()->route('roulette.hasil');

        $kotoba = $kotobas[$index];
        $level = session('level', 'jepang-mudah');
        $tab = session('tab', 1);
        $bab_id = session('bab_id', 1);
        $bab = Bab::find($bab_id);
        $totalKata = count($kotobas);

        return view('roulette', compact('kotoba', 'level', 'index', 'tab', 'bab', 'totalKata'));
    }

    public function jawab(Request $request)
    {
        $waktu = $request->waktu;
        $level = session('level', 'jepang-mudah');
        $jawaban = $request->jawaban ?? '';
        $kotobas = session('kotobas', []);
        $index = session('index', 0);
        $kotoba = $kotobas[$index] ?? null;

        $bersihkan = function($teks) {
            return trim(preg_replace('/[～〜・※▲▼★☆♪♯＠＃＄％＆＊＋－／：；＜＝＞？＠＾＿｀｛｜｝￠￡￢￣￤￥「」『』【】]/u', '', $teks));
        };

        if ($level == 'romaji') {
            $poin = '-';
        }
        elseif (in_array($level, ['kanji-mudah','kanji-susah']) && $kotoba) {
            $benar = $this->cekArtiPintar($jawaban, $kotoba->arti);
            if (!$benar) { $poin = '0'; }
            elseif ($waktu <= 10) { $poin = 'A'; }
            elseif ($waktu <= 15) { $poin = 'B'; }
            else { $poin = 'C'; }
        }
        elseif ($level == 'kanji-romaji' && $kotoba) {
            $jawabanBersih = strtolower(trim($jawaban));
            $kunciRomaji = strtolower(trim($bersihkan($kotoba->romaji)));
            $benar = $jawabanBersih === $kunciRomaji;
            if (!$benar) { $poin = '0'; }
            elseif ($waktu <= 10) { $poin = 'A'; }
            elseif ($waktu <= 15) { $poin = 'B'; }
            else { $poin = 'C'; }
        }
        elseif (in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji'])) {
            $poin = '0';
        }
        else {
            if ($waktu <= 5) { $poin = 'A'; }
            elseif ($waktu <= 7) { $poin = 'B'; }
            else { $poin = 'C'; }
        }

        session([
            'last_waktu'=>$waktu,
            'last_poin'=>$poin,
            'last_jawaban'=>$jawaban,
            'koreksi_kata'=>$kotoba
        ]);
        return response()->json(['status'=>'ok']);
    }

    private function cekArtiPintar($jawaban, $arti)
    {
        // Normalisasi: hapus semua non-alfanumerik
        $normalisasi = function($teks) {
            $teks = strtolower(trim($teks));
            return preg_replace('/[^a-z0-9]/', '', $teks);
        };

        $jawabanNormal = $normalisasi($jawaban);
        $kunciNormal = $normalisasi($arti);

        // Cek langsung dulu
        if ($jawabanNormal === $kunciNormal) return true;

        // Pisah kunci berdasarkan slash, kurung, spasi
        $kunci = strtolower(trim($arti));
        $kunciUtama = trim(preg_replace('/\(.*?\)/', '', $kunci));

        $kandidat = [];
        $kandidat[] = $kunci;
        $kandidat[] = $kunciUtama;

        foreach (explode('/', $kunciUtama) as $k) {
            $kandidat[] = trim($k);
        }

        preg_match_all('/\((.*?)\)/', $kunci, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $m) {
                $kandidat[] = trim($m);
            }
        }

        foreach (explode(' ', $kunciUtama) as $k) {
            $kandidat[] = trim($k);
        }

        $alternatifManual = [
            'sai' => ['tahun', 'umur', 'usia'],
            'nansai' => ['berapa umur', 'berapa usia'],
            'oikutsu' => ['berapa umur', 'berapa usia'],
            'daigaku' => ['universitas', 'kampus', 'univ'],
            'byouin' => ['rumah sakit', 'rs'],
            'sensei' => ['guru', 'dokter', 'pengajar'],
            'gakusei' => ['murid', 'pelajar', 'siswa', 'mahasiswa'],
            'kaishain' => ['karyawan', 'pegawai', 'pekerja'],
            'ginkouin' => ['pegawai bank', 'bankir'],
            'isha' => ['dokter'],
            'kenkyuusha' => ['peneliti', 'ilmuwan'],
            'kyoushi' => ['guru', 'pengajar'],
            'jidousha' => ['mobil', 'kendaraan'],
            'kuruma' => ['mobil', 'kendaraan'],
            'tokei' => ['jam', 'arloji'],
        ];

        foreach ($alternatifManual as $key => $list) {
            if (str_contains($kunci, $key)) {
                $kandidat = array_merge($kandidat, $list);
            }
        }

        $kandidat = array_unique(array_filter($kandidat));
        foreach ($kandidat as $k) {
            if (empty($k)) continue;
            $kNormal = $normalisasi($k);
            if (empty($kNormal)) continue;
            if ($kNormal === $jawabanNormal) return true;
            if (str_contains($kNormal, $jawabanNormal)) return true;
            if (str_contains($jawabanNormal, $kNormal)) return true;
        }

        return false;
    }

    public function koreksi()
    {
        $kotobas = session('kotobas');
        $index = session('index', 0);
        $hasil = session('hasil', []);
        $waktu = session('last_waktu', 0);
        $poin = session('last_poin', 'C');
        $jawaban = session('last_jawaban', '');
        $level = session('level', 'jepang-mudah');

        $kotoba = session('koreksi_kata') ?? ($kotobas[$index] ?? null);
        session()->forget('koreksi_kata');

        if (!$kotoba) {
            return redirect()->route('roulette.hasil');
        }

        $isKetik = in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji']);
        $benar = !($isKetik && $poin == '0');

        $hasil[] = ['kata'=>$kotoba, 'waktu'=>$waktu, 'poin'=>$poin, 'jawaban'=>$jawaban, 'benar'=>$benar];
        session(['hasil'=>$hasil, 'index'=>$index+1]);

        return view('koreksi', compact('kotoba','waktu','poin','index','jawaban','benar','level'));
    }

    public function menyerah(Request $request)
    {
        $kotobas = session('kotobas', []);
        $kataId = $request->kata_id;
        $hasil = session('hasil', []);

        $kotoba = null;
        $indexKetemu = null;
        foreach ($kotobas as $i => $k) {
            if ($k->id == $kataId) {
                $kotoba = $k;
                $indexKetemu = $i;
                break;
            }
        }

        if (!$kotoba) {
            return redirect()->route('roulette.hasil');
        }

        $level = session('level', 'jepang-mudah');
        $poin = ($level == 'romaji') ? '-' : '0';

        $hasil[] = ['kata'=>$kotoba, 'waktu'=>0, 'poin'=>$poin, 'jawaban'=>'', 'benar'=>false];

        session([
            'hasil'=>$hasil,
            'index'=>$indexKetemu + 1,
            'koreksi_kata'=>$kotoba,
            'last_waktu'=>0,
            'last_poin'=>$poin,
            'last_jawaban'=>''
        ]);

        return redirect()->route('roulette.koreksi');
    }

    public function hasil()
    {
        $hasil = session('hasil', []);
        if (count($hasil) > 0) {
            $bab_id = session('bab_id');
            $level = session('level', 'jepang-mudah');
            $tab = session('tab', 1);

            $hasilDinilai = collect($hasil)->where('poin', '!=', '-');
            $total = count($hasilDinilai);
            $a = $hasilDinilai->where('poin', 'A')->count();
            $b = $hasilDinilai->where('poin', 'B')->count();
            $c = $hasilDinilai->where('poin', 'C')->count();
            $nol = $hasilDinilai->where('poin', '0')->count();
            $nilai = $total > 0 ? round((($a * 100) + ($b * 70) + ($c * 40)) / $total) : 0;

            $nilaiModel = Nilai::create([
                'bab_id' => $bab_id ?? 1,
                'total_kata' => count($hasil),
                'poin_a' => $a,
                'poin_b' => $b,
                'poin_c' => $c + $nol,
                'nilai' => $nilai,
                'level' => $level,
                'tab' => $tab
            ]);

            foreach ($hasil as $i => $h) {
                DetailNilai::create([
                    'nilai_id' => $nilaiModel->id,
                    'jepang' => $h['kata']->jepang,
                    'kanji' => $h['kata']->kanji ?? null,
                    'romaji' => $h['kata']->romaji,
                    'arti' => $h['kata']->arti,
                    'jawaban' => $h['jawaban'] ?? '',
                    'poin' => $h['poin'],
                    'benar' => $h['benar'] ?? true,
                    'waktu' => $h['waktu'],
                    'urutan' => $i + 1
                ]);
            }
        }
        return view('hasil', compact('hasil'));
    }
}