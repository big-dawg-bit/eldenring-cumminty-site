<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $user->username ?? $user->name }} - Profiel</title>
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
@include('layouts.navigation')

<!-- Header -->
<header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            {{ $user->username ?? $user->name }}'s Profiel
        </h2>
    </div>
</header>

<!-- Main Content -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="background: rgba(31, 41, 55, 0.5); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.3);" class="overflow-hidden shadow-sm rounded-lg">
            <div class="p-8">
                <!-- Profile Photo -->
                <div class="mb-8 text-center">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}"
                             alt="Profile Photo"
                             class="w-40 h-40 rounded-full mx-auto object-cover border-4 border-yellow-600 shadow-lg">
                    @else
                        <div class="w-40 h-40 rounded-full mx-auto bg-gradient-to-br from-yellow-600 to-yellow-800 flex items-center justify-center border-4 border-yellow-600 shadow-lg">
                            <span class="text-6xl text-gray-900 font-bold">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                    @endif
                </div>

                <!-- Username/Name -->
                <h3 class="text-4xl font-bold text-yellow-500 text-center mb-2">
                    {{ $user->username ?? $user->name }}
                </h3>

                @if($user->username && $user->username !== $user->name)
                    <p class="text-center text-gray-400 mb-6">
                        ({{ $user->name }})
                    </p>
                @endif

                <!-- Role Badge -->
                <div class="text-center mb-8">
                    @if($user->isAdmin())
                        <span class="inline-block px-4 py-2 bg-yellow-600 text-gray-900 rounded-lg font-semibold text-sm">
                                ⚔️ ADMIN - ELDEN LORD
                            </span>
                    @else
                        <span class="inline-block px-4 py-2 bg-gray-700 text-yellow-500 rounded-lg font-semibold text-sm border border-yellow-600/50">
                                🛡️ TARNISHED WARRIOR
                            </span>
                    @endif
                </div>

                <!-- Divider -->
                <div class="border-t border-yellow-600/30 my-8"></div>

                <!-- Profile Info -->
                <div class="space-y-6">
                    <!-- Birthday -->
                    @if($user->birthday)
                        <div class="bg-gray-800/50 rounded-lg p-6 border border-yellow-600/20">
                            <div class="flex items-center">
                                <span class="text-3xl mr-4">🎂</span>
                                <div>
                                    <p class="text-gray-400 text-sm">Verjaardag</p>
                                    <p class="text-yellow-500 font-semibold text-lg">{{ $user->birthday->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- About Me -->
                    @if($user->about)
                        <div class="bg-gray-800/50 rounded-lg p-6 border border-yellow-600/20">
                            <div class="flex items-start">
                                <span class="text-3xl mr-4">📜</span>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-lg mb-3 text-yellow-500">Over mij:</h4>
                                    <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $user->about }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Member Since -->
                    <div class="bg-gray-800/50 rounded-lg p-6 border border-yellow-600/20">
                        <div class="flex items-center">
                            <span class="text-3xl mr-4">⏰</span>
                            <div>
                                <p class="text-gray-400 text-sm">Lid sinds</p>
                                <p class="text-yellow-500 font-semibold text-lg">{{ $user->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Button (only for own profile) -->
                @auth
                    @if(auth()->id() === $user->id)
                        <div class="mt-8 text-center pt-6 border-t border-yellow-600/30">
                            <a href="{{ route('profile.edit', $user) }}"
                               class="inline-flex items-center px-8 py-4 bg-yellow-600 text-gray-900 rounded-lg font-bold text-lg hover:bg-yellow-500 transition shadow-lg">
                                ✏️ Profiel Bewerken
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
</body>
</html>
