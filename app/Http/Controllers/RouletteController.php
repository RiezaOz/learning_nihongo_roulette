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
        $bab_id = $request->bab_id; $level = $request->level; $tab = $request->tab;
        $bab = Bab::findOrFail($bab_id);
        
        if ($tab == 1) {
            // Hanya kata dari bab ini
            $kotobas = Kotoba::where('bab_id', $bab_id)->orderBy('urutan')->get();
        } else {
            // Rekap: semua kata dari bab 1 sampai bab ini
            $kotobas = Kotoba::whereIn('bab_id', range(1, $bab->id))
                ->orderBy('bab_id')
                ->orderBy('urutan')
                ->get();
        }
        
        $kotobas = $kotobas->shuffle()->values();
        session(['kotobas'=>$kotobas,'index'=>0,'level'=>$level,'hasil'=>[],'last_waktu'=>0,'last_poin'=>'','last_jawaban'=>'','bab_id'=>$bab_id,'tab'=>$tab]);
        return redirect()->route('roulette.show');
    }

    public function show()
    {
        $kotobas = session('kotobas'); $index = session('index', 0);
        if (!$kotobas || count($kotobas) == 0) return redirect()->route('home');
        if ($index >= count($kotobas)) return redirect()->route('roulette.hasil');
        $kotoba = $kotobas[$index]; $level = session('level', 'jepang-mudah');
        return view('roulette', compact('kotoba', 'level', 'index'));
    }

    public function jawab(Request $request)
    {
        $waktu = $request->waktu; $level = session('level', 'jepang-mudah');
        $jawaban = $request->jawaban ?? ''; $kotobas = session('kotobas', []);
        $index = session('index', 0); $kotoba = $kotobas[$index] ?? null;

        $bersihkan = function($teks) { return trim(preg_replace('/[～〜・※▲▼★☆♪♯＠＃＄％＆＊＋－／：；＜＝＞？＠＾＿｀｛｜｝￠￡￢￣￤￥「」『』【】]/u', '', $teks)); };

        if ($level == 'romaji') { $poin = '-'; }
        elseif (in_array($level, ['kanji-mudah','kanji-susah']) && $kotoba) {
            $jawabanBersih = strtolower(trim($jawaban));
            $kunci = strtolower(trim($kotoba->arti));
            $kunciSederhana = trim(preg_replace('/\(.*?\)/', '', $kunci));
            $alternatif = ['daigaku'=>['universitas','kampus','univ'],'byouin'=>['rumah sakit','rs'],'sensei'=>['guru','dokter'],'gakusei'=>['murid','pelajar','siswa','mahasiswa']];
            $semuaJawaban = [$kunciSederhana];
            if (isset($alternatif[$kotoba->romaji])) { $semuaJawaban = array_merge($semuaJawaban, $alternatif[$kotoba->romaji]); }
            $benar = false;
            foreach ($semuaJawaban as $jwb) { if (str_contains($jwb, $jawabanBersih) || str_contains($jawabanBersih, $jwb)) { $benar = true; break; } }
            if (!$benar) { $poin = '0'; } elseif ($waktu <= 10) { $poin = 'A'; } elseif ($waktu <= 15) { $poin = 'B'; } else { $poin = 'C'; }
        }
        elseif ($level == 'kanji-romaji' && $kotoba) {
            $jawabanBersih = strtolower(trim($jawaban));
            $kunciRomaji = strtolower(trim($bersihkan($kotoba->romaji)));
            $benar = $jawabanBersih === $kunciRomaji;
            if (!$benar) { $poin = '0'; } elseif ($waktu <= 10) { $poin = 'A'; } elseif ($waktu <= 15) { $poin = 'B'; } else { $poin = 'C'; }
        }
        elseif (in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji'])) { $poin = '0'; }
        else { if ($waktu <= 5) { $poin = 'A'; } elseif ($waktu <= 7) { $poin = 'B'; } else { $poin = 'C'; } }

        session(['last_waktu'=>$waktu,'last_poin'=>$poin,'last_jawaban'=>$jawaban]);
        return response()->json(['status'=>'ok']);
    }

    public function koreksi()
    {
        $kotobas = session('kotobas'); $index = session('index', 0);
        $hasil = session('hasil', []); $waktu = session('last_waktu', 0);
        $poin = session('last_poin', 'C'); $jawaban = session('last_jawaban', '');
        $level = session('level', 'jepang-mudah'); $kotoba = $kotobas[$index];
        $isKetik = in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji']);
        $benar = !($isKetik && $poin == '0');
        $hasil[] = ['kata'=>$kotoba,'waktu'=>$waktu,'poin'=>$poin,'jawaban'=>$jawaban,'benar'=>$benar];
        session(['hasil'=>$hasil,'index'=>$index+1]);
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
        
        $hasil[] = ['kata'=>$kotoba,'waktu'=>0,'poin'=>$poin,'jawaban'=>'','benar'=>false];
        session(['hasil'=>$hasil,'index'=>$indexKetemu + 1]);
        return redirect()->route('roulette.koreksi');
    }

    public function hasil()
    {
        $hasil = session('hasil', []);
        if (count($hasil) > 0) {
            $bab_id = session('bab_id'); $level = session('level', 'jepang-mudah'); $tab = session('tab', 1);
            $hasilDinilai = collect($hasil)->where('poin', '!=', '-');
            $total = count($hasilDinilai);
            $a = $hasilDinilai->where('poin', 'A')->count(); $b = $hasilDinilai->where('poin', 'B')->count();
            $c = $hasilDinilai->where('poin', 'C')->count(); $nol = $hasilDinilai->where('poin', '0')->count();
            $nilai = $total > 0 ? round((($a * 100) + ($b * 70) + ($c * 40)) / $total) : 0;
            $nilaiModel = Nilai::create(['bab_id'=>$bab_id??1,'total_kata'=>count($hasil),'poin_a'=>$a,'poin_b'=>$b,'poin_c'=>$c+$nol,'nilai'=>$nilai,'level'=>$level,'tab'=>$tab]);
            foreach ($hasil as $i => $h) {
                DetailNilai::create(['nilai_id'=>$nilaiModel->id,'jepang'=>$h['kata']->jepang,'kanji'=>$h['kata']->kanji??null,'romaji'=>$h['kata']->romaji,'arti'=>$h['kata']->arti,'jawaban'=>$h['jawaban']??'','poin'=>$h['poin'],'benar'=>$h['benar']??true,'waktu'=>$h['waktu'],'urutan'=>$i+1]);
            }
        }
        return view('hasil', compact('hasil'));
    }
}