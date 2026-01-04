<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact - Elden Ring</title>
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
            Contact
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-8">

                @if(session('success'))
                    <div class="mb-6 bg-green-900/50 border border-green-500 text-green-300 px-6 py-4 rounded-lg flex items-center">
                        <span class="text-3xl mr-4">✅</span>
                        <div>
                            <p class="font-semibold">Bericht verzonden!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Intro Text -->
                <div class="mb-8 text-center">
                    <div class="text-6xl mb-4">✉️</div>
                    <h3 class="text-2xl font-bold text-yellow-500 mb-3">Neem Contact Op</h3>
                    <p class="text-gray-300">
                        Heb je een vraag of opmerking? Vul het onderstaande formulier in en we nemen zo snel mogelijk contact met je op!
                    </p>
                </div>

                <!-- Divider -->
                <div class="border-t border-yellow-600/30 mb-8"></div>

                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block font-medium text-sm mb-2">
                            Naam <span class="text-red-500">*</span>
                        </label>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4"
                               placeholder="Je naam">
                        @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block font-medium text-sm mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4"
                               placeholder="je@email.com">
                        @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div class="mb-6">
                        <label for="subject" class="block font-medium text-sm mb-2">
                            Onderwerp <span class="text-red-500">*</span>
                        </label>
                        <input id="subject"
                               type="text"
                               name="subject"
                               value="{{ old('subject') }}"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4"
                               placeholder="Waar gaat je bericht over?">
                        @error('subject')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div class="mb-6">
                        <label for="message" class="block font-medium text-sm mb-2">
                            Bericht <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message"
                                  name="message"
                                  rows="8"
                                  required
                                  maxlength="2000"
                                  class="mt-1 block w-full rounded-md shadow-sm py-3 px-4"
                                  placeholder="Typ hier je bericht...">{{ old('message') }}</textarea>
                        <p class="mt-2 text-sm text-gray-400">Max 2000 tekens</p>
                        @error('message')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-yellow-600/30">
                        <button type="submit"
                                class="inline-flex items-center px-8 py-4 bg-yellow-600 text-gray-900 rounded-lg font-bold text-lg hover:bg-yellow-500 transition shadow-lg">
                            📤 Verstuur Bericht
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Box -->
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg mt-6">
            <div class="p-6">
                <div class="flex items-center">
                    <span class="text-4xl mr-4">ℹ️</span>
                    <div>
                        <h4 class="font-semibold text-lg text-yellow-500 mb-2">Reactietijd</h4>
                        <p class="text-gray-400">
                            We proberen alle berichten binnen 24-48 uur te beantwoorden. Voor dringende vragen, check eerst onze
                            <a href="{{ route('faq.index') }}" class="text-yellow-500 hover:text-yellow-400 underline font-semibold">
                                FAQ pagina
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
