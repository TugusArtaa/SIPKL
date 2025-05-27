<x-guest-layout>
    <div class="text-center mb-8">
        <div
            class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center mb-4 shadow-lg p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="Password">
                <path
                    d="M25 1L12.611 13.388A9 9 0 0 0 1 22a9 9 0 0 0 9 9 9 9 0 0 0 8.611-11.612L21 17v-2h2l8-8V1h-6zm4 5.171L22.172 13H19v3.171l-1.803 1.802-.848.848.348 1.147c.201.662.303 1.345.303 2.032 0 3.86-3.141 7-7 7s-7-3.14-7-7 3.141-7 7-7c.686 0 1.37.102 2.031.302l1.146.348.848-.848L25.828 3H29v3.171z"
                    fill="#ffffff" class="color000000 svgShape"></path>
                <circle cx="8" cy="24" r="2" fill="#ffffff" class="color000000 svgShape"></circle>
                <path d="M20.646 10.647l6-6 .707.707-6 6z" fill="#ffffff" class="color000000 svgShape"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white mb-2">Reset Password</h2>
        <p class="text-white/80 text-sm">
            Lupa password? Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Reset -->
    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-white mb-2" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                type="email" name="email" :value="old('email')" required autofocus placeholder="Masukkan email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div>
            <x-primary-button
                class="w-full justify-center py-3 bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 border-0 shadow-lg hover:shadow-xl transition-all duration-200">
                Kirim Link Reset Password
            </x-primary-button>
        </div>
    </form>

    <!-- Back -->
    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-sm text-cyan-400 hover:text-cyan-200 transition-colors font-medium">
            ← Kembali ke Login
        </a>
    </div>
</x-guest-layout>