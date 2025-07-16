@extends('layouts.guest')

@section('auth-content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4" style="min-width:350px; max-width:400px; width:100%;">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if (session('status'))
                <div class="alert alert-info text-center mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo electrónico o número de teléfono">
            @error('email')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" required placeholder="Contraseña">
            @error('password')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="btn btn-primary btn-block mb-2" style="font-weight:bold; font-size:1.2rem;">Iniciar sesión</button>
            <div class="text-center mb-2">
                @if (Route::has('password.request'))
                    <a class="small" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
            </div>
            <hr>
            <div class="text-center">
                <a href="{{ route('register') }}" class="btn btn-success btn-block" style="font-weight:bold; font-size:1.1rem;">Crear cuenta nueva</a>
            </div>
        </form>
    </div>
</div>
@endsection
