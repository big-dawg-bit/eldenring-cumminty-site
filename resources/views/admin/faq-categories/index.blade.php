<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FAQ Categorieën - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        table {
            border-collapse: separate;
            border-spacing: 0;
        }
    </style>
</head>
<body>
@include('layouts.navigation')

<!-- Header -->
<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            📂 FAQ Categorieën
        </h2>
        <a href="{{ route('admin.faq-categories.create') }}"
           class="px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold shadow-lg">
            + Nieuwe Categorie
        </a>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">

                @if(session('success'))
                    <div class="mb-4 bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if($categories->isEmpty())
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">📂</div>
                        <p class="text-gray-400 text-lg mb-4">Er zijn nog geen categorieën.</p>
                        <a href="{{ route('admin.faq-categories.create') }}" class="inline-block px-6 py-3 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                            Voeg Eerste Categorie Toe
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                            <tr class="bg-gray-800/50 border-b border-yellow-600/30">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-yellow-500 uppercase tracking-wider">Naam</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-yellow-500 uppercase tracking-wider">Volgorde</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-yellow-500 uppercase tracking-wider">Aantal FAQs</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-yellow-500 uppercase tracking-wider">Acties</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-yellow-600/20">
                            @foreach($categories as $category)
                                <tr class="hover:bg-gray-800/30 transition">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-200">{{ $category->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-700 text-yellow-500">
                                                    {{ $category->order }}
                                                </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $category->faqs_count }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-3">
                                        <a href="{{ route('admin.faq-categories.edit', $category) }}"
                                           class="text-yellow-500 hover:text-yellow-400 font-semibold">
                                            Bewerk
                                        </a>
                                        <form action="{{ route('admin.faq-categories.destroy', $category) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen? Alle FAQs in deze categorie worden ook verwijderd!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400 font-semibold">
                                                Verwijder
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
