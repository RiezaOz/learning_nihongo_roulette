<x-layout title="Riwayat">
    <div class="container">
        <div class="card">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem;">
                <a href="{{ route('home') }}" style="color:#b3e5fc;text-decoration:none;">← Home</a>
                <h2 style="color:#ffffff;">📊 Riwayat</h2>
                <div style="width:60px;"></div>
            </div>

            @if($riwayats->count() == 0)
            <p style="color:#b3e5fc;text-align:center;">Belum ada riwayat.</p>
            @else
            <div style="overflow-x:auto;">
                <table style="width:100%;color:#e0f7fa;border-collapse:collapse;font-size:0.85rem;">
                    <thead>
                        <tr style="border-bottom:2px solid rgba(255,255,255,0.3);">
                            <th style="padding:0.8rem;">Tanggal</th><th style="padding:0.8rem;">Bab</th><th style="padding:0.8rem;">Mode</th>
                            <th style="padding:0.8rem;">A</th><th style="padding:0.8rem;">B</th><th style="padding:0.8rem;">C</th>
                            <th style="padding:0.8rem;">Nilai</th><th style="padding:0.8rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayats as $r)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.1);">
                            <td style="padding:0.8rem;">{{$r->created_at->format('d/m/Y H:i')}}</td>
                            <td style="padding:0.8rem;"><a href="{{route('riwayat.show',$r->id)}}" style="color:#80deea;">{{$r->bab->nama}}</a></td>
                            <td style="padding:0.8rem;">{{$r->level}}</td>
                            <td style="padding:0.8rem;color:#80deea;">{{$r->poin_a}}</td>
                            <td style="padding:0.8rem;color:#ffd54f;">{{$r->poin_b}}</td>
                            <td style="padding:0.8rem;color:#ff8a65;">{{$r->poin_c}}</td>
                            <td style="padding:0.8rem;color:#ffffff;font-size:1.2rem;">{{$r->nilai}}</td>
                            <td style="padding:0.8rem;">
                                <a href="{{route('riwayat.show',$r->id)}}" style="color:#80deea;">🔍</a>
                                <form action="{{route('riwayat.destroy',$r->id)}}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus?')" style="background:rgba(255,0,0,0.2);border:1px solid #ff8a65;color:#ff8a65;padding:0.4rem;border-radius:8px;">🗑</button>
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