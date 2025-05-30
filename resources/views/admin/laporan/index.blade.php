<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Verifikasi Laporan PKL</h1>
                <p class="text-blue-100 text-sm">Tinjau dan ubah status laporan berdasarkan hasil pemeriksaan</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="mb-6 bg-emerald-500/10 backdrop-blur-sm text-emerald-300 border border-emerald-500/30 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel --}}
    <div class="overflow-hidden rounded-xl border border-white/10 backdrop-blur-sm bg-white/5">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wider">
                            No.
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wider">
                            Nama Mahasiswa</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wider">
                            NIM</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wider">
                            File Laporan</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wider">
                            Ganti Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($laporan as $index => $lapor)
                    <tr class="hover:bg-white/5 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-slate-300">{{ $laporan->firstItem() + $index }}</td>
                        <td class="px-6 py-4 text-sm text-slate-300 font-medium">{{ $lapor->mahasiswa->nama }}</td>
                        <td class="px-6 py-4 text-sm text-slate-300">{{ $lapor->mahasiswa->nim }}</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ asset('storage/' . $lapor->file) }}"
                                class="text-blue-400 hover:text-blue-300 underline underline-offset-2 transition-colors duration-200 flex items-center gap-2"
                                target="_blank">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Lihat File
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            @php
                            $statusStyles = [
                            'pending' => 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30',
                            'diterima' => 'bg-green-500/20 text-green-300 border-green-500/30',
                            'ditolak' => 'bg-red-500/20 text-red-300 border-red-500/30',
                            ];
                            @endphp
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border backdrop-blur-sm {{ $statusStyles[$lapor->status] ?? 'bg-slate-500/20 text-slate-300 border-slate-500/30' }}">
                                @if($lapor->status === 'pending')
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                @elseif($lapor->status === 'diterima')
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                @elseif($lapor->status === 'ditolak')
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                @endif
                                {{ ucfirst($lapor->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <form action="{{ route('admin.laporan.verifikasi.process', $lapor->id) }}" method="POST"
                                class="flex items-center gap-3">
                                @csrf
                                <select name="status"
                                    class="bg-white/5 border border-white/20 rounded-lg px-3 py-2 text-sm text-slate-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all duration-200 min-w-[120px]"
                                    required>
                                    <option value="" class="bg-slate-800 text-slate-300">-- Pilih Status --</option>
                                    <option value="diterima" class="bg-slate-800 text-slate-300">Diterima</option>
                                    <option value="ditolak" class="bg-slate-800 text-slate-300">Ditolak</option>
                                </select>
                                <button type="submit"
                                    class="bg-blue-600/80 hover:bg-blue-600 text-white px-4 py-2 text-sm rounded-lg transition-all duration-200 backdrop-blur-sm border border-blue-500/20 hover:border-blue-500/40 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center px-6 py-12">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-slate-500 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <p class="text-slate-400 text-lg font-medium">Belum ada laporan PKL</p>
                                <p class="text-slate-500 text-sm mt-1">Laporan yang disubmit mahasiswa akan muncul di
                                    sini</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($laporan->hasPages())
    <div class="mt-6 flex items-center justify-between">
        {{-- Info pagination --}}
        <div class="flex items-center text-sm text-slate-400">
            <span>
                Menampilkan {{ $laporan->firstItem() ?? 0 }} - {{ $laporan->lastItem() ?? 0 }}
                dari {{ $laporan->total() }} laporan
            </span>
        </div>

        {{-- Navigation pagination --}}
        <nav class="flex items-center space-x-2">
            {{-- Previous Button --}}
            @if ($laporan->onFirstPage())
            <span
                class="px-3 py-2 text-sm text-slate-500 bg-white/5 border border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            @else
            <a href="{{ $laporan->previousPageUrl() }}"
                class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($laporan->getUrlRange(max(1, $laporan->currentPage() - 2), min($laporan->lastPage(),
            $laporan->currentPage() + 2)) as $page => $url)
            @if ($page == $laporan->currentPage())
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
            @if($laporan->currentPage() < $laporan->lastPage() - 2)
                <span class="px-2 py-2 text-slate-500">...</span>
                <a href="{{ $laporan->url($laporan->lastPage()) }}"
                    class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm hover:text-white">
                    {{ $laporan->lastPage() }}
                </a>
                @endif

                {{-- Next Button --}}
                @if ($laporan->hasMorePages())
                <a href="{{ $laporan->nextPageUrl() }}"
                    class="px-3 py-2 text-sm text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                @else
                <span
                    class="px-3 py-2 text-sm text-slate-500 bg-white/5 border border-white/10 rounded-lg cursor-not-allowed backdrop-blur-sm">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                @endif
        </nav>
    </div>
    @endif
</x-app-layout>