<section>
    <!-- Header -->
    <header class="relative space-y-4">
        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div
                    class="p-3 bg-gradient-to-br from-cyan-500/20 to-blue-600/20 rounded-xl border border-cyan-400/30 backdrop-blur-sm">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="3" y="11" width="18" height="10" rx="2" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M7 11V7a5 5 0 0110 0v4" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div>
                    <h2
                        class="text-3xl font-bold bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent tracking-tight">
                        {{ __('Perbarui Kata Sandi') }}
                    </h2>
                    <div class="h-1 w-16 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full mt-2"></div>
                </div>
            </div>
        </div>
        <p class="mt-1 text-sm text-white/80">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <!-- Form Section -->
    <form method="post" action="{{ route('password.update') }}" class="space-y-6 mt-6">
        @csrf
        @method('put')

        <!-- Form Fields Container -->
        <div class="space-y-5">
            <!-- Current Password Field -->
            <div class="space-y-2">
                <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')"
                    class="text-white/90 font-medium text-sm" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full px-4 py-3 text-white placeholder-white/50 
                        bg-white/5 backdrop-blur-sm border border-cyan-400/20 rounded-lg
                        focus:border-cyan-400 focus:ring-2 focus:ring-cyan-200/30 focus:bg-white/10
                        transition-all duration-200 ease-in-out
                        hover:border-cyan-400/40 hover:bg-white/[0.07]" autocomplete="current-password"
                    placeholder="Masukkan kata sandi saat ini" />
                <x-input-error class="mt-2 text-red-400/90 text-sm"
                    :messages="$errors->updatePassword->get('current_password')" />
            </div>

            <!-- New Password Field -->
            <div class="space-y-2">
                <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')"
                    class="text-white/90 font-medium text-sm" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full px-4 py-3 text-white placeholder-white/50 
                        bg-white/5 backdrop-blur-sm border border-cyan-400/20 rounded-lg
                        focus:border-cyan-400 focus:ring-2 focus:ring-cyan-200/30 focus:bg-white/10
                        transition-all duration-200 ease-in-out
                        hover:border-cyan-400/40 hover:bg-white/[0.07]" autocomplete="new-password"
                    placeholder="Masukkan kata sandi baru (8 Digit)" />
                <x-input-error class="mt-2 text-red-400/90 text-sm"
                    :messages="$errors->updatePassword->get('password')" />
            </div>

            <!-- Confirm Password Field -->
            <div class="space-y-2">
                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')"
                    class="text-white/90 font-medium text-sm" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full px-4 py-3 text-white placeholder-white/50 
                        bg-white/5 backdrop-blur-sm border border-cyan-400/20 rounded-lg
                        focus:border-cyan-400 focus:ring-2 focus:ring-cyan-200/30 focus:bg-white/10
                        transition-all duration-200 ease-in-out
                        hover:border-cyan-400/40 hover:bg-white/[0.07]" autocomplete="new-password"
                    placeholder="Ulangi kata sandi baru" />
                <x-input-error class="mt-2 text-red-400/90 text-sm"
                    :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>
        </div>

        <!-- Action Section -->
        <div class="flex items-center justify-between pt-6 border-t border-white/10">
            <x-primary-button
                class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 rounded-xl text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5 transition-transform duration-200 group-hover:rotate-12" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Simpan') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-emerald-400 ml-4">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>