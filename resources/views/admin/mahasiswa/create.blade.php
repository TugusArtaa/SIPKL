<x-app-layout>
    {{-- Main Form Container --}}
    <div
        class="bg-white dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl dark:shadow-2xl overflow-hidden">

        {{-- Form Header --}}
        <div
            class="bg-gradient-to-r from-blue-100 to-blue-50 dark:from-white/5 dark:to-white/10 border-b border-gray-200 dark:border-white/10 px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Form Tambah Mahasiswa</h3>
                    <p class="text-gray-500 dark:text-slate-400 text-sm mt-1">Lengkapi semua field yang diperlukan</p>
                </div>
                <div class="flex items-center space-x-2 text-gray-500 dark:text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-xs">* Field wajib diisi</span>
                </div>
            </div>
        </div>

        {{-- Form Body --}}
        <div class="p-8">
            <form action="{{ route('admin.mahasiswa.store') }}" method="POST" class="space-y-8">
                @csrf

                {{-- Personal Information Section --}}
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-2 bg-blue-100 dark:bg-blue-500/20 rounded-lg">
                            <svg class="w-5 h-5 text-cyan-500 dark:text-cyan-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-gray-900 dark:text-white">Data Pribadi</h4>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <x-input-label for="nama" :value="'Nama Lengkap *'"
                                class="text-gray-700 dark:text-slate-300 font-medium" />
                            <div class="relative">
                                <x-text-input id="nama" name="nama" type="text"
                                    class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/20 rounded-xl px-4 py-3 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-blue-400/50 focus:bg-white/10 transition-all duration-200"
                                    placeholder="Masukkan nama lengkap mahasiswa" required autofocus />
                            </div>
                            <x-input-error :messages="$errors->get('nama')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="nim" :value="'NIM *'"
                                class="text-gray-700 dark:text-slate-300 font-medium" />
                            <div class="relative">
                                <x-text-input id="nim" name="nim" type="text"
                                    class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/20 rounded-xl px-4 py-3 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-blue-400/50 focus:bg-white/10 transition-all duration-200"
                                    placeholder="Contoh: 2215323000" required />
                            </div>
                            <x-input-error :messages="$errors->get('nim')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="email" :value="'Email Mahasiswa *'"
                                class="text-gray-700 dark:text-slate-300 font-medium" />
                            <div class="relative">
                                <x-text-input id="email" name="email" type="email"
                                    class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/20 rounded-xl pr-4 py-3 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-blue-400/50 focus:bg-white/10 transition-all duration-200"
                                    placeholder="mahasiswa@gmail.com" required />
                            </div>
                            <x-input-error :messages="$errors->get('email')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>
                    </div>
                </div>

                {{-- Academic Information Section --}}
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-2 bg-indigo-100 dark:bg-indigo-500/20 rounded-lg">
                            <svg class="w-5 h-5 text-indigo-500 dark:text-cyan-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-gray-900 dark:text-white">Informasi Akademik</h4>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <x-input-label for="program_studi" :value="'Program Studi *'"
                                class="text-gray-700 dark:text-slate-300 font-medium" />
                            <div class="relative">
                                <x-text-input id="program_studi" name="program_studi" type="text"
                                    class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/20 rounded-xl px-4 py-3 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-indigo-400/50 focus:bg-white/10 transition-all duration-200"
                                    placeholder="Contoh: Manajemen Informatika" required />
                            </div>
                            <x-input-error :messages="$errors->get('program_studi')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="kelas" :value="'Kelas *'"
                                class="text-gray-700 dark:text-slate-300 font-medium" />
                            <div class="relative">
                                <x-text-input id="kelas" name="kelas" type="text"
                                    class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/20 rounded-xl px-4 py-3 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-indigo-400/50 focus:bg-white/10 transition-all duration-200"
                                    placeholder="Contoh: 6C-MI" required />
                            </div>
                            <x-input-error :messages="$errors->get('kelas')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="semester" :value="'Semester *'"
                                class="text-gray-700 dark:text-slate-300 font-medium" />
                            <div class="relative">
                                <x-text-input id="semester" name="semester" type="number" min="1" max="8"
                                    class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/20 rounded-xl pr-4 py-3 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-400 focus:border-indigo-400/50 focus:bg-white/10 transition-all duration-200"
                                    placeholder="1-8" required />
                            </div>
                            <x-input-error :messages="$errors->get('semester')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-white/10">
                    <div class="flex items-center space-x-2 text-gray-500 dark:text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm">Pastikan semua data sudah benar sebelum menambahkan mahasiswa</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.mahasiswa.index') }}"
                            class="px-6 py-3 bg-gray-100 dark:bg-white/10 hover:bg-gray-200 dark:hover:bg-white/20 border border-gray-200 dark:border-white/20 rounded-xl text-gray-700 dark:text-slate-300 hover:text-gray-900 dark:hover:text-white transition-all duration-200 font-medium">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 rounded-xl text-white font-semibold dark:shadow-lg dark:hover:shadow-xl transition-all duration-200 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Tambah Mahasiswa</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>