<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $boss->name }} - Elden Ring</title>
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
@auth
    @include('layouts.navigation')
@else
    @include('layouts.guest-navigation')
@endauth

<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            {{ $boss->name }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-8">
                @if($boss->image)
                    <img src="{{ asset('storage/' . $boss->image) }}"
                         alt="{{ $boss->name }}"
                         class="w-full h-96 object-cover rounded-lg mb-6 border-2 border-yellow-600/30">
                @endif
                <h1 class="text-4xl font-bold text-yellow-500 mb-2">{{ $boss->name }}</h1>
                @if($boss->title)
                    <p class="text-2xl text-gray-400 italic mb-6">"{{ $boss->title }}"</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-gray-800/50 rounded-lg p-4 border border-yellow-600/20">
                        <p class="text-gray-400 text-sm mb-2">Moeilijkheid</p>
                        <div class="flex">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $boss->difficulty)
                                    <span class="text-yellow-500 text-xl">⭐</span>
                                @else
                                    <span class="text-gray-600 text-xl">⭐</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                    @if($boss->location)
                        <div class="bg-gray-800/50 rounded-lg p-4 border border-yellow-600/20">
                            <p class="text-gray-400 text-sm mb-2">Locatie</p>
                            <p class="text-yellow-500 font-semibold">📍 {{ $boss->location }}</p>
                        </div>
                    @endif

                    @if($boss->health)
                        <div class="bg-gray-800/50 rounded-lg p-4 border border-yellow-600/20">
                            <p class="text-gray-400 text-sm mb-2">Health</p>
                            <p class="text-red-500 font-semibold text-xl">❤️ {{ number_format($boss->health) }} HP</p>
                        </div>
                    @endif
                    @if($boss->drops)
                        <div class="bg-gray-800/50 rounded-lg p-4 border border-yellow-600/20">
                            <p class="text-gray-400 text-sm mb-2">Drops</p>
                            <p class="text-yellow-500 font-semibold">💎 {{ $boss->drops }}</p>
                        </div>
                    @endif
                </div>
                <div class="bg-gray-800/50 rounded-lg p-6 border border-yellow-600/20 mb-8">
                    <h3 class="text-xl font-bold text-yellow-500 mb-4">📜 Beschrijving</h3>
                    <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $boss->description }}</p>
                </div>
                <div class="pt-6 border-t border-yellow-600/30 flex justify-between items-center">
                    <a href="{{ route('bosses.index') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-800 text-yellow-500 rounded-lg hover:bg-gray-700 transition border-2 border-yellow-600 font-semibold">
                        ← Terug naar Bosses
                    </a>
                    @auth
                        <form method="POST" action="{{ route('bosses.favorite.toggle', $boss) }}">
                            @csrf
                            @if(auth()->user()->favoriteBosses()->where('boss_id', $boss->id)->exists())
                                <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-500 transition font-semibold">
                                    💔 Verwijder van Favorieten
                                </button>
                            @else
                                <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                                    ⭐ Voeg toe aan Favorieten
                                </button>
                            @endif
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
