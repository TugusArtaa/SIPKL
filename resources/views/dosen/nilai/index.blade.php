<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Input Nilai PKL</h1>
                <p class="text-blue-100 text-sm">Berikan penilaian Praktik Kerja Lapangan mahasiswa bimbingan Anda.</p>
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

    {{-- Main Content --}}
    <div class="space-y-4">
        @forelse ($mahasiswa as $mhs)
        <div class="group relative overflow-hidden rounded-xl bg-white/[0.03] border border-white/10">
            {{-- Student Info Header --}}
            <div class="p-6 pb-4">
                <div class="flex items-start justify-between">
                    <div class="space-y-1">
                        <h3 class="text-xl font-semibold text-white">
                            {{ $mhs->nama }}
                        </h3>
                        <div class="flex items-center space-x-4 text-sm">
                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                {{ $mhs->nim }}
                            </span>
                            <span class="text-slate-400">
                                Bimbingan: <span
                                    class="text-slate-300 font-medium">{{ $mhs->bimbingan_disetujui }}</span>
                            </span>
                        </div>
                    </div>

                    {{-- Status Indicator --}}
                    @if ($mhs->nilaiPkl)
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                        <span class="text-xs font-medium text-emerald-300">Sudah Dinilai</span>
                    </div>
                    @else
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-amber-400 rounded-full animate-pulse"></div>
                        <span class="text-xs font-medium text-amber-300">Menunggu Nilai</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Content Section --}}
            <div class="px-6 pb-6">
                @if ($mhs->nilaiPkl)
                {{-- Display Existing Grade --}}
                <div
                    class="relative overflow-hidden rounded-lg bg-gradient-to-r from-emerald-500/15 to-green-500/15 border border-emerald-400/25 p-4">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-transparent"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-emerald-500/20 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-emerald-300 font-semibold text-lg">Nilai PKL</p>
                                <p class="text-emerald-200/80 text-sm">Telah diinput dan tersimpan</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-emerald-300">{{ $mhs->nilaiPkl->nilai }}</div>
                            <div class="text-emerald-200/60 text-sm">/ 100</div>
                        </div>
                    </div>
                </div>
                @else
                {{-- Grade Input Form --}}
                <form method="POST" action="{{ route('dosen.nilai.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="mahasiswa_id" value="{{ $mhs->id }}">

                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-slate-300">
                            Input Nilai PKL <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="nilai" step="0.01" min="0" max="100"
                                class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400/50 transition-all duration-200 hover:bg-white/8"
                                placeholder="Masukkan nilai (0-100)" required>
                        </div>
                        <p class="text-xs text-slate-400">Masukkan nilai dalam rentang 0-100 dengan maksimal 2 desimal
                        </p>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Simpan Nilai</span>
                            </span>
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
        @empty
        {{-- Empty State --}}
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <div class="w-20 h-20 bg-slate-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-300 mb-2">Tidak Ada Mahasiswa</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Saat ini tidak ada mahasiswa yang memenuhi syarat untuk dinilai PKL.
                    Mahasiswa akan muncul di sini setelah bimbingan mereka disetujui.
                </p>
            </div>
        </div>
        @endforelse
    </div>
</x-app-layout>