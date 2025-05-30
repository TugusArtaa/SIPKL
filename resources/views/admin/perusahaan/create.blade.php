<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Tambah Perusahaan</h2>
    </x-slot>

    <div class="p-6 bg-white/10 text-white rounded shadow max-w-xl mx-auto">
        <form method="POST" action="{{ route('admin.perusahaan.store') }}" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="nama" value="Nama Perusahaan" />
                <x-text-input name="nama" id="nama" class="w-full mt-1" required />
                <x-input-error :messages="$errors->get('nama')" />
            </div>

            <div>
                <x-input-label for="alamat" value="Alamat" />
                <x-text-input name="alamat" id="alamat" class="w-full mt-1" required />
                <x-input-error :messages="$errors->get('alamat')" />
            </div>

            <div>
                <x-input-label for="no_hp" value="No. HP" />
                <x-text-input name="no_hp" id="no_hp" class="w-full mt-1" required />
                <x-input-error :messages="$errors->get('no_hp')" />
            </div>

            <x-primary-button>Simpan</x-primary-button>
        </form>
    </div>
</x-app-layout>