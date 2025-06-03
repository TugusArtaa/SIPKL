<x-app-layout>
    {{-- Header Section --}}
    <div
        class="mb-8 bg-white dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 dark:shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Kelola Data Dosen</h1>
                <p class="text-gray-900 dark:text-blue-100 text-sm">Lihat, tambah, dan kelola data dosen pada Sistem
                    Informasi PKL
                    Teknologi Informasi.</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Area Tombol --}}
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            {{-- Form Search --}}
            <form method="GET" action="{{ route('admin.dosen.index') }}" class="flex items-center gap-3 h-[48px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama, NIP, Prodi..."
                    class="h-[48px] px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600 focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm w-96 dark:bg-slate-800 dark:text-white transition-all duration-200 shadow-sm"
                    autocomplete="off">
                <button type="submit"
                    class="h-[48px] w-[48px] flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-semibold transition-all duration-200"
                    aria-label="Cari">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                </button>
                @if(request('search'))
                <a href="{{ route('admin.dosen.index') }}"
                    class="h-[48px] flex items-center ml-2 text-sm text-gray-500 dark:text-slate-300 underline">Reset</a>
                @endif
            </form>
            {{-- End Form Search --}}
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.dosen.create') }}"
                class="inline-flex items-center px-6 py-3 bg-blue-500/80 hover:bg-blue-500 text-white font-semibold rounded-lg transition-all duration-200 backdrop-blur-sm border border-blue-400/30 hover:border-blue-400/50 dark:shadow-lg hover:shadow-blue-500/25">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Dosen
            </a>
            <a href="{{ route('admin.dosen.import.form') }}"
                class="inline-flex items-center px-6 py-3 bg-emerald-500/80 hover:bg-emerald-500 text-white font-semibold rounded-lg transition-all duration-200 backdrop-blur-sm border border-emerald-400/30 hover:border-emerald-400/50 dark:shadow-lg hover:shadow-emerald-500/25">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                </svg>
                Import Dosen
            </a>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="mb-6 bg-emerald-100 dark:bg-emerald-500/10 backdrop-blur-sm text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Dosen --}}
    <div
        class="backdrop-blur-sm bg-white dark:bg-white/5 rounded-xl border border-gray-200 dark:border-white/10 overflow-hidden dark:shadow-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-slate-700/30">
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-10">
                            No.
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-36">
                            Nama</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-32">
                            NIP</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-32">
                            Program Studi</th>
                        <th
                            class="px-6 py-4 text-center text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-16">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse ($dosen as $index => $dsn)
                    <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors duration-200">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 font-medium max-w-[64px] truncate overflow-hidden">
                            {{ $dosen->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div
                                class="text-sm font-semibold text-gray-900 dark:text-white max-w-[260px] truncate overflow-hidden">
                                {{ $dsn->nama }}
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 max-w-[128px] truncate overflow-hidden">
                            {{ $dsn->nip }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 max-w-[200px] truncate overflow-hidden">
                            {{ $dsn->program_studi }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center max-w-[128px]">
                            <a href="{{ route('admin.dosen.edit', $dsn) }}"
                                class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 bg-blue-100 dark:bg-blue-600/20 hover:bg-blue-200 dark:hover:bg-blue-600/30 text-blue-700 dark:text-blue-300 hover:text-blue-900 dark:hover:text-blue-200 text-sm font-medium rounded-lg transition-all duration-200 border border-blue-200 dark:border-blue-500/30 hover:border-blue-300 dark:hover:border-blue-500/50 mr-2 group relative"
                                title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11-11a2.828 2.828 0 00-4-4L5 17v4z">
                                    </path>
                                </svg>
                                <span
                                    class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 px-2 py-1 rounded bg-gray-800 text-white text-xs opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-200 whitespace-nowrap z-10">Edit</span>
                            </a>
                            <form action="{{ route('admin.dosen.destroy', $dsn->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen {{ $dsn->nama }}?')"
                                class="inline group relative">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 bg-red-100 dark:bg-red-600/20 hover:bg-red-200 dark:hover:bg-red-600/30 text-red-700 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 text-sm font-medium rounded-lg transition-all duration-200 border border-red-200 dark:border-red-500/30 hover:border-red-300 dark:hover:border-red-500/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span
                                        class="absolute left-1/2 -translate-x-1/2 bottom-full mb-3 px-2 py-1 rounded bg-gray-800 text-white text-xs opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-200 whitespace-nowrap z-10">Hapus</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mb-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0zM21 7a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                <p class="text-gray-400 dark:text-slate-400 text-xl font-semibold mb-2">Belum ada data
                                    dosen</p>
                                <p class="text-gray-500 dark:text-slate-500 text-sm">Mulai dengan menambah dosen baru
                                    atau import data
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{-- Pagination --}}
    @if($dosen->hasPages())
    <div class="mt-6 flex items-center justify-between">
        <div class="flex items-center text-sm text-gray-500 dark:text-slate-400">
            <span>
                Menampilkan {{ $dosen->firstItem() ?? 0 }} - {{ $dosen->lastItem() ?? 0 }}
                dari {{ $dosen->total() }} dosen
            </span>
        </div>
        <nav class="flex items-center space-x-2">
            @if ($dosen->onFirstPage())
            <span
                class="px-3 py-2 text-sm text-gray-400 dark:text-slate-500 bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            @else
            <a href="{{ $dosen->previousPageUrl() }}"
                class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-50 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            @endif
            @foreach ($dosen->getUrlRange(max(1, $dosen->currentPage() - 2), min($dosen->lastPage(),
            $dosen->currentPage() + 2)) as $page => $url)
            @if ($page == $dosen->currentPage())
            <span
                class="px-3 py-2 text-sm text-white bg-blue-600/80 border border-blue-500/50 rounded-lg backdrop-blur-sm font-medium">
                {{ $page }}
            </span>
            @else
            <a href="{{ $url }}"
                class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-50 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-gray-900 dark:hover:text-white">
                {{ $page }}
            </a>
            @endif
            @endforeach
            @if($dosen->currentPage() < $dosen->lastPage() - 2)
                <span class="px-2 py-2 text-gray-400 dark:text-slate-500">...</span>
                <a href="{{ $dosen->url($dosen->lastPage()) }}"
                    class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-50 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-gray-900 dark:hover:text-white">
                    {{ $dosen->lastPage() }}
                </a>
                @endif
                @if ($dosen->hasMorePages())
                <a href="{{ $dosen->nextPageUrl() }}"
                    class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-50 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                @else
                <span
                    class="px-3 py-2 text-sm text-gray-400 dark:text-slate-500 bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                @endif
        </nav>
    </div>
    @endif
</x-app-layout>