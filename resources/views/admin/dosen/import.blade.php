<x-app-layout>
    <div class="grid grid-cols-3 gap-8">
        {{-- Main Upload Form --}}
        <div class="col-span-2">
            <div
                class="bg-white dark:bg-white/[0.03] rounded-2xl border border-gray-200 dark:border-white/10 shadow-none dark:shadow-2xl overflow-hidden">
                {{-- Form Header --}}
                <div
                    class="bg-gradient-to-r from-blue-100 to-blue-50 dark:from-white/5 dark:to-white/10 border-b border-gray-200 dark:border-white/10 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Upload File Excel</h3>
                            <p class="text-gray-500 dark:text-slate-400 text-sm mt-1">Pilih file Excel yang berisi data
                                dosen</p>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-500 dark:text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="text-xs">Format .xlsx</span>
                        </div>
                    </div>
                </div>
                {{-- Form Body --}}
                <div class="p-8">
                    @if (session('success'))
                    <div class="alert alert-success mb-3">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('admin.dosen.import') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-8">
                        @csrf
                        {{-- File Upload Section --}}
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="p-2 bg-emerald-100 dark:bg-emerald-500/20 rounded-lg">
                                    <svg class="w-5 h-5 text-emerald-400 dark:text-emerald-300" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Pilih File Excel</h4>
                            </div>
                            {{-- File Input Area --}}
                            <div class="relative">
                                <input type="file" name="file" id="file" accept=".xlsx,.xls" required
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    onchange="updateFileName(this)">
                                <div id="file-drop-area"
                                    class="border-2 border-dashed border-gray-200 dark:border-white/30 rounded-2xl p-12 text-center hover:border-emerald-400/50 hover:bg-emerald-50 dark:hover:bg-white/5 transition-all duration-300">
                                    <div class="space-y-4">
                                        <div class="flex justify-center">
                                            <div class="p-4 bg-emerald-100 dark:bg-emerald-500/20 rounded-2xl">
                                                <svg class="w-12 h-12 text-emerald-400 dark:text-emerald-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                                                <span id="file-text">Klik untuk memilih file yang akan diupload</span>
                                            </p>
                                            <p class="text-gray-500 dark:text-slate-400 text-sm">File Excel (.xlsx)
                                                maksimal 50MB</p>
                                        </div>
                                        <div id="file-info"
                                            class="hidden mt-4 p-4 bg-gray-100 dark:bg-white/10 rounded-xl border border-gray-200 dark:border-white/20">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-6 h-6 text-emerald-400 dark:text-emerald-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <div class="flex-grow">
                                                    <p id="file-name"
                                                        class="text-gray-900 dark:text-white font-medium truncate text-left">
                                                    </p>
                                                    <p id="file-size"
                                                        class="text-gray-500 dark:text-slate-400 text-sm text-left"></p>
                                                </div>
                                                <button type="button"
                                                    class="ml-2 text-gray-400 dark:text-slate-400 hover:text-emerald-500 dark:hover:text-emerald-400 focus:outline-none"
                                                    title="Ulangi Pemilihan File"
                                                    onclick="document.getElementById('file').value = ''; updateFileName(document.getElementById('file'))">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 16 16" id="reload">
                                                        <path fill="currentColor"
                                                            d="M12.8934669,5.23813406 C13.5790079,5.95613258 14,6.9289023 14,8 C14,10.1421954 12.3160315,11.8910789 10.1996403,11.9951047 L10,12 L6.707,11.9992998 L7.8552536,13.1481468 C8.02881995,13.3217132 8.0481051,13.5911376 7.91310905,13.7860057 L7.8552536,13.8552536 C7.68168725,14.02882 7.41226285,14.0481051 7.21739471,13.9131091 L7.14814682,13.8552536 L5.14644661,11.8535534 C4.97288026,11.679987 4.95359511,11.4105626 5.08859116,11.2156945 L5.14644661,11.1464466 L7.14814682,9.1447464 C7.34340897,8.94948425 7.65999145,8.94948425 7.8552536,9.1447464 C8.02881995,9.31831275 8.0481051,9.58773715 7.91310905,9.78260529 L7.8552536,9.85185318 L6.707,10.9992998 L10,11 C11.5976809,11 12.9036609,9.75108004 12.9949073,8.17627279 L13,8 C13,7.17803719 12.6694335,6.43328233 12.1339912,5.89142621 C12.0521578,5.80330264 12,5.68219197 12,5.5488992 C12,5.27275683 12.2238576,5.0488992 12.5,5.0488992 C12.6227299,5.0488992 12.735132,5.09311799 12.8221436,5.16649294 L12.8934669,5.23813406 Z M8.7843055,2.08689095 L8.85355339,2.1447464 L10.8552536,4.14644661 L10.9131091,4.2156945 C11.0312306,4.38620412 11.0312306,4.61379588 10.9131091,4.7843055 L10.8552536,4.85355339 L8.85355339,6.8552536 L8.7843055,6.91310905 C8.61379588,7.0312306 8.38620412,7.0312306 8.2156945,6.91310905 L8.14644661,6.8552536 L8.08859116,6.78600571 C7.97046961,6.61549609 7.97046961,6.38790433 8.08859116,6.21739471 L8.14644661,6.14814682 L9.294,4.99929979 L6,5 C4.40231912,5 3.09633912,6.24891996 3.00509269,7.82372721 L3,8 C3,8.81955112 3.32862956,9.56234669 3.861301,10.103799 C3.94744785,10.192174 4,10.3136956 4,10.4474913 C4,10.7236337 3.77614237,10.9474913 3.5,10.9474913 C3.36244019,10.9474913 3.23785492,10.8919407 3.14745339,10.8020487 C2.43790261,10.0825182 2,9.09239793 2,8 C2,5.85780461 3.68396847,4.10892112 5.80035966,4.00489531 L6,4 L9.294,3.99929979 L8.14644661,2.85185318 L8.08859116,2.78260529 C7.95359511,2.58773715 7.97288026,2.31831275 8.14644661,2.1447464 C8.32001296,1.97118005 8.58943736,1.9518949 8.7843055,2.08689095 Z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Tampilkan error import jika ada --}}
                            @if ($errors->has('import'))
                            <div class="w-full bg-red-100 dark:bg-red-500/20 border border-red-400 dark:border-red-500 text-red-700 dark:text-red-300 px-4 py-3 rounded relative mt-4 mb-0"
                                role="alert">
                                <strong class="font-bold">Terjadi kesalahan pada data import:</strong>
                                <ul class="mt-2 list-disc list-inside text-sm">
                                    @foreach ($errors->get('import') as $importErrors)
                                    @foreach ((array) $importErrors as $err)
                                    <li>{{ $err }}</li>
                                    @endforeach
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <x-input-error :messages="$errors->get('file')"
                                class="text-red-500 dark:text-red-400 text-sm" />
                        </div>
                        {{-- Form Actions --}}
                        <div
                            class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-white/10">
                            <div class="flex items-center space-x-2 text-gray-500 dark:text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm">Pastikan format file sesuai dengan template</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('admin.dosen.index') }}"
                                    class="px-6 py-3 bg-gray-100 dark:bg-white/10 hover:bg-gray-200 dark:hover:bg-white/20 border border-gray-200 dark:border-white/20 rounded-xl text-gray-700 dark:text-slate-300 hover:text-gray-900 dark:hover:text-white transition-all duration-200 font-medium">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="px-8 py-3 bg-gradient-to-r from-emerald-400 to-green-500 dark:from-emerald-500 dark:to-green-600 hover:from-emerald-500 hover:to-green-600 dark:hover:from-emerald-600 dark:hover:to-green-700 rounded-xl text-white font-semibold dark:shadow-lg dark:hover:shadow-xl transition-all duration-200 flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                                        </path>
                                    </svg>
                                    <span>Upload & Import</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Sidebar Info --}}
        <div class="space-y-6">
            {{-- Template Download --}}
            <div
                class="bg-white dark:bg-white/[0.03] rounded-2xl border border-gray-200 dark:border-white/10 shadow-none dark:shadow-xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-blue-100 dark:bg-blue-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-blue-500 dark:text-blue-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Template Excel</h4>
                </div>
                <p class="text-gray-500 dark:text-slate-400 text-sm mb-4">Download template untuk memastikan format yang
                    benar</p>
                <a href="{{ asset('template_dosen.xlsx') }}" download
                    class="inline-flex items-center space-x-2 px-4 py-2 bg-blue-100 dark:bg-blue-500/20 hover:bg-blue-200 dark:hover:bg-blue-500/30 border border-blue-200 dark:border-blue-400/30 rounded-xl text-blue-600 dark:text-blue-300 hover:text-blue-800 dark:hover:text-blue-200 transition-all duration-200 text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <span>Download Template</span>
                </a>
            </div>
            {{-- Import Instructions --}}
            <div
                class="bg-white dark:bg-white/[0.03] rounded-2xl border border-gray-200 dark:border-white/10 shadow-none dark:shadow-xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-yellow-100 dark:bg-yellow-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-yellow-500 dark:text-yellow-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Petunjuk Import</h4>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-gray-100 dark:bg-white/10 rounded-full flex items-center justify-center text-xs text-gray-900 dark:text-white font-medium mt-0.5">
                            1</div>
                        <p class="text-gray-700 dark:text-slate-300">Download template Excel yang disediakan</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-gray-100 dark:bg-white/10 rounded-full flex items-center justify-center text-xs text-gray-900 dark:text-white font-medium mt-0.5">
                            2</div>
                        <p class="text-gray-700 dark:text-slate-300">Isi data dosen sesuai format template</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-gray-100 dark:bg-white/10 rounded-full flex items-center justify-center text-xs text-gray-900 dark:text-white font-medium mt-0.5">
                            3</div>
                        <p class="text-gray-700 dark:text-slate-300">Pastikan tidak ada kolom yang kosong</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-gray-100 dark:bg-white/10 rounded-full flex items-center justify-center text-xs text-gray-900 dark:text-white font-medium mt-0.5">
                            4</div>
                        <p class="text-gray-700 dark:text-slate-300">Upload file dan tunggu proses import selesai</p>
                    </div>
                </div>
            </div>
            {{-- Format Requirements --}}
            <div
                class="bg-white dark:bg-white/[0.03] rounded-2xl border border-gray-200 dark:border-white/10 shadow-none dark:shadow-xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-red-100 dark:bg-red-500/20 rounded-lg">
                        <svg class="w-5 h-5 text-red-500 dark:text-red-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.314 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Persyaratan</h4>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center space-x-2">
                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full"></div>
                        <p class="text-gray-700 dark:text-slate-300">File harus berformat .xlsx</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full"></div>
                        <p class="text-gray-700 dark:text-slate-300">Maksimal ukuran file 50MB</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full"></div>
                        <p class="text-gray-700 dark:text-slate-300">Email harus unique</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full"></div>
                        <p class="text-gray-700 dark:text-slate-300">NIP harus unique</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function updateFileName(input) {
        const fileInfo = document.getElementById('file-info');
        const fileName = document.getElementById('file-name');
        const fileSize = document.getElementById('file-size');
        const fileText = document.getElementById('file-text');
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const size = (file.size / 1024 / 1024).toFixed(2);
            fileName.textContent = file.name;
            fileSize.textContent = `${size} MB`;
            fileText.textContent = 'File dipilih';
            fileInfo.classList.remove('hidden');
        } else {
            fileText.textContent = 'Klik untuk memilih file yang akan diupload';
            fileInfo.classList.add('hidden');
        }
    }
    </script>
</x-app-layout>