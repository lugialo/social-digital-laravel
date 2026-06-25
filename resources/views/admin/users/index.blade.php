@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Usuários</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-success">Novo</a>
</div>

<form action="{{ route('admin.users.index') }}" method="GET" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control mr-2" placeholder="Buscar por nome, CPF ou ID"
           value="{{ $search ?? '' }}">
    <button type="submit" class="btn btn-outline-primary">Buscar</button>
    @if($search)
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary ml-2">Limpar</a>
    @endif
</form>

<div class="card">
    <table class="table table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Nascimento</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->cpf ?? '—' }}</td>
                <td>{{ $user->rg ?? '—' }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone ?? '—' }}</td>
                <td>{{ $user->birth_date ? $user->birth_date->format('d/m/Y') : '—' }}</td>
                <td>
                    <span class="badge badge-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">
                        {{ $user->role === 'admin' ? 'Admin' : 'Usuário' }}
                    </span>
                </td>
                <td class="text-nowrap">
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    <a href="{{ route('admin.users.print', $user) }}" class="btn btn-sm btn-outline-secondary" target="_blank">Imprimir</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Excluir {{ $user->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center text-muted">Nenhum usuário encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $users->links() }}
</div>
@endsection
