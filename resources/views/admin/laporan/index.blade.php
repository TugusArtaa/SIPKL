<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Verifikasi Laporan PKL
        </h2>
    </x-slot>

    <div class="p-6 bg-white shadow rounded-xl">
        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama Mahasiswa</th>
                        <th class="px-4 py-2">NIM</th>
                        <th class="px-4 py-2">File Laporan</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $index => $lapor)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $lapor->mahasiswa->nama }}</td>
                        <td class="px-4 py-2">{{ $lapor->mahasiswa->nim }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ asset('storage/' . $lapor->file) }}" class="text-blue-600 underline"
                                target="_blank">
                                Lihat File
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            @php
                            $statusColors = [
                            'pending' => 'bg-yellow-200 text-yellow-800',
                            'diterima' => 'bg-green-200 text-green-800',
                            'ditolak' => 'bg-red-200 text-red-800',
                            ];
                            @endphp
                            <span
                                class="px-2 py-1 rounded text-xs font-semibold {{ $statusColors[$lapor->status] ?? 'bg-gray-200 text-gray-800' }}">
                                {{ ucfirst($lapor->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('admin.laporan.verifikasi.process', $lapor->id) }}" method="POST"
                                class="flex gap-2">
                                @csrf
                                <select name="status" class="border rounded px-2 py-1 text-sm" required>
                                    <option value="">-- Verifikasi --</option>
                                    <option value="diterima">Diterima</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm rounded">
                                    Simpan
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center px-4 py-3 text-gray-500">Belum ada laporan PKL.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>