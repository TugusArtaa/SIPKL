<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Import Data Mahasiswa</h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.mahasiswa.import') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="file" class="form-label">Pilih File Excel (.xlsx)</label>
                <input type="file" name="file" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</x-app-layout>