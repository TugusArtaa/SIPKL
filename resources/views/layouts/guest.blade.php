<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIPTI - Sistem Informasi PKL TI') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-white antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-slate-900 via-blue-500 to-cyan-400 animate-[gradient_15s_ease_infinite] bg-[length:400%_400%]">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 rounded-xl shadow-xl backdrop-blur-md bg-white/10 border border-white/30">
            {{ $slot }}
        </div>
        <!-- Version Info -->
        <div class="text-center mt-6">
            <p class="text-white/70 text-xs drop-shadow-sm">
                SIPTI v1.0 &mdash; Crafted with Laravel & Tailwind CSS by <span
                    class="font-semibold">@KomangSuryana</span>
            </p>
        </div>
    </div>
</body>


</html>