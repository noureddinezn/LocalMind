@extends('layouts.app')

@section('title', $question->title)

@section('content')
<div class="mx-auto max-w-3xl space-y-6">
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">{{ $question->title }}</h1>
                <p class="mt-1 text-sm text-slate-600">📍 {{ $question->location }} • Par {{ $question->user->name }} • {{ $question->created_at->diffForHumans() }}</p>
            </div>

            <form action="{{ route('favorites.toggle', $question->id) }}" method="POST">
                @csrf
                <button type="submit" class="rounded-xl bg-white px-4 py-2 text-sm font-semibold text-slate-900 ring-1 ring-slate-200 hover:bg-slate-50">
                    ⭐ Favori
                </button>
            </form>
        </div>

        <div class="prose mt-5 max-w-none text-slate-800">
            <p class="whitespace-pre-line">{{ $question->content }}</p>
        </div>

        @if(auth()->user()->isAdmin() || $question->user_id === auth()->id())
            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('questions.edit', $question->id) }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">Modifier</a>
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Supprimer cette question ?');">
                    @csrf
                    @method('DELETE')
                    <button class="inline-flex w-full items-center justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-red-500" type="submit">Supprimer</button>
                </form>
            </div>
        @endif
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <h2 class="text-lg font-semibold text-slate-900">Réponses ({{ $question->responses_count }})</h2>

        <form action="{{ route('responses.store', $question->id) }}" method="POST" class="mt-4 space-y-3">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700" for="content">Votre réponse</label>
                <textarea id="content" name="content" rows="4" required class="mt-1 block w-full rounded-xl border border-slate-300 px-3 py-2 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800" type="submit">Répondre</button>
        </form>

        <div class="mt-6 divide-y divide-slate-200">
            @forelse($question->responses as $response)
                <div class="py-4">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-slate-900">{{ $response->user->name }}</p>
                            <p class="mt-1 whitespace-pre-line text-sm text-slate-700">{{ $response->content }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ $response->created_at->diffForHumans() }}</p>
                        </div>
                        @if(auth()->user()->isAdmin() || $response->user_id === auth()->id())
                            <form action="{{ route('responses.destroy', $response->id) }}" method="POST" onsubmit="return confirm('Supprimer cette réponse ?');">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-lg bg-red-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-red-500" type="submit">Supprimer</button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="py-4 text-sm text-slate-600">Aucune réponse pour le moment.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
