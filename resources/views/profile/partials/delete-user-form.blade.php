<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-gray-700 dark:text-slate-300 leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-500 hover:bg-red-600 focus:bg-red-600 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-slate-800 transition ease-in-out duration-150">
        {{ __('Hapus Akun') }}
    </x-danger-button>

    {{-- Modal ini di-push ke @stack('modals') di app.blade.php --}}
    @push('modals')
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        {{-- FORM DI DALAM MODAL --}}
        <div
            class="backdrop-blur-xl bg-white/95 dark:bg-slate-800/90 border border-gray-200 dark:border-slate-700/50 rounded-xl shadow-none dark:shadow-2xl">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                @csrf
                @method('delete')

                <div class="flex items-center mb-6">
                    <div
                        class="flex-shrink-0 w-12 h-12 mx-auto bg-red-100/80 dark:bg-red-100/10 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-500 dark:text-red-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.882 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                </div>

                <h2 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-4">
                    {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
                </h2>

                <p class="text-sm text-gray-700 dark:text-slate-300 text-center mb-8 leading-relaxed">
                    {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
                </p>

                <div class="mb-8">
                    <x-input-label for="password" value="{{ __('Kata Sandi') }}" class="sr-only" />

                    <x-text-input id="password" name="password" type="password"
                        class="mt-1 block w-full bg-white dark:bg-slate-700/50 border border-gray-200 dark:border-slate-600 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-blue-400 focus:ring-blue-400 focus:ring-offset-white dark:focus:ring-offset-slate-800 rounded-lg shadow-sm backdrop-blur-sm"
                        placeholder="{{ __('Masukkan kata sandi Anda') }}" />

                    <x-input-error :messages="$errors->userDeletion->get('password')"
                        class="mt-2 text-red-500 dark:text-red-400" />
                </div>

                <div class="flex justify-end space-x-3">
                    <x-secondary-button x-on:click="$dispatch('close')"
                        class="bg-gray-100 dark:bg-slate-600/50 hover:bg-gray-200 dark:hover:bg-slate-600/70 text-gray-700 dark:text-white border border-gray-200 dark:border-slate-500 focus:ring-gray-400 dark:focus:ring-slate-400 focus:ring-offset-white dark:focus:ring-offset-slate-800 backdrop-blur-sm transition ease-in-out duration-150">
                        {{ __('Batal') }}
                    </x-secondary-button>

                    <x-danger-button
                        class="bg-red-500 hover:bg-red-600 focus:bg-red-600 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-slate-800 transition ease-in-out duration-150 ms-3">
                        {{ __('Hapus Akun') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
    @endpush
</section>