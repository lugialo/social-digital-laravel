@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
@php $user = Auth::user(); @endphp

<div class="navbar navbar-dark bg-primary rounded mb-3 px-3">
    <h2 class="text-white mb-0">Usuário</h2>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Nascimento</th>
                <th>Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->cpf }}</td>
                <td>{{ $user->rg }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->birth_date ? $user->birth_date->format('d/m/Y') : '—' }}</td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
