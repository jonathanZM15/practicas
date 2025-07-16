@extends('layouts.guest')

@section('auth-content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4" style="min-width:400px; max-width:500px; width:100%;">
        <h2 class="text-center mb-1" style="font-weight:bold;">Crea una cuenta</h2>
        <div class="text-center mb-3 text-muted">Por favor, completa todos los campos.</div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre">
                @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Correo electrónico">
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Contraseña">
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar contraseña">
            </div>
            <div class="mb-2">
                <label for="titulo_pdf" class="form-label">Título en PDF</label>
                <input id="titulo_pdf" type="file" class="form-control @error('titulo_pdf') is-invalid @enderror" name="titulo_pdf" accept="application/pdf" required>
                @error('titulo_pdf')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="qr_pdf" class="form-label">Código QR del título (PDF)</label>
                <input id="qr_pdf" type="file" class="form-control @error('qr_pdf') is-invalid @enderror" name="qr_pdf" accept="application/pdf" required>
                @error('qr_pdf')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-block mb-2" style="font-weight:bold; font-size:1.1rem;">Registrarte</button>
        </form>
        <div class="text-center mt-2">
            <a href="{{ route('login') }}" class="text-primary">¿Ya tienes una cuenta?</a>
        </div>
    </div>
</div>
@endsection
