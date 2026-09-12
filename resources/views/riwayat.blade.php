<x-layout title="Riwayat">
    <div class="container">
        <div class="card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem;">
                <a href="{{ route('home') }}" style="color:#bae6fd; text-decoration:none;">← Home</a>
                <h2 style="color:#ffffff;">Riwayat Latihan</h2>
                <div style="width:60px;"></div>
            </div>

            @if(session('success'))
            <div style="background:rgba(56,189,248,0.2); color:#7dd3fc; padding:1rem; border-radius:12px; margin-bottom:1rem; text-align:center;">
                {{ session('success') }}
            </div>
            @endif

            @if($riwayats->count() == 0)
            <p style="color:#bae6fd; text-align:center; padding:2rem;">Belum ada riwayat.</p>
            @else
            <div style="overflow-x:auto;">
                <table style="width:100%; color:#e0f2fe; border-collapse:collapse; font-size:0.85rem;">
                    <thead>
                        <tr style="border-bottom:2px solid rgba(255,255,255,0.2);">
                            <th style="padding:0.8rem; text-align:left;">Tanggal</th>
                            <th style="padding:0.8rem; text-align:left;">Bab</th>
                            <th style="padding:0.8rem; text-align:center;">Mode</th>
                            <th style="padding:0.8rem; text-align:center;">Kata</th>
                            <th style="padding:0.8rem; text-align:center;">A</th>
                            <th style="padding:0.8rem; text-align:center;">B</th>
                            <th style="padding:0.8rem; text-align:center;">C</th>
                            <th style="padding:0.8rem; text-align:center;">Nilai</th>
                            <th style="padding:0.8rem; text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayats as $r)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.1);"
                            onmouseover="this.style.background='rgba(255,255,255,0.05)';"
                            onmouseout="this.style.background='transparent';">
                            <td style="padding:0.8rem; white-space:nowrap;">{{ $r->created_at->format('d/m/Y H:i') }}</td>
                            <td style="padding:0.8rem;">
                                <a href="{{ route('riwayat.show', $r->id) }}" style="color:#7dd3fc; text-decoration:none; font-weight:600;">
                                    {{ $r->bab->nama }}
                                </a>
                            </td>
                            <td style="padding:0.8rem; text-align:center; font-size:0.8rem;">
                                @if($r->level == 'jepang-mudah') Lisan • Hiragana
                                @elseif($r->level == 'jepang-susah') Lisan • Kanji
                                @elseif($r->level == 'indonesia') Lisan • Indonesia
                                @elseif($r->level == 'romaji') Tulis • Romaji
                                @elseif($r->level == 'kanji-mudah') Ketik • Hiragana
                                @elseif($r->level == 'kanji-susah') Ketik • Kanji
                                @elseif($r->level == 'kanji-romaji') Ketik • Romaji
                                @else {{ $r->level }}
                                @endif
                            </td>
                            <td style="padding:0.8rem; text-align:center; color:#ffffff;">{{ $r->total_kata }}</td>
                            <td style="padding:0.8rem; text-align:center; color:#7dd3fc; font-weight:600;">{{ $r->poin_a }}</td>
                            <td style="padding:0.8rem; text-align:center; color:#fbbf24; font-weight:600;">{{ $r->poin_b }}</td>
                            <td style="padding:0.8rem; text-align:center; color:#fb923c; font-weight:600;">{{ $r->poin_c }}</td>
                            <td style="padding:0.8rem; text-align:center;">
                                <span style="font-size:1.3rem; font-weight:700; color:{{ $r->nilai >= 70 ? '#7dd3fc' : ($r->nilai >= 50 ? '#fbbf24' : '#fb923c') }};">
                                    {{ $r->nilai }}
                                </span>
                            </td>
                            <td style="padding:0.8rem; text-align:center; white-space:nowrap;">
                                <a href="{{ route('riwayat.show', $r->id) }}" 
                                   style="color:#7dd3fc; text-decoration:none; margin-right:0.5rem; font-size:1.1rem;"
                                   title="Lihat Detail">🔍</a>
                                <form action="{{ route('riwayat.destroy', $r->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Hapus riwayat ini?')"
                                            style="background:rgba(251,146,60,0.2); border:1px solid #fb923c; color:#fb923c; 
                                                   padding:0.4rem 0.8rem; border-radius:8px; cursor:pointer; font-size:0.8rem;"
                                            title="Hapus">🗑</button>
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