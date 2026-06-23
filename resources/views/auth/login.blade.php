@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-10 col-sm-8 col-md-6 col-lg-4">
        <div class="card shadow rounded-3">
            <div class="card-body p-4 p-xl-5">
                <h1 class="text-center text-primary mb-4">Login</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               placeholder="E-mail"
                               required
                               autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Senha"
                               required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Lembrar-me</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
