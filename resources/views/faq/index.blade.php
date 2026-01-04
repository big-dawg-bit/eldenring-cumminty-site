<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FAQ - Elden Ring</title>
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
            Veelgestelde Vragen (FAQ)
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">

                @if($categories->isEmpty())
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">❓</div>
                        <p class="text-gray-400 text-lg">Er zijn nog geen FAQ items beschikbaar.</p>
                        @if(auth()->check() && auth()->user()->isAdmin())
                            <a href="{{ route('admin.faq-categories.create') }}" class="inline-block mt-4 px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                                Voeg Eerste Categorie Toe
                            </a>
                        @endif
                    </div>
                @else
                    @foreach($categories as $category)
                        <div class="mb-12">
                            <!-- Category Title -->
                            <div class="flex items-center mb-6">
                                <span class="text-3xl mr-3">📂</span>
                                <h3 class="text-3xl font-bold text-yellow-500 border-b-2 border-yellow-600 pb-2 flex-1">
                                    {{ $category->name }}
                                </h3>
                            </div>

                            @if($category->faqs->isEmpty())
                                <p class="text-gray-500 mb-6 ml-12">Geen vragen in deze categorie.</p>
                            @else
                                <div class="space-y-4 ml-12">
                                    @foreach($category->faqs as $faq)
                                        <div class="bg-gray-800/50 border border-yellow-600/30 rounded-lg p-6">
                                            <div class="flex items-start mb-3">
                                                <span class="text-yellow-500 font-bold text-xl mr-3 mt-1">Q:</span>
                                                <h4 class="font-semibold text-lg text-yellow-400 flex-1">
                                                    {{ $faq->question }}
                                                </h4>
                                            </div>
                                            <div class="flex items-start">
                                                <span class="text-gray-500 font-bold text-xl mr-3 mt-1">A:</span>
                                                <p class="text-gray-300 whitespace-pre-line flex-1">
                                                    {{ $faq->answer }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        @if($categories->isNotEmpty())
            <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg mt-6">
                <div class="p-6">
                    <div class="flex items-center">
                        <span class="text-4xl mr-4">💡</span>
                        <div>
                            <h4 class="font-semibold text-lg text-yellow-500 mb-2">Vraag niet beantwoord?</h4>
                            <p class="text-gray-400">
                                Vind je de antwoorden die je zoekt niet?
                                <a href="{{ route('contact.index') }}" class="text-yellow-500 hover:text-yellow-400 underline font-semibold">
                                    Neem contact met ons op
                                </a>
                                en we helpen je graag verder!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
