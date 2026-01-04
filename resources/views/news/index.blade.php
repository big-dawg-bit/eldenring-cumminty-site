<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nieuws - Elden Ring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        .news-card {
            transition: all 0.3s ease;
        }

        .news-card:hover {
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
            Laatste Nieuwtjes
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">

                @if($news->isEmpty())
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">📰</div>
                        <p class="text-gray-400 text-lg">Er zijn nog geen nieuwsitems.</p>
                        @if(auth()->check() && auth()->user()->isAdmin())
                            <a href="{{ route('admin.news.create') }}" class="inline-block mt-4 px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                                Voeg Eerste Nieuws Toe
                            </a>
                        @endif
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($news as $item)
                            <div class="news-card bg-gray-800/50 border border-yellow-600/30 rounded-xl overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                         alt="{{ $item->title }}"
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                                        <span class="text-gray-500 text-4xl">📰</span>
                                    </div>
                                @endif

                                <div class="p-6">
                                    <h3 class="font-bold text-xl text-yellow-500 mb-2">{{ $item->title }}</h3>
                                    <p class="text-sm text-gray-400 mb-3">
                                        <span class="text-yellow-600">📅</span> {{ $item->publication_date->format('d-m-Y') }}
                                    </p>
                                    <p class="text-gray-300 mb-4 line-clamp-3">
                                        {{ Str::limit($item->content, 150) }}
                                    </p>
                                    <a href="{{ route('news.show', $item) }}"
                                       class="inline-block bg-yellow-600 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-500 transition font-semibold">
                                        Lees meer →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $news->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
