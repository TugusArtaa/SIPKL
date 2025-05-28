<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Perbarui Kata Sandi') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')"
                class="text-white" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full text-white bg-white/10 border-cyan-400 focus:border-cyan-300 focus:ring-cyan-300"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="text-white" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full text-white bg-white/10 border-cyan-400 focus:border-cyan-300 focus:ring-cyan-300"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')"
                class="text-white" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full text-white bg-white/10 border-cyan-400 focus:border-cyan-300 focus:ring-cyan-300"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-cyan-500 hover:bg-cyan-600 text-white border-none">{{ __('Simpan') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>