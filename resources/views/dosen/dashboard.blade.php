<x-app-layout>
    {{-- Main Dashboard Content --}}
    <div class="max-w-6xl mx-auto space-y-6">

        {{-- Welcome Hero Section --}}
        <div class="relative overflow-hidden">
            <div
                class="absolute inset-0 bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl">
            </div>
            <div
                class="relative bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                            Selamat Datang, <span
                                class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">{{ Auth::user()->name }}!</span>
                        </h1>
                        <p class="text-gray-700 dark:text-slate-300 text-lg">
                            di Sistem Informasi Praktik Kerja Lapangan - Jurusan Teknologi Informasi
                        </p>
                        <div class="mt-4 flex items-center space-x-4 text-sm">
                            <div class="flex items-center text-gray-700 dark:text-slate-300">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }}
                            </div>
                            <div class="flex items-center text-gray-700 dark:text-slate-300">
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
                                class="absolute dark:-inset-4 bg-gradient-to-r from-cyan-500/20 via-blue-500/20 to-cyan-400/20 rounded-full blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <img src="/home.png" alt="Logo" class="relative hidden dark:block" />
                            <img src="/home-dark.png" alt="Logo" class="relative block dark:hidden" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hero Section SIPTI --}}
        <div class="bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-xl p-8 mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Left Side - Images --}}
                <div class="order-2 lg:order-1">
                    <div class="flex justify-center">
                        <div class="relative group">
                            <div
                                class="absolute dark:-inset-4 bg-gradient-to-r from-cyan-500/20 via-blue-500/20 to-cyan-400/20 rounded-full blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative">
                                <img src="/Mascot.png" alt="SIPTI Mascot"
                                    class="w-[320px] h-[320px] object-contain dark:drop-shadow-2xl transition-transform duration-300 group-hover:scale-105 mx-auto">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side - Typography --}}
                <div class="space-y-8 order-1 lg:order-2">
                    {{-- Title --}}
                    <div class="text-center lg:text-left">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-2">
                            Apa itu <span
                                class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">SIPTI?</span>
                        </h2>
                    </div>

                    {{-- Description --}}
                    <div class="space-y-6">
                        <p class="text-gray-700 dark:text-slate-300 text-lg leading-relaxed text-center lg:text-left">
                            <span class="text-cyan-500 dark:text-cyan-400 font-semibold">Sistem Informasi Praktik Kerja
                                Lapangan</span>
                            <span class="text-gray-900 dark:text-white">Jurusan Teknologi Informasi</span> adalah
                            platform digital yang
                            memfasilitasi mahasiswa dalam mengelola seluruh proses PKL dengan mudah, dengan fitur
                            Pendaftaran Online, Pengajuan Bimbingan Online, dan Pelaporan Digital. <br><br>Selanjutnya,
                            Anda dapat melihat ringkasan informasi Mahasiswa PKL pada bagian di bawah ini.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Stats Overview --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <!-- Total Mahasiswa Bimbingan -->
            <div
                class="bg-white/80 dark:bg-white/10 border border-gray-200 dark:border-white/10 rounded-xl p-5 hover:bg-blue-50 dark:hover:bg-blue-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-blue-100 dark:bg-blue-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 22 22">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalMahasiswa }}</span>
                </div>
                <h3 class="text-gray-900 dark:text-white font-semibold text-sm mb-1">Total Mahasiswa Bimbingan</h3>
                <ny class="text-gray-500 dark:text-slate-400 text-xs">Sebanyak {{ $totalMahasiswa }} mahasiswa</p>
            </div>
            <!-- Total Bimbingan Disetujui -->
            <div
                class="bg-white/80 dark:bg-white/10 border border-gray-200 dark:border-white/10 rounded-xl p-5 hover:bg-green-50 dark:hover:bg-green-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-green-100 dark:bg-green-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 22 22">
                            <path
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-green-500 dark:text-green-400">{{ $bimbinganDisetujui }}</span>
                </div>
                <h3 class="text-gray-900 dark:text-white font-semibold text-sm mb-1">Total Bimbingan Disetujui</h3>
                <p class="text-gray-500 dark:text-slate-400 text-xs">Ada {{ $bimbinganDisetujui }} bimbingan</p>
            </div>
            <!-- Bimbingan Menunggu Persetujuan -->
            <div
                class="bg-white/80 dark:bg-white/10 border border-gray-200 dark:border-white/10 rounded-xl p-5 hover:bg-yellow-50 dark:hover:bg-yellow-400/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="p-2 bg-yellow-100 dark:bg-yellow-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-yellow-500 dark:text-yellow-400" fill="currentColor"
                            viewBox="0 0 22 22">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-yellow-500 dark:text-yellow-400">{{ $bimbinganPending }}</span>
                </div>
                <h3 class="text-gray-900 dark:text-white font-semibold text-sm mb-1">Bimbingan Menunggu Persetujuan</h3>
                <p class="text-gray-500 dark:text-slate-400 text-xs">Ada {{ $bimbinganPending }} permintaan bimbingan
                </p>
            </div>
        </div>

        {{-- Tips & Announcements --}}
        <div class="bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-xl p-6">
            <div class="flex items-center mb-4">
                <div class="p-2 bg-yellow-100/80 dark:bg-yellow-500/20 rounded-lg mr-3">
                    <svg class="w-5 h-5 text-yellow-500 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-gray-900 dark:text-white font-semibold text-lg">Tips & Pengumuman</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    class="p-4 bg-blue-100/80 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/20 rounded-lg">
                    <h4 class="text-blue-700 dark:text-blue-300 font-medium text-sm mb-2">💡 Tips Bimbingan</h4>
                    <p class="text-gray-700 dark:text-slate-300 text-sm">Pastikan untuk memeriksa Jadwal Bimbingan
                        mahasiswa secara berkala
                        dan memberikan feedback agar proses PKL berjalan optimal.</p>
                </div>

                <div
                    class="p-4 bg-green-100/80 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 rounded-lg">
                    <h4 class="text-green-700 dark:text-green-300 font-medium text-sm mb-2">📢 Pengumuman</h4>
                    <p class="text-gray-700 dark:text-slate-300 text-sm">Silakan input nilai PKL mahasiswa maksimal 1
                        minggu setelah
                        laporan akhir dikumpulkan.</p>
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