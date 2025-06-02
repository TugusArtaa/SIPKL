<x-app-layout>
    {{-- Header Section --}}
    <div
        class="mb-8 bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 dark:shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Bimbingan</h1>
                <p class="text-gray-900 dark:text-blue-100 text-sm">Ajukan sesi bimbingan dengan dosen pembimbing dan
                    pantau status
                    pengajuan Anda</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="mb-6 bg-emerald-100/80 dark:bg-emerald-500/10 backdrop-blur-sm text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Form Ajukan Bimbingan --}}
    <div
        class="mb-8 backdrop-blur-sm bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl dark:shadow-xl overflow-hidden">
        {{-- Card Header --}}
        <div class="px-6 py-4 border-b border-gray-200 dark:border-white/10">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Form Pengajuan Bimbingan</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400">Lengkapi informasi di bawah untuk mengajukan
                        sesi bimbingan</p>
                </div>
            </div>
        </div>

        {{-- Form Content --}}
        <div class="p-6">
            <form action="{{ route('mahasiswa.bimbingan.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Pilih Dosen --}}
                    <div class="space-y-2">
                        <label for="dosen_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Dosen Pembimbing
                            <span class="text-red-600 dark:text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <select name="dosen_id" id="dosen_id" required
                                class="w-full px-4 py-3 bg-white/80 dark:bg-white/[0.05] text-gray-900 dark:text-white rounded-lg border border-gray-200 dark:border-white/20 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 focus:outline-none transition-all duration-200 hover:bg-gray-100 dark:hover:bg-white/10 hover:border-gray-300 dark:hover:border-white/30 backdrop-blur-sm appearance-none">
                                <option value="" class="bg-white text-gray-700 dark:bg-slate-800 dark:text-slate-300">
                                    Pilih Dosen Pembimbing</option>
                                @foreach(App\Models\Dosen::all() as $dosen)
                                <option value="{{ $dosen->id }}"
                                    class="bg-white text-gray-900 dark:bg-slate-800 dark:text-white">
                                    {{ $dosen->nama }} ({{ $dosen->program_studi }})
                                </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 dark:text-white/60" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Tanggal Bimbingan --}}
                    <div class="space-y-2">
                        <label for="tanggal_bimbingan" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal Bimbingan
                            <span class="text-red-600 dark:text-red-400">*</span>
                        </label>
                        <input type="date" name="tanggal_bimbingan" id="tanggal_bimbingan" required
                            class="w-full px-4 py-3 bg-white/80 dark:bg-white/[0.05] text-gray-900 dark:text-white rounded-lg border border-gray-200 dark:border-white/20 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 focus:outline-none transition-all duration-200 hover:bg-gray-100 dark:hover:bg-white/10 hover:border-gray-300 dark:hover:border-white/30 backdrop-blur-sm"
                            style="color-scheme: light dark;">
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="space-y-2">
                    <label for="catatan" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Catatan Tambahan
                        <span class="text-red-600 dark:text-red-400">*</span>
                    </label>
                    <textarea name="catatan" id="catatan" rows="4" required
                        placeholder="Tuliskan topik atau hal yang ingin didiskusikan dalam sesi bimbingan..."
                        class="w-full px-4 py-3 bg-white/80 dark:bg-white/[0.05] text-gray-900 dark:text-white rounded-lg border border-gray-200 dark:border-white/20 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 focus:outline-none transition-all duration-200 hover:bg-gray-100 dark:hover:bg-white/10 hover:border-gray-300 dark:hover:border-white/30 backdrop-blur-sm placeholder-gray-400 dark:placeholder-slate-400 resize-none"></textarea>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4 border-t border-gray-200 dark:border-white/10 flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-400 to-green-500 dark:from-emerald-500 dark:to-green-600 hover:from-emerald-500 hover:to-green-600 dark:hover:from-emerald-600 dark:hover:to-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 dark:hover:scale-105 dark:hover:shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path fill="#ffffff"
                                d="M14.707 9.293a1 1 0 0 0-1.414 0l-3 3a1 1 0 1 0 1.414 1.414l3-3a1 1 0 0 0 0-1.414Z">
                            </path>
                            <path fill="#ffffff"
                                d="M21.707 2.293a1 1 0 0 0-1.069-.225l-18 7a1 1 0 0 0 .011 1.868l7.574 2.84 2.84 7.575a1 1 0 0 0 .931.648H14a1 1 0 0 0 .932-.638l7-18a1 1 0 0 0-.225-1.068Zm-7.69 15.9-2.081-5.549a1 1 0 0 0-.585-.585L5.8 9.983l13.444-5.227Z">
                            </path>
                        </svg>
                        Ajukan Bimbingan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Riwayat Bimbingan --}}
    <div
        class="backdrop-blur-sm bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl dark:shadow-xl overflow-hidden">
        {{-- Card Header --}}
        <div class="px-6 py-4 border-b border-gray-200 dark:border-white/10">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Riwayat Pengajuan Bimbingan</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400">Daftar semua pengajuan bimbingan yang pernah
                        Anda ajukan</p>
                </div>
            </div>
        </div>

        {{-- Table Content --}}
        <div class="overflow-x-auto">
            @forelse ($bimbingan as $i => $item)
            @if($loop->first)
            {{-- Table Header (only show if there's data) --}}
            <div
                class="hidden md:grid md:grid-cols-12 gap-4 px-6 py-3 bg-gray-100/80 dark:bg-white/[0.02] border-b border-gray-200 dark:border-white/10 text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                <div class="col-span-1">No.</div>
                <div class="col-span-3">Tanggal</div>
                <div class="col-span-4">Dosen Pembimbing</div>
                <div class="col-span-2">Catatan</div>
                <div class="col-span-2 text-center">Status</div>
            </div>
            @endif

            {{-- Table Row / Card Item --}}
            <div
                class="group hover:bg-gray-100/60 dark:hover:bg-white/[0.02] transition-all duration-200 border-b border-gray-100 dark:border-white/5 last:border-b-0">
                {{-- Desktop View --}}
                <div class="hidden md:grid md:grid-cols-12 gap-4 items-center px-6 py-4">
                    {{-- Number --}}
                    <div class="col-span-1">
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 bg-gray-200 dark:bg-slate-700/50 text-gray-700 dark:text-slate-300 text-sm font-medium rounded-lg group-hover:bg-gray-300 dark:group-hover:bg-slate-600/50 transition-colors">
                            {{ $i + 1 }}
                        </span>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-span-3">
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->translatedFormat('d M Y') }}
                            </span>
                            <span class="text-xs text-gray-500 dark:text-slate-400">
                                {{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->translatedFormat('l') }}
                            </span>
                        </div>
                    </div>

                    {{-- Dosen Pembimbing --}}
                    <div class="col-span-4 flex items-center gap-3">
                        <div
                            class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-emerald-400 to-teal-400 dark:from-emerald-500 dark:to-teal-500 rounded-lg flex items-center justify-center">
                            <span class="text-sm font-semibold text-white">
                                {{ substr($item->dosen->nama, 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-gray-900 dark:text-white font-medium">{{ $item->dosen->nama }}</p>
                            <p class="text-xs text-gray-500 dark:text-slate-400">{{ $item->dosen->program_studi }}</p>
                        </div>
                    </div>

                    {{-- Catatan --}}
                    <div class="col-span-2">
                        <span class="text-sm text-gray-700 dark:text-slate-300">
                            {{ $item->catatan ? Str::limit($item->catatan, 30) : '-' }}
                        </span>
                    </div>

                    {{-- Status --}}
                    <div class="col-span-2 text-center">
                        @if($item->status === 'disetujui')
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg bg-emerald-100/80 dark:bg-white/5 text-emerald-700 dark:text-green-400 border border-emerald-200 dark:border-green-500/30">
                            <svg class="w-5 h-5 text-emerald-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Disetujui
                        </span>
                        @elseif($item->status === 'ditolak')
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg bg-red-100/80 dark:bg-white/5 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/30">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            Ditolak
                        </span>
                        @else
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg bg-amber-100/80 dark:bg-white/5 text-amber-700 dark:text-yellow-400 border border-amber-200 dark:border-yellow-500/30">
                            <svg class="w-5 h-5 text-amber-500 dark:text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Diajukan
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            {{-- Empty State --}}
            <div class="px-6 py-12 text-center">
                <div
                    class="w-16 h-16 mx-auto mb-4 bg-gray-200 dark:bg-slate-700/50 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400 dark:text-slate-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-700 dark:text-slate-300 mb-2">Belum Ada Pengajuan Bimbingan
                </h3>
                <p class="text-sm text-gray-500 dark:text-slate-400 max-w-sm mx-auto">
                    Anda belum mengajukan bimbingan apapun. Gunakan form di atas untuk membuat pengajuan pertama.
                </p>
            </div>
            @endforelse
        </div>

        {{-- Footer Info --}}
        @if(count($bimbingan) > 0)
        <div class="px-6 py-4 bg-gray-100/80 dark:bg-white/[0.02] border-t border-gray-200 dark:border-white/10">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2 text-gray-500 dark:text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Total {{ count($bimbingan) }} pengajuan</span>
                </div>
                <div class="text-gray-500 dark:text-slate-400">
                    <span>Status akan diperbarui setelah dosen merespon</span>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>