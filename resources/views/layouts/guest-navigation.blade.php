<nav class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition" style="font-family: 'Cinzel', serif;">
                    ⚔️ ELDEN RING
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('news.index') }}"
                   class="text-gray-300 hover:text-yellow-500 transition font-semibold {{ request()->routeIs('news.*') ? 'text-yellow-500' : '' }}">
                    Nieuws
                </a>
                <a href="{{ route('bosses.index') }}"
                   class="text-gray-300 hover:text-yellow-500 transition font-semibold {{ request()->routeIs('bosses.*') ? 'text-yellow-500' : '' }}">
                    Bosses
                </a>
                <a href="{{ route('faq.index') }}"
                   class="text-gray-300 hover:text-yellow-500 transition font-semibold {{ request()->routeIs('faq.*') ? 'text-yellow-500' : '' }}">
                    FAQ
                </a>
                <a href="{{ route('contact.index') }}"
                   class="text-gray-300 hover:text-yellow-500 transition font-semibold {{ request()->routeIs('contact.*') ? 'text-yellow-500' : '' }}">
                    Contact
                </a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}"
                   class="text-gray-300 hover:text-yellow-500 transition font-semibold">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                    Register
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button onclick="toggleMobileMenu()"
                        class="inline-flex items-center justify-center p-2 rounded-md text-yellow-500 hover:text-yellow-400 hover:bg-gray-700/50 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="mobile-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="mobile-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('news.index') }}"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                Nieuws
            </a>
            <a href="{{ route('bosses.index') }}"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                Bosses
            </a>
            <a href="{{ route('faq.index') }}"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                FAQ
            </a>
            <a href="{{ route('contact.index') }}"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                Contact
            </a>
            <div class="border-t border-gray-700 mt-4 pt-4 space-y-1">
                <a href="{{ route('login') }}"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-yellow-500 hover:bg-gray-700 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="block px-3 py-2 rounded-md text-base font-medium bg-yellow-600 text-gray-900 hover:bg-yellow-500 transition">
                    Register
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('mobile-open');
        const closeIcon = document.getElementById('mobile-close');

        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap');
</style>
