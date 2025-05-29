<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Upload & Kelola Format Laporan
        </h2>
    </x-slot>

    <div class="p-6 bg-white shadow rounded-xl space-y-6">

        @if (session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
        @endif

        <!-- Form Upload Format -->
        <form action="{{ route('admin.format.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="nama" :value="'Nama Format Laporan'" />
                <x-text-input name="nama" id="nama" class="block w-full mt-1" required />
                <x-input-error :messages="$errors->get('nama')" />
            </div>

            <div>
                <x-input-label for="file" :value="'File (PDF / DOCX)'" />
                <input type="file" name="file" id="file"
                    class="block w-full mt-1 border border-gray-300 rounded p-2 text-sm" accept=".pdf,.doc,.docx"
                    required />
                <x-input-error :messages="$errors->get('file')" />
            </div>

            <x-primary-button>Upload Format</x-primary-button>
        </form>

        <!-- Daftar Format Laporan -->
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full border text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">File</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($format as $i => $file)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $i + 1 }}</td>
                        <td class="px-4 py-2">{{ $file->nama }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ asset('storage/' . $file->file) }}" target="_blank"
                                class="text-blue-600 underline">
                                Download
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('admin.format.destroy', $file->id) }}" method="POST"
                                onsubmit="return confirm('Hapus file ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-2 text-gray-500">Belum ada format laporan diupload.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>