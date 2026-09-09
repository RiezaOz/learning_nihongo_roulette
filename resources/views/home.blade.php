<x-layout title="Nihongo Roulette - Home">
    <div class="container">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: 2.5rem; color: #ffffff; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">🌊 Nihongo Roulette</h1>
            <p style="color: #e0f7fa;">Belajar kosakata bahasa Jepang dengan santai</p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @foreach($babs as $bab)
            <a href="{{ route('bab.show', $bab->id) }}" style="text-decoration: none;">
                <div class="card" style="display: flex; justify-content: space-between; align-items: center; transition: all 0.3s; cursor: pointer;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,109,119,0.5)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 40px rgba(0,109,119,0.3)';">
                    <div>
                        <h2 style="color: #ffffff; font-size: 1.4rem; margin-bottom: 0.3rem;">📚 {{ $bab->nama }}</h2>
                        <p style="color: #b3e5fc;">{{ $bab->total_kata }} kosakata</p>
                    </div>
                    <div style="font-size: 2rem; color: #80deea;">🌊</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layout>