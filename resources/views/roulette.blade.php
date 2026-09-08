<x-layout title="Latihan - Nihongo Roulette">
    <div style="max-width:600px;margin:3rem auto;padding:2rem;">
        <div style="background:rgba(255,255,255,0.05);backdrop-filter:blur(10px);border-radius:24px;padding:3rem 2rem;border:1px solid rgba(255,255,255,0.1);box-shadow:0 20px 50px rgba(0,0,0,0.3);text-align:center;">

            <p style="color:#a0a0b0;margin-bottom:0.5rem;">
                Kata ke-<strong style="color:white;">{{ $index + 1 }}</strong>
                @if(in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji']))<span style="color:#f0a500;"> • Timer 10s</span>@endif
                @if($level == 'romaji')<span style="color:#47b2e4;"> • Tulis di buku</span>@endif
            </p>

            <div style="min-height:120px;display:flex;flex-direction:column;align-items:center;justify-content:center;margin:1.5rem 0;">
                @if($level == 'jepang-mudah')
                    <div style="font-size:3.5rem;color:#e94560;font-weight:700;">{{ $kotoba->jepang }}</div>
                    <p style="color:#a0a0b0;margin-top:0.5rem;">🇯🇵 Sebutkan artinya!</p>
                @elseif($level == 'jepang-susah')
                    <div style="font-size:3.5rem;color:#e94560;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</div>
                    <p style="color:#a0a0b0;margin-top:0.5rem;">🇯🇵🔴 Sebutkan artinya!</p>
                @elseif($level == 'indonesia')
                    <div style="font-size:2rem;color:#e94560;font-weight:700;">{{ $kotoba->arti }}</div>
                    <p style="color:#a0a0b0;margin-top:0.5rem;">🇮🇩 Sebutkan bahasa Jepangnya!</p>
                @elseif($level == 'romaji')
                    <div style="font-size:2.5rem;color:#e94560;font-weight:700;margin-bottom:0.5rem;">{{ $kotoba->romaji }}</div>
                    <p style="color:#a0a0b0;">📝 Tulis Jepangnya di buku, lalu klik OKE</p>
                @elseif($level == 'kanji-mudah')
                    @if($kotoba->kanji)<div style="font-size:3.5rem;color:#e94560;font-weight:700;">{{ $kotoba->kanji }}</div><div style="font-size:1.3rem;color:#a0a0b0;margin-top:0.5rem;">({{ $kotoba->jepang }})</div>
                    @else<div style="font-size:3.5rem;color:#e94560;font-weight:700;">{{ $kotoba->jepang }}</div>@endif
                @elseif($level == 'kanji-susah')
                    <div style="font-size:3.5rem;color:#e94560;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</div>
                @elseif($level == 'kanji-romaji')
                    <div style="font-size:3.5rem;color:#e94560;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</div>
                @endif
            </div>

            @if(in_array($level, ['kanji-mudah','kanji-susah']))
            <div style="margin-bottom:1.5rem;"><input type="text" id="jawaban" placeholder="Ketik arti dalam bahasa Indonesia..." style="width:100%;padding:1rem;border-radius:12px;border:2px solid rgba(255,255,255,0.2);background:rgba(255,255,255,0.05);color:white;font-size:1.1rem;text-align:center;font-family:'Poppins',sans-serif;" autocomplete="off"></div>
            @elseif($level == 'kanji-romaji')
            <div style="margin-bottom:1.5rem;"><input type="text" id="jawaban" placeholder="Ketik Romaji..." style="width:100%;padding:1rem;border-radius:12px;border:2px solid rgba(255,255,255,0.2);background:rgba(255,255,255,0.05);color:white;font-size:1.1rem;text-align:center;font-family:'Poppins',sans-serif;" autocomplete="off"></div>
            @endif

            @if($level != 'romaji')
            <div style="margin:1.5rem 0;"><p style="color:#a0a0b0;font-size:0.9rem;margin-bottom:0.3rem;">⏱ Waktu</p><span id="timer" style="color:#e94560;font-size:2.5rem;font-weight:700;">0.0</span><span style="color:#a0a0b0;"> detik</span></div>
            @endif

            <button onclick="jawab()" id="btnOke" style="width:100%;padding:1rem;border-radius:12px;border:none;background:linear-gradient(90deg,#4ecb71,#2ecc71);color:white;font-size:1.2rem;font-weight:700;cursor:pointer;transition:all 0.3s;margin-bottom:0.8rem;" onmouseover="this.style.transform='scale(1.02)';" onmouseout="this.style.transform='scale(1)';">✅ OKE</button>
            <button onclick="menyerah()" id="btnMenyerah" style="width:100%;padding:0.8rem;border-radius:12px;border:2px solid rgba(255,255,255,0.2);background:transparent;color:#a0a0b0;font-size:0.9rem;cursor:pointer;transition:all 0.3s;" onmouseover="this.style.borderColor='#e94560';this.style.color='#e94560';" onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';this.style.color='#a0a0b0';">🏳️ Menyerah</button>

            <p style="color:#666;font-size:0.8rem;margin-top:1rem;">
                @if(in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji']))≤10s=A|10-15s=B|>15s=C|❌=0
                @elseif($level=='romaji')📝 Tulis di buku
                @else ≤5s=A|5-7s=B|>7s=C @endif
            </p>
        </div>
    </div>
    <script>
        @if($level!='romaji')
        var startTime=Date.now();
        var timerInterval=setInterval(()=>{document.getElementById('timer').textContent=((Date.now()-startTime)/1000).toFixed(1);},100);
        @endif
        
        function jawab(){
            @if($level!='romaji')
            clearInterval(timerInterval);
            var waktu=((Date.now()-startTime)/1000).toFixed(1);
            @else
            var waktu=0;
            @endif
            var jawaban=document.getElementById('jawaban')?document.getElementById('jawaban').value:'';
            document.getElementById('btnOke').disabled=true;
            document.getElementById('btnMenyerah').disabled=true;
            document.getElementById('btnOke').textContent='⏳';
            fetch('{{route('roulette.jawab')}}',{
                method:'POST',
                headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{csrf_token()}}','Accept':'application/json'},
                body:JSON.stringify({waktu:parseFloat(waktu),jawaban:jawaban})
            }).then(r=>r.json()).then(d=>{window.location.href='{{route('roulette.koreksi')}}';});
        }
        
        function menyerah(){
            if(confirm('Menyerah untuk kata ini? Poin akan 0.')){
                try { @if($level!='romaji')clearInterval(timerInterval);@endif } catch(e) {}
                window.location.href = '{{route('roulette.menyerah')}}?kata_id={{$kotoba->id}}';
            }
        }
        
        document.addEventListener('keydown',function(e){
            if(e.key==='Enter'&&document.getElementById('jawaban')){e.preventDefault();jawab();}
        });
        @if(in_array($level,['kanji-mudah','kanji-susah','kanji-romaji']))
        document.getElementById('jawaban').focus();
        @endif
    </script>
</x-layout>