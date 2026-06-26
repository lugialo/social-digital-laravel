@extends('layouts.app')

@section('title', 'Editar Visita')

@section('content')
<form action="{{ route('admin.visitas.update', $visita) }}" method="POST" style="width: 60%; margin: auto;">
    @csrf
    @method('PUT')

    <div style="display:flex; align-items:center; justify-content:space-between">
        <h3>Editar visita #{{ $visita->id }}</h3>
        <a href="{{ route('admin.visitas.index') }}" style="margin-bottom: 10px;" class="btn btn-outline-primary">Voltar</a>
    </div>
    <hr><br>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Assistente Social *</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                <option value="">Selecione...</option>
                @foreach($assistentes as $assistente)
                    <option value="{{ $assistente->id }}"
                        {{ old('user_id', $visita->user_id) == $assistente->id ? 'selected' : '' }}>
                        {{ $assistente->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-4">
            <label>Membro *</label>
            <input type="text" name="membro" class="form-control @error('membro') is-invalid @enderror"
                   value="{{ old('membro', $visita->membro) }}" placeholder="Membro" required>
            @error('membro')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-2">
            <label>Data *</label>
            <input type="date" name="data" class="form-control @error('data') is-invalid @enderror"
                   value="{{ old('data', $visita->data->format('Y-m-d')) }}" required>
            @error('data')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-2">
            <label>Hora *</label>
            <input type="time" name="hora" class="form-control @error('hora') is-invalid @enderror"
                   value="{{ old('hora', \Illuminate\Support\Str::substr($visita->hora, 0, 5)) }}" required>
            @error('hora')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Observações</label>
            <textarea name="observacao" class="form-control @error('observacao') is-invalid @enderror"
                      cols="30" rows="6">{{ old('observacao', $visita->observacao) }}</textarea>
            @error('observacao')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror"
                      cols="30" rows="6">{{ old('descricao', $visita->descricao) }}</textarea>
            @error('descricao')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-1">
            <label>Estado *</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror"
                   value="{{ old('estado', $visita->estado) }}" placeholder="UF" maxlength="2" required>
            @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-7">
            <label>Cidade *</label>
            <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                   value="{{ old('cidade', $visita->cidade) }}" placeholder="Cidade" required>
            @error('cidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-4">
            <label>Bairro</label>
            <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror"
                   value="{{ old('bairro', $visita->bairro) }}" placeholder="Bairro">
            @error('bairro')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <label>Logradouro *</label>
            <input type="text" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror"
                   value="{{ old('logradouro', $visita->logradouro) }}" placeholder="Rua" required>
            @error('logradouro')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-4">
            <label>Número</label>
            <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror"
                   value="{{ old('numero', $visita->numero) }}" placeholder="Número">
            @error('numero')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <button type="submit" name="sbmt" class="btn btn-primary col-md-12">Salvar alterações</button>
</form>
@endsection
