<header
    class="fixed top-0 left-0 right-0 z-50 backdrop-blur-xl bg-white dark:bg-slate-900/80 border-b border-gray-200 dark:border-white/10 dark:shadow-2xl">
    <div class="px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <div
                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h2
                        class="text-xl font-bold bg-gradient-to-r from-gray-900 to-gray-500 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        SIPKL
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 -mt-1">Sistem Informasi PKL TI</p>
                </div>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">

                <!-- Dark/Light Mode Toggle -->
                <button id="theme-toggle"
                    class="flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-200 text-yellow-500 dark:text-gray-200 mr-2"
                    title="Toggle Light/Dark Mode">
                    <svg id="theme-toggle-light-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4V2m0 20v-2M4.22 4.22l-1.42-1.42M19.78 19.78l1.42 1.42M2 12H4m16 0h2M4.22 19.78l-1.42 1.42M19.78 4.22l1.42-1.42M12 6a6 6 0 100 12 6 6 0 000-12z" />
                    </svg>
                    <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                    </svg>
                </button>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-100 dark:hover:bg-white/10 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div
                            class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-medium text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        </div>
                        <div class="hidden md:block text-left">
                            <p class="text-gray-900 dark:text-white font-medium text-sm">{{ Auth::user()->name }}</p>
                            <p class="text-gray-500 dark:text-gray-400 text-xs capitalize">{{ Auth::user()->role }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-300 transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-64 backdrop-blur-xl bg-white/80 dark:bg-black/40 border border-gray-200 dark:border-white/40 rounded-xl shadow-2xl overflow-hidden z-50">

                        <!-- Menu Items -->
                        <div class="border-t border-gray-200 dark:border-white/10">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-3 py-2 text-green-600 dark:text-green-500 hover:bg-green-100 dark:hover:bg-green-500/30 transition-all duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profil Saya
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="border-t border-gray-200 dark:border-white/10">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-3 py-2 text-red-600 dark:text-red-500 hover:bg-red-100 dark:hover:bg-red-500/30 transition-all duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
// Dark/Light mode toggle logic
const themeToggleBtn = document.getElementById('theme-toggle');
const lightIcon = document.getElementById('theme-toggle-light-icon');
const darkIcon = document.getElementById('theme-toggle-dark-icon');

// Function to update icon visibility
function updateThemeIcons(isDark) {
    if (isDark) {
        darkIcon.classList.remove('hidden');
        lightIcon.classList.add('hidden');
    } else {
        lightIcon.classList.remove('hidden');
        darkIcon.classList.add('hidden');
    }
}

// Check localStorage or system preference
function getPreferredTheme() {
    if (localStorage.getItem('theme')) {
        return localStorage.getItem('theme') === 'dark';
    }
    return window.matchMedia('(prefers-color-scheme: dark)').matches;
}

function setTheme(isDark) {
    if (isDark) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    }
    updateThemeIcons(isDark);
}

// Initial theme setup
const isDark = getPreferredTheme();
setTheme(isDark);

// Toggle event
if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', () => {
        const currentlyDark = document.documentElement.classList.contains('dark');
        setTheme(!currentlyDark);
    });
}
</script>