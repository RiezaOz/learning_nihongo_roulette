<nav style="background: rgba(0,0,0,0.3); padding: 1rem 2rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; justify-content: center; gap: 1rem;">
    <a href="{{ route('home') }}" 
       style="color: {{ request()->routeIs('home') || request()->routeIs('bab.show') ? '#e94560' : '#a0a0b0' }}; 
              text-decoration: none; font-weight: 700; 
              padding: 0.5rem 1.2rem; border-radius: 20px;
              background: {{ request()->routeIs('home') || request()->routeIs('bab.show') ? 'rgba(233,69,96,0.15)' : 'transparent' }};
              transition: all 0.3s;"
       onmouseover="this.style.background='rgba(233,69,96,0.15)'; this.style.color='#e94560';"
       onmouseout="this.style.background='{{ request()->routeIs('home') || request()->routeIs('bab.show') ? 'rgba(233,69,96,0.15)' : 'transparent' }}'; this.style.color='{{ request()->routeIs('home') || request()->routeIs('bab.show') ? '#e94560' : '#a0a0b0' }}';">
        🎌 Latihan
    </a>
    <a href="{{ route('riwayat') }}" 
       style="color: {{ request()->routeIs('riwayat') ? '#e94560' : '#a0a0b0' }}; 
              text-decoration: none; font-weight: 700; 
              padding: 0.5rem 1.2rem; border-radius: 20px;
              background: {{ request()->routeIs('riwayat') ? 'rgba(233,69,96,0.15)' : 'transparent' }};
              transition: all 0.3s;"
       onmouseover="this.style.background='rgba(233,69,96,0.15)'; this.style.color='#e94560';"
       onmouseout="this.style.background='{{ request()->routeIs('riwayat') ? 'rgba(233,69,96,0.15)' : 'transparent' }}'; this.style.color='{{ request()->routeIs('riwayat') ? '#e94560' : '#a0a0b0' }}';">
        📊 Riwayat
    </a>
</nav>