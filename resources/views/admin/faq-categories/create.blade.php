<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nieuwe FAQ Categorie - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        input {
            background: rgba(17, 24, 39, 0.5) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            color: rgb(229, 231, 235) !important;
        }

        input:focus {
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
@include('layouts.navigation')

<!-- Header -->
<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            ➕ Nieuwe FAQ Categorie
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-8">

                <form method="POST" action="{{ route('admin.faq-categories.store') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block font-medium text-sm mb-2">
                            Categorie Naam <span class="text-red-500">*</span>
                        </label>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div class="mb-6">
                        <label for="order" class="block font-medium text-sm mb-2">
                            Volgorde <span class="text-red-500">*</span>
                        </label>
                        <input id="order"
                               type="number"
                               name="order"
                               value="{{ old('order', 0) }}"
                               min="0"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        <p class="mt-2 text-sm text-gray-400">Categorieën worden gesorteerd op volgorde (0 = eerste)</p>
                        @error('order')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-yellow-600/30">
                        <a href="{{ route('admin.faq-categories.index') }}"
                           class="text-gray-400 hover:text-yellow-500 transition font-semibold">
                            ← Annuleren
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-8 py-4 bg-yellow-600 text-gray-900 rounded-lg font-bold text-lg hover:bg-yellow-500 transition shadow-lg">
                            💾 Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
