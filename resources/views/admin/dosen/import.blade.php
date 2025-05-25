<x-app-layout>
    <x-slot name="header">
        <h2>Import Data Dosen</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.dosen.import') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="file">Pilih File Excel (.xlsx)</label>
                <input type="file" name="file" required class="form-control">
            </div>

            <button class="btn btn-primary">Upload</button>
        </form>
    </div>
</x-app-layout>