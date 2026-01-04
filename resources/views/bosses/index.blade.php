<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bosses - Elden Ring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        .boss-card {
            transition: all 0.3s ease;
        }

        .boss-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }
    </style>
</head>
<body>
@auth
    @include('layouts.navigation')
@else
    @include('layouts.guest-navigation')
@endauth

<!-- Header -->
<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            🐉 Legendary Bosses
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Intro Text -->
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg mb-8">
            <div class="p-6 text-center">
                <h3 class="text-2xl font-bold text-yellow-500 mb-3">Face the Legends of the Lands Between</h3>
                <p class="text-gray-300">
                    De machtigste vijanden in Elden Ring. Bereid je voor op epische gevechten tegen deze legendarische bosses.
                </p>
            </div>
        </div>

        <!-- Bosses Grid -->
        @if($bosses->isEmpty())
            <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
                <div class="p-12 text-center">
                    <div class="text-6xl mb-4">🐉</div>
                    <p class="text-gray-400 text-lg">Er zijn nog geen bosses toegevoegd.</p>
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('admin.bosses.create') }}" class="inline-block mt-4 px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                            Voeg Eerste Boss Toe
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bosses as $boss)
                    <a href="{{ route('bosses.show', $boss) }}" class="boss-card bg-gray-800/50 border border-yellow-600/30 rounded-xl overflow-hidden">
                        @if($boss->image)
                            <img src="{{ asset('storage/' . $boss->image) }}"
                                 alt="{{ $boss->name }}"
                                 class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gray-700 flex items-center justify-center">
                                <span class="text-gray-500 text-6xl">🐉</span>
                            </div>
                        @endif

                        <div class="p-6">
                            <h3 class="font-bold text-2xl text-yellow-500 mb-2">{{ $boss->name }}</h3>

                            @if($boss->title)
                                <p class="text-gray-400 text-sm mb-3 italic">"{{ $boss->title }}"</p>
                            @endif

                            <!-- Difficulty Badge -->
                            <div class="mb-3">
                                @if($boss->difficulty == 1)
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-green-900/50 text-green-400 border border-green-500">
                                            ⚔️ Zeer Makkelijk
                                        </span>
                                @elseif($boss->difficulty == 2)
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-blue-900/50 text-blue-400 border border-blue-500">
                                            ⚔️ Makkelijk
                                        </span>
                                @elseif($boss->difficulty == 3)
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-yellow-900/50 text-yellow-400 border border-yellow-500">
                                            ⚔️ Gemiddeld
                                        </span>
                                @elseif($boss->difficulty == 4)
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-orange-900/50 text-orange-400 border border-orange-500">
                                            ⚔️ Moeilijk
                                        </span>
                                @else
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-red-900/50 text-red-400 border border-red-500">
                                            ⚔️ Zeer Moeilijk
                                        </span>
                                @endif
                            </div>

                            @if($boss->location)
                                <p class="text-gray-300 mb-2">
                                    <span class="text-yellow-600">📍</span> {{ $boss->location }}
                                </p>
                            @endif

                            <p class="text-gray-300 line-clamp-3">
                                {{ Str::limit($boss->description, 120) }}
                            </p>

                            <div class="mt-4 text-yellow-500 font-semibold">
                                Bekijk Details →
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
</body>
</html>
