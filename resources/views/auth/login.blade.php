@extends('layouts.app')

@section('title', 'Login')

@section('content')
<br><br>
<form method="POST" action="/login"
      style="width: 40%; margin: auto; border:2px solid royalblue; border-radius:10px; background-color:#EEEEEE; padding: 20px;">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="form-row">
        <div class="form-group col-md-6">
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
        <div class="form-group col-md-6">
            <label for="password">Senha</label>
            <input type="password"
                   id="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Senha"
                   required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary col-md-12">Entrar</button>
</form>
@endsection
