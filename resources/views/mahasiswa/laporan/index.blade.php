<x-app-layout>
    {{-- Header Section --}}
    <div
        class="mb-8 bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 dark:shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Upload Laporan PKL</h1>
                <p class="text-gray-900 dark:text-blue-100 text-sm">Silakan upload laporan Praktik Kerja Lapangan Anda
                    dalam format PDF
                    atau Word</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="mb-6 bg-emerald-100/80 dark:bg-emerald-500/10 backdrop-blur-sm text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Upload Form --}}
        <div class="lg:col-span-2">
            @if(!$laporan || $laporan->status === 'ditolak')
            {{-- Upload Form --}}
            <div
                class="backdrop-blur-sm bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 dark:shadow-xl">
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Form Upload Laporan</h3>
                    <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
                </div>

                <form action="{{ route('mahasiswa.laporan.upload') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    {{-- Perusahaan Selection --}}
                    <div class="space-y-2">
                        <label for="perusahaan_id" class="block text-sm font-semibold text-gray-900 dark:text-white">
                            Pilih Perusahaan
                            <span class="text-red-600 dark:text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <select id="perusahaan_id" name="perusahaan_id" required
                                class="w-full bg-white/80 dark:bg-white/[0.05] backdrop-blur-sm text-gray-900 dark:text-white border border-gray-200 dark:border-white/20 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 focus:outline-none transition-all duration-200 appearance-none cursor-pointer hover:bg-gray-100 dark:hover:bg-white/[0.08]">
                                <option value="" class="bg-white text-gray-700 dark:bg-slate-800 dark:text-slate-300">
                                    Pilih Perusahaan </option>
                                @foreach($perusahaan as $perusahaanItem)
                                <option value="{{ $perusahaanItem->id }}"
                                    class="bg-white text-gray-900 dark:bg-slate-800 dark:text-white">
                                    {{ $perusahaanItem->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- File Upload --}}
                    <div class="space-y-2">
                        <label for="file" class="block text-sm font-semibold text-gray-900 dark:text-white">
                            Upload File Laporan
                            <span class="text-red-600 dark:text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input id="file" name="file" type="file" accept=".pdf,.doc,.docx" required
                                class="block w-full text-sm text-gray-700 dark:text-slate-300 bg-white/80 dark:bg-white/[0.05] backdrop-blur-sm border border-gray-200 dark:border-white/20 rounded-xl cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all duration-200 hover:bg-gray-100 dark:hover:bg-white/[0.08]
                                                                                                                        file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-blue-600 file:to-cyan-600 file:text-white file:cursor-pointer file:hover:from-blue-700 file:hover:to-cyan-700 file:transition-all file:duration-200" />
                        </div>
                        <p class="text-xs text-gray-500 dark:text-slate-400 mt-1">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Format yang didukung: PDF, DOC, DOCX (Max. 100MB)
                        </p>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full group relative overflow-hidden bg-gradient-to-r from-emerald-400 to-green-500 dark:from-emerald-500 dark:to-green-600 hover:from-emerald-500 hover:to-green-600 dark:hover:from-emerald-600 dark:hover:to-green-700 text-white font-semibold py-3 px-6 rounded-xl dark:shadow-lg dark:hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500/50 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-white/[0.03]">
                            <span class="relative flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                Upload Laporan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            @else
            {{-- Already Uploaded Message --}}
            <div
                class="backdrop-blur-sm bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-8 text-center dark:shadow-xl">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-teal-400 dark:from-emerald-500 dark:to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Laporan Telah Diupload</h3>
                <p class="text-gray-500 dark:text-slate-400 text-sm">Anda sudah mengupload laporan PKL. Status
                    verifikasi dapat dilihat di
                    panel sebelah kanan.</p>
            </div>
            @endif
        </div>

        {{-- Status Panel --}}
        <div class="lg:col-span-1">
            @if($laporan)
            <div
                class="backdrop-blur-sm bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 dark:shadow-xl">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Status Verifikasi</h3>
                    <div class="w-8 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                </div>

                <div class="space-y-4">
                    {{-- Status Badge --}}
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-700 dark:text-slate-300 font-medium">Status:</span>
                        <span
                            class="px-3 py-1.5 rounded-full font-semibold text-xs inline-flex items-center gap-1.5
                                                                                                                                                                                                            {{ $laporan->status === 'diterima' ? 'bg-emerald-100/80 text-emerald-700 border border-emerald-200 dark:bg-emerald-500/20 dark:text-emerald-300 dark:border-emerald-500/30' :
                ($laporan->status === 'ditolak' ? 'bg-red-100/80 text-red-700 border border-red-200 dark:bg-red-500/20 dark:text-red-300 dark:border-red-500/30' :
                    'bg-amber-100/80 text-amber-700 border border-amber-200 dark:bg-amber-500/20 dark:text-amber-300 dark:border-amber-500/30') }}">

                            @if($laporan->status === 'diterima')
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @elseif($laporan->status === 'ditolak')
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @else
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 7a1 1 0 112 0v4a1 1 0 11-2 0V7zm1 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @endif

                            {{ ucfirst($laporan->status) }}
                        </span>
                    </div>
                    @if($laporan->status === 'ditolak')
                    <p class="text-xs text-red-700 dark:text-red-300 mt-2">Tolong upload ulang laporan PKL anda sesuai
                        susunan template!
                    </p>
                    @endif

                    {{-- File Info --}}
                    <div class="border-t border-gray-200 dark:border-white/10 pt-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-slate-300 font-medium">File Laporan:</span>
                            <a href="{{ asset('storage/' . $laporan->file) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 text-blue-700 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 text-sm font-medium transition-colors duration-200 hover:underline">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Lihat File
                            </a>
                        </div>
                    </div>

                    {{-- Upload Date --}}
                    <div class="text-xs text-gray-500 dark:text-slate-400">
                        <span class="font-medium">Diupload:</span> {{ $laporan->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
            @else
            {{-- No Upload Yet --}}
            <div
                class="backdrop-blur-sm bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 text-center shadow-xl">
                <div
                    class="w-12 h-12 bg-gray-200 dark:bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-gray-400 dark:text-slate-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <h4 class="text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Belum Ada Laporan</h4>
                <p class="text-xs text-gray-500 dark:text-slate-400">Silakan upload laporan PKL Anda</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>