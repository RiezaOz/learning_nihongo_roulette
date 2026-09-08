<x-layout title="Hasil - Nihongo Roulette">
    <div style="max-width: 650px; margin: 3rem auto; padding: 2rem;">
        <div style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 24px; padding: 3rem 2rem; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 50px rgba(0,0,0,0.3); text-align: center;">

            <div style="font-size: 4rem; margin-bottom: 1rem;">🎉</div>
            <h2 style="font-size: 2rem; color: white; margin-bottom: 2rem;">Latihan Selesai!</h2>

            @php
                $a = collect($hasil)->where('poin', 'A')->count();
                $b = collect($hasil)->where('poin', 'B')->count();
                $c = collect($hasil)->where('poin', 'C')->count();
                $menyerah = collect($hasil)->where('poin', '0')->count();
                $total = count($hasil);
                $nilai = $total > 0 ? round((($a * 100) + ($b * 70) + ($c * 40) + ($menyerah * 0)) / $total) : 0;
            @endphp

            <div style="margin-bottom: 2rem;">
                <p style="color: #a0a0b0; font-size: 1rem; margin-bottom: 0.5rem;">⭐ Nilai Akhir</p>
                <p style="font-size: 3rem; font-weight: 700; color: {{ $nilai >= 70 ? '#4ecb71' : ($nilai >= 50 ? '#f0a500' : '#e94560') }};">
                    {{ $nilai }}
                </p>
                <p style="color: #666; font-size: 0.8rem;">dari {{ $total }} kata</p>
            </div>

            <div style="display: flex; gap: 1rem; justify-content: center; margin-bottom: 2rem; flex-wrap: wrap;">
                <div style="background: rgba(78,203,113,0.15); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(78,203,113,0.3); min-width: 70px;">
                    <div style="font-size: 2rem; font-weight: 700; color: #4ecb71;">A</div>
                    <div style="color: #4ecb71; font-size: 1.2rem;">{{ $a }}</div>
                </div>
                <div style="background: rgba(240,165,0,0.15); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(240,165,0,0.3); min-width: 70px;">
                    <div style="font-size: 2rem; font-weight: 700; color: #f0a500;">B</div>
                    <div style="color: #f0a500; font-size: 1.2rem;">{{ $b }}</div>
                </div>
                <div style="background: rgba(233,69,96,0.15); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(233,69,96,0.3); min-width: 70px;">
                    <div style="font-size: 2rem; font-weight: 700; color: #e94560;">C</div>
                    <div style="color: #e94560; font-size: 1.2rem;">{{ $c }}</div>
                </div>
                @if($menyerah > 0)
                <div style="background: rgba(100,100,100,0.15); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(100,100,100,0.3); min-width: 70px;">
                    <div style="font-size: 2rem;">🏳️</div>
                    <div style="color: #888; font-size: 1.2rem;">{{ $menyerah }}</div>
                </div>
                @endif
            </div>

            <!-- Detail Tabel -->
            @if(count($hasil) > 0)
            <div style="margin: 2rem 0; text-align: left;">
                <h3 style="color: white; margin-bottom: 1rem; text-align: center;">📋 Detail Jawaban</h3>
                <div style="max-height: 300px; overflow-y: auto; background: rgba(0,0,0,0.2); border-radius: 12px; padding: 1rem;">
                    <table style="width:100%; color: #a0a0b0; font-size: 0.85rem; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                                <th style="padding: 0.5rem;">#</th>
                                <th style="padding: 0.5rem; text-align: left;">Jepang</th>
                                <th style="padding: 0.5rem; text-align: left;">Arti</th>
                                <th style="padding: 0.5rem;">Waktu</th>
                                <th style="padding: 0.5rem;">Poin</th>
                                <th style="padding: 0.5rem;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hasil as $i => $h)
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td style="padding: 0.5rem; text-align: center;">{{ $i + 1 }}</td>
                                <td style="padding: 0.5rem; color: white;">{{ $h['kata']->jepang }}</td>
                                <td style="padding: 0.5rem; color: #4ecb71;">{{ $h['kata']->arti }}</td>
                                <td style="padding: 0.5rem; text-align: center;">{{ $h['waktu'] }}s</td>
                                <td style="padding: 0.5rem; text-align: center; font-weight: 700; color: {{ $h['poin'] == 'A' ? '#4ecb71' : ($h['poin'] == 'B' ? '#f0a500' : ($h['poin'] == '0' ? '#666' : '#e94560')) }};">
                                    {{ $h['poin'] == '0' ? '0' : $h['poin'] }}
                                </td>
                                <td style="padding: 0.5rem; text-align: center;">
                                    @if($h['poin'] == '0')
                                        @if(isset($h['jawaban']) && $h['jawaban'] != '')
                                            ❌
                                        @else
                                            🏳️
                                        @endif
                                    @else
                                        ✅
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            <a href="{{ route('home') }}"
               style="display:inline-block; width:100%; padding:1rem; border-radius:12px;
                      background:linear-gradient(90deg, #e94560, #ff6b6b);
                      color:white; text-decoration:none; font-weight:700; font-size:1.1rem;
                      margin-bottom: 0.8rem;">
                🏠 Kembali ke Home
            </a>

            <a href="{{ route('riwayat') }}"
               style="display:inline-block; width:100%; padding:0.8rem; border-radius:12px;
                      background:rgba(255,255,255,0.05); border:2px solid rgba(255,255,255,0.2);
                      color:white; text-decoration:none; font-weight:600; font-size:0.9rem;
                      transition:all 0.3s;"
               onmouseover="this.style.borderColor='#e94560';"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';">
                📊 Lihat Riwayat
            </a>

        </div>
    </div>
</x-layout>