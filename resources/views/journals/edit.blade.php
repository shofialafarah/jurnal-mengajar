<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-gray-100 leading-tight">
            Isi <span class="text-blue-500">Rincian Jurnal</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 border border-gray-800 shadow-2xl sm:rounded-3xl p-8">
                
                <div class="mb-8 flex items-center justify-between p-4 bg-blue-900/20 border border-blue-500/30 rounded-2xl">
                    <div>
                        <p class="text-blue-400 text-xs font-black uppercase tracking-widest">Mata Pelajaran</p>
                        <p class="text-xl font-bold text-gray-100">{{ $journal->subject->name }} - {{ $journal->classroom->name }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest">Tanggal</p>
                        <p class="text-lg font-bold text-gray-300">{{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('d F Y') }}</p>
                    </div>
                </div>

                <form action="{{ route('journals.update', $journal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block font-bold text-gray-400 mb-2">Pokok Bahasan</label>
                            <input type="text" name="pokok_bahasan" value="{{ $journal->pokok_bahasan }}" class="w-full bg-gray-800 border-gray-700 rounded-xl text-gray-100 focus:border-blue-500 focus:ring-blue-500 transition" placeholder="Contoh: Hukum Bacaan Nun Sukun">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label class="block font-bold text-gray-400 mb-2">Sub Pokok Bahasan / Materi</label>
                            <textarea name="sub_pokok" rows="3" class="w-full bg-gray-800 border-gray-700 rounded-xl text-gray-100 focus:border-blue-500 focus:ring-blue-500 transition" placeholder="Rincian materi yang disampaikan...">{{ $journal->sub_pokok }}</textarea>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-400 mb-2">Jam Ke-</label>
                            <input type="text" name="jam_ke" value="{{ $journal->jam_ke }}" class="w-full bg-gray-800 border-gray-700 rounded-xl text-gray-100 focus:border-blue-500 focus:ring-blue-500 transition" placeholder="Contoh: 1-2">
                        </div>

                        <div>
                            <label class="block font-bold text-gray-400 mb-2">Metode Pembelajaran</label>
                            <input type="text" name="metode" value="{{ $journal->metode }}" class="w-full bg-gray-800 border-gray-700 rounded-xl text-gray-100 focus:border-blue-500 focus:ring-blue-500 transition" placeholder="Contoh: Ceramah, Diskusi">
                        </div>

                        <div>
                            <label class="block font-bold text-gray-400 mb-2">Sumber Belajar</label>
                            <input type="text" name="sumber" value="{{ $journal->sumber }}" class="w-full bg-gray-800 border-gray-700 rounded-xl text-gray-100 focus:border-blue-500 focus:ring-blue-500 transition" placeholder="Contoh: Buku Paket Hal. 12">
                        </div>

                        <div>
                            <label class="block font-bold text-gray-400 mb-2">Status Pembelajaran</label>
                            <select name="keterangan" class="w-full bg-gray-800 border-gray-700 rounded-xl text-gray-100 focus:border-blue-500 focus:ring-blue-500 transition">
                                <option value="Tidak Tuntas" {{ $journal->keterangan == 'Tidak Tuntas' ? 'selected' : '' }}>❌ Tidak Tuntas</option>
                                <option value="Tuntas" {{ $journal->keterangan == 'Tuntas' ? 'selected' : '' }}>✅ Tuntas</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-10 flex gap-4">
                        <a href="{{ route('journals.index') }}" class="w-full md:w-auto px-8 py-3 bg-gray-800 hover:bg-gray-700 text-gray-300 font-bold rounded-xl transition text-center">
                            Batal
                        </a>
                        <button type="submit" class="w-full md:w-auto px-10 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition transform hover:scale-105">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>