<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elden Ring - Tarnished Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            font-family: 'Cinzel', serif;
        }
        .hero-text {
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }
        .glow {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap');
        .site-of-grace {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 600px;
            opacity: 0.2;
            pointer-events: none;
        }
        .grace-stake {
            position: absolute;
            bottom: 40%;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 200px;
            background: linear-gradient(to top, rgba(139, 69, 19, 0.8) 0%, rgba(160, 82, 45, 0.9) 40%, rgba(212, 175, 55, 1) 100%);
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.8);
        }
        .grace-top {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 15px solid rgba(212, 175, 55, 1);
            filter: drop-shadow(0 0 10px rgba(212, 175, 55, 1));
        }
        .grace-glow {
            position: absolute;
            bottom: 40%;
            left: 50%;
            transform: translate(-50%, 50%);
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.6) 0%, rgba(212, 175, 55, 0.3) 30%, transparent 70%);
            border-radius: 50%;
            animation: pulse-glow 2s ease-in-out infinite;
        }
        .grace-light-beam {
            position: absolute;
            bottom: 40%;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 400px;
            background: linear-gradient(to top, rgba(212, 175, 55, 0.4) 0%, rgba(212, 175, 55, 0.2) 50%, transparent 100%);
            filter: blur(20px);
            animation: flicker 3s ease-in-out infinite;
        }
        .grace-particles {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .grace-particle {
            position: absolute;
            width: 2px;
            height: 8px;
            background: rgba(212, 175, 55, 0.8);
            border-radius: 50%;
            bottom: 40%;
            animation: float-up 4s ease-in infinite;
        }
        .grace-particle:nth-child(1) {
            left: 45%;
            animation-delay: 0s;
            animation-duration: 3s;
        }
        .grace-particle:nth-child(2) {
            left: 55%;
            animation-delay: 0.5s;
            animation-duration: 4s;
        }
        .grace-particle:nth-child(3) {
            left: 50%;
            animation-delay: 1s;
            animation-duration: 3.5s;
        }
        .grace-particle:nth-child(4) {
            left: 48%;
            animation-delay: 1.5s;
            animation-duration: 4.5s;
        }
        .grace-particle:nth-child(5) {
            left: 52%;
            animation-delay: 2s;
            animation-duration: 3.8s;
        }
        .grace-particle:nth-child(6) {
            left: 47%;
            animation-delay: 2.5s;
            animation-duration: 4.2s;
        }
        @keyframes pulse-glow {
            0%, 100% {
                opacity: 0.6;
                transform: translate(-50%, 50%) scale(1);
            }
            50% {
                opacity: 1;
                transform: translate(-50%, 50%) scale(1.2);
            }
        }
        @keyframes flicker {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }
        @keyframes float-up {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-400px) translateX(calc(var(--drift, 0) * 20px));
                opacity: 0;
            }
        }
    </style>
