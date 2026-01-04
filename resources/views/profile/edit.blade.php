<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profiel Bewerken - Elden Ring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Cinzel', serif;
            min-height: 100vh;
        }

        input, textarea, select {
            background: rgba(17, 24, 39, 0.5) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            color: rgb(229, 231, 235) !important;
        }

        input:focus, textarea:focus, select:focus {
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
            Profiel Bewerken
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-8">

                @if(session('success'))
                    <div class="mb-6 bg-green-900/50 border border-green-500 text-green-300 px-6 py-4 rounded-lg">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Current Profile Photo -->
                    <div class="mb-8 text-center">
                        @if($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                 alt="Current Profile Photo"
                                 class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-yellow-600 mb-4 shadow-lg">
                        @else
                            <div class="w-32 h-32 rounded-full mx-auto bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center border-4 border-yellow-600 mb-4 shadow-lg">
                                <span class="text-5xl text-gray-900 font-bold">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <p class="text-gray-400 text-sm">Huidige profielfoto</p>
                    </div>

                    <!-- Username -->
                    <div class="mb-6">
                        <label for="username" class="block font-medium text-sm mb-2">Username</label>
                        <input id="username"
                               type="text"
                               name="username"
                               value="{{ old('username', $user->username) }}"
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        @error('username')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-2 text-sm text-gray-400">Dit is de naam die anderen zien op je profiel</p>
                    </div>

                    <!-- Birthday -->
                    <div class="mb-6">
                        <label for="birthday" class="block font-medium text-sm mb-2">Verjaardag</label>
                        <input id="birthday"
                               type="date"
                               name="birthday"
                               value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}"
                               class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">
                        @error('birthday')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profile Photo -->
                    <div class="mb-6">
                        <label for="profile_photo" class="block font-medium text-sm mb-2">Nieuwe Profielfoto</label>
                        <input id="profile_photo"
                               type="file"
                               name="profile_photo"
                               accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-300
                                          file:mr-4 file:py-3 file:px-6
                                          file:rounded-lg file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-yellow-600 file:text-gray-900
                                          hover:file:bg-yellow-500 file:cursor-pointer">
                        <p class="mt-2 text-sm text-gray-400">JPG, PNG, GIF (Max 2MB)</p>
                        @error('profile_photo')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- About Me -->
                    <div class="mb-6">
                        <label for="about" class="block font-medium text-sm mb-2">Over mij</label>
                        <textarea id="about"
                                  name="about"
                                  rows="6"
                                  maxlength="500"
                                  class="mt-1 block w-full rounded-md shadow-sm py-3 px-4">{{ old('about', $user->about) }}</textarea>
                        <p class="mt-2 text-sm text-gray-400">Max 500 tekens - Vertel andere Tarnished over jezelf!</p>
                        @error('about')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-yellow-600/30">
                        <a href="{{ route('profile.show', $user) }}"
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
