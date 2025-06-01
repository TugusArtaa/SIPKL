<x-app-layout>
    {{-- Header Section --}}
    <div class="mb-8 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Jadwal Bimbingan</h1>
                <p class="text-blue-100 text-sm">Lihat jadwal mahasiswa bimbingan Anda dan verifikasilah permintaan
                    bimbingan</p>
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

    {{-- Jadwal Bimbingan --}}
    <div class="mb-12 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="border-b border-white/10 pb-4 mb-6">
            <h3 class="text-xl font-semibold text-white flex items-center">
                <div class="w-1 h-6 bg-gradient-to-b from-emerald-400 to-emerald-600 rounded-full mr-3"></div>
                Jadwal Bimbingan Terverifikasi
            </h3>
            <p class="text-slate-400 text-sm mt-2">Daftar bimbingan yang telah diverifikasi dan disetujui selama 7 hari
                kedepan</p>
        </div>

        @if($terverifikasi->count())
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
                                Nama Mahasiswa</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                Tanggal Bimbingan</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                Catatan</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($terverifikasi as $index => $item)
                        <tr class="hover:bg-white/5 transition-all duration-200 group">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                                <div
                                    class="w-8 h-8 bg-slate-700/50 rounded-full flex items-center justify-center text-xs font-medium group-hover:bg-slate-600/50 transition-colors">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-white">{{ $item->mahasiswa->nama }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->isoFormat('dddd, D MMMM YYYY') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-300">
                                <div class="max-w-xs">
                                    @if($item->catatan)
                                    <p class="text-slate-300 leading-relaxed">{{ $item->catatan }}</p>
                                    @else
                                    <span class="text-slate-500 italic">Tidak ada catatan</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $item->status === 'disetujui' ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' :
                                ($item->status === 'ditolak' ? 'bg-red-500/20 text-red-300 border border-red-500/30' :
                                    'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30') }}">
                                    @if($item->status === 'disetujui')
                                    <svg class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @elseif($item->status === 'ditolak')
                                    <svg class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                    @endif
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
            <p class="text-slate-400 text-lg font-medium mb-2">Belum Ada Jadwal Terverifikasi</p>
            <p class="text-slate-500 text-sm">Jadwal bimbingan yang telah diverifikasi akan muncul di sini</p>
        </div>
        @endif
    </div>

    {{-- Permintaan Verifikasi --}}
    <div class="mb-12 bg-white/[0.03] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div class="border-b border-white/10 pb-4 mb-6">
            <h3 class="text-xl font-semibold text-white flex items-center">
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-amber-600 rounded-full mr-3"></div>
                Permintaan Verifikasi Bimbingan
            </h3>
            <p class="text-slate-400 text-sm mt-2">Daftar permintaan bimbingan yang menunggu verifikasi dari Anda</p>
        </div>

        @if($pending->count())
        <div class="space-y-4">
            @foreach($pending as $index => $item)
            <div
                class="bg-slate-800/30 rounded-lg border border-white/5 p-6 hover:border-white/10 transition-all duration-200">
                <div
                    class="flex flex-col lg:flex-row lg:items-start lg:justify-between space-y-4 lg:space-y-0 lg:space-x-6">
                    {{-- Mahasiswa Info --}}
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ substr($item->mahasiswa->nama, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-lg">{{ $item->mahasiswa->nama }}</h4>
                                <div class="flex items-center space-x-2 text-sm text-slate-400">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->isoFormat('dddd, D MMMM YYYY') }}</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-500/20 text-amber-300 border border-amber-500/30">
                            <svg class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"
                                    clip-rule="evenodd" />
                            </svg>
                            Menunggu Verifikasi
                        </div>
                        @if($item->catatan)
                        <div
                            class="mt-3 bg-yellow-100/20 border-l-4 border-yellow-400 shadow-md rounded-md px-4 py-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-yellow-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 3v4a1 1 0 001 1h4M21 7l-1.414-1.414A2 2 0 0017.172 4H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V7z" />
                            </svg>
                            <div>
                                <span class="font-semibold text-white">Catatan:</span>
                                <span class="italic text-white/80">{{ $item->catatan }}</span>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Aksi Verifikasi --}}
                    <div class="lg:w-96" x-data="{ action: 'disetujui' }">
                        <form action="{{ route('dosen.bimbingan.verifikasi', $item->id) }}" method="POST"
                            class="space-y-4">
                            @csrf
                            <input type="hidden" name="status" x-bind:value="action">

                            {{-- Aksi --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-3">Pilih Aksi
                                    Verifikasi</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label
                                        class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all duration-200"
                                        :class="action === 'disetujui' ? 'bg-emerald-500/20 border-emerald-500/50 text-emerald-300' : 'bg-slate-700/30 border-slate-600/50 text-slate-400 hover:border-slate-500/50'">
                                        <input type="radio" name="action_type" value="disetujui" x-model="action"
                                            class="sr-only">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-medium text-sm">Setuju</span>
                                        </div>
                                    </label>

                                    <label
                                        class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all duration-200"
                                        :class="action === 'ditolak' ? 'bg-red-500/20 border-red-500/50 text-red-300' : 'bg-slate-700/30 border-slate-600/50 text-slate-400 hover:border-slate-500/50'">
                                        <input type="radio" name="action_type" value="ditolak" x-model="action"
                                            class="sr-only">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                            </svg>
                                            <span class="font-medium text-sm">Tolak</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- Catatan --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">
                                    <span x-show="action === 'disetujui'">Catatan Persetujuan <span
                                            class="text-red-400">*</span></span>
                                    <span x-show="action === 'ditolak'">Alasan Penolakan <span
                                            class="text-red-400">*</span></span>
                                </label>
                                <textarea name="catatan" required
                                    :placeholder="action === 'disetujui' ? 'Tambahkan catatan untuk mahasiswa...' : 'Jelaskan alasan penolakan untuk memberikan feedback kepada mahasiswa...'"
                                    rows="3"
                                    class="w-full text-sm bg-slate-700/50 text-white border border-slate-600/50 rounded-lg px-4 py-3 resize-none outline-none transition-all duration-200 placeholder-slate-500"
                                    :class="action === 'disetujui' ? 'focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500/50' : 'focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50'"></textarea>
                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-3 font-semibold rounded-lg text-sm shadow-lg transition-all duration-200 group"
                                :class="action === 'disetujui' ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white' : 'bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform">
                                    <path x-show="action === 'disetujui'" fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                    <path x-show="action === 'ditolak'"
                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                                <span x-show="action === 'disetujui'">Setujui Bimbingan</span>
                                <span x-show="action === 'ditolak'">Tolak Bimbingan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="w-16 h-16 mx-auto mb-4 bg-slate-700/50 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <p class="text-slate-400 text-lg font-medium mb-2">Tidak Ada Permintaan Verifikasi</p>
            <p class="text-slate-500 text-sm">Semua permintaan bimbingan telah diverifikasi</p>
        </div>
        @endif
    </div>
</x-app-layout>