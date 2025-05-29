<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Tambah Dosen
        </h2>
    </x-slot>

    <div class="p-6 bg-white shadow rounded-xl">
        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('admin.dosen.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="nama" :value="'Nama Lengkap'" />
                    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error :messages="$errors->get('nama')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="nip" :value="'NIP'" />
                    <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('nip')" class="mt-1" />
                </div>

                <div class="md:col-span-2">
                    <x-input-label for="email" :value="'Email Dosen'" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
            </div>

            <div class="mt-6">
                <x-primary-button>
                    Simpan Dosen
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>