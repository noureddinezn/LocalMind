@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Tableau de bord</h1>
        <p class="mt-1 text-sm text-slate-600">Vue d'ensemble de votre activité.</p>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-xl">📊</div>
                <div>
                    <p class="text-sm text-slate-600">Questions totales</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $stats['total_questions'] }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-xl">💬</div>
                <div>
                    <p class="text-sm text-slate-600">Réponses totales</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $stats['total_responses'] }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-xl">👥</div>
                <div>
                    <p class="text-sm text-slate-600">Utilisateurs</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $stats['total_users'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-xl">❓</div>
                <div>
                    <p class="text-sm text-slate-600">Mes questions</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $stats['my_questions'] }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-xl">✍️</div>
                <div>
                    <p class="text-sm text-slate-600">Mes réponses</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $stats['my_responses'] }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-xl">⭐</div>
                <div>
                    <p class="text-sm text-slate-600">Mes favoris</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $stats['my_favorites'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-3 sm:flex-row">
        <a href="{{ route('questions.create') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">
            ➕ Poser une question
        </a>
        <a href="{{ route('questions.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-slate-900 ring-1 ring-slate-200 hover:bg-slate-50">
            📋 Voir toutes les questions
        </a>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <div class="flex items-baseline justify-between gap-4">
            <h2 class="text-lg font-semibold text-slate-900">Questions les plus populaires</h2>
        </div>

        @if($popularQuestions->count() > 0)
            <div class="mt-4 divide-y divide-slate-200">
                @foreach($popularQuestions as $question)
                    <div class="py-4">
                        <div class="flex items-start justify-between gap-4">
                            <h3 class="text-base font-semibold text-slate-900">
                                <a href="{{ route('questions.show', $question->id) }}" class="hover:underline">
                                    {{ $question->title }}
                                </a>
                            </h3>
                            <span class="shrink-0 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                                {{ $question->responses_count }} réponses
                            </span>
                        </div>
                        <p class="mt-1 text-sm text-slate-600">
                            📍 {{ $question->location }} •
                            Par {{ $question->user->name }} •
                            {{ $question->created_at->diffForHumans() }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4 text-sm text-slate-600">Aucune question pour le moment.</p>
        @endif
    </div>
</div>
@endsection