<x-layout title="Detail Riwayat">
    <div style="max-width: 750px; margin: 3rem auto; padding: 2rem;">
        <div style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 24px; padding: 2rem; border: 1px solid rgba(255,255,255,0.1);">

            <a href="{{ route('riwayat') }}" style="color: #a0a0b0; text-decoration: none;">← Kembali</a>

            <div style="text-align: center; margin: 1.5rem 0;">
                <h2 style="color: white;">📋 Detail {{ $nilai->bab->nama }}</h2>
                <p style="color: #a0a0b0;">
                    {{ $nilai->created_at->format('d/m/Y H:i') }} •
                    @if($nilai->level == 'jepang') 🇯🇵 Lisan
                    @elseif($nilai->level == 'indonesia') 🇮🇩 Lisan
                    @elseif($nilai->level == 'ketik') ✍️ JP Ketik
                    @elseif($nilai->level == 'indonesia-ketik') ✍️ ID Ketik
                    @endif
                </p>
                <p style="font-size: 2rem; font-weight: 700; color: {{ $nilai->nilai >= 70 ? '#4ecb71' : ($nilai->nilai >= 50 ? '#f0a500' : '#e94560') }};">
                    Nilai: {{ $nilai->nilai }}
                </p>
            </div>

            <div style="overflow-x: auto;">
                <table style="width:100%; color: #a0a0b0; border-collapse: collapse; font-size: 0.9rem;">
                    <thead>
                        <tr style="border-bottom: 2px solid rgba(255,255,255,0.1);">
                            <th style="padding: 0.6rem;">#</th>
                            <th style="padding: 0.6rem; text-align: left;">Jepang</th>
                            <th style="padding: 0.6rem; text-align: left;">Romaji</th>
                            <th style="padding: 0.6rem; text-align: left;">Arti</th>
                            <th style="padding: 0.6rem;">Waktu</th>
                            <th style="padding: 0.6rem;">Poin</th>
                            <th style="padding: 0.6rem;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai->details as $d)
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 0.6rem; text-align: center;">{{ $d->urutan }}</td>
                            <td style="padding: 0.6rem; color: white;">
                                @if($d->kanji)
                                    {{ $d->kanji }}
                                @else
                                    {{ $d->jepang }}
                                @endif
                            </td>
                            <td style="padding: 0.6rem;">{{ $d->romaji }}</td>
                            <td style="padding: 0.6rem;">{{ $d->arti }}</td>
                            <td style="padding: 0.6rem; text-align: center;">{{ $d->waktu }}s</td>
                            <td style="padding: 0.6rem; text-align: center; font-weight: 700; color: {{ $d->poin == 'A' ? '#4ecb71' : ($d->poin == 'B' ? '#f0a500' : ($d->poin == '0' ? '#666' : '#e94560')) }};">
                                {{ $d->poin == '0' ? '0' : $d->poin }}
                            </td>
                            <td style="padding: 0.6rem; text-align: center;">
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