<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Kelola Format Laporan</h1>
                <p class="text-blue-100 text-sm">Upload dan kelola template format laporan PKL untuk mahasiswa</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Success Message --}}
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

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        {{-- Upload Form Section --}}
        <div class="xl:col-span-1">
            <div class="backdrop-blur-sm bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-xl sticky top-6">
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Upload Format</h3>
                            <p class="text-sm text-slate-400">Tambah template baru</p>
                        </div>
                    </div>
                    <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
                </div>

                <form action="{{ route('admin.format.upload') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    {{-- Nama Format --}}
                    <div class="space-y-2">
                        <label for="nama" class="block text-sm font-semibold text-white">
                            Nama Format Laporan
                            <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" required
                            class="w-full bg-white/[0.05] backdrop-blur-sm text-white border border-white/20 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 focus:outline-none transition-all duration-200 hover:bg-white/[0.08]"
                            placeholder="Contoh: Template Laporan PKL 2025">
                        @error('nama')
                        <p class="text-red-400 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- File Upload --}}
                    <div class="space-y-2">
                        <label for="file" class="block text-sm font-semibold text-white">
                            Upload File Template
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx" required
                                class="block w-full text-sm text-slate-300 bg-white/[0.05] backdrop-blur-sm border border-white/20 rounded-xl cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all duration-200 hover:bg-white/[0.08]
                                file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-emerald-600 file:to-teal-600 file:text-white file:cursor-pointer file:hover:from-emerald-700 file:hover:to-teal-700 file:transition-all file:duration-200" />
                        </div>
                        <p class="text-xs text-slate-400 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Format: PDF, DOC, DOCX (Max. 100MB)
                        </p>
                        @error('file')
                        <p class="text-red-400 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full group relative overflow-hidden bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-700 hover:to-cyan-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:ring-offset-2 focus:ring-offset-slate-900">
                            <span class="relative flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                Upload Format
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Format List Section --}}
        <div class="xl:col-span-2">
            <div class="backdrop-blur-sm bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl overflow-hidden">
                {{-- Card Header --}}
                <div class="px-6 py-4 border-b border-white/10">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Daftar Format Laporan</h3>
                            <p class="text-sm text-slate-400">Template yang tersedia untuk mahasiswa</p>
                        </div>
                    </div>
                </div>

                {{-- Table Content --}}
                <div class="overflow-x-auto">
                    @forelse ($format as $i => $file)
                    @if($loop->first)
                    {{-- Table Header --}}
                    <div
                        class="hidden lg:grid lg:grid-cols-12 gap-4 px-6 py-3 bg-white/[0.02] border-b border-white/10 text-xs font-semibold text-slate-300 uppercase tracking-wider">
                        <div class="col-span-1">No.</div>
                        <div class="col-span-5">Nama Template</div>
                        <div class="col-span-2">File</div>
                        <div class="col-span-2">Upload</div>
                        <div class="col-span-2 text-center">Aksi</div>
                    </div>
                    @endif

                    {{-- Table Row / Card Item --}}
                    <div
                        class="group hover:bg-white/[0.02] transition-all duration-200 border-b border-white/5 last:border-b-0">
                        {{-- Desktop View --}}
                        <div class="hidden lg:grid lg:grid-cols-12 gap-4 items-center px-6 py-4">
                            {{-- Number --}}
                            <div class="col-span-1">
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 bg-slate-700/50 text-slate-300 text-sm font-medium rounded-lg group-hover:bg-slate-600/50 transition-colors">
                                    {{ $i + 1 }}
                                </span>
                            </div>

                            {{-- Template Name --}}
                            <div class="col-span-5 flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">{{ $file->nama }}</p>
                                    <p class="text-xs text-slate-400">
                                        {{ strtoupper(pathinfo($file->file, PATHINFO_EXTENSION)) }} Template
                                    </p>
                                </div>
                            </div>

                            {{-- File Download --}}
                            <div class="col-span-2">
                                <a href="{{ asset('storage/' . $file->file) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors duration-200 hover:underline">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Download
                                </a>
                            </div>

                            {{-- Upload Date --}}
                            <div class="col-span-2">
                                <span class="text-xs text-slate-400">
                                    {{ $file->created_at->format('d M Y') }}
                                </span>
                            </div>

                            {{-- Actions --}}
                            <div class="col-span-2 text-center">
                                <form action="{{ route('admin.format.destroy', $file->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus template ini?')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-600/20 hover:bg-red-600/30 text-red-400 hover:text-red-300 text-sm font-medium rounded-lg transition-all duration-200 border border-red-500/30 hover:border-red-500/50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    {{-- Empty State --}}
                    <div class="px-6 py-12 text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-slate-700/50 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-slate-300 mb-2">Belum Ada Template</h3>
                        <p class="text-sm text-slate-400 max-w-sm mx-auto">
                            Belum ada format laporan yang diupload. Gunakan form di sebelah kiri untuk menambah template
                            baru.
                        </p>
                    </div>
                    @endforelse
                </div>

                {{-- Footer Info --}}
                @if(count($format) > 0)
                <div class="px-6 py-4 bg-white/[0.02] border-t border-white/10">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2 text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Total {{ count($format) }} template tersedia</span>
                        </div>
                        <div class="text-slate-400 hidden sm:block">
                            <span>Template dapat diunduh oleh mahasiswa</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>