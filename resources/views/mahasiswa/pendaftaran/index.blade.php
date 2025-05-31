<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Pendaftaran PKL</h1>
                <p class="text-blue-100 text-sm">Silahkan lengkapi form untuk mendaftar PKL dan Pantau status PKL Anda.
                </p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="mb-6 bg-emerald-500/10 backdrop-blur-sm text-emerald-300 border border-emerald-500/30 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div
        class="mb-6 bg-gradient-to-r from-red-500/20 to-rose-500/20 backdrop-blur-sm border border-red-400/30 rounded-xl px-6 py-4 shadow-lg">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-red-200 font-medium">{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <div class="w-full">
        @if(!$pendaftaran)
        {{-- Registration Form --}}
        <div class="mb-8 backdrop-blur-sm bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl overflow-hidden">
            {{-- Card Header --}}
            <div class="px-6 py-4 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Form Pendaftaran PKL</h3>
                        <p class="text-sm text-slate-400">Lengkapi seluruh dengan data yang benar</p>
                    </div>
                </div>
            </div>
            {{-- Form Content --}}
            <div class="p-6">
                <form action="{{ route('mahasiswa.pendaftaran.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Perusahaan Field --}}
                        <div class="space-y-2">
                            <label for="perusahaan_id" class="block text-sm font-medium text-white/90">
                                Pilih Perusahaan <span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <select id="perusahaan_id" name="perusahaan_id" required
                                    class="w-full px-4 py-3 bg-white/[0.05] text-white rounded-lg border border-white/20 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 focus:outline-none transition-all duration-200 hover:bg-white/10 hover:border-white/30 backdrop-blur-sm appearance-none">
                                    <option value="" class="bg-slate-800 text-slate-300">-- Pilih Perusahaan --</option>
                                    @foreach($perusahaan as $item)
                                    <option value="{{ $item->id }}" class="bg-slate-800 text-white">{{ $item->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-white/60" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('perusahaan_id')"
                                class="text-red-400 text-sm mt-1" />
                        </div>
                        {{-- Bidang PKL Field --}}
                        <div class="space-y-2">
                            <label for="bidang_pkl" class="block text-sm font-medium text-white/90">
                                Bidang PKL <span class="text-red-400">*</span>
                            </label>
                            <input id="bidang_pkl" type="text" name="bidang_pkl" required
                                placeholder="Contoh: Web Development, Data Science, dll."
                                class="w-full px-4 py-3 bg-white/[0.05] text-white rounded-lg border border-white/20 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 focus:outline-none transition-all duration-200 hover:bg-white/10 hover:border-white/30 backdrop-blur-sm placeholder-slate-400" />
                            <x-input-error :messages="$errors->get('bidang_pkl')" class="text-red-400 text-sm mt-1" />
                        </div>
                        {{-- Periode Field --}}
                        <div class="space-y-2 md:col-span-2">
                            <label for="periode" class="block text-sm font-medium text-white/90">
                                Periode PKL <span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <input id="periode" type="text" name="periode" required
                                    placeholder="Contoh: Semester Genap 2025"
                                    class="w-full px-4 py-3 bg-white/[0.05] text-white rounded-lg border border-white/20 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 focus:outline-none transition-all duration-200 hover:bg-white/10 hover:border-white/30 backdrop-blur-sm placeholder-slate-400" />
                            </div>
                            <x-input-error :messages="$errors->get('periode')" class="text-red-400 text-sm mt-1" />
                        </div>
                    </div>
                    {{-- Submit Button --}}
                    <div class="pt-4 border-t border-white/10 flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 hover:scale-105 hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Daftar PKL
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @else
        {{-- Registration Status --}}
        <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-8 shadow-2xl">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">
                    @if($pendaftaran->status === 'diterima')
                    Anda resmi terdaftar untuk melaksanakan PKL!
                    @elseif($pendaftaran->status === 'ditolak')
                    Maaf, pendaftaran PKL Anda belum disetujui.
                    @else
                    Pendaftaran Anda sedang dalam tahap peninjauan akademik.
                    @endif
                </h3>
                <p class="text-slate-300">Berikut rincian pendaftaran PKL Anda:</p>
            </div>

            <div class="space-y-4">
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </div>
                        <div>
                            <p class="text-sm text-slate-400 font-medium">Perusahaan</p>
                            <p class="text-white font-semibold">{{ $pendaftaran->perusahaan->nama }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Work">
                                <path fill="none" d="M0 0h24v24H0Z"></path>
                                <path fill="#ffbf66"
                                    d="M19.8 7.2h-3.6V5.4a1.8 1.8 0 0 0-1.8-1.8H9.6a1.8 1.8 0 0 0-1.8 1.8v1.8H4.2A1.8 1.8 0 0 0 2.4 9v9.6a1.8 1.8 0 0 0 1.8 1.8h15.6a1.8 1.8 0 0 0 1.8-1.8V9a1.8 1.8 0 0 0-1.8-1.8ZM9.6 5.4h4.8v1.8H9.6Zm10.2 13.2H4.2V9h15.6Z"
                                    class="color525863 svgShape"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-400 font-medium">Bidang PKL</p>
                            <p class="text-white font-semibold">{{ $pendaftaran->bidang_pkl ?? 'Belum ditentukan' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-400 font-medium">Periode</p>
                            <p class="text-white font-semibold">{{ $pendaftaran->periode }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-{{ $pendaftaran->status === 'diterima' ? 'green' : ($pendaftaran->status === 'ditolak' ? 'red' : 'yellow') }}-500/20 rounded-lg flex items-center justify-center">
                                @if($pendaftaran->status === 'diterima')
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                @elseif($pendaftaran->status === 'ditolak')
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                @else
                                <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm text-slate-400 font-medium">Status Pendaftaran</p>
                                <p class="text-white font-semibold capitalize">{{ $pendaftaran->status ?? 'menunggu' }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium {{ $pendaftaran->status === 'diterima' ? 'bg-green-500/20 text-green-300 border border-green-400/30' : ($pendaftaran->status === 'ditolak' ? 'bg-red-500/20 text-red-300 border border-red-400/30' : 'bg-yellow-500/20 text-yellow-300 border border-yellow-400/30') }}">
                                {{ $pendaftaran->status === 'diterima' ? 'Diterima' : ($pendaftaran->status === 'ditolak' ? 'Ditolak' : 'Menunggu Persetujuan') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-white/10">
                <p class="text-slate-400 text-sm text-center">
                    @if($pendaftaran->status === 'diterima')
                    Silakan menunggu informasi lebih lanjut dari pihak akademik atau dosen pembimbing terkait
                    pelaksanaan PKL Anda.
                    @elseif($pendaftaran->status === 'ditolak')
                    Silakan hubungi pihak akademik untuk informasi lebih lanjut atau ajukan pendaftaran ulang jika
                    diperlukan.
                    @else
                    Selanjutnya, proses akan dikonfirmasi oleh pihak akademik. Mohon cek status pendaftaran Anda secara
                    berkala.
                    @endif
                </p>
                @if($pendaftaran->status === 'ditolak')
                <div class="mt-4 flex justify-center">
                    <form action="{{ route('mahasiswa.pendaftaran.destroy', $pendaftaran->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin mengajukan pendaftaran ulang? Data pendaftaran sebelumnya akan dihapus.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold rounded-lg shadow transition-all duration-200">
                            Ajukan Pendaftaran Ulang
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</x-app-layout>