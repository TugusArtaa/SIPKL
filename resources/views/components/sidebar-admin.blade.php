@props(['collapsed' => false])

<div class="space-y-1">
    <div class="mt-5"></div>

    <x-sidebar-link route="admin.dashboard" label="Dashboard" :collapsed="$collapsed" icon='<svg fill="none" ... />' />

    @if(!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Manajemen Pengguna</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif

    <x-sidebar-link route="admin.mahasiswa.index" label="Kelola Mahasiswa" :collapsed="$collapsed" ... />
    <x-sidebar-link route="admin.dosen.index" label="Kelola Dosen" :collapsed="$collapsed" ... />

    @if(!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Perusahaan & Laporan</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif

    <x-sidebar-link route="admin.perusahaan.index" label="Kelola Perusahaan" :collapsed="$collapsed"
        icon='<svg fill="none" ... />' />
    <x-sidebar-link route="admin.laporan.verifikasi" label="Verifikasi Laporan" :collapsed="$collapsed"
        icon='<svg fill="none" ... />' />

    @if(!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Format Laporan</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif

    <x-sidebar-link route="admin.format.index" label="Upload Format Laporan" :collapsed="$collapsed"
        icon='<svg fill="none" ... />' />

    @if(!$collapsed)
    <div class="px-3 py-2 mt-6 mb-2">
        <p class="text-xs font-semibold text-gray-400 uppercase">Profil</p>
    </div>
    @else
    <div class="h-px bg-white/10 my-4"></div>
    @endif

    <x-sidebar-link route="profile.edit" label="Profil Saya" :collapsed="$collapsed" icon='<svg fill="none" ... />' />
</div>