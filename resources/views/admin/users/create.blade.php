@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<form action="{{ route('admin.users.store') }}" method="POST" style="width: 60%; margin: auto;">
    @csrf

    <div style="display:flex; align-items:center; justify-content:space-between">
        <h3>Novo usuário</h3>
        <a href="{{ route('admin.users.index') }}" style="margin-bottom: 10px;" class="btn btn-outline-primary">Voltar</a>
    </div>
    <hr><br>

    <div class="form-row">
        <div class="form-group col-md-5">
            <label>Nome *</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="Nome" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-5">
            <label>Email *</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="Email" required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-2">
            <label>Senha *</label>
            <input type="text" name="password" id="passwordField"
                   class="form-control @error('password') is-invalid @enderror"
                   value="{{ old('password') }}" placeholder="Senha" required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Tipo de Usuário *</label>
            <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="user"  {{ old('role') === 'user'  ? 'selected' : '' }}>Usuário</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-3">
            <label>CPF *</label>
            <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                   value="{{ old('cpf') }}" placeholder="CPF" maxlength="11" required>
            @error('cpf')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-3">
            <label>RG</label>
            <input type="text" name="rg" class="form-control @error('rg') is-invalid @enderror"
                   value="{{ old('rg') }}" placeholder="RG" maxlength="7">
            @error('rg')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-2">
            <label>Nascimento</label>
            <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror"
                   value="{{ old('birth_date') }}">
            @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-2">
            <label>Celular</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone') }}" placeholder="Celular">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row align-items-end">
        <div class="form-group col-md-12">
            <button type="button" class="btn btn-outline-secondary" onclick="generatePassword()">
                Gerar senha aleatória
            </button>
        </div>
    </div>

    <button type="submit" name="sbmt" class="btn btn-primary col-md-12">Cadastrar</button>
</form>

@push('scripts')
<script>
function generatePassword() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%*-';
    let password = '';
    for (let i = 0; i < 8; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('passwordField').value = password;
}
</script>
@endpush
@endsection
