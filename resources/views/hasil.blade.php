<x-layout title="Hasil">
    <div class="container">
        <div class="card" style="text-align:center;">
            <div style="font-size:3rem; margin-bottom:0.5rem;">🌊</div>
            <h2 style="color:#ffffff; font-size:1.8rem; margin-bottom:1rem;">Latihan Selesai!</h2>

            @php
                $a = collect($hasil)->where('poin','A')->count();
                $b = collect($hasil)->where('poin','B')->count();
                $c = collect($hasil)->where('poin','C')->count();
                $nol = collect($hasil)->where('poin','0')->count();
                $total = count($hasil);
                $nilai = $total > 0 ? round((($a*100)+($b*70)+($c*40))/$total) : 0;
            @endphp

            <p style="color:#bae6fd; margin-bottom:0.5rem;">Nilai Akhir</p>
            <p style="font-size:3rem; font-weight:700; color:{{ $nilai >= 70 ? '#7dd3fc' : ($nilai >= 50 ? '#fbbf24' : '#fb923c') }};">
                {{ $nilai }}
            </p>
            <p style="color:#64748b; font-size:0.8rem;">dari {{ $total }} kata</p>

            <div style="display:flex; gap:1rem; justify-content:center; margin:2rem 0; flex-wrap:wrap;">
                <div style="background:rgba(125,211,252,0.15); padding:1rem 1.5rem; border-radius:16px; border:1px solid rgba(125,211,252,0.3); min-width:70px;">
                    <div style="font-size:2rem; font-weight:700; color:#7dd3fc;">A</div>
                    <div style="color:#7dd3fc; font-size:1.1rem;">{{ $a }}</div>
                </div>
                <div style="background:rgba(251,191,36,0.15); padding:1rem 1.5rem; border-radius:16px; border:1px solid rgba(251,191,36,0.3); min-width:70px;">
                    <div style="font-size:2rem; font-weight:700; color:#fbbf24;">B</div>
                    <div style="color:#fbbf24; font-size:1.1rem;">{{ $b }}</div>
                </div>
                <div style="background:rgba(251,146,60,0.15); padding:1rem 1.5rem; border-radius:16px; border:1px solid rgba(251,146,60,0.3); min-width:70px;">
                    <div style="font-size:2rem; font-weight:700; color:#fb923c;">C</div>
                    <div style="color:#fb923c; font-size:1.1rem;">{{ $c }}</div>
                </div>
                @if($nol > 0)
                <div style="background:rgba(100,100,100,0.15); padding:1rem 1.5rem; border-radius:16px; border:1px solid rgba(100,100,100,0.3); min-width:70px;">
                    <div style="font-size:2rem;">🏳️</div>
                    <div style="color:#888; font-size:1.1rem;">{{ $nol }}</div>
                </div>
                @endif
            </div>

            <a href="{{ route('home') }}" class="btn-primary" style="display:inline-block; width:100%; padding:1rem; border-radius:12px; text-decoration:none; font-weight:600; margin-bottom:0.8rem;">
                Kembali ke Home
            </a>
            <a href="{{ route('riwayat') }}" style="display:inline-block; width:100%; padding:0.8rem; border-radius:12px; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); color:#ffffff; text-decoration:none;">
                Lihat Riwayat
            </a>
        </div>
    </div>
</x-layout>