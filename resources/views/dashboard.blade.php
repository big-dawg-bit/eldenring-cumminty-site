<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Elden Ring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }
    </style>
</head>
<body>
@include('layouts.navigation')

<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            Dashboard
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 overflow-hidden shadow-sm rounded-lg mb-6">
            <div class="p-6">
                <h3 class="text-3xl font-bold text-yellow-500 mb-2">
                    Welkom, {{ Auth::user()->username ?? Auth::user()->name }}!
                </h3>
                <p class="text-gray-400">
                    Je bent ingelogd als: <span class="text-yellow-500 font-semibold">{{ Auth::user()->isAdmin() ? 'Admin' : 'Gebruiker' }}</span>
                </p>
                @if(Auth::user()->isAdmin())
                    <p class="text-gray-500 text-sm mt-2">
                        Als admin heb je toegang tot het gebruikersbeheer via het menu hierboven.
                    </p>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <a href="{{ route('news.index') }}" class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-lg p-6 hover:transform hover:-translate-y-2 hover:shadow-lg hover:shadow-yellow-600/20 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Totaal Nieuws</p>
                        <p class="text-3xl font-bold text-yellow-500">{{ \App\Models\News::count() }}</p>
                    </div>
                    <div class="text-5xl">📰</div>
                </div>
            </a>

            <a href="{{ route('bosses.index') }}" class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-lg p-6 hover:transform hover:-translate-y-2 hover:shadow-lg hover:shadow-yellow-600/20 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Totaal Bosses</p>
                        <p class="text-3xl font-bold text-yellow-500">{{ \App\Models\Boss::count() }}</p>
                    </div>
                    <div class="text-5xl">🐉</div>
                </div>
            </a>

            <a href="{{ route('faq.index') }}" class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-lg p-6 hover:transform hover:-translate-y-2 hover:shadow-lg hover:shadow-yellow-600/20 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Totaal FAQs</p>
                        <p class="text-3xl font-bold text-yellow-500">{{ \App\Models\Faq::count() }}</p>
                    </div>
                    <div class="text-5xl">❓</div>
                </div>
            </a>

            <a href="{{ route('profile.show', Auth::user()) }}" class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-lg p-6 hover:transform hover:-translate-y-2 hover:shadow-lg hover:shadow-yellow-600/20 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Totaal Leden</p>
                        <p class="text-3xl font-bold text-yellow-500">{{ \App\Models\User::count() }}</p>
                    </div>
                    <div class="text-5xl">⚔️</div>
                </div>
            </a>
        </div>

        <div class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 overflow-hidden shadow-sm rounded-lg mb-6">
            <div class="p-6">
                <h4 class="text-xl font-bold text-yellow-500 mb-4">Quick Actions</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('profile.show', Auth::user()) }}" class="flex items-center p-4 bg-gray-900/50 border border-yellow-600/20 rounded-lg hover:border-yellow-600/50 transition">
                        <span class="text-2xl mr-3">👤</span>
                        <span class="text-gray-300">Bekijk Profiel</span>
                    </a>

                    <a href="{{ route('profile.edit', Auth::user()) }}" class="flex items-center p-4 bg-gray-900/50 border border-yellow-600/20 rounded-lg hover:border-yellow-600/50 transition">
                        <span class="text-2xl mr-3">✏️</span>
                        <span class="text-gray-300">Bewerk Profiel</span>
                    </a>

                    <a href="{{ route('news.index') }}" class="flex items-center p-4 bg-gray-900/50 border border-yellow-600/20 rounded-lg hover:border-yellow-600/50 transition">
                        <span class="text-2xl mr-3">📰</span>
                        <span class="text-gray-300">Laatste Nieuws</span>
                    </a>

                    <a href="{{ route('contact.index') }}" class="flex items-center p-4 bg-gray-900/50 border border-yellow-600/20 rounded-lg hover:border-yellow-600/50 transition">
                        <span class="text-2xl mr-3">✉️</span>
                        <span class="text-gray-300">Contact</span>
                    </a>
                </div>
            </div>
        </div>

        @if(Auth::user()->isAdmin())
            <div class="bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Admin Actions</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <a href="{{ route('admin.users.index') }}" class="flex items-center p-4 bg-yellow-600/10 border border-yellow-600/50 rounded-lg hover:bg-yellow-600/20 transition">
                            <span class="text-2xl mr-3">👥</span>
                            <span class="text-gray-300">Gebruikersbeheer</span>
                        </a>

                        <a href="{{ route('admin.news.index') }}" class="flex items-center p-4 bg-yellow-600/10 border border-yellow-600/50 rounded-lg hover:bg-yellow-600/20 transition">
                            <span class="text-2xl mr-3">📝</span>
                            <span class="text-gray-300">Nieuwsbeheer</span>
                        </a>

                        <a href="{{ route('admin.bosses.index') }}" class="flex items-center p-4 bg-yellow-600/10 border border-yellow-600/50 rounded-lg hover:bg-yellow-600/20 transition">
                            <span class="text-2xl mr-3">🐉</span>
                            <span class="text-gray-300">Bosses Beheer</span>
                        </a>

                        <a href="{{ route('admin.faq-categories.index') }}" class="flex items-center p-4 bg-yellow-600/10 border border-yellow-600/50 rounded-lg hover:bg-yellow-600/20 transition">
                            <span class="text-2xl mr-3">📂</span>
                            <span class="text-gray-300">FAQ Categorieën</span>
                        </a>

                        <a href="{{ route('admin.faqs.index') }}" class="flex items-center p-4 bg-yellow-600/10 border border-yellow-600/50 rounded-lg hover:bg-yellow-600/20 transition">
                            <span class="text-2xl mr-3">❔</span>
                            <span class="text-gray-300">FAQ Beheer</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
</html>

