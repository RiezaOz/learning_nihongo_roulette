<x-layout title="Koreksi - Nihongo Roulette">
    <div style="max-width:600px;margin:3rem auto;padding:2rem;">
        <div style="background:rgba(255,255,255,0.05);backdrop-filter:blur(10px);border-radius:24px;padding:3rem 2rem;border:1px solid rgba(255,255,255,0.1);box-shadow:0 20px 50px rgba(0,0,0,0.3);text-align:center;">
            <p style="color:#a0a0b0;margin-bottom:1rem;">📝 Koreksi</p>
            <div style="background:rgba(0,0,0,0.2);border-radius:16px;padding:2rem;margin-bottom:1.5rem;">
                <p style="color:white;font-size:2.5rem;font-weight:700;margin-bottom:0.5rem;">{{ !empty($kotoba->kanji) ? $kotoba->kanji : $kotoba->jepang }}</p>
                @if(!empty($kotoba->kanji))<p style="color:#a0a0b0;font-size:1.2rem;margin-bottom:1rem;">({{ $kotoba->jepang }})</p>@endif
                <p style="color:#a0a0b0;font-size:1.2rem;margin-bottom:0.5rem;">📖 {{ $kotoba->romaji }}</p>
                <p style="color:#4ecb71;font-size:1.5rem;font-weight:600;">🇮🇩 {{ $kotoba->arti }}</p>

                @if(in_array($level, ['kanji-mudah','kanji-susah','indonesia-ketik','romaji-mudah','romaji-susah']) && isset($jawaban) && $jawaban != '')
                <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid rgba(255,255,255,0.1);">
                    <p style="color:#a0a0b0;margin-bottom:0.5rem;">Jawaban kamu:</p>
                    <p style="color:{{ isset($benar)&&$benar?'#4ecb71':'#e94560' }};font-size:1.3rem;font-weight:600;">{{ $jawaban }} @if(isset($benar)&&$benar)✅@else❌@endif</p>
                    @if(isset($benar)&&!$benar)
                    <div style="margin-top:0.8rem;background:rgba(78,203,113,0.1);border-radius:12px;padding:1rem;">
                        <p style="color:#4ecb71;">✅ Jawaban benar:</p>
                        @if(in_array($level, ['kanji-mudah','kanji-susah']))<strong>{{ $kotoba->arti }}</strong>
                        @elseif($level == 'indonesia-ketik')<strong>{{ $kotoba->kanji ?: $kotoba->jepang }}</strong> @if($kotoba->kanji)({{ $kotoba->jepang }})@endif
                        @else<strong>{{ $kotoba->romaji }}</strong>@endif
                    </div>
                    @endif
                </div>
                @endif
                @if($poin=='0'&&(!isset($jawaban)||$jawaban==''))<div style="margin-top:1rem;padding-top:1rem;border-top:1px solid rgba(255,255,255,0.1);"><p style="color:#666;">🏳️ Menyerah</p></div>@endif
            </div>
            <div style="display:flex;gap:1rem;justify-content:center;margin-bottom:2rem;">
                <div style="background:rgba(255,255,255,0.05);padding:1rem 1.5rem;border-radius:12px;min-width:80px;"><p style="color:#a0a0b0;font-size:0.8rem;">⏱</p><p style="color:white;font-size:1.5rem;font-weight:700;">{{ $waktu }}s</p></div>
                <div style="background:rgba(255,255,255,0.05);padding:1rem 1.5rem;border-radius:12px;min-width:80px;"><p style="color:#a0a0b0;font-size:0.8rem;">⭐</p>
                    @if($poin=='0')<p style="color:#666;font-size:2rem;">0</p>@else<p style="color:{{ $poin=='A'?'#4ecb71':($poin=='B'?'#f0a500':'#e94560') }};font-size:2rem;font-weight:700;">{{ $poin }}</p>@endif
                </div>
            </div>
            <a href="{{ route('roulette.show') }}" style="display:inline-block;width:100%;padding:1rem;border-radius:12px;background:linear-gradient(90deg,#e94560,#ff6b6b);color:white;text-decoration:none;font-weight:700;font-size:1.1rem;">▶ Lanjut <span style="font-size:0.8rem;opacity:0.7;">(Enter)</span></a>
        </div>
    </div>
    <script>document.addEventListener('keydown',function(e){if(e.key==='Enter'){window.location.href='{{ route('roulette.show') }}';}});</script>
</x-layout>