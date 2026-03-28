<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-white tracking-tight">
            Dashboard <span class="text-pink-500 italic">Jurnal Guru</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Welcome Message --}}
            <div class="mb-8">
                <p class="text-slate-400 font-medium italic">Selamat datang kembali, <span class="text-white not-italic font-black">{{ Auth::user()->nama }}</span>!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Card Total Jurnal --}}
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-500 to-rose-600 rounded-[2rem] blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                    <div class="relative bg-slate-800/40 backdrop-blur-xl p-8 rounded-[2rem] border border-slate-700/50 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Total Jurnal Saya</h3>
                            <p class="text-5xl font-black text-white italic">{{ $countTotal }}</p>
                        </div>
                        <div class="p-4 bg-pink-500/10 rounded-2xl">
                            <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Card Jurnal Tuntas --}}
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-[2rem] blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                    <div class="relative bg-slate-800/40 backdrop-blur-xl p-8 rounded-[2rem] border border-slate-700/50 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Jurnal Tuntas</h3>
                            <p class="text-5xl font-black text-emerald-400 italic">{{ $countTuntas }}</p>
                        </div>
                        <div class="p-4 bg-emerald-500/10 rounded-2xl">
                            <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Action Button --}}
            <div class="mt-12 flex justify-center">
                <a href="{{ route('journals.index') }}" 
                   class="group relative inline-flex items-center justify-center px-8 py-4 font-black text-white transition-all duration-200 bg-slate-800 border-2 border-slate-700 rounded-2xl hover:bg-slate-700 hover:border-pink-500/50 shadow-xl">
                    <span class="mr-3 uppercase tracking-widest text-xs">Lihat Semua Jurnal</span>
                    <svg class="w-5 h-5 text-pink-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>