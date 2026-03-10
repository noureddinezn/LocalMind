<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
            <a href="{{ url('/') }}" class="text-base font-semibold tracking-tight text-slate-900">
                {{ config('app.name', 'LocalMind') }}
            </a>

            <nav class="flex items-center gap-2 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg bg-slate-900 px-3 py-2 font-medium text-white hover:bg-slate-800">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="rounded-lg bg-slate-900 px-3 py-2 font-medium text-white hover:bg-slate-800">
                        Inscription
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-10">
        @yield('content')
    </main>
</body>
</html>
