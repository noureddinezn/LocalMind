@extends('layouts.app')

@section('title', 'Questions')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Questions</h1>
            <p class="mt-1 text-sm text-slate-600">Toutes les questions publiées.</p>
        </div>
        <a href="{{ route('questions.create') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">
            ➕ Poser une question
        </a>
    </div>

    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="divide-y divide-slate-200">
            @forelse($questions as $question)
                <div class="p-5">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="text-base font-semibold text-slate-900">
                            <a href="{{ route('questions.show', $question->id) }}" class="hover:underline">
                                {{ $question->title }}
                            </a>
                        </h2>
                        <span class="shrink-0 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                            {{ $question->responses_count }} réponses
                        </span>
                    </div>
                    <p class="mt-1 text-sm text-slate-600">📍 {{ $question->location }} • Par {{ $question->user->name }} • {{ $question->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <div class="p-5 text-sm text-slate-600">Aucune question pour le moment.</div>
            @endforelse
        </div>

        @if(method_exists($questions, 'links'))
            <div class="border-t border-slate-200 p-4">
                {{ $questions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
