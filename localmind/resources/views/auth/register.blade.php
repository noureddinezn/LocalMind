@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h1>Inscription</h1>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </form>

        <p class="auth-footer">
            Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
        </p>
    </div>
</div>
@endsection