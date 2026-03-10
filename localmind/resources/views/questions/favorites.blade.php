@extends('layouts.app')

@section('title', 'Mes favoris')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Mes favoris</h1>
        <p class="mt-1 text-sm text-slate-600">Questions que vous avez ajoutées en favoris.</p>
    </div>

    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="divide-y divide-slate-200">
            @forelse($favorites as $favorite)
                <div class="p-5">
                    <h2 class="text-base font-semibold text-slate-900">
                        <a href="{{ route('questions.show', $favorite->question->id) }}" class="hover:underline">
                            {{ $favorite->question->title }}
                        </a>
                    </h2>
                    <p class="mt-1 text-sm text-slate-600">📍 {{ $favorite->question->location }} • Par {{ $favorite->question->user->name }}</p>
                </div>
            @empty
                <div class="p-5 text-sm text-slate-600">Aucun favori pour le moment.</div>
            @endforelse
        </div>

        @if(method_exists($favorites, 'links'))
            <div class="border-t border-slate-200 p-4">
                {{ $favorites->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
