<x-layout title="Nihongo Roulette">
    <div class="container">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <h1 style="font-size: 2.2rem; color: #ffffff; margin-bottom: 0.5rem;">Nihongo Roulette</h1>
            <p class="text-muted">Belajar kosakata bahasa Jepang</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.5rem; max-width: 600px; margin: 0 auto;">
            @foreach($babs as $bab)
            <a href="{{ route('bab.show', $bab->id) }}" style="text-decoration: none; display: block;">
                <div style="background: rgba(255,255,255,0.08); backdrop-filter: blur(15px); border-radius: 16px; padding: 2rem 1.5rem; text-align: center; border: 1px solid rgba(255,255,255,0.15); transition: all 0.3s; cursor: pointer;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.background='rgba(255,255,255,0.15)'; this.style.boxShadow='0 10px 30px rgba(2,132,199,0.3)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255,255,255,0.08)'; this.style.boxShadow='none';">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">📚</div>
                    <h3 style="color: #ffffff; font-size: 1.2rem; margin-bottom: 0.5rem;">{{ $bab->nama }}</h3>
                    <p style="color: #bae6fd; font-size: 0.9rem;">{{ $bab->total_kata }} kata</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layout>