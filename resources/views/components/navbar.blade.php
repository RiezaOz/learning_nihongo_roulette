<nav style="background: rgba(7, 37, 66, 0.85); backdrop-filter: blur(10px); padding: 1rem 2rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; justify-content: center; gap: 1rem; position: sticky; top: 0; z-index: 100;">
    <a href="{{ route('home') }}" 
       style="color: {{ request()->routeIs('home') || request()->routeIs('bab.show') ? '#ffffff' : '#bae6fd' }}; 
              text-decoration: none; font-weight: 600; 
              padding: 0.5rem 1.2rem; border-radius: 20px;
              background: {{ request()->routeIs('home') || request()->routeIs('bab.show') ? 'rgba(2,132,199,0.4)' : 'transparent' }};
              transition: all 0.3s;"
       onmouseover="this.style.background='rgba(2,132,199,0.4)'; this.style.color='#ffffff';"
       onmouseout="this.style.background='{{ request()->routeIs('home') || request()->routeIs('bab.show') ? 'rgba(2,132,199,0.4)' : 'transparent' }}'; this.style.color='{{ request()->routeIs('home') || request()->routeIs('bab.show') ? '#ffffff' : '#bae6fd' }}';">
        Latihan
    </a>
    <a href="{{ route('riwayat') }}" 
       style="color: {{ request()->routeIs('riwayat') ? '#ffffff' : '#bae6fd' }}; 
              text-decoration: none; font-weight: 600; 
              padding: 0.5rem 1.2rem; border-radius: 20px;
              background: {{ request()->routeIs('riwayat') ? 'rgba(2,132,199,0.4)' : 'transparent' }};
              transition: all 0.3s;"
       onmouseover="this.style.background='rgba(2,132,199,0.4)'; this.style.color='#ffffff';"
       onmouseout="this.style.background='{{ request()->routeIs('riwayat') ? 'rgba(2,132,199,0.4)' : 'transparent' }}'; this.style.color='{{ request()->routeIs('riwayat') ? '#ffffff' : '#bae6fd' }}';">
        Riwayat
    </a>
</nav>