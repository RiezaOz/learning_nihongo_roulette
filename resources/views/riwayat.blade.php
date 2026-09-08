<x-layout title="Riwayat Latihan">
    <div style="max-width: 900px; margin: 3rem auto; padding: 2rem;">
        <div style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 24px; padding: 2rem; border: 1px solid rgba(255,255,255,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <a href="{{ route('home') }}" style="color: #a0a0b0; text-decoration: none;">← Home</a>
                <h2 style="color: white; margin: 0;">📊 Riwayat Latihan</h2>
                <div style="width: 60px;"></div>
            </div>
            @if(session('success'))
            <div style="background: rgba(78,203,113,0.2); color: #4ecb71; padding: 1rem; border-radius: 12px; margin-bottom: 1rem; text-align: center;">{{ session('success') }}</div>
            @endif
            @if($riwayats->count() == 0)
            <p style="color: #a0a0b0; text-align: center; padding: 3rem;">Belum ada riwayat latihan.</p>
            @else
            <div style="overflow-x: auto;">
                <table style="width:100%; color: #a0a0b0; border-collapse: collapse; font-size: 0.85rem;">
                    <thead>
                        <tr style="border-bottom: 2px solid rgba(255,255,255,0.1);">
                            <th style="padding: 0.8rem;">Tanggal</th><th style="padding: 0.8rem;">Bab</th><th style="padding: 0.8rem;">Mode</th>
                            <th style="padding: 0.8rem;">Kata</th><th style="padding: 0.8rem;">A</th><th style="padding: 0.8rem;">B</th>
                            <th style="padding: 0.8rem;">C</th><th style="padding: 0.8rem;">Nilai</th><th style="padding: 0.8rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayats as $r)
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);" onmouseover="this.style.background='rgba(255,255,255,0.03)';" onmouseout="this.style.background='transparent';">
                            <td style="padding:0.8rem;">{{ $r->created_at->format('d/m/Y H:i') }}</td>
                            <td style="padding:0.8rem;"><a href="{{ route('riwayat.show', $r->id) }}" style="color:#47b2e4;text-decoration:none;font-weight:600;">{{ $r->bab->nama }}</a></td>
                            <td style="padding:0.8rem;font-size:0.8rem;">
                                @if($r->level == 'jepang-mudah') 🇯🇵 Lisan Mudah @elseif($r->level == 'jepang-susah') 🇯🇵🔴 Lisan Susah
                                @elseif($r->level == 'indonesia') 🇮🇩 Lisan @elseif($r->level == 'romaji') 📝 Romaji Lisan
                                @elseif($r->level == 'kanji-mudah') ✍️ Kanji Mudah @elseif($r->level == 'kanji-susah') ✍️🔴 Kanji Susah
                                @elseif($r->level == 'indonesia-ketik') ✍️ ID Ketik @endif
                            </td>
                            <td style="padding:0.8rem;color:white;">{{ $r->total_kata }}</td>
                            <td style="padding:0.8rem;color:#4ecb71;">{{ $r->poin_a }}</td>
                            <td style="padding:0.8rem;color:#f0a500;">{{ $r->poin_b }}</td>
                            <td style="padding:0.8rem;color:#e94560;">{{ $r->poin_c }}</td>
                            <td style="padding:0.8rem;"><span style="font-size:1.3rem;font-weight:700;color:{{ $r->nilai >= 70 ? '#4ecb71' : ($r->nilai >= 50 ? '#f0a500' : '#e94560') }};">{{ $r->nilai }}</span></td>
                            <td style="padding:0.8rem;">
                                <a href="{{ route('riwayat.show', $r->id) }}" style="color:#47b2e4;margin-right:0.5rem;">🔍</a>
                                <form action="{{ route('riwayat.destroy', $r->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus?')" style="background:rgba(233,69,96,0.2);border:1px solid #e94560;color:#e94560;padding:0.4rem 0.8rem;border-radius:8px;cursor:pointer;">🗑</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</x-layout>