<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111827] border border-gray-800 rounded-[2.5rem] p-8 shadow-2xl">
                <div class="mb-8">
                    <h2 class="text-2xl font-black text-white">Generate Jurnal <span class="text-blue-500">Otomatis</span></h2>
                    <p class="text-gray-500 text-sm">Pilih rentang tanggal untuk mencocokkan dengan Jadwal Mengajar kamu.</p>
                </div>

                <form action="{{ route('journals.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-widest">Dari Tanggal</label>
                            <input type="date" name="start_date" 
                                class="w-full bg-gray-900/50 border border-gray-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition-all" required>
                        </div>

                        <div>
                            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-widest">Sampai Tanggal</label>
                            <input type="date" name="end_date" 
                                class="w-full bg-gray-900/50 border border-gray-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition-all" required>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-6 bg-blue-500/5 rounded-3xl border border-blue-500/10">
                        <div class="flex items-center gap-3 text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-xs font-medium">Sistem akan otomatis mengisi Mapel & Kelas berdasarkan jadwal mingguan.</span>
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-2xl shadow-lg shadow-blue-500/20 transition-all flex items-center gap-2">
                            <span>Generate Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>