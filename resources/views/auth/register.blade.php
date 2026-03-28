<x-guest-layout>
    <x-slot name="title">Register</x-slot>
    <div class="w-full max-w-md bg-gray-800 border border-gray-700 p-8 rounded-[2.5rem] shadow-2xl">
        <h2 class="text-3xl font-black text-white mb-6 text-center">Join <span class="text-pink-500">Us!</span></h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label for="nama" :value="__('Nama')" class="text-pink-400 font-bold ml-1" />
                <x-text-input id="nama"
                    class="block mt-1 w-full bg-gray-900 border-gray-700 text-gray-200 focus:border-pink-500 focus:ring-pink-500 rounded-2xl py-3 px-4"
                    type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="email" :value="__('Email')" class="text-pink-400 font-bold ml-1" />
                <x-text-input id="email"
                    class="block mt-1 w-full bg-gray-900 border-gray-700 text-gray-200 focus:border-pink-500 focus:ring-pink-500 rounded-2xl py-3 px-4"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="password" :value="__('Password')" class="text-pink-400 font-bold ml-1" />
                <x-text-input id="password"
                    class="block mt-1 w-full bg-gray-900 border-gray-700 text-gray-200 focus:border-pink-500 focus:ring-pink-500 rounded-2xl py-3 px-4"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-pink-400 font-bold ml-1" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full bg-gray-900 border-gray-700 text-gray-200 focus:border-pink-500 focus:ring-pink-500 rounded-2xl py-3 px-4"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-8 flex gap-4">
                <a href="{{ route('login') }}"
                    class="w-full md:w-auto px-6 py-3 bg-gray-800 hover:bg-gray-700 text-gray-300 font-bold rounded-xl transition text-center text-sm">
                    Batal
                </a>
                <button type="submit"
                    class="w-full md:w-auto px-8 py-3 bg-pink-600 hover:bg-pink-700 text-white font-black rounded-2xl shadow-lg shadow-pink-900/20 transition-all transform hover:scale-[1.02] active:scale-95 uppercase tracking-widest text-sm">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>
