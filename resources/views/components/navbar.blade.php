<nav style="background: rgba(0,109,119,0.8); backdrop-filter: blur(10px); padding: 1rem 2rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.2); display: flex; justify-content: center; gap: 1rem; position: sticky; top: 0; z-index: 100;">
    <a href="{{ route('home') }}" 
       style="color: {{ request()->routeIs('home') || request()->routeIs('bab.show') ? '#ffffff' : '#b3e5fc' }}; 
              text-decoration: none; font-weight: 700; 
              padding: 0.5rem 1.2rem; border-radius: 20px;
              background: {{ request()->routeIs('home') || request()->routeIs('bab.show') ? 'rgba(0,109,119,0.6)' : 'transparent' }};
              transition: all 0.3s;"
       onmouseover="this.style.background='rgba(0,109,119,0.6)'; this.style.color='#ffffff';"
       onmouseout="this.style.background='{{ request()->routeIs('home') || request()->routeIs('bab.show') ? 'rgba(0,109,119,0.6)' : 'transparent' }}'; this.style.color='{{ request()->routeIs('home') || request()->routeIs('bab.show') ? '#ffffff' : '#b3e5fc' }}';">
        🌊 Latihan
    </a>
    <a href="{{ route('riwayat') }}" 
       style="color: {{ request()->routeIs('riwayat') ? '#ffffff' : '#b3e5fc' }}; 
              text-decoration: none; font-weight: 700; 
              padding: 0.5rem 1.2rem; border-radius: 20px;
              background: {{ request()->routeIs('riwayat') ? 'rgba(0,109,119,0.6)' : 'transparent' }};
              transition: all 0.3s;"
       onmouseover="this.style.background='rgba(0,109,119,0.6)'; this.style.color='#ffffff';"
       onmouseout="this.style.background='{{ request()->routeIs('riwayat') ? 'rgba(0,109,119,0.6)' : 'transparent' }}'; this.style.color='{{ request()->routeIs('riwayat') ? '#ffffff' : '#b3e5fc' }}';">
        📊 Riwayat
    </a>
</nav>