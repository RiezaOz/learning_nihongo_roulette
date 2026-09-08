<x-layout title="{{ $bab->nama }} - Nihongo Roulette">
    <div style="max-width: 750px; margin: 3rem auto; padding: 2rem;">
        <div style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 24px; padding: 3rem 2rem; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 50px rgba(0,0,0,0.3);">

            <a href="{{ route('home') }}" style="color: #a0a0b0; text-decoration: none; display: block; text-align: left; margin-bottom: 1rem;">← Kembali</a>

            <h1 style="font-size: 2rem; margin-bottom: 0.5rem; color: white; text-align: center;">📚 {{ $bab->nama }}</h1>
            <p style="color: #a0a0b0; margin-bottom: 2rem; text-align: center;">Minggu ke-{{ $bab->minggu }} • {{ $bab->total_kata }} kata</p>

            <!-- Daftar Kata -->
            <div style="margin-bottom: 2rem;">
                <h3 style="color: white; margin-bottom: 1rem;">📋 Daftar Kata (Tab <span id="tabLabel">1</span>):</h3>
                <div style="max-height: 250px; overflow-y: auto; background: rgba(0,0,0,0.2); border-radius: 12px; padding: 1rem;">
                    <table style="width:100%; color: #a0a0b0; font-size: 0.85rem; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                                <th style="padding: 0.5rem;">#</th>
                                <th style="padding: 0.5rem; text-align: left;">Jepang</th>
                                <th style="padding: 0.5rem; text-align: left;">Romaji</th>
                                <th style="padding: 0.5rem; text-align: left;">Arti</th>
                                <th style="padding: 0.5rem;">Bab</th>
                            </tr>
                        </thead>
                        <tbody id="daftarKata">
                            @php
                                $daftar = \App\Models\Kotoba::where('bab_id', $bab->id)->orderBy('urutan')->get();
                                $totalKata = $bab->total_kata;
                            @endphp
                            @foreach($daftar as $k)
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td style="padding: 0.5rem; text-align: center;">{{ $k->urutan }}</td>
                                <td style="padding: 0.5rem; color: white;">
                                    @if($k->kanji){{ $k->kanji }} <span style="color:#a0a0b0;font-size:0.8rem;">({{ $k->jepang }})</span>@else{{ $k->jepang }}@endif
                                </td>
                                <td style="padding: 0.5rem;">{{ $k->romaji }}</td>
                                <td style="padding: 0.5rem;">{{ $k->arti }}</td>
                                <td style="padding: 0.5rem; text-align: center;">{{ $k->bab_id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('roulette.start') }}" method="POST">
                @csrf
                <input type="hidden" name="bab_id" value="{{ $bab->id }}">

                <label style="display:block; text-align:left; color:#a0a0b0; margin-bottom:0.5rem;">📑 Pilih Tab</label>
                <select name="tab" required style="width:100%; padding:1rem; border-radius:12px; border:2px solid rgba(255,255,255,0.2); background:rgba(255,255,255,0.05); color:white; font-size:1rem; margin-bottom:1.5rem;">
                    <option value="1" style="background:#1a1a2e;">Tab 1 ({{ $totalKata }} kata {{ $bab->nama }})</option>
                    @if($bab->minggu > 1)
                    <option value="2" style="background:#1a1a2e;">Tab 2 (Rekap Bab 1 - Bab {{ $bab->minggu }})</option>
                    @endif
                </select>

                <label style="display:block; text-align:left; color:#a0a0b0; margin-bottom:0.5rem;">🌐 Pilih Mode Latihan</label>
                <div style="display:flex; flex-direction:column; gap:0.8rem; margin-bottom:2rem;">
                    @foreach([
                        ['value'=>'jepang-mudah','emoji'=>'🇯🇵','text'=>'Jepang Lisan (Mudah) - Lihat Hiragana, sebutkan artinya'],
                        ['value'=>'jepang-susah','emoji'=>'🇯🇵🔴','text'=>'Jepang Lisan (Susah) - Lihat Kanji, sebutkan artinya'],
                        ['value'=>'indonesia','emoji'=>'🇮🇩','text'=>'Indonesia Lisan - Lihat arti, sebutkan Jepangnya'],
                        ['value'=>'romaji','emoji'=>'📝','text'=>'Romaji (Tulis) - Lihat Romaji, tulis Jepangnya di buku'],
                        ['value'=>'kanji-mudah','emoji'=>'✍️','text'=>'Kanji Ketik Arti (Mudah) - Lihat Kanji + Hiragana, ketik artinya'],
                        ['value'=>'kanji-susah','emoji'=>'✍️🔴','text'=>'Kanji Ketik Arti (Susah) - Lihat Kanji, ketik artinya'],
                        ['value'=>'kanji-romaji','emoji'=>'📝✍️','text'=>'Kanji Ketik Romaji - Lihat Kanji, ketik Romajinya'],
                    ] as $i => $l)
                    <label style="padding:0.8rem 1.5rem; border-radius:25px; background:rgba(255,255,255,0.05); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s; display:flex; align-items:center; gap:0.5rem;"
                           onmouseover="this.style.borderColor='#e94560';" onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="{{ $l['value'] }}" {{ $i == 0 ? 'checked' : '' }} style="accent-color:#e94560;">
                        <span>{{ $l['emoji'] }} <strong>{{ $l['text'] }}</strong></span>
                    </label>
                    @endforeach
                </div>

                <button type="submit" style="width:100%; padding:1rem; border-radius:12px; border:none; background:linear-gradient(90deg, #e94560, #ff6b6b); color:white; font-size:1.2rem; font-weight:700; cursor:pointer; transition:all 0.3s;"
                        onmouseover="this.style.transform='scale(1.02)';" onmouseout="this.style.transform='scale(1)';">▶ Mulai</button>
            </form>
        </div>
    </div>

    <script>
        const selectTab = document.querySelector('select[name="tab"]');
        const tabLabel = document.getElementById('tabLabel');
        const daftarKata = document.getElementById('daftarKata');
        const totalKata = {{ $totalKata }};
        const semuaKata = [
            @foreach($daftar as $k)
            { urutan: {{ $k->urutan }}, kanji: @json($k->kanji), jepang: @json($k->jepang), romaji: @json($k->romaji), arti: @json($k->arti), bab: {{ $k->bab_id }} },
            @endforeach
        ];
        const rekapData = {!! json_encode($rekapKata ?? []) !!};
        
        function updateTabel() {
            const tab = parseInt(selectTab.value);
            let kataDitampilkan = [], label = '';
            if (tab === 1) { kataDitampilkan = semuaKata; label = '1 (' + totalKata + ' kata {{ $bab->nama }})'; }
            else if (tab === 2) { kataDitampilkan = rekapData; label = '2 (Rekap Bab 1 - Bab {{ $bab->minggu }})'; }
            tabLabel.textContent = label;
            let html = '';
            kataDitampilkan.forEach(k => {
                html += '<tr style="border-bottom:1px solid rgba(255,255,255,0.05);">';
                html += '<td style="padding:0.5rem;text-align:center;">' + (k.urutan || '-') + '</td>';
                html += '<td style="padding:0.5rem;color:white;">' + (k.kanji ? k.kanji + ' <span style="color:#a0a0b0;font-size:0.8rem;">(' + k.jepang + ')</span>' : k.jepang) + '</td>';
                html += '<td style="padding:0.5rem;">' + k.romaji + '</td>';
                html += '<td style="padding:0.5rem;">' + k.arti + '</td>';
                html += '<td style="padding:0.5rem;text-align:center;">' + (k.bab || '-') + '</td>';
                html += '</tr>';
            });
            daftarKata.innerHTML = html;
        }
        selectTab.addEventListener('change', updateTabel);
    </script>
</x-layout>