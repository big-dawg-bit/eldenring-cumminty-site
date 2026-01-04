<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Elden Ring</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            font-family: 'Figtree', sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cinzel', serif;
        }

        /* Override any white backgrounds */
        .bg-white {
            background-color: rgba(31, 41, 55, 0.5) !important;
            backdrop-filter: blur(10px);
        }

        /* Fix text colors */
        .text-gray-900 {
            color: rgb(229, 231, 235) !important;
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
