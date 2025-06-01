<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white">Jadwal Bimbingan Mahasiswa</h2>
    </x-slot>

    @if(session('success'))
    <div class="bg-green-600 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white/5 rounded-xl border border-white/10 p-6 shadow">
        <table class="min-w-full text-sm text-white">
            <thead class="text-left text-slate-300 bg-slate-700/30">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Mahasiswa</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Catatan</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @foreach($bimbingan as $index => $item)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $item->mahasiswa->nama }}</td>
                    <td class="px-4 py-2">{{ $item->tanggal_bimbingan }}</td>
                    <td class="px-4 py-2">{{ $item->catatan ?? '-' }}</td>
                    <td class="px-4 py-2 capitalize">{{ $item->status }}</td>
                    <td class="px-4 py-2">
                        @if($item->status === 'pending')
                        <form action="{{ route('dosen.bimbingan.verifikasi', $item->id) }}" method="POST"
                            class="inline-flex gap-2">
                            @csrf
                            <input type="hidden" name="status" value="disetujui">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1 rounded">Setujui</button>
                        </form>
                        <form action="{{ route('dosen.bimbingan.verifikasi', $item->id) }}" method="POST"
                            class="inline-flex gap-2">
                            @csrf
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded">Tolak</button>
                        </form>
                        @else
                        <span class="text-sm text-slate-400 italic">Sudah diverifikasi</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>