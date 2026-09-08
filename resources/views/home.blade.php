<x-layout title="Nihongo Roulette - Home">
    <div style="max-width: 600px; margin: 3rem auto; padding: 2rem;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: 2.5rem; background: linear-gradient(90deg, #e94560, #ff6b6b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">🎌 Nihongo Roulette</h1>
            <p style="color: #a0a0b0;">Pilih bab untuk mulai latihan</p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @foreach($babs as $bab)
            <a href="{{ route('bab.show', $bab->id) }}" style="text-decoration: none;">
                <div style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 16px; padding: 2rem; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s; cursor: pointer;"
                     onmouseover="this.style.background='rgba(233,69,96,0.1)'; this.style.borderColor='#e94560';"
                     onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)';">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h2 style="color: white; font-size: 1.4rem; margin-bottom: 0.3rem;">📚 {{ $bab->nama }}</h2>
                            <p style="color: #a0a0b0;">{{ $bab->total_kata }} kosakata</p>
                        </div>
                        <div style="color: #e94560; font-size: 1.5rem;">→</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layout>