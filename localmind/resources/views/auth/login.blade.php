@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="mx-auto w-full max-w-md">
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Connexion</h1>

        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-1 block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Mot de passe</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="mt-1 block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10"
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-700">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/10">
                <span>Se souvenir de moi</span>
            </label>

            <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">
                Se connecter
            </button>
        </form>

        <p class="mt-6 text-sm text-slate-600">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="font-medium text-slate-900 underline underline-offset-4 hover:text-slate-700">S'inscrire</a>
        </p>
    </div>
</div>
@endsection