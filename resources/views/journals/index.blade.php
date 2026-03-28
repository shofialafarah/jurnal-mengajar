<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Daftar <span class="text-blue-500">Jurnal Mengajar</span>
            </h2>
            <a href="{{ route('journals.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-bold shadow-lg shadow-blue-900/20 transition-all">
                + GENERATE BARU
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-900/30 border border-green-500/50 text-green-400 rounded-2xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @php
                // Mengelompokkan jurnal berdasarkan Bulan dan Tahun
                $groupedJournals = $journals->groupBy(function($item) {
                    return \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y');
                });
            @endphp

            @forelse($groupedJournals as $month => $items)
    <div class="mb-16">
        <h1 class="text-3xl font-black text-center text-white mb-6 tracking-tighter uppercase">{{ $month }}</h1>
        
        <div class="bg-[#111827] border border-gray-800 rounded-[2rem] overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-800/50 text-gray-400 text-[10px] uppercase font-bold tracking-widest">
                    <tr>
                        <th class="border border-gray-800 px-4 py-3 text-center w-12">No</th>
                        <th class="border border-gray-800 px-4 py-3">Hari/Tgl</th>
                        <th class="border border-gray-800 px-4 py-3">Bid. Studi</th>
                        <th class="border border-gray-800 px-4 py-3">Kelas</th>
                        <th class="border border-gray-800 px-4 py-3">Pokok Bahasan</th>
                        <th class="border border-gray-800 px-4 py-3">Jam</th>
                        <th class="border border-gray-800 px-4 py-3 text-center w-20">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @php 
                        $no = 1;
                        $lastDate = null;
                    @endphp
                    @foreach($items->sortBy('tanggal') as $journal)
                        <tr class="hover:bg-blue-500/5 transition">
                            <td class="border border-gray-800 px-4 py-4 text-center text-gray-500">
                                {{ $journal->tanggal != $lastDate ? $no++ : '' }}
                            </td>
                            
                            <td class="border border-gray-800 px-4 py-4 font-medium text-gray-300">
                                {{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('l, d-m-Y') }}
                            </td>

                            <td class="border border-gray-800 px-4 py-4 text-blue-400 font-bold uppercase">{{ $journal->subject->name }}</td>
                            <td class="border border-gray-800 px-4 py-4 text-center font-black italic text-gray-400">{{ $journal->classroom->name }}</td>
                            <td class="border border-gray-800 px-4 py-4 text-gray-500 italic">{{ $journal->pokok_bahasan ?? 'Kosong' }}</td>
                            <td class="border border-gray-800 px-4 py-4 text-center text-gray-400">{{ $journal->jam_ke }}</td>
                            <td class="border border-gray-800 px-4 py-4 text-center">
                                <a href="{{ route('journals.edit', $journal->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @php $lastDate = $journal->tanggal; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@empty
    @endforelse

            <div class="mt-6">
                {{ $journals->links() }}
            </div>
        </div>
    </div>
</x-app-layout>