</head>
<body class="antialiased">
<nav class="bg-gray-900/80 backdrop-blur-md border-b border-yellow-600/30 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition">
                    ⚔️ ELDEN RING
                </a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('news.index') }}" class="text-gray-300 hover:text-yellow-500 transition font-semibold">
                    Nieuws
                </a>
                <a href="{{ route('bosses.index') }}" class="text-gray-300 hover:text-yellow-500 transition font-semibold">
                    Bosses
                </a>
                <a href="{{ route('faq.index') }}" class="text-gray-300 hover:text-yellow-500 transition font-semibold">
                    FAQ
                </a>
                <a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-yellow-500 transition font-semibold">
                    Contact
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-gray-300">Welkom, <span class="text-yellow-500 font-semibold">{{ Auth::user()->username ?? Auth::user()->name }}</span></span>
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-yellow-500 transition font-semibold">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-yellow-600 text-gray-900 rounded-lg hover:bg-yellow-500 transition font-semibold">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="site-of-grace">
        <div class="grace-glow"></div>
        <div class="grace-light-beam"></div>
        <div class="grace-stake">
            <div class="grace-top"></div>
        </div>
        <div class="grace-particles">
            <div class="grace-particle" style="--drift: -1"></div>
            <div class="grace-particle" style="--drift: 1"></div>
            <div class="grace-particle" style="--drift: 0"></div>
            <div class="grace-particle" style="--drift: -0.5"></div>
            <div class="grace-particle" style="--drift: 0.5"></div>
            <div class="grace-particle" style="--drift: -0.3"></div>
        </div>
    </div>

    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(212, 175, 55, 0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(212, 175, 55, 0.1) 0%, transparent 50%);"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
        <h1 class="text-6xl md:text-8xl font-bold text-yellow-500 mb-6 hero-text">
            ELDEN RING
        </h1>

        <p class="text-2xl md:text-3xl text-gray-300 mb-4 hero-text">
            Rise, Tarnished
        </p>

        <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
            Join de community van Tarnished warriors. Ontdek nieuws, deel strategieën, en word een Elden Lord.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
            <a href="{{ route('register') }}" class="px-8 py-4 bg-yellow-600 text-gray-900 text-lg font-bold rounded-lg hover:bg-yellow-500 transition glow">
                Begin je Reis
            </a>
            <a href="{{ route('news.index') }}" class="px-8 py-4 bg-gray-800 text-yellow-500 text-lg font-bold rounded-lg hover:bg-gray-700 transition border-2 border-yellow-600">
                Laatste Nieuws
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-20">
            <a href="{{ route('news.index') }}" class="card-hover bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-xl p-8 text-left">
                <div class="text-4xl mb-4">📰</div>
                <h3 class="text-2xl font-bold text-yellow-500 mb-3">Nieuws</h3>
                <p class="text-gray-400">
                    Blijf op de hoogte van de laatste updates, patches en community events.
                </p>
            </a>

            <a href="{{ route('bosses.index') }}" class="card-hover bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-xl p-8 text-left">
                <div class="text-4xl mb-4">🐉</div>
                <h3 class="text-2xl font-bold text-yellow-500 mb-3">Bosses</h3>
                <p class="text-gray-400">
                    Ontdek de machtigste vijanden en leer hun zwakheden kennen.
                </p>
            </a>

            <a href="{{ route('faq.index') }}" class="card-hover bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-xl p-8 text-left">
                <div class="text-4xl mb-4">❓</div>
                <h3 class="text-2xl font-bold text-yellow-500 mb-3">FAQ</h3>
                <p class="text-gray-400">
                    Vind antwoorden op veelgestelde vragen over gameplay en mechanics.
                </p>
            </a>

            <a href="{{ route('contact.index') }}" class="card-hover bg-gray-800/50 backdrop-blur-sm border border-yellow-600/30 rounded-xl p-8 text-left">
                <div class="text-4xl mb-4">⚔️</div>
                <h3 class="text-2xl font-bold text-yellow-500 mb-3">Community</h3>
                <p class="text-gray-400">
                    Sluit je aan bij duizenden Tarnished warriors wereldwijd.
                </p>
            </a>
        </div>
    </div>
</div>

<div class="bg-gray-900/80 backdrop-blur-md border-t border-yellow-600/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-5xl font-bold text-yellow-500 mb-2">{{ \App\Models\User::count() }}</div>
                <div class="text-gray-400 text-lg">Tarnished Warriors</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-yellow-500 mb-2">{{ \App\Models\News::count() }}</div>
                <div class="text-gray-400 text-lg">Nieuws Artikelen</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-yellow-500 mb-2">{{ \App\Models\Boss::count() }}</div>
                <div class="text-gray-400 text-lg">Epic Bosses</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-yellow-500 mb-2">{{ \App\Models\Faq::count() }}</div>
                <div class="text-gray-400 text-lg">FAQ Items</div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-900 border-t border-yellow-600/30 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-gray-400">
            © 2025 Elden Ring Community. Alle rechten voorbehouden.
        </p>
        <p class="text-gray-500 text-sm mt-2">
            Fan-made website. Elden Ring is eigendom van FromSoftware & Bandai Namco.
        </p>
    </div>
</footer>
</body>
</html>


