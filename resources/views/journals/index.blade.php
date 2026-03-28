<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-white tracking-tight">
                Daftar <span class="text-pink-500 italic">Jurnal Mengajar</span>
            </h2>
            <a href="{{ route('journals.create') }}"
                class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2.5 rounded-2xl text-sm font-black shadow-lg shadow-pink-900/30 transition-all transform hover:scale-105 active:scale-95 uppercase tracking-widest">
                + Generate Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @php
                $groupedByMonth = $journals->groupBy(function ($item) {
                    return \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y');
                });
            @endphp

            @forelse ($groupedByMonth as $monthName => $entries)
                <div class="mb-12">
                    {{-- Divider Bulan Aesthetic --}}
                    <div class="flex items-center mb-6">
                        <h3 class="pr-4 text-xl font-black text-pink-500 uppercase tracking-[0.3em]">
                            {{ $monthName }}
                        </h3>
                        <div class="h-[1px] flex-grow bg-gradient-to-r from-pink-500/50 to-transparent"></div>
                    </div>

                    <div class="overflow-hidden border border-slate-700/50 rounded-[2.5rem] bg-slate-900/40 backdrop-blur-xl shadow-2xl">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-pink-500/5 text-[11px] uppercase font-black text-pink-400 tracking-widest border-b border-slate-700/50">
                                    <tr>
                                        <th class="p-5 text-center">No</th>
                                        <th class="p-5">Hari/Tgl</th>
                                        <th class="p-5">Mapel & Kelas</th>
                                        <th class="p-5">Pokok Bahasan</th>
                                        <th class="p-5 text-center">Status</th>
                                        <th class="p-5 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-300 divide-y divide-slate-700/30">
                                    @php $no = 1; @endphp
                                    @foreach ($entries->sortBy('tanggal') as $journal)
                                        <tr class="hover:bg-pink-500/5 transition-colors group">
                                            <td class="p-5 text-slate-500 font-mono text-center">{{ $no++ }}</td>
                                            <td class="p-5">
                                                <span class="font-bold text-white block">{{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('d F Y') }}</span>
                                                <span class="text-[10px] text-slate-500 uppercase tracking-widest">{{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('l') }}</span>
                                            </td>
                                            <td class="p-5">
                                                <div class="flex flex-col gap-1">
                                                    <span class="font-bold text-pink-400 italic">{{ $journal->mapel->nama_mapel ?? 'N/A' }}</span>
                                                    <span class="w-fit bg-slate-700/50 px-2 py-0.5 rounded text-[10px] font-black text-white group-hover:bg-pink-900/40 transition-colors">
                                                        {{ $journal->classes->nama_kelas ?? 'N/A' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="p-5 italic text-slate-400 max-w-xs truncate font-medium">
                                                {{ $journal->materi ?? 'Materi belum diinput...' }}
                                            </td>
                                            <td class="p-5 text-center">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ ($journal->keterangan ?? '') == 'Tuntas' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-rose-500/10 text-rose-400 border border-rose-500/20' }}">
                                                    {{ $journal->keterangan ?? 'Pending' }}
                                                </span>
                                            </td>
                                            <td class="p-5 text-center">
                                                <a href="{{ route('journals.edit', $journal->id) }}" class="inline-flex p-2 bg-slate-700/50 hover:bg-pink-600 rounded-xl transition-all text-slate-300 hover:text-white group/btn">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 bg-slate-800/20 rounded-[3rem] border-2 border-dashed border-slate-700">
                    <p class="text-slate-500 font-bold uppercase tracking-[0.2em]">Belum ada data jurnal bulan ini</p>
                </div>
            @endforelse
            
            <div class="mt-8 pink-pagination">
                {{-- Cek manual supaya tidak error --}}
                @if($journals instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $journals->links() }}
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Slicing CSS biar pagination ikut jadi pink */
        .pink-pagination nav svg { width: 1.5rem; }
        .pink-pagination nav div span, .pink-pagination nav div a { 
            border-radius: 0.75rem !important;
            background-color: #1e293b !important;
            border-color: #334155 !important;
            color: #94a3b8 !important;
        }
        .pink-pagination nav div span[aria-current="page"] {
            background-color: #db2777 !important;
            color: white !important;
            border-color: #db2777 !important;
        }
    </style>
</x-app-layout>