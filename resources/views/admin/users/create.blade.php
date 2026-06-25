@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Novo Usuário</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Voltar</a>
</div>

<div class="card p-4" style="max-width: 760px;">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-8">
                <label>Nome *</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-4">
                <label>Tipo *</label>
                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Usuário</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>CPF *</label>
                <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                       value="{{ old('cpf') }}" required>
                @error('cpf')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
                <label>RG</label>
                <input type="text" name="rg" class="form-control @error('rg') is-invalid @enderror"
                       value="{{ old('rg') }}">
                @error('rg')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Email *</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
                <label>Celular</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                       value="{{ old('phone') }}">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Data de Nascimento</label>
                <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror"
                       value="{{ old('birth_date') }}">
                @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row align-items-end">
            <div class="form-group col-md-8">
                <label>Senha *</label>
                <input type="text" name="password" id="passwordField"
                       class="form-control @error('password') is-invalid @enderror"
                       value="{{ old('password') }}" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-4">
                <button type="button" class="btn btn-outline-secondary btn-block" onclick="generatePassword()">
                    Gerar senha
                </button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
function generatePassword() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%';
    let password = '';
    for (let i = 0; i < 10; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('passwordField').value = password;
}
</script>
@endpush
