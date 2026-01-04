<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $news->title }} - Elden Ring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        input, textarea {
            background: rgba(17, 24, 39, 0.5) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            color: rgb(229, 231, 235) !important;
        }

        input:focus, textarea:focus {
            border-color: rgba(212, 175, 55, 0.6) !important;
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1) !important;
        }

        label {
            color: rgb(212, 175, 55) !important;
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
            {{ $news->title }}
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <!-- News Article -->
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg mb-6">
            <div class="p-6">

                <!-- Image -->
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}"
                         alt="{{ $news->title }}"
                         class="w-full h-96 object-cover rounded-lg mb-6 border-2 border-yellow-600/30">
                @endif

                <!-- Publication Date -->
                <div class="flex items-center text-gray-400 mb-6 pb-6 border-b border-yellow-600/30">
                    <span class="text-yellow-600 text-2xl mr-2">📅</span>
                    <span class="text-sm">Gepubliceerd op: <span class="text-yellow-500 font-semibold">{{ $news->publication_date->format('d F Y') }}</span></span>
                </div>

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    <p class="text-gray-300 text-lg leading-relaxed whitespace-pre-line">{{ $news->content }}</p>
                </div>

                <!-- Back Button -->
                <div class="mt-8 pt-6 border-t border-yellow-600/30">
                    <a href="{{ route('news.index') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-800 text-yellow-500 rounded-lg hover:bg-gray-700 transition border-2 border-yellow-600 font-semibold">
                        ← Terug naar nieuws
                    </a>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-yellow-500 mb-6 flex items-center">
                    <span class="text-3xl mr-3">💬</span>
                    Comments ({{ $news->comments->count() }})
                </h3>

                @if(session('success'))
                    <div class="mb-4 bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-900/50 border border-red-500 text-red-300 px-4 py-3 rounded">
                        ❌ {{ session('error') }}
                    </div>
                @endif

                <!-- Comment Form (only for logged in users) -->
                @auth
                    <div class="mb-8 bg-gray-800/50 rounded-lg p-6 border border-yellow-600/20">
                        <h4 class="text-lg font-semibold text-yellow-500 mb-4">Plaats een comment</h4>
                        <form method="POST" action="{{ route('comments.store', $news) }}">
                            @csrf
                            <div class="mb-4">
                                    <textarea
                                        name="content"
                                        rows="4"
                                        required
                                        maxlength="1000"
                                        placeholder="Deel je gedachten over dit nieuws..."
                                        class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">{{ old('content') }}</textarea>
                                <p class="mt-2 text-sm text-gray-400">Max 1000 tekens</p>
                                @error('content')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                    class="px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                                💬 Plaats Comment
                            </button>
                        </form>
                    </div>
                @else
                    <div class="mb-8 bg-gray-800/50 rounded-lg p-6 border border-yellow-600/20 text-center">
                        <p class="text-gray-400 mb-4">Je moet ingelogd zijn om een comment te plaatsen.</p>
                        <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                            Inloggen
                        </a>
                    </div>
                @endauth

                <!-- Comments List -->
                @if($news->comments->isEmpty())
                    <div class="text-center py-8">
                        <div class="text-5xl mb-3">💭</div>
                        <p class="text-gray-400">Nog geen comments. Wees de eerste om te reageren!</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($news->comments as $comment)
                            <div class="bg-gray-800/50 rounded-lg p-5 border border-yellow-600/20">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center">
                                        <!-- User Avatar/Initial -->
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center mr-3">
                                                <span class="text-gray-900 font-bold text-sm">
                                                    {{ substr($comment->user->name, 0, 1) }}
                                                </span>
                                        </div>
                                        <div>
                                            <p class="text-yellow-500 font-semibold">
                                                {{ $comment->user->username ?? $comment->user->name }}
                                                @if($comment->user->isAdmin())
                                                    <span class="ml-2 text-xs px-2 py-1 bg-yellow-600 text-gray-900 rounded">ADMIN</span>
                                                @endif
                                            </p>
                                            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>

                                    <!-- Delete button (for comment owner or admin) -->
                                    @auth
                                        @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                                            <form method="POST" action="{{ route('comments.destroy', $comment) }}"
                                                  onsubmit="return confirm('Weet je zeker dat je deze comment wilt verwijderen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400 text-sm">
                                                    🗑️ Verwijder
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                <p class="text-gray-300 whitespace-pre-line">{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
