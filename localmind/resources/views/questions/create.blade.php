@extends('layouts.app')

@section('title', 'Poser une question')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Poser une question</h1>

        <form action="{{ route('questions.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700" for="title">Titre</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" required class="mt-1 block w-full rounded-xl border border-slate-300 px-3 py-2 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700" for="content">Description</label>
                <textarea id="content" name="content" rows="5" required class="mt-1 block w-full rounded-xl border border-slate-300 px-3 py-2 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700" for="location">Localisation</label>
                <input id="location" name="location" type="text" value="{{ old('location') }}" required class="mt-1 block w-full rounded-xl border border-slate-300 px-3 py-2 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">
                @error('location')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="latitude">Latitude (optionnel)</label>
                    <input id="latitude" name="latitude" type="text" value="{{ old('latitude') }}" class="mt-1 block w-full rounded-xl border border-slate-300 px-3 py-2 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="longitude">Longitude (optionnel)</label>
                    <input id="longitude" name="longitude" type="text" value="{{ old('longitude') }}" class="mt-1 block w-full rounded-xl border border-slate-300 px-3 py-2 shadow-sm outline-none focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">
                </div>
            </div>

            <button class="inline-flex w-full items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800" type="submit">
                Publier
            </button>
        </form>
    </div>
</div>
@endsection
