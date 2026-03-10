@extends('layouts.app')

@section('title', config('app.name', 'LocalMind'))

@section('content')
<div class="mx-auto max-w-3xl">
    <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <h1 class="text-3xl font-semibold tracking-tight text-slate-900">
            {{ config('app.name', 'LocalMind') }}
        </h1>
        <p class="mt-3 text-base text-slate-600">
            Posez des questions, obtenez des réponses, et gardez vos favoris au même endroit.
        </p>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            @auth
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">
                    Aller au dashboard
                </a>
                <a href="{{ route('questions.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-slate-900 ring-1 ring-slate-200 hover:bg-slate-50">
                    Voir les questions
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-slate-900 ring-1 ring-slate-200 hover:bg-slate-50">
                    Inscription
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection
