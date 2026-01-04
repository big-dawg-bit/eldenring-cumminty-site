<nav class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 relative z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <span class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition" style="font-family: 'Cinzel', serif;">
                            ⚔️ ELDEN RING
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-yellow-500 text-yellow-500' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:border-yellow-600' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Dashboard
                    </a>
                    <a href="{{ route('news.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('news.*') ? 'border-yellow-500 text-yellow-500' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:border-yellow-600' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Nieuws
                    </a>
                    <a href="{{ route('bosses.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('bosses.*') ? 'border-yellow-500 text-yellow-500' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:border-yellow-600' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Bosses
                    </a>
                    <a href="{{ route('faq.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('faq.*') ? 'border-yellow-500 text-yellow-500' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:border-yellow-600' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        FAQ
                    </a>
                    <a href="{{ route('favorites.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('favorites.*') ? 'border-yellow-500 text-yellow-500' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:border-yellow-600' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Favorieten
                    </a>
                    <a href="{{ route('contact.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact.*') ? 'border-yellow-500 text-yellow-500' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:border-yellow-600' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="relative">
                    <button onclick="toggleDropdown()"
                            class="inline-flex items-center px-4 py-2 border border-yellow-600/50 text-sm leading-4 font-medium rounded-md text-yellow-500 bg-gray-800/50 hover:text-yellow-400 hover:bg-gray-700/50 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->username ?? Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu"
                         class="hidden absolute right-0 mt-2 rounded-md shadow-xl bg-gray-800 border border-yellow-600/30"
                         style="min-width: 14rem; z-index: 9999;">

                        <a href="{{ route('profile.show', Auth::user()) }}"
                           class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                            <span class="mr-3 text-lg">👤</span> Bekijk Profiel
                        </a>

                        <a href="{{ route('profile.edit', Auth::user()) }}"
                           class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                            <span class="mr-3 text-lg">✏️</span> Bewerk Profiel
                        </a>

                        @if(Auth::user()->isAdmin())
                            <div class="bg-gray-900/50 px-4 py-2 border-b border-gray-700">
                                <div class="text-xs text-yellow-500 uppercase font-semibold">
                                    ⚔️ Admin Menu
                                </div>
                            </div>

                            <a href="{{ route('admin.users.index') }}"
                               class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                                <span class="mr-3 text-lg">👥</span> Gebruikersbeheer
                            </a>

                            <a href="{{ route('admin.news.index') }}"
                               class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                                <span class="mr-3 text-lg">📝</span> Nieuwsbeheer
                            </a>

                            <a href="{{ route('admin.bosses.index') }}"
                               class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                                <span class="mr-3 text-lg">🐉</span> Bosses Beheer
                            </a>

                            <a href="{{ route('admin.faq-categories.index') }}"
                               class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                                <span class="mr-3 text-lg">📂</span> FAQ Categorieën
                            </a>

                            <a href="{{ route('admin.faqs.index') }}"
                               class="flex items-center px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500 transition border-b border-gray-700">
                                <span class="mr-3 text-lg">❔</span> FAQ Beheer
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="flex items-center w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-red-400 transition">
                                <span class="mr-3 text-lg">🚪</span> Uitloggen
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button onclick="toggleMobileMenu()"
                        class="inline-flex items-center justify-center p-2 rounded-md text-yellow-500 hover:text-yellow-400 hover:bg-gray-700/50 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="hamburger-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="hamburger-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div id="mobile-menu" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}"
               class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('dashboard') ? 'border-yellow-500 text-yellow-500 bg-gray-800' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:bg-gray-700 hover:border-yellow-600' }} text-base font-medium transition">
                Dashboard
            </a>
            <a href="{{ route('news.index') }}"
               class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('news.*') ? 'border-yellow-500 text-yellow-500 bg-gray-800' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:bg-gray-700 hover:border-yellow-600' }} text-base font-medium transition">
                Nieuws
            </a>
            <a href="{{ route('bosses.index') }}"
               class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('bosses.*') ? 'border-yellow-500 text-yellow-500 bg-gray-800' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:bg-gray-700 hover:border-yellow-600' }} text-base font-medium transition">
                Bosses
            </a>
            <a href="{{ route('faq.index') }}"
               class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('faq.*') ? 'border-yellow-500 text-yellow-500 bg-gray-800' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:bg-gray-700 hover:border-yellow-600' }} text-base font-medium transition">
                FAQ
            </a>
            <a href="{{ route('contact.index') }}"
               class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('contact.*') ? 'border-yellow-500 text-yellow-500 bg-gray-800' : 'border-transparent text-gray-300 hover:text-yellow-500 hover:bg-gray-700 hover:border-yellow-600' }} text-base font-medium transition">
                Contact
            </a>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-yellow-500">{{ Auth::user()->username ?? Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.show', Auth::user()) }}"
                   class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                    Bekijk Profiel
                </a>
                <a href="{{ route('profile.edit', Auth::user()) }}"
                   class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                    Bewerk Profiel
                </a>

                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.users.index') }}"
                       class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                        Gebruikersbeheer
                    </a>
                    <a href="{{ route('admin.news.index') }}"
                       class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                        Nieuwsbeheer
                    </a>
                    <a href="{{ route('admin.bosses.index') }}"
                       class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                        Bosses Beheer
                    </a>
                    <a href="{{ route('admin.faq-categories.index') }}"
                       class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                        FAQ Categorieën
                    </a>
                    <a href="{{ route('admin.faqs.index') }}"
                       class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                        FAQ Beheer
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block w-full text-left px-4 py-2 text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                        Uitloggen
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    // Dropdown toggle
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.classList.toggle('hidden');
    }

    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('hamburger-open');
        const closeIcon = document.getElementById('hamburger-close');

        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown-menu');
        const button = event.target.closest('button[onclick="toggleDropdown()"]');

        if (!button && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap');
</style>
