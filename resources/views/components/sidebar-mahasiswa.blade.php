@props(['collapsed' => false])

<div class="space-y-1">
    <div class="mt-5"></div>
    <!-- Dashboard -->
    <x-sidebar-link route="mahasiswa.dashboard" label="Dashboard" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v6a2 2 0 01-2 2H10a2 2 0 01-2-2V5z" />
              </svg>' />

    <!-- Section Divider -->
    @if(!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Manajemen PKL</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif

    <!-- Pendaftaran PKL -->
    <x-sidebar-link route="mahasiswa.pendaftaran" label="Pendaftaran PKL" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>' />

    <!-- Lihat List Perusahaan -->
    <x-sidebar-link route="mahasiswa.perusahaan" label="Lihat List Perusahaan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>' />

    <!-- Section Divider -->
    @if(!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Laporan & Bimbingan</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif

    <!-- Laporan PKL -->
    <x-sidebar-link route="mahasiswa.laporan" label="Upload Laporan PKL" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>' />

    <!-- Download Format -->
    <x-sidebar-link route="mahasiswa.format" label="Format Laporan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>' />


    <!-- Bimbingan -->
    <x-sidebar-link route="mahasiswa.bimbingan" label="Bimbingan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
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