@extends('layouts.app')

@section('title', 'Nova Visita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Nova Visita</h2>
    <a href="{{ route('admin.visitas.index') }}" class="btn btn-outline-secondary">Voltar</a>
</div>

<div class="card p-4" style="max-width: 860px;">
    <form action="{{ route('admin.visitas.store') }}" method="POST">
        @csrf

        <h5 class="mb-3">Dados da visita</h5>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Assistente Social *</label>
                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                    <option value="">Selecione...</option>
                    @foreach($assistentes as $assistente)
                        <option value="{{ $assistente->id }}" {{ old('user_id') == $assistente->id ? 'selected' : '' }}>
                            {{ $assistente->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
                <label>Membro *</label>
                <input type="text" name="membro" class="form-control @error('membro') is-invalid @enderror"
                       value="{{ old('membro') }}" required>
                @error('membro')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Data *</label>
                <input type="date" name="data" class="form-control @error('data') is-invalid @enderror"
                       value="{{ old('data') }}" required>
                @error('data')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
                <label>Hora *</label>
                <input type="time" name="hora" class="form-control @error('hora') is-invalid @enderror"
                       value="{{ old('hora') }}" required>
                @error('hora')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <h5 class="mb-3 mt-2">Endereço</h5>

        <div class="form-row">
            <div class="form-group col-md-8">
                <label>Logradouro *</label>
                <input type="text" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror"
                       value="{{ old('logradouro') }}" required>
                @error('logradouro')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-4">
                <label>Número</label>
                <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror"
                       value="{{ old('numero') }}">
                @error('numero')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Bairro</label>
                <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror"
                       value="{{ old('bairro') }}">
                @error('bairro')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-5">
                <label>Cidade *</label>
                <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                       value="{{ old('cidade') }}" required>
                @error('cidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-3">
                <label>Estado *</label>
                <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror"
                       value="{{ old('estado', 'SC') }}" maxlength="2" required>
                @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <h5 class="mb-3 mt-2">Detalhes</h5>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" rows="3"
                      class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao') }}</textarea>
            @error('descricao')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label>Observação</label>
            <textarea name="observacao" rows="3"
                      class="form-control @error('observacao') is-invalid @enderror">{{ old('observacao') }}</textarea>
            @error('observacao')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Registrar visita</button>
    </form>
</div>
@endsection
