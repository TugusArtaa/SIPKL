<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Tambah Mahasiswa
        </h2>
    </x-slot>

    <div class="p-6 bg-white shadow rounded-xl">
        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="nama" :value="'Nama Lengkap'" />
                    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error :messages="$errors->get('nama')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="nim" :value="'NIM'" />
                    <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('nim')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="program_studi" :value="'Program Studi'" />
                    <x-text-input id="program_studi" name="program_studi" type="text" class="mt-1 block w-full"
                        required />
                    <x-input-error :messages="$errors->get('program_studi')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="kelas" :value="'Kelas'" />
                    <x-text-input id="kelas" name="kelas" type="text" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('kelas')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="semester" :value="'Semester'" />
                    <x-text-input id="semester" name="semester" type="number" min="1" class="mt-1 block w-full"
                        required />
                    <x-input-error :messages="$errors->get('semester')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="email" :value="'Email Mahasiswa'" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
            </div>

            <div class="mt-6">
                <x-primary-button>
                    Simpan Mahasiswa
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>