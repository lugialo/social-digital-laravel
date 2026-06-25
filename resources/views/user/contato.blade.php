@extends('layouts.app')

@section('title', 'Contato')

@section('content')
@php $user = Auth::user(); @endphp

<div class="navbar navbar-dark bg-primary rounded mb-3 px-3">
    <h2 class="text-white mb-0">Contato</h2>
</div>

<form action="{{ route('user.contato.store') }}" method="POST" style="max-width: 700px;">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nome</label>
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="assunto">Assunto</label>
        <input type="text" id="assunto" name="assunto"
               class="form-control @error('assunto') is-invalid @enderror"
               value="{{ old('assunto') }}" required maxlength="255">
        @error('assunto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" rows="6"
                  class="form-control @error('mensagem') is-invalid @enderror"
                  required maxlength="2000">{{ old('mensagem') }}</textarea>
        @error('mensagem')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
</form>
@endsection
