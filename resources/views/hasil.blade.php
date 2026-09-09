<x-layout title="Hasil">
    <div class="container">
        <div class="card" style="text-align:center;">
            <div style="font-size:4rem;">🌊</div>
            <h2 style="color:#ffffff;font-size:2rem;margin-bottom:1rem;">Latihan Selesai!</h2>

            @php
                $a = collect($hasil)->where('poin','A')->count();
                $b = collect($hasil)->where('poin','B')->count();
                $c = collect($hasil)->where('poin','C')->count();
                $nol = collect($hasil)->where('poin','0')->count();
                $total = count($hasil);
                $nilai = $total > 0 ? round((($a*100)+($b*70)+($c*40))/$total) : 0;
            @endphp

            <p style="color:#b3e5fc;margin-bottom:0.5rem;">⭐ Nilai Akhir</p>
            <p style="font-size:3rem;font-weight:700;color:#80deea;">{{ $nilai }}</p>

            <div style="display:flex;gap:1rem;justify-content:center;margin:2rem 0;">
                <div style="background:rgba(255,255,255,0.1);padding:1.5rem;border-radius:16px;"><p style="color:#80deea;font-size:2rem;">A</p><p style="color:#ffffff;">{{$a}}</p></div>
                <div style="background:rgba(255,255,255,0.1);padding:1.5rem;border-radius:16px;"><p style="color:#ffd54f;font-size:2rem;">B</p><p style="color:#ffffff;">{{$b}}</p></div>
                <div style="background:rgba(255,255,255,0.1);padding:1.5rem;border-radius:16px;"><p style="color:#ff8a65;font-size:2rem;">C</p><p style="color:#ffffff;">{{$c}}</p></div>
            </div>

            <a href="{{ route('home') }}" style="display:inline-block;width:100%;padding:1rem;border-radius:12px;background:linear-gradient(135deg, #00bcd4, #0097a7);color:#ffffff;text-decoration:none;font-weight:700;margin-bottom:0.8rem;">🏠 Kembali ke Home</a>
            <a href="{{ route('riwayat') }}" style="display:inline-block;width:100%;padding:0.8rem;border-radius:12px;background:rgba(255,255,255,0.1);border:2px solid rgba(255,255,255,0.3);color:#ffffff;text-decoration:none;">📊 Lihat Riwayat</a>
        </div>
    </div>
</x-layout>