@extends('layouts.auth')

@section('title', 'Entrar')

@section('content')
<h1 class="h4 text-center mb-1">Entrar</h1>
<p class="text-muted text-center small mb-4">Acesse o sistema da oficina</p>

@if (session('status'))
<div class="alert alert-success py-2">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror" required autofocus autocomplete="username">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input id="password" type="password" name="password"
            class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label small" for="remember">Lembrar de mim</label>
        </div>
        @if (Route::has('password.request'))
        <a class="small" href="{{ route('password.request') }}">Esqueceu a senha?</a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-box-arrow-in-right"></i> Entrar
    </button>
</form>

@if (Route::has('register'))
<p class="text-center small text-muted mt-4 mb-0">
    Não tem conta? <a href="{{ route('register') }}">Cadastre-se</a>
</p>
@endif
@endsection