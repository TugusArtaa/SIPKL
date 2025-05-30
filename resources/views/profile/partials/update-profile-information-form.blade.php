<section>
    <!-- Header -->
    <header class="relative space-y-4">
        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div
                    class="p-3 bg-gradient-to-br from-cyan-500/20 to-blue-600/20 rounded-xl border border-cyan-400/30 backdrop-blur-sm">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h2
                        class="text-3xl font-bold bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent tracking-tight">
                        {{ __('Informasi Profil') }}
                    </h2>
                    <div class="h-1 w-16 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full mt-2"></div>
                </div>
            </div>
        </div>
        <p class="mt-1 text-sm text-white/80">
            {{ __('Perbarui nama dan alamat email akun anda dan klik simpan.') }}
        </p>
    </header>

    <!-- Form Section -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Form Fields Container -->
        <div class="space-y-5">
            <!-- Nama Field -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Nama')" class="text-white/90 font-medium text-sm" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full px-4 py-3 text-white placeholder-white/50 
                           bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg
                           focus:border-cyan/40 focus:ring-2 focus:ring-cyan/20 focus:bg-white/10
                           transition-all duration-200 ease-in-out
                           hover:border-white/30 hover:bg-white/[0.07]" :value="old('name', $user->name)" required
                    autofocus autocomplete="name" placeholder="Masukkan nama lengkap" />
                <x-input-error class="mt-2 text-red-400/90 text-sm" :messages="$errors->get('name')" />
            </div>

            <!-- Email Field -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-white/90 font-medium text-sm" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full px-4 py-3 text-white placeholder-white/50 
                           bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg
                           focus:border-cyan/40 focus:ring-2 focus:ring-cyan/20 focus:bg-white/10
                           transition-all duration-200 ease-in-out
                           hover:border-white/30 hover:bg-white/[0.07]" :value="old('email', $user->email)" required
                    autocomplete="username" placeholder="nama@email.com" />
                <x-input-error class="mt-2 text-red-400/90 text-sm" :messages="$errors->get('email')" />
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
        </div>
    </form>
</section>