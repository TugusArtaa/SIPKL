<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white">Mahasiswa Bimbingan</h2>
    </x-slot>

    <div class="bg-white/5 backdrop-blur p-6 rounded-lg border border-white/10 shadow-md mt-6">
        @if($mahasiswa->count() > 0)
        <table class="min-w-full divide-y divide-white/10">
            <thead>
                <tr class="text-white text-left text-sm uppercase tracking-wider">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Program Studi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10 text-white">
                @foreach($mahasiswa as $index => $item)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $item->mahasiswa->nama }}</td>
                    <td class="px-4 py-2">{{ $item->mahasiswa->nim }}</td>
                    <td class="px-4 py-2">{{ $item->mahasiswa->program_studi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-slate-300">Belum ada mahasiswa yang dibimbing.</p>
        @endif
    </div>
</x-app-layout>