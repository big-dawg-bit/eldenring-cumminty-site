<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registreer - Elden Ring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cinzel', serif;
            background-image: url('/images/elden_ring.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
        }

        input {
            background: rgba(17, 24, 39, 0.8) !important;
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
<div class="overlay min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 py-12">
    <div class="mb-8 text-center">
        <a href="/">
            <h1 class="text-5xl font-bold text-yellow-500 mb-2" style="text-shadow: 0 0 20px rgba(212, 175, 55, 0.5);">
                ⚔️ ELDEN RING
            </h1>
            <p class="text-gray-400 text-lg">Begin je Reis</p>
        </a>
    </div>


    <div class="w-full sm:max-w-md px-6 py-8 bg-gray-900/90 shadow-lg border border-yellow-600/30 rounded-lg backdrop-blur-md">
        <h2 class="text-2xl font-bold text-yellow-500 mb-6 text-center">Registreren</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="mb-4">
                <label for="name" class="block font-medium text-sm mb-2">Naam</label>
                <input id="name"
                       type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autofocus
                       autocomplete="name"
                       class="block w-full rounded-md shadow-sm py-3 px-4">
                @error('name')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="email" class="block font-medium text-sm mb-2">Email</label>
                <input id="email"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="username"
                       class="block w-full rounded-md shadow-sm py-3 px-4">
                @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="password" class="block font-medium text-sm mb-2">Wachtwoord</label>
                <input id="password"
                       type="password"
                       name="password"
                       required
                       autocomplete="new-password"
                       class="block w-full rounded-md shadow-sm py-3 px-4">
                @error('password')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="password_confirmation" class="block font-medium text-sm mb-2">Bevestig Wachtwoord</label>
                <input id="password_confirmation"
                       type="password"
                       name="password_confirmation"
                       required
                       autocomplete="new-password"
                       class="block w-full rounded-md shadow-sm py-3 px-4">
                @error('password_confirmation')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex flex-col space-y-4">
                <button type="submit"
                        class="w-full py-3 bg-yellow-600 text-gray-900 rounded-lg font-bold text-lg hover:bg-yellow-500 transition shadow-lg">
                    ⚔️ Registreer
                </button>

                <div class="text-center">
                    <span class="text-gray-400 text-sm">Al een account? </span>
                    <a href="{{ route('login') }}"
                       class="text-yellow-500 hover:text-yellow-400 transition text-sm font-semibold">
                        Inloggen
                    </a>
                </div>
            </div>
        </form>


        <div class="mt-6 text-center">
            <a href="{{ url('/') }}"
               class="text-gray-400 hover:text-yellow-500 transition text-sm">
                ← Terug naar home
            </a>
        </div>
    </div>
</div>
</body>
</html>
