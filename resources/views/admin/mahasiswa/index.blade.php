<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Daftar Mahasiswa
        </h2>
    </x-slot>

    <div class="p-6 bg-white shadow rounded-xl">
        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('admin.mahasiswa.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                + Tambah Mahasiswa
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIM</th>
                        <th class="px-4 py-2">Program Studi</th>
                        <th class="px-4 py-2">Kelas</th>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $index => $mhs)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $mhs->nama }}</td>
                        <td class="px-4 py-2">{{ $mhs->nim }}</td>
                        <td class="px-4 py-2">{{ $mhs->program_studi }}</td>
                        <td class="px-4 py-2">{{ $mhs->kelas }}</td>
                        <td class="px-4 py-2">{{ $mhs->semester }}</td>
                        <td class="px-4 py-2">{{ $mhs->user->email ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center px-4 py-2 text-gray-500">Belum ada data mahasiswa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>