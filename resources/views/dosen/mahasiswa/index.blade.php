<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Daftar Mahasiswa Bimbingan</h1>
                <p class="text-blue-100 text-sm">Lihat daftar mahasiswa yang Anda bimbing di bawah ini.</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    <div class="mb-12 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="border-b border-white/10 pb-4 mb-6">
            <h3 class="text-xl font-semibold text-white flex items-center">
                <div class="w-1 h-6 bg-gradient-to-b from-emerald-400 to-emerald-600 rounded-full mr-3"></div>
                Mahasiswa Bimbingan
            </h3>
            <p class="text-slate-400 text-sm mt-2">Daftar mahasiswa yang sedang Anda bimbing</p>
        </div>

        @if($mahasiswa->count() > 0)
        <div class="bg-slate-800/30 rounded-lg border border-white/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-slate-700/20 border-b border-white/5">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                No</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                Nama</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                NIM</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                Program Studi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($mahasiswa as $index => $item)
                        <tr class="hover:bg-white/5 transition-all duration-200 group">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                                <div
                                    class="w-8 h-8 bg-slate-700/50 rounded-full flex items-center justify-center text-xs font-medium group-hover:bg-slate-600/50 transition-colors">
                                    {{ $index + $mahasiswa->firstItem() }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-white">{{ $item->nama }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">{{ $item->nim }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                                {{ $item->program_studi }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">
            {{-- Custom Pagination ala referensi --}}
            @if($mahasiswa->hasPages())
            <div class="flex items-center justify-between">
                {{-- Info pagination --}}
                <div class="flex items-center text-sm text-slate-400">
                    <span>
                        Menampilkan {{ $mahasiswa->firstItem() ?? 0 }} - {{ $mahasiswa->lastItem() ?? 0 }}
                        dari {{ $mahasiswa->total() }} mahasiswa
                    </span>
                </div>
                {{-- Navigation pagination --}}
                <nav class="flex items-center space-x-2">
                    {{-- Previous Button --}}
                    @if ($mahasiswa->onFirstPage())
                    <span
                        class="px-3 py-2 text-sm text-slate-500 bg-white/5 border border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </span>
                    @else
                    <a href="{{ $mahasiswa->previousPageUrl() }}"
                        class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($mahasiswa->getUrlRange(max(1, $mahasiswa->currentPage() - 2), min($mahasiswa->lastPage(),
                    $mahasiswa->currentPage() + 2)) as $page => $url)
                    @if ($page == $mahasiswa->currentPage())
                    <span
                        class="px-3 py-2 text-sm text-white bg-blue-600/80 border border-blue-500/50 rounded-lg backdrop-blur-sm font-medium">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}"
                        class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-white">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach

                    {{-- Show dots jika ada banyak halamannya --}}
                    @if($mahasiswa->currentPage() < $mahasiswa->lastPage() - 2)
                        <span class="px-2 py-2 text-slate-500">...</span>
                        <a href="{{ $mahasiswa->url($mahasiswa->lastPage()) }}"
                            class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-white">
                            {{ $mahasiswa->lastPage() }}
                        </a>
                        @endif

                        {{-- Next Button --}}
                        @if ($mahasiswa->hasMorePages())
                        <a href="{{ $mahasiswa->nextPageUrl() }}"
                            class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                        @else
                        <span
                            class="px-3 py-2 text-sm text-slate-500 bg-white/5 border border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </span>
                        @endif
                </nav>
            </div>
            @endif
        </div>

        @else
        <div class="text-center py-12">
            <div class="w-16 h-16 mx-auto mb-4 bg-slate-700/50 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c0 .621.504 1.125 1.125 1.125H18a2.25 2.25 0 002.25-2.25M6 7.5h3v4.875c0 .621.504 1.125 1.125 1.125H15M6 7.5h3v4.875c0 .621.504 1.125 1.125 1.125H15" />
                </svg>
            </div>
            <p class="text-slate-400 text-lg font-medium mb-2">Belum Ada Mahasiswa Bimbingan</p>
            <p class="text-slate-500 text-sm">Mahasiswa yang Anda bimbing akan muncul di sini</p>
        </div>
        @endif
    </div>
</x-app-layout>