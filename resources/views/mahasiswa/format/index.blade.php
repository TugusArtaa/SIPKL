<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Download Format Laporan PKL
        </h2>
    </x-slot>

    <div class="p-6 bg-white shadow rounded-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full border text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($format as $i => $file)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $i + 1 }}</td>
                        <td class="px-4 py-2">{{ $file->nama }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ asset('storage/' . $file->file) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                Unduh
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-2 text-gray-500">Belum ada format laporan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>