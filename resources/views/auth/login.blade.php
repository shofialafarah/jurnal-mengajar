<x-guest-layout>
    <x-slot name="title">Login</x-slot>
    <div class="w-full max-w-md bg-gray-800 border border-gray-700 p-8 rounded-[2.5rem] shadow-2xl">

        <div class="mb-8 text-center">
            <h2 class="text-3xl font-black text-white italic">Welcome <span class="text-pink-500">Back!</span></h2>
            <p class="text-gray-500 text-sm mt-2">Silahkan masuk ke akun jurnal mengajarmu</p>
        </div>
        <x-auth-session-status class="mb-4 bg-pink-900/20 text-pink-400 p-3 rounded-xl border border-pink-500/30 text-sm"
            :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-pink-400 font-bold ml-1" />
                <x-text-input id="email"
                    class="block mt-1 w-full bg-gray-900 border-gray-700 text-gray-200 focus:border-pink-500 focus:ring-pink-500 rounded-2xl py-3 px-4"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="password" :value="__('Password')" class="text-pink-400 font-bold ml-1" />
                <x-text-input id="password"
                    class="block mt-1 w-full bg-gray-900 border-gray-700 text-gray-200 focus:border-pink-500 focus:ring-pink-500 rounded-2xl py-3 px-4"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded-lg border-gray-700 bg-gray-900 text-pink-600 shadow-sm focus:ring-pink-500"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-xs text-pink-500/70 hover:text-pink-400 underline transition-all"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-900/20 transition-all transform hover:scale-[1.02] active:scale-95 uppercase tracking-widest">
                    {{ __('Log in') }}
                </button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-gray-500 text-xs">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-pink-500 font-bold hover:underline">Daftar
                        sekarang</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
