@props(['collapsed' => false])

<div class="space-y-1">
    <div class="mt-5"></div>
    <x-sidebar-link route="admin.dashboard" label="Dashboard" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v6a2 2 0 01-2 2H10a2 2 0 01-2-2V5z" />
              </svg>' />

    @if (!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Manajemen Pengguna</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif
    <x-sidebar-link route="admin.mahasiswa.index" label="Kelola Mahasiswa" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0zM21 7a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>' />
    <x-sidebar-link route="admin.dosen.index" label="Kelola Dosen" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0zM21 7a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>' />

    @if (!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Perusahaan</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif
    <x-sidebar-link route="admin.perusahaan.index" label="Kelola Perusahaan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>' />
    @if (!$collapsed)

    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Laporan PKL</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif
    <x-sidebar-link route="admin.laporan.verifikasi" label="Verifikasi Laporan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1 10H6a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
    </svg>' />
    <x-sidebar-link route="admin.format.index" label="Upload Format Laporan" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M16 12l-4-4m0 0l-4 4m4-4v12" />
    </svg>' />

    @if (!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Profil</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif
    <x-sidebar-link route="profile.edit" label="Profil Saya" :collapsed="$collapsed" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>' />
</div>