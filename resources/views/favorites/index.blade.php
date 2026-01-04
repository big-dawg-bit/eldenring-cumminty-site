<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mijn Favoriete Bosses - Elden Ring</title>
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
@include('layouts.navigation')

<!-- Header -->
<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            ⭐ Mijn Favoriete Bosses
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-6 bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($favoriteBosses->isEmpty())
            <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
                <div class="p-12 text-center">
                    <div class="text-6xl mb-4">💔</div>
                    <p class="text-gray-400 text-lg mb-4">Je hebt nog geen favoriete bosses.</p>
                    <a href="{{ route('bosses.index') }}" class="inline-block px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                        Bekijk Alle Bosses
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($favoriteBosses as $boss)
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
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-2xl text-yellow-500">{{ $boss->name }}</h3>
                                <span class="text-2xl">⭐</span>
                            </div>

                            @if($boss->title)
                                <p class="text-gray-400 text-sm mb-3 italic">"{{ $boss->title }}"</p>
                            @endif

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
