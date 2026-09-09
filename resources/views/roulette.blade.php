<x-layout title="Latihan - Nihongo Roulette">
    <div class="container">
        <div class="card" style="text-align: center;">
            <p style="color:#b3e5fc; margin-bottom: 0.5rem;">
                Kata ke-<strong style="color:#ffffff;">{{ $index + 1 }}</strong>
                @if(in_array($level, ['kanji-mudah','kanji-susah','kanji-romaji']))<span style="color:#80deea;"> • Timer 10s</span>@endif
                @if($level == 'romaji')<span style="color:#80deea;"> • Tulis di buku</span>@endif
            </p>

            <div style="min-height:150px; display:flex; flex-direction:column; align-items:center; justify-content:center; margin:1.5rem 0;">
                @if($level == 'jepang-mudah')
                    <div style="font-size:3.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->jepang }}</div>
                    <p style="color:#b3e5fc; margin-top:0.5rem;">🇯🇵 Sebutkan artinya!</p>
                @elseif($level == 'jepang-susah')
                    <div style="font-size:3.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</div>
                    <p style="color:#b3e5fc; margin-top:0.5rem;">🇯🇵🔴 Sebutkan artinya!</p>
                @elseif($level == 'indonesia')
                    <div style="font-size:2rem;color:#ffffff;font-weight:700;">{{ $kotoba->arti }}</div>
                    <p style="color:#b3e5fc; margin-top:0.5rem;">🇮🇩 Sebutkan Jepangnya!</p>
                @elseif($level == 'romaji')
                    <div style="font-size:2.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->romaji }}</div>
                    <p style="color:#b3e5fc;">📝 Tulis Jepangnya di buku, lalu klik OKE</p>
                @elseif($level == 'kanji-mudah')
                    @if($kotoba->kanji)<div style="font-size:3.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->kanji }}</div><div style="font-size:1.3rem;color:#b3e5fc;">({{ $kotoba->jepang }})</div>
                    @else<div style="font-size:3.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->jepang }}</div>@endif
                @elseif($level == 'kanji-susah')
                    <div style="font-size:3.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</div>
                @elseif($level == 'kanji-romaji')
                    <div style="font-size:3.5rem;color:#ffffff;font-weight:700;">{{ $kotoba->kanji ?: $kotoba->jepang }}</div>
                @endif
            </div>

            @if(in_array($level, ['kanji-mudah','kanji-susah']))
            <input type="text" id="jawaban" placeholder="Ketik arti dalam bahasa Indonesia..." style="width:100%;padding:1rem;border-radius:12px;border:2px solid rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);color:#ffffff;font-size:1.1rem;text-align:center;font-family:'Poppins',sans-serif;margin-bottom:1rem;" autocomplete="off">
            @elseif($level == 'kanji-romaji')
            <input type="text" id="jawaban" placeholder="Ketik Romaji..." style="width:100%;padding:1rem;border-radius:12px;border:2px solid rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);color:#ffffff;font-size:1.1rem;text-align:center;font-family:'Poppins',sans-serif;margin-bottom:1rem;" autocomplete="off">
            @endif

            @if($level != 'romaji')
            <div style="margin:1.5rem 0;">
                <p style="color:#b3e5fc; font-size:0.9rem;">⏱ Waktu</p>
                <span id="timer" style="color:#80deea;font-size:2.5rem;font-weight:700;">0.0</span><span style="color:#b3e5fc;"> detik</span>
            </div>
            @endif

            <button onclick="jawab()" id="btnOke" style="width:100%;padding:1rem;border-radius:12px;border:none;background:linear-gradient(135deg, #00bcd4, #0097a7);color:#ffffff;font-size:1.2rem;font-weight:700;cursor:pointer;margin-bottom:0.8rem;">✅ OKE</button>
            <button onclick="menyerah()" style="width:100%;padding:0.8rem;border-radius:12px;border:2px solid rgba(255,255,255,0.3);background:transparent;color:#b3e5fc;font-size:0.9rem;cursor:pointer;">🏳️ Menyerah</button>
        </div>
    </div>

    <script>
        @if($level!='romaji')
        var startTime=Date.now();
        var timerInterval=setInterval(()=>{document.getElementById('timer').textContent=((Date.now()-startTime)/1000).toFixed(1);},100);
        @endif
        
        function jawab(){
            @if($level!='romaji')clearInterval(timerInterval);var waktu=((Date.now()-startTime)/1000).toFixed(1);@else var waktu=0;@endif
            var jawaban=document.getElementById('jawaban')?document.getElementById('jawaban').value:'';
            document.getElementById('btnOke').disabled=true;
            document.getElementById('btnOke').textContent='⏳';
            fetch('{{route('roulette.jawab')}}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{csrf_token()}}','Accept':'application/json'},body:JSON.stringify({waktu:parseFloat(waktu),jawaban:jawaban})}).then(r=>r.json()).then(d=>{window.location.href='{{route('roulette.koreksi')}}';});
        }
        function menyerah(){
            if(confirm('Menyerah?')){try { @if($level!='romaji')clearInterval(timerInterval);@endif } catch(e) {} window.location.href='{{route('roulette.menyerah')}}?kata_id={{$kotoba->id}}';}
        }
        document.addEventListener('keydown',function(e){if(e.key==='Enter'&&document.getElementById('jawaban')){e.preventDefault();jawab();}});
        @if(in_array($level,['kanji-mudah','kanji-susah','kanji-romaji']))document.getElementById('jawaban').focus();@endif
    </script>
</x-layout>