<x-layout title="Detail Riwayat">
    <div class="container">
        <div class="card">
            <a href="{{ route('riwayat') }}" style="color:#bae6fd; text-decoration:none;">← Kembali</a>

            <div style="text-align:center; margin:1.5rem 0;">
                <h2 style="color:#ffffff;">Detail {{ $nilai->bab->nama }}</h2>
                <p style="color:#bae6fd;">
                    {{ $nilai->created_at->format('d/m/Y H:i') }} •
                    @if($nilai->level == 'jepang-mudah') Lisan • Hiragana
                    @elseif($nilai->level == 'jepang-susah') Lisan • Kanji
                    @elseif($nilai->level == 'indonesia') Lisan • Indonesia
                    @elseif($nilai->level == 'romaji') Tulis • Romaji
                    @elseif($nilai->level == 'kanji-mudah') Ketik • Hiragana
                    @elseif($nilai->level == 'kanji-susah') Ketik • Kanji
                    @elseif($nilai->level == 'kanji-romaji') Ketik • Romaji
                    @endif
                </p>
                <p style="font-size:2rem; font-weight:700; color:{{ $nilai->nilai >= 70 ? '#7dd3fc' : ($nilai->nilai >= 50 ? '#fbbf24' : '#fb923c') }};">
                    Nilai: {{ $nilai->nilai }}
                </p>
            </div>

            <div style="overflow-x:auto;">
                <table style="width:100%; color:#e0f2fe; border-collapse:collapse; font-size:0.9rem;">
                    <thead>
                        <tr style="border-bottom:2px solid rgba(255,255,255,0.2);">
                            <th style="padding:0.6rem;">#</th>
                            <th style="padding:0.6rem; text-align:left;">Jepang</th>
                            <th style="padding:0.6rem; text-align:left;">Romaji</th>
                            <th style="padding:0.6rem; text-align:left;">Arti</th>
                            <th style="padding:0.6rem;">Waktu</th>
                            <th style="padding:0.6rem;">Poin</th>
                            <th style="padding:0.6rem;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai->details as $d)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.1);">
                            <td style="padding:0.6rem; text-align:center;">{{ $d->urutan }}</td>
                            <td style="padding:0.6rem; color:#ffffff;">
                                @if($d->kanji){{ $d->kanji }}@else{{ $d->jepang }}@endif
                            </td>
                            <td style="padding:0.6rem;">{{ $d->romaji }}</td>
                            <td style="padding:0.6rem;">{{ $d->arti }}</td>
                            <td style="padding:0.6rem; text-align:center;">{{ $d->waktu }}s</td>
                            <td style="padding:0.6rem; text-align:center; font-weight:700; color:{{ $d->poin == 'A' ? '#7dd3fc' : ($d->poin == 'B' ? '#fbbf24' : ($d->poin == '0' ? '#666' : '#fb923c')) }};">
                                {{ $d->poin == '0' ? '0' : $d->poin }}
                            </td>
                            <td style="padding:0.6rem; text-align:center;">
                                @if($d->poin == '0')
                                    @if($d->jawaban) ❌ @else 🏳️ @endif
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
    </div>
</x-layout>