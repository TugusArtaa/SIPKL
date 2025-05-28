<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('Perbarui nama dan alamat email akun Anda.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama')" class="text-white" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full text-white bg-white/10 border-cyan-400 focus:border-cyan-300 focus:ring-cyan-300"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full text-white bg-white/10 border-cyan-400 focus:border-cyan-300 focus:ring-cyan-300"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-cyan-500 hover:bg-cyan-600 text-white border-none">{{ __('Simpan') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm">
                    {{ __('Disimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>