@extends('layouts.app')

@section('title', 'Visitas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Visitas</h2>
    <a href="{{ route('admin.visitas.create') }}" class="btn btn-success">Nova visita</a>
</div>

<form action="{{ route('admin.visitas.index') }}" method="GET" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control mr-2" placeholder="Buscar por membro, assistente ou ID"
           value="{{ $search ?? '' }}">
    <button type="submit" class="btn btn-outline-primary">Buscar</button>
    @if($search)
        <a href="{{ route('admin.visitas.index') }}" class="btn btn-outline-secondary ml-2">Limpar</a>
    @endif
</form>

<div class="card">
    <table class="table table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Membro</th>
                <th>Assistente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($visitas as $visita)
            <tr>
                <td>{{ $visita->id }}</td>
                <td>{{ $visita->membro }}</td>
                <td>{{ $visita->assistente->name ?? '—' }}</td>
                <td>{{ $visita->data->format('d/m/Y') }}</td>
                <td>{{ \Illuminate\Support\Str::substr($visita->hora, 0, 5) }}</td>
                <td>{{ $visita->enderecoCompleto() }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('admin.visitas.edit', $visita) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    <a href="{{ route('admin.visitas.print', $visita) }}" class="btn btn-sm btn-outline-secondary" target="_blank">Imprimir</a>
                    <form action="{{ route('admin.visitas.destroy', $visita) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Excluir visita #{{ $visita->id }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Nenhuma visita encontrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $visitas->links() }}
</div>
@endsection
