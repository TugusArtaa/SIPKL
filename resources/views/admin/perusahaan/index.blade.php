<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Daftar Perusahaan Mitra</h2>
    </x-slot>

    <div class="p-6 bg-white/10 text-white shadow rounded-xl space-y-4">
        <a href="{{ route('admin.perusahaan.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow inline-block text-sm font-semibold">
            + Tambah Perusahaan
        </a>

        @if(session('success'))
        <div class="text-green-400 text-sm">{{ session('success') }}</div>
        @endif

        <table class="w-full text-sm mt-4 bg-white/5 rounded-xl overflow-hidden">
            <thead class="bg-white/10 text-left">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Alamat</th>
                    <th class="p-3">No. HP</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($perusahaan as $item)
                <tr class="border-b border-white/10">
                    <td class="p-3">{{ $item->nama }}</td>
                    <td class="p-3">{{ $item->alamat }}</td>
                    <td class="p-3">{{ $item->no_hp }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.perusahaan.edit', $item) }}"
                            class="text-blue-400 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.perusahaan.destroy', $item) }}"
                            onsubmit="return confirm('Hapus perusahaan ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-400">Belum ada data perusahaan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>