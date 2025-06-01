<x-app-layout>
    {{-- Main Dashboard Content --}}
    <div class="max-w-6xl mx-auto space-y-6">

        {{-- Welcome Hero Section --}}
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-white/[0.03] border border-white/10 rounded-2xl">
            </div>
            <div class="relative bg-white/[0.03] border border-white/10 rounded-2xl p-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Selamat Datang, <span
                                class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">{{ Auth::user()->mahasiswa->nama ?? Auth::user()->name }}!</span>
                        </h1>
                        <p class="text-slate-300 text-lg">
                            di Sistem Informasi Praktik Kerja Lapangan - Jurusan Teknologi Informasi
                        </p>
                        <div class="mt-4 flex items-center space-x-4 text-sm">
                            <div class="flex items-center text-slate-300">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }}
                            </div>
                            <div class="flex items-center text-slate-300">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span id="clock"></span>&nbsp;WITA
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-28 h-28 flex items-center justify-center relative group">
                            <div
                                class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 via-blue-500/20 to-cyan-400/20 rounded-full blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <img src="/home.png" alt="Logo" class="relative" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hero Section SIPTI --}}
        <div class="bg-white/[0.03] border border-white/10 rounded-xl p-8 mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Left Side - Images --}}
                <div class="order-2 lg:order-1">
                    <div class="flex justify-center">
                        <div class="relative group">
                            <div
                                class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 via-blue-500/20 to-cyan-400/20 rounded-full blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative">
                                <img src="/Mascot.png" alt="SIPTI Mascot"
                                    class="w-[320px] h-[320px] object-contain drop-shadow-2xl transition-transform duration-300 group-hover:scale-105 mx-auto">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side - Typography --}}
                <div class="space-y-8 order-1 lg:order-2">
                    {{-- Title --}}
                    <div class="text-center lg:text-left">
                        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                            Apa itu <span
                                class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">SIPTI?</span>
                        </h2>
                    </div>

                    {{-- Description --}}
                    <div class="space-y-6">
                        <p class="text-slate-300 text-lg leading-relaxed text-center lg:text-left">
                            <span class="text-cyan-400 font-semibold">Sistem Informasi Praktik Kerja Lapangan</span>
                            <span class="text-white">Jurusan Teknologi Informasi</span> adalah platform digital yang
                            memfasilitasi mahasiswa dalam mengelola seluruh proses PKL dengan mudah dengan fitur
                            Pendaftaran Online, Pengajuan Bimbingan Online, dan Pelaporan Digital. <br><br>Selanjutnya,
                            Anda dapat melihat ringkasan informasi PKL pada bagian di bawah ini.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Stats Overview --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
            $pendaftaran = Auth::user()->mahasiswa->pendaftaranPkl()->latest()->first();
            $laporan = Auth::user()->mahasiswa->laporanPkl()->latest()->first();
            $totalBimbingan = Auth::user()->mahasiswa->bimbingan->count();
            $bimbinganSelesai = Auth::user()->mahasiswa->bimbingan()->where('status', 'disetujui')->count();
            @endphp

            {{-- Status Pendaftaran --}}
            <div
                class="bg-white/[0.03] border border-white/10 rounded-xl p-5 hover:bg-blue-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-blue-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    @if($pendaftaran)
                    <span
                        class="px-2 py-1 text-xs rounded-full {{ $pendaftaran->status === 'diterima' ? 'bg-green-500/20 text-green-300' : ($pendaftaran->status === 'ditolak' ? 'bg-red-500/20 text-red-300' : 'bg-yellow-500/20 text-yellow-300') }}">
                        {{ ucfirst($pendaftaran->status) }}
                    </span>
                    @endif
                </div>
                <h3 class="text-white font-semibold text-sm mb-1">Pendaftaran PKL</h3>
                @if($pendaftaran)
                <p class="text-slate-400 text-xs">{{ $pendaftaran->bidang_pkl }}</p>
                <p class="text-slate-400 text-xs">Periode: {{ $pendaftaran->periode }}</p>
                @else
                <p class="text-slate-400 text-xs">Belum mendaftar</p>
                @endif
            </div>

            {{-- Status Laporan --}}
            <div
                class="bg-white/[0.03] border border-white/10 rounded-xl p-5 hover:bg-purple-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-purple-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    @if($laporan)
                    <span
                        class="px-2 py-1 text-xs rounded-full {{ $laporan->status === 'diterima' ? 'bg-green-500/20 text-green-300' : ($laporan->status === 'ditolak' ? 'bg-red-500/20 text-red-300' : 'bg-yellow-500/20 text-yellow-300') }}">
                        {{ ucfirst($laporan->status) }}
                    </span>
                    @endif
                </div>
                <h3 class="text-white font-semibold text-sm mb-1">Laporan PKL</h3>
                @if($laporan)
                <p class="text-slate-400 text-xs">
                    <a href="{{ asset('storage/' . $laporan->file) }}" target="_blank"
                        class="text-blue-400 hover:text-blue-300 underline">
                        Lihat Laporan
                    </a>
                </p>
                @else
                <p class="text-slate-400 text-xs">Belum upload laporan</p>
                @endif
            </div>

            {{-- Total Bimbingan --}}
            <div
                class="bg-white/[0.03] border border-white/10 rounded-xl p-5 hover:bg-green-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-green-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 22 22">
                            <path
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white">{{ $totalBimbingan }}</span>
                </div>
                <h3 class="text-white font-semibold text-sm mb-1">Total Bimbingan</h3>
                <p class="text-slate-400 text-xs">{{ $bimbinganSelesai }} Bimbingan disetujui</p>
            </div>

            {{-- Progress Overview --}}
            <div
                class="bg-white/[0.03] border border-white/10 rounded-xl p-5 hover:bg-orange-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-orange-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    @php
                    $progress = 0;
                    if ($pendaftaran && $pendaftaran->status === 'diterima')
                    $progress += 33;
                    if ($laporan && $laporan->status === 'diterima')
                    $progress += 33;
                    if ($bimbinganSelesai >= 4)
                    $progress += 34;
                    @endphp
                    <span class="text-2xl font-bold text-white">{{ $progress }}%</span>
                </div>
                <h3 class="text-white font-semibold text-sm mb-1">Progress PKL</h3>
                <p class="text-slate-400 text-xs">{{ $progress }}% Telah dilaksanakan</p>
            </div>
        </div>

        {{-- Tips & Announcements --}}
        <div class="bg-white/[0.03] border border-white/10 rounded-xl p-6">
            <div class="flex items-center mb-4">
                <div class="p-2 bg-yellow-500/20 rounded-lg mr-3">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">Tips & Pengumuman</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-blue-500/10 border border-blue-500/20 rounded-lg">
                    <h4 class="text-blue-300 font-medium text-sm mb-2">💡 Tips PKL</h4>
                    <p class="text-slate-300 text-sm">Pastikan untuk mengisi logbook harian selama PKL dan berkomunikasi
                        rutin dengan pembimbing.</p>
                </div>

                <div class="p-4 bg-green-500/10 border border-green-500/20 rounded-lg">
                    <h4 class="text-green-300 font-medium text-sm mb-2">📢 Pengumuman</h4>
                    <p class="text-slate-300 text-sm">Batas akhir pengumpulan laporan PKL adalah 2 minggu setelah
                        selesai PKL.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
    function updateClock() {
        const now = new Date();
        // Convert to UTC+8 (WITA)
        const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
        const wita = new Date(utc + (8 * 60 * 60 * 1000));
        const h = String(wita.getHours()).padStart(2, '0');
        const m = String(wita.getMinutes()).padStart(2, '0');
        const s = String(wita.getSeconds()).padStart(2, '0');
        document.getElementById('clock').textContent = `${h}:${m}:${s}`;
    }
    updateClock();
    setInterval(updateClock, 1000);
    </script>
</x-app-layout>