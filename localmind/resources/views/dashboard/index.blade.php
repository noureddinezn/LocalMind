@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="dashboard">
    <h1>Tableau de bord</h1>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📊</div>
            <div class="stat-info">
                <h3>{{ $stats['total_questions'] }}</h3>
                <p>Questions totales</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">💬</div>
            <div class="stat-info">
                <h3>{{ $stats['total_responses'] }}</h3>
                <p>Réponses totales</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <h3>{{ $stats['total_users'] }}</h3>
                <p>Utilisateurs</p>
            </div>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card highlight">
            <div class="stat-icon">❓</div>
            <div class="stat-info">
                <h3>{{ $stats['my_questions'] }}</h3>
                <p>Mes questions</p>
            </div>
        </div>

        <div class="stat-card highlight">
            <div class="stat-icon">✍️</div>
            <div class="stat-info">
                <h3>{{ $stats['my_responses'] }}</h3>
                <p>Mes réponses</p>
            </div>
        </div>

        <div class="stat-card highlight">
            <div class="stat-icon">⭐</div>
            <div class="stat-info">
                <h3>{{ $stats['my_favorites'] }}</h3>
                <p>Mes favoris</p>
            </div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('questions.create') }}" class="btn btn-primary">➕ Poser une question</a>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">📋 Voir toutes les questions</a>
    </div>

    <div class="popular-questions">
        <h2>Questions les plus populaires</h2>
        
        @if($popularQuestions->count() > 0)
            <div class="questions-list">
                @foreach($popularQuestions as $question)
                    <div class="question-item">
                        <div class="question-header">
                            <h3>
                                <a href="{{ route('questions.show', $question->id) }}">
                                    {{ $question->title }}
                                </a>
                            </h3>
                            <span class="badge-count">{{ $question->responses_count }} réponses</span>
                        </div>
                        <p class="question-meta">
                            📍 {{ $question->location }} • 
                            Par {{ $question->user->name }} • 
                            {{ $question->created_at->diffForHumans() }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-data">Aucune question pour le moment.</p>
        @endif
    </div>
</div>
@endsection