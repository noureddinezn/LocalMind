@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h1>Connexion</h1>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
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
                <label class="checkbox-label">
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>

        <p class="auth-footer">
            Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
        </p>
    </div>
</div>
@endsection