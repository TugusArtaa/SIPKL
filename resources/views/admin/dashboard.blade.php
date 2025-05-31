<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Selamat datang, {{ auth()->user()->name }}!
                </h1>
                <p class="text-blue-100 text-sm">Di dashboard admin untuk memantau dan mengelola seluruh data Sistem
                    Informasi PKL Teknologi Informasi.
                </p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Container utama --}}
    <div class="max-w-7xl mx-auto">
        {{-- Grid card statistik --}}
        <div class="grid grid-cols-3 gap-8">

            <!-- Total Mahasiswa -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-blue-500/20 border border-blue-400/30">
                            <svg class="w-8 h-8 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0zM21 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Aktif</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Total Mahasiswa</h3>
                        <div class="text-4xl font-bold text-blue-300 tracking-tight">{{ $totalMahasiswa }}</div>
                    </div>
                </div>
            </div>

            <!-- Total Dosen -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-cyan-500/20 border border-cyan-400/30">
                            <svg class="w-8 h-8 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Aktif</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Total Dosen</h3>
                        <div class="text-4xl font-bold text-cyan-300 tracking-tight">{{ $totalDosen }}</div>
                    </div>
                </div>
            </div>

            <!-- Total Perusahaan -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-yellow-500/20 border border-yellow-400/30">
                            <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Aktif</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Total Perusahaan</h3>
                        <div class="text-4xl font-bold text-yellow-300 tracking-tight">{{ $totalPerusahaan }}</div>
                    </div>
                </div>
            </div>

            <!-- Total Laporan PKL -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-indigo-500/20 border border-indigo-400/30">
                            <svg class="w-8 h-8 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Total</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Total Laporan PKL</h3>
                        <div class="text-4xl font-bold text-indigo-300 tracking-tight">{{ $totalLaporan }}</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Pending -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-orange-500/20 border border-orange-400/30">
                            <svg class="w-8 h-8 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Review</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Laporan Pending</h3>
                        <div class="text-4xl font-bold text-orange-300 tracking-tight">{{ $laporanPending }}</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Diterima -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-green-500/20 border border-green-400/30">
                            <svg class="w-8 h-8 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Approved</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Laporan Diterima</h3>
                        <div class="text-4xl font-bold text-green-300 tracking-tight">{{ $laporanDiterima }}</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Ditolak -->
            <div
                class="group relative overflow-hidden bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl transition-all duration-300 p-8">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-red-500/20 border border-red-400/30">
                            <svg class="w-8 h-8 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right opacity-70">
                            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Rejected</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-slate-300 text-base font-medium">Laporan Ditolak</h3>
                        <div class="text-4xl font-bold text-red-300 tracking-tight">{{ $laporanDitolak }}</div>
                    </div>
                </div>
            </div>

            <!-- Section Ringkasan Sistem -->
            <div
                class="col-span-2 bg-white/[0.03] border border-white/10 rounded-2xl shadow-xl p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-1">Ringkasan Sistem</h3>
                    <p class="text-slate-300 text-sm">Sistem SIPTI berjalan normal dengan
                        {{ $totalMahasiswa + $totalDosen }} pengguna aktif
                    </p>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="text-center">
                        <div class="text-xl font-bold text-green-400">
                            {{ number_format(($laporanDiterima / max($totalLaporan, 1)) * 100, 1) }}%
                        </div>
                        <div class="text-xs text-slate-400 uppercase tracking-wide">Approval Rate</div>
                    </div>
                    <div class="h-10 w-px bg-white/20"></div>
                    <div class="text-center">
                        <div class="text-xl font-bold text-orange-300">{{ $laporanPending }}</div>
                        <div class="text-xs text-slate-400 uppercase tracking-wide">Butuh Review</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>