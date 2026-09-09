<x-layout title="Koreksi">
    <div class="container">
        <div class="card" style="text-align:center;">
            <p style="color:#b3e5fc;margin-bottom:1rem;">📝 Koreksi</p>
            <div style="background:rgba(255,255,255,0.1);border-radius:16px;padding:2rem;margin-bottom:1.5rem;">
                <p style="color:#ffffff;font-size:2.5rem;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</p>
                @if($kotoba->kanji)<p style="color:#b3e5fc;">({{ $kotoba->jepang }})</p>@endif
                <p style="color:#b3e5fc;">📖 {{ $kotoba->romaji }}</p>
                <p style="color:#80deea;font-size:1.5rem;font-weight:600;">🇮🇩 {{ $kotoba->arti }}</p>
            </div>

            <div style="display:flex;gap:1rem;justify-content:center;margin-bottom:2rem;">
                <div style="background:rgba(255,255,255,0.1);padding:1rem 1.5rem;border-radius:12px;"><p style="color:#b3e5fc;">⏱</p><p style="color:#ffffff;font-size:1.5rem;">{{ $waktu }}s</p></div>
                <div style="background:rgba(255,255,255,0.1);padding:1rem 1.5rem;border-radius:12px;"><p style="color:#b3e5fc;">⭐</p><p style="color:#80deea;font-size:2rem;font-weight:700;">{{ $poin }}</p></div>
            </div>

            <a href="{{ route('roulette.show') }}" style="display:inline-block;width:100%;padding:1rem;border-radius:12px;background:linear-gradient(135deg, #00bcd4, #0097a7);color:#ffffff;text-decoration:none;font-weight:700;">▶ Lanjut (Enter)</a>
        </div>
    </div>
    <script>document.addEventListener('keydown',function(e){if(e.key==='Enter'){window.location.href='{{route('roulette.show')}}';}});</script>
</x-layout>