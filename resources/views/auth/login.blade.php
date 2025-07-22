<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Header Section -->
    <div class="text-center mb-8">
        <div
            class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center mb-4 shadow-lg p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="people">
                <path fill="#ffffff"
                    d="M16,13.29A6.15,6.15,0,1,0,9.86,7.14,6.15,6.15,0,0,0,16,13.29ZM16,3a4.15,4.15,0,1,1-4.14,4.14A4.15,4.15,0,0,1,16,3ZM27.38,26.81C26.18,29.9,20.72,31,16,31S5.82,29.9,4.62,26.81c-.64-1.65-.07-4.1,1.49-6.39A12.11,12.11,0,0,1,16,15a12.24,12.24,0,0,1,10.91,7.25,1,1,0,1,1-1.82.81A10.37,10.37,0,0,0,16,17a10.09,10.09,0,0,0-8.23,4.55c-1.34,1.95-1.61,3.72-1.29,4.54C7.14,27.78,11.14,29,16,29s8.86-1.22,9.52-2.91a1,1,0,0,1,1.86.72Z">
                </path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white-900 mb-2">Selamat Datang di SIPKL</h2>
        <p class="text-white-600 text-sm">Sistem Informasi Praktik Kerja Lapangan</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Login Field -->
        <div>
            <x-input-label for="login" :value="__('Email / NIM / NIP')" class="text-sm font-medium text-white mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <x-text-input id="login"
                    class="block mt-1 w-full pl-10 pr-3 py-3 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 text-gray-900"
                    type="text" name="login" :value="old('login')" required autofocus autocomplete="username"
                    placeholder="Masukkan email, NIM, atau NIP" />
            </div>
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-white mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <x-text-input id="password"
                    class="block mt-1 w-full pl-10 pr-10 py-3 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 text-gray-900"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="Masukkan password" />
                <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <svg id="eye-open" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    <svg id="eye-closed" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors hidden"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21">
                        </path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button
                class="w-full justify-center py-3 bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 border-0 shadow-lg hover:shadow-xl transition-all duration-200">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                    </path>
                </svg>
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Footer -->
    <div class="mt-6 text-center">
        <p class="text-sm text-white-600">
            Belum punya akun?
            <a href="https://wa.me/6285895859312?text=Halo%20Admin%2C%20saya%20belum%20memiliki%20akun%20SIPKL.%20Mohon%20dibantu%20untuk%20pendaftaran%20akun%20baru%20dengan%20data%20berikut%3A%0ANama%3A%20%0ANIM%3A%20%0AProgram%20Studi%3A%20%0AKelas%3A%20%0ASemester%3A%20"
                target="_blank" rel="noopener noreferrer"
                class="font-medium text-cyan-400 hover:text-cyan-200 transition-colors">
                Hubungi Administrator
            </a>
        </p>
    </div>

    <script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        } else {
            passwordField.type = 'password';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        }
    }
    </script>
</x-guest-layout>