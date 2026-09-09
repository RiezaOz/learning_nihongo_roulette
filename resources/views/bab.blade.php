<x-layout title="{{ $bab->nama }} - Nihongo Roulette">
    <div class="container">
        <div class="card">
            <a href="{{ route('home') }}" style="color: #bae6fd; text-decoration: none; display: block; margin-bottom: 1rem;">← Kembali</a>

            <h1 style="font-size: 1.8rem; color: #ffffff; text-align: center; margin-bottom: 0.5rem;">{{ $bab->nama }}</h1>
            <p style="color: #bae6fd; text-align: center; margin-bottom: 2rem;">Minggu ke-{{ $bab->minggu }} • {{ $bab->total_kata }} kata</p>

            <!-- Daftar Kata -->
            <div style="margin-bottom: 2rem;">
                <h3 style="color: #ffffff; margin-bottom: 1rem;">Daftar Kata (Tab <span id="tabLabel">1</span>):</h3>
                <div style="max-height: 250px; overflow-y: auto; background: rgba(255,255,255,0.08); border-radius: 12px; padding: 1rem;">
                    <table style="width:100%; color: #e0f2fe; font-size: 0.85rem; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.2);">
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
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                                <td style="padding: 0.5rem; text-align: center;">{{ $k->urutan }}</td>
                                <td style="padding: 0.5rem; color: #ffffff;">
                                    @if($k->kanji){{ $k->kanji }} <span style="color:#bae6fd;font-size:0.8rem;">({{ $k->jepang }})</span>@else{{ $k->jepang }}@endif
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

                <!-- Pilih Tab -->
                <label style="display:block; color:#bae6fd; margin-bottom:0.5rem;">Pilih Tab</label>
                <select name="tab" required style="width:100%; padding:1rem; border-radius:12px; border:1px solid rgba(255,255,255,0.2); background:rgba(255,255,255,0.1); color:#ffffff; font-size:1rem; margin-bottom:1.5rem;">
                    <option value="1" style="background:#0c4a6e;">Tab 1 ({{ $totalKata }} kata {{ $bab->nama }})</option>
                    @if($bab->minggu > 1)
                    <option value="2" style="background:#0c4a6e;">Tab 2 (Rekap Bab 1 - Bab {{ $bab->minggu }})</option>
                    @endif
                </select>

                <!-- Pilih Mode (MENYAMPING) -->
                <label style="display:block; color:#bae6fd; margin-bottom:0.5rem;">Pilih Mode Latihan</label>
                <div style="display: flex; flex-wrap: wrap; gap: 0.8rem; justify-content: center; margin-bottom: 2rem;">
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="jepang-mudah" checked style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Jepang Mudah</span>
                    </label>
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="jepang-susah" style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Jepang Susah</span>
                    </label>
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="indonesia" style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Indonesia</span>
                    </label>
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="romaji" style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Romaji</span>
                    </label>
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="kanji-mudah" style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Kanji Mudah</span>
                    </label>
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="kanji-susah" style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Kanji Susah</span>
                    </label>
                    <label style="padding:0.6rem 1rem; border-radius:15px; background:rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.2); cursor:pointer; transition:all 0.3s;"
                           onmouseover="this.style.borderColor='#7dd3fc';"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                        <input type="radio" name="level" value="kanji-romaji" style="accent-color:#0284c7;">
                        <span style="color:#ffffff; font-size:0.9rem;">Kanji Romaji</span>
                    </label>
                </div>

                <button type="submit" class="btn-primary" style="width:100%; padding:1rem; border-radius:12px; font-size:1.2rem; font-weight:600; cursor:pointer;">Mulai</button>
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
            if (tab === 1) { kataDitampilkan = semuaKata; label = '1 (' + totalKata + ' kata)'; }
            else if (tab === 2) { kataDitampilkan = rekapData; label = '2 (Rekap)'; }
            tabLabel.textContent = label;
            let html = '';
            kataDitampilkan.forEach(k => {
                html += '<tr style="border-bottom:1px solid rgba(255,255,255,0.1);">';
                html += '<td style="padding:0.5rem;text-align:center;">' + (k.urutan || '-') + '</td>';
                html += '<td style="padding:0.5rem;color:#ffffff;">' + (k.kanji ? k.kanji + ' <span style="color:#bae6fd;font-size:0.8rem;">(' + k.jepang + ')</span>' : k.jepang) + '</td>';
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