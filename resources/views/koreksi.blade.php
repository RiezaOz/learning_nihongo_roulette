<x-layout title="Koreksi">
    <div class="container">
        <div class="card" style="text-align:center;">
            <p class="text-muted" style="margin-bottom:1rem;">Koreksi</p>
            <div style="background:rgba(255,255,255,0.08); border-radius:16px; padding:2rem; margin-bottom:1.5rem;">
                <p style="color:#ffffff; font-size:2.5rem; font-weight:700; margin-bottom:0.5rem;">{{ $kotoba->kanji ?: $kotoba->jepang }}</p>
                @if($kotoba->kanji)<p class="text-muted">({{ $kotoba->jepang }})</p>@endif
                <p class="text-muted">{{ $kotoba->romaji }}</p>
                <p class="text-accent" style="font-size:1.5rem; font-weight:600;">{{ $kotoba->arti }}</p>
            </div>

            <div style="display:flex; gap:1rem; justify-content:center; margin-bottom:2rem;">
                <div style="background:rgba(255,255,255,0.08); padding:1rem 1.5rem; border-radius:12px;">
                    <p class="text-muted" style="font-size:0.8rem;">Waktu</p>
                    <p style="color:#ffffff; font-size:1.5rem;">{{ $waktu }}s</p>
                </div>
                <div style="background:rgba(255,255,255,0.08); padding:1rem 1.5rem; border-radius:12px;">
                    <p class="text-muted" style="font-size:0.8rem;">Poin</p>
                    <p class="text-accent" style="font-size:2rem; font-weight:700;">{{ $poin }}</p>
                </div>
            </div>

            <a href="{{ route('roulette.show') }}" class="btn-primary" style="display:inline-block; width:100%; padding:1rem; border-radius:12px; text-decoration:none; font-weight:600;">Lanjut</a>
        </div>
    </div>
    <script>document.addEventListener('keydown',function(e){if(e.key==='Enter'){window.location.href='{{route('roulette.show')}}';}});</script>
</x-layout>