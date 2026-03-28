<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Daftar <span class="text-blue-500">Jurnal Mengajar</span>
            </h2>
            <a href="{{ route('journals.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-bold shadow-lg shadow-blue-900/20 transition-all">
                + GENERATE BARU
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-900/30 border border-green-500/50 text-green-400 rounded-2xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @php
                // Kelompokkan berdasarkan Bulan & Tahun dari kolom tanggal
                $groupedByMonth = $journals->groupBy(function ($item) {
                    return \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y');
                });
            @endphp

            @foreach ($groupedByMonth as $monthName => $entries)
                <div class="mb-10">
                    <h3 class="text-2xl font-black text-white mb-4 uppercase text-center tracking-widest">
                        {{ $monthName }}
                    </h3>

                    <div class="overflow-hidden border border-gray-800 rounded-3xl bg-[#111827]">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-800/50 text-[10px] uppercase font-bold text-gray-400">
                                <tr>
                                    <th class="p-4 border-b border-gray-800">No</th>
                                    <th class="p-4 border-b border-gray-800">Hari/Tgl</th>
                                    <th class="p-4 border-b border-gray-800">Mapel</th>
                                    <th class="p-4 border-b border-gray-800">Kelas</th>
                                    <th class="p-4 border-b border-gray-800">Materi</th>
                                    <th class="p-4 border-b border-gray-800 text-center">Jam</th>
                                    <th class="p-4 border-b border-gray-800 text-center">Ket</th>
                                    <th class="p-4 border-b border-gray-800 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-300">
                                @php $no = 1; @endphp
                                @foreach ($entries->sortBy('tanggal') as $journal)
                                    <tr class="hover:bg-blue-500/5 transition">
                                        <td class="p-4 border-b border-gray-800 text-gray-500 text-center">
                                            {{ $no++ }}</td>
                                        <td class="p-4 border-b border-gray-800 font-bold">
                                            {{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('l, d-m-Y') }}
                                        </td>
                                        <td class="p-4 border-b border-gray-800 text-blue-400 font-bold">
                                            {{ $journal->subject->nama_mapel }} </td>
                                        <td class="p-4 border-b border-gray-800">
                                            <span class="bg-gray-800 px-2 py-1 rounded text-[10px] font-black italic">
                                                {{ $journal->classroom->name }}
                                            </span>
                                        </td>
                                        <td class="p-4 border-b border-gray-800 italic text-gray-500">
                                            {{ $journal->materi ?? 'Belum diisi' }}
                                        </td>
                                        <td class="p-4 border-b border-gray-800 text-center">{{ $journal->jam_ke }}</td>
                                        <td class="p-4 border-b border-gray-800 text-center">
                                            <span
                                                class="text-[10px] font-bold {{ $journal->keterangan == 'Tuntas' ? 'text-green-400' : 'text-red-400' }}">
                                                {{ $journal->keterangan }}
                                            </span>
                                        </td>
                                        <td class="p-4 border-b border-gray-800 text-center">
                                            <a href="{{ route('journals.edit', $journal->id) }}"
                                                class="text-blue-500 hover:text-blue-300">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            <div class="mt-6">
                {{ $journals->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
