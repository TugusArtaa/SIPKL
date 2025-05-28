@props(['collapsed' => false])

<div class="space-y-1">
    <div class="mt-5"></div>

    <!-- Dashboard -->
    <x-sidebar-link route="dosen.dashboard" label="Dashboard" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v6a2 2 0 01-2 2H10a2 2 0 01-2-2V5z" />
    </svg>' />

    <!-- Section Divider -->
    @if(!$collapsed)
        <div class="px-3 py-2 mt-6 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Manajemen Bimbingan</p>
        </div>
    @else
        <div class="h-px bg-white/10 my-4"></div>
    @endif

    <!-- Mahasiswa Bimbingan -->
    <x-sidebar-link route="dosen.mahasiswa" label="Mahasiswa Bimbingan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0zM21 7a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>' />

    <!-- Jadwal Bimbingan -->
    <x-sidebar-link route="dosen.bimbingan" label="Jadwal Bimbingan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 19h14M5 15h14M5 7h14" />
    </svg>' />

    <!-- Section Divider -->
    @if(!$collapsed)
        <div class="px-3 py-2 mt-6 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Penilaian</p>
        </div>
    @else
        <div class="h-px bg-white/10 my-4"></div>
    @endif

    <!-- Input Nilai -->
    <x-sidebar-link route="dosen.nilai" label="Input Nilai PKL" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2M12 12a4 4 0 110-8 4 4 0 010 8z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20h16" />
    </svg>' />

    <!-- Section Divider -->
    @if(!$collapsed)
        <div class="px-3 py-2 mt-6 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Profil</p>
        </div>
    @else
        <div class="h-px bg-white/10 my-4"></div>
    @endif

    <!-- Profil -->
    <x-sidebar-link route="profile.edit" label="Profil Saya" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>' />
</div>