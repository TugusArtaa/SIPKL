@props(['route', 'label', 'icon' => null, 'collapsed' => false])

@php
$isActive = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
    class="group relative flex items-center px-3 py-3 rounded-xl text-sm font-medium transition-all duration-200 mb-2 text-black dark:text-white
   {{ $isActive
    ? 'bg-gradient-to-r from-blue-500/20 to-cyan-500/20 border border-blue-500/30 shadow-lg'
    : 'hover:bg-gray-100 dark:hover:bg-white/10 hover:border-gray-200 dark:hover:border-white/20 border border-transparent' }}">

    <!-- Active Indikator -->
    @if($isActive)
    <div
        class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-blue-400 to-cyan-400 rounded-r-full">
    </div>
    @endif

    <!-- Icon -->
    @if($icon)
    <div class="flex-shrink-0 w-5 h-5 mr-3 {{ $collapsed ? 'mx-auto' : '' }}">
        {!! $icon !!}
    </div>
    @else
    <!-- Icon -->
    <div class="flex-shrink-0 w-5 h-5 mr-3 {{ $collapsed ? 'mx-auto' : '' }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
    </div>
    @endif

    <!-- Label -->
    @if(!$collapsed)
    <span class="flex-1">{{ $label }}</span>
    @if($isActive)
    <svg class="w-4 h-4 ml-2 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
    </svg>
    @endif
    @endif
</a>