<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Jurnal Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
                    <h3 class="text-gray-500 text-sm font-bold uppercase">Total Jurnal Saya</h3>
                    <p class="text-3xl font-bold">{{ $countTotal }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
                    <h3 class="text-gray-500 text-sm font-bold uppercase">Jurnal Tuntas</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $countTuntas }}</p>
                </div>
            </div>
            
            <div class="mt-6">
                <a href="{{ route('journals.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Lihat Semua Jurnal
                </a>
            </div>
        </div>
    </div>
</x-app-layout>