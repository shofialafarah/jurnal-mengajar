<nav x-data="{ open: false }" class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-4xl z-50">
    <div class="bg-gray-900/80 backdrop-blur-xl border border-white/10 rounded-3xl p-2 shadow-2xl flex justify-around items-center px-6">
        
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-500 group-hover:text-blue-400' }} transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase tracking-tighter {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-500' }}">Dashboard</span>
        </a>

        <a href="{{ route('journals.index') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('journals.*') ? 'bg-blue-600 text-white' : 'text-gray-500 group-hover:text-blue-400' }} transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase tracking-tighter {{ request()->routeIs('journals.*') ? 'text-blue-500' : 'text-gray-500' }}">Jurnal</span>
        </a>

        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('profile.edit') ? 'bg-blue-600 text-white' : 'text-gray-500 group-hover:text-blue-400' }} transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase tracking-tighter {{ request()->routeIs('profile.edit') ? 'text-blue-500' : 'text-gray-500' }}">Profil</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="flex flex-col items-center group">
            @csrf
            <button type="submit" class="p-2 rounded-2xl text-gray-500 hover:text-red-500 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
            <span class="text-[9px] mt-1 font-bold uppercase tracking-tighter text-gray-500">Keluar</span>
        </form>
    </div>
</nav>