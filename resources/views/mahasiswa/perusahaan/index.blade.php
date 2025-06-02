<x-app-layout>
    {{-- Header Section --}}
    <div
        class="mb-8 bg-white/90 dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 dark:shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">List Perusahaan Mitra</h1>
                <p class="text-gray-900 dark:text-blue-100 text-sm">Daftar perusahaan yang dapat dijadikan referensi
                    untuk PKl nantinya.
                </p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Area Tombol --}}
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-gray-600 dark:text-slate-400 text-sm">Total keseluruhan perusahaan:
                {{ $perusahaan->total() }}</p>
        </div>
        <a href="https://wa.me/6285895859312?text=Halo%20Admin,%20saya%20ingin%20mengajukan%20saran%20perusahaan%20baru%20untuk%20PKL%3A%0ANama%20Perusahaan%3A%0AAlamat%20Usaha%3A%0ANo.%20HP%3A"
            class="inline-flex items-center px-6 py-3 bg-blue-500/90 dark:bg-blue-500/80 hover:bg-blue-600 dark:hover:bg-blue-500 text-white font-semibold rounded-lg transition-all duration-200 backdrop-blur-sm border border-blue-400/30 hover:border-blue-400/50 dark:shadow-lg dark:hover:shadow-blue-500/25"
            target="_blank" rel="noopener noreferrer">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Saran Perusahaan Baru
        </a>
    </div>

    {{-- Tabel Perusahaan --}}
    <div
        class="backdrop-blur-sm bg-white/80 dark:bg-white/5 rounded-xl border border-gray-200 dark:border-white/10 overflow-hidden dark:shadow-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-white/10 bg-gray-100/80 dark:bg-slate-700/30">
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-10">
                            No.
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            Nama
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            Alamat
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            No.
                            HP</th>
                        <th
                            class="px-6 py-4 text-center text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse($perusahaan as $index => $item)
                    <tr class="hover:bg-gray-100/60 dark:hover:bg-white/5 transition-colors duration-200">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-slate-300 font-medium max-w-[64px] truncate overflow-hidden">
                            {{ $perusahaan->firstItem() + $index }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium max-w-[260px] truncate overflow-hidden">
                            {{ $item->nama }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 max-w-[260px] truncate overflow-hidden">
                            {{ $item->alamat }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 max-w-[128px] truncate overflow-hidden">
                            {{ $item->no_hp }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center max-w-[128px]">
                            <a href="https://wa.me/{{ preg_replace('/^08/', '628', preg_replace('/[^0-9]/', '', $item->no_hp)) }}?text={{ urlencode('Mohon maaf mengganggu sebelumnya, saya izin bertanya apakah ada lowongan PKL di perusahaan ini?') }}"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100/60 dark:bg-green-600/20 hover:bg-green-200/80 dark:hover:bg-green-600/30 text-green-700 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 text-sm font-medium rounded-lg transition-all duration-200 border border-green-300 dark:border-green-500/30 hover:border-green-400 dark:hover:border-green-500/50 mr-2"
                                target="_blank" rel="noopener noreferrer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.148-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.007-.372-.009-.571-.009-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.099 3.2 5.077 4.363.71.306 1.263.489 1.695.625.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 6.318h-.001a9.87 9.87 0 01-4.988-1.357l-.357-.213-3.711.982.993-3.617-.232-.372a9.86 9.86 0 01-1.51-5.26c.001-5.455 4.436-9.89 9.893-9.89 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.456-4.438 9.891-9.879 9.891zm8.413-18.282A11.815 11.815 0 0012.05 0C5.495 0 .06 5.435.058 12.086c0 2.13.557 4.213 1.615 6.045L.057 24l6.063-1.625a11.888 11.888 0 005.929 1.515h.005c6.554 0 11.989-5.435 11.991-12.086a11.86 11.86 0 00-3.49-8.484z" />
                                </svg>
                                Hubungi
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mb-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <p class="text-gray-500 dark:text-slate-400 text-xl font-semibold mb-2">Belum ada data
                                    perusahaan</p>
                                <p class="text-gray-400 dark:text-slate-500 text-sm">Mulai dengan menambah perusahaan
                                    baru</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if($perusahaan->hasPages())
    <div class="mt-6 flex items-center justify-between">
        {{-- Info pagination --}}
        <div class="flex items-center text-sm text-gray-600 dark:text-slate-400">
            <span>
                Menampilkan {{ $perusahaan->firstItem() ?? 0 }} - {{ $perusahaan->lastItem() ?? 0 }}
                dari {{ $perusahaan->total() }} perusahaan
            </span>
        </div>

        {{-- Navigation pagination --}}
        <nav class="flex items-center space-x-2">
            {{-- Previous Button --}}
            @if ($perusahaan->onFirstPage())
            <span
                class="px-3 py-2 text-sm text-gray-400 dark:text-slate-500 bg-white/80 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            @else
            <a href="{{ $perusahaan->previousPageUrl() }}"
                class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-white/80 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($perusahaan->getUrlRange(max(1, $perusahaan->currentPage() - 2), min($perusahaan->lastPage(),
            $perusahaan->currentPage() + 2)) as $page => $url)
            @if ($page == $perusahaan->currentPage())
            <span
                class="px-3 py-2 text-sm text-white dark:text-white bg-blue-600/90 dark:bg-blue-600/80 border border-blue-500/50 rounded-lg backdrop-blur-sm font-medium">
                {{ $page }}
            </span>
            @else
            <a href="{{ $url }}"
                class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-white/80 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-gray-900 dark:hover:text-white">
                {{ $page }}
            </a>
            @endif
            @endforeach

            {{-- Show dots jika ada banyak halamannya --}}
            @if($perusahaan->currentPage() < $perusahaan->lastPage() - 2)
                <span class="px-2 py-2 text-gray-400 dark:text-slate-500">...</span>
                <a href="{{ $perusahaan->url($perusahaan->lastPage()) }}"
                    class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-white/80 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-gray-900 dark:hover:text-white">
                    {{ $perusahaan->lastPage() }}
                </a>
                @endif

                {{-- Next Button --}}
                @if ($perusahaan->hasMorePages())
                <a href="{{ $perusahaan->nextPageUrl() }}"
                    class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-white/80 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                @else
                <span
                    class="px-3 py-2 text-sm text-gray-400 dark:text-slate-500 bg-white/80 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                @endif
        </nav>
    </div>
    @endif
</x-app-layout>