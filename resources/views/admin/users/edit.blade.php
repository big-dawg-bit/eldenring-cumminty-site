<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gebruiker Bewerken - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        input, select {
            background: rgba(17, 24, 39, 0.5) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            color: rgb(229, 231, 235) !important;
        }

        input:focus, select:focus {
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

<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            ✏️ Gebruiker Bewerken: {{ $user->name }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-8">

                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-6">
                        <label for="name" class="block font-medium text-sm mb-2">
                            Naam <span class="text-red-500">*</span>
                        </label>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block font-medium text-sm mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               required
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block font-medium text-sm mb-2">
                            Nieuw Wachtwoord (optioneel)
                        </label>
                        <input id="password"
                               type="password"
                               name="password"
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        <p class="mt-2 text-sm text-gray-400">Laat leeg om huidig wachtwoord te behouden</p>
                        @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block font-medium text-sm mb-2">
                            Bevestig Nieuw Wachtwoord
                        </label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                    </div>

                    <div class="mb-6 bg-yellow-900/20 border border-yellow-600/30 rounded-lg p-4">
                        <label class="flex items-center">
                            <input type="checkbox"
                                   name="is_admin"
                                   value="1"
                                   {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                                   class="rounded border-yellow-600/30 text-yellow-600 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-300">
                                    ⚔️ Deze gebruiker is een admin
                                </span>
                        </label>
                        @if($user->id === auth()->id())
                            <p class="mt-2 text-sm text-yellow-500">
                                ⚠️ Let op: Je bewerkt je eigen account!
                            </p>
                        @endif
                    </div>

                    <div class="mb-6 bg-gray-800/30 border border-yellow-600/20 rounded-lg p-4">
                        <p class="text-sm text-gray-400">
                            <span class="text-yellow-500 font-semibold">Account aangemaakt:</span> {{ $user->created_at->format('d-m-Y H:i') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-yellow-600/30">
                        <a href="{{ route('admin.users.index') }}"
                           class="text-gray-400 hover:text-yellow-500 transition font-semibold">
                            ← Annuleren
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-8 py-4 bg-yellow-600 text-gray-900 rounded-lg font-bold text-lg hover:bg-yellow-500 transition shadow-lg">
                            💾 Bijwerken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
