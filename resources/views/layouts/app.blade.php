<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SIPKL - Sistem Informasi PKL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 min-h-screen">
    <x-navbar />

    <div class="flex min-h-screen pt-16">
        <div class="w-72 fixed left-0 top-16 h-full backdrop-blur-xl bg-white dark:bg-slate-900 border-r border-gray-200 dark:border-white/10 dark:shadow-2xl z-40"
            x-data="{ collapsed: false }">

            <!-- Sidebar Content -->
            <div class="p-4" :class="collapsed ? 'px-2' : 'px-4'">
                @if(Auth::user()->role === 'mahasiswa')
                <x-sidebar-mahasiswa :collapsed="false" />
                @elseif(Auth::user()->role === 'dosen')
                <x-sidebar-dosen :collapsed="false" />
                @elseif(Auth::user()->role === 'admin')
                <x-sidebar-admin :collapsed="false" />
                @endif
            </div>
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 ml-72 p-6 transition-all duration-300">
            <div
                class="mt-4 backdrop-blur-xl bg-white dark:bg-white/5 rounded-xl border border-gray-200 dark:border-white/10 dark:shadow-2xl min-h-[calc(100vh-8rem)] p-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    @stack('modals')
</body>

</html>