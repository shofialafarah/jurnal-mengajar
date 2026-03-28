<nav x-data="{ open: false }" class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-2xl z-50">
    <div class="bg-slate-900/60 backdrop-blur-2xl border border-white/5 rounded-[2rem] p-3 shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex justify-around items-center px-8 relative overflow-hidden">
        
        <div class="absolute inset-0 bg-gradient-to-r from-pink-500/5 via-transparent to-pink-500/5 pointer-events-none"></div>

        <a href="{{ route('dashboard') }}" class="flex flex-col items-center group relative z-10">
            <div class="p-2.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-pink-600 shadow-lg shadow-pink-500/40 text-white scale-110' : 'text-slate-500 group-hover:text-pink-400 group-hover:bg-pink-500/10' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
            <span class="text-[9px] mt-1.5 font-black uppercase tracking-[0.15em] transition-colors {{ request()->routeIs('dashboard') ? 'text-pink-500' : 'text-slate-500' }}">Dashboard</span>
        </a>

        <a href="{{ route('journals.index') }}" class="flex flex-col items-center group relative z-10">
            <div class="p-2.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('journals.*') ? 'bg-pink-600 shadow-lg shadow-pink-500/40 text-white scale-110' : 'text-slate-500 group-hover:text-pink-400 group-hover:bg-pink-500/10' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                </svg>
            </div>
            <span class="text-[9px] mt-1.5 font-black uppercase tracking-[0.15em] transition-colors {{ request()->routeIs('journals.*') ? 'text-pink-500' : 'text-slate-500' }}">Jurnal</span>
        </a>

        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center group relative z-10">
            <div class="p-2.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('profile.edit') ? 'bg-pink-600 shadow-lg shadow-pink-500/40 text-white scale-110' : 'text-slate-500 group-hover:text-pink-400 group-hover:bg-pink-500/10' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <span class="text-[9px] mt-1.5 font-black uppercase tracking-[0.15em] transition-colors {{ request()->routeIs('profile.edit') ? 'text-pink-500' : 'text-slate-500' }}">Profil</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="flex flex-col items-center group relative z-10">
            @csrf
            <button type="submit" class="p-2.5 rounded-2xl text-slate-500 hover:text-rose-400 hover:bg-rose-500/10 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
            <span class="text-[9px] mt-1.5 font-black uppercase tracking-[0.15em] text-slate-500 group-hover:text-rose-400">Keluar</span>
        </form>
    </div>
</nav>