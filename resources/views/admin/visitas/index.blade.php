@extends('layouts.app')

@section('title', 'Visitas')

@section('content')
<div class="container">
    <div style="display:flex; color:white; align-items:center; justify-content:space-between"
         class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <h3>Tabela de visitas</h3>
    </div>

    <div class="card">
        <div class="d-flex justify-content-between d-flex align-items-center" style="padding: 10px;">
            <div>
                <form action="{{ route('admin.visitas.index') }}" method="GET"
                      class="d-flex justify-content-around d-flex align-items-center">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar"
                           name="search" id="search" value="{{ $search ?? '' }}">
                    <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="Buscar">
                    @if($search)
                        <a href="{{ route('admin.visitas.index') }}" class="btn btn-outline-secondary my-2 my-sm-0 ml-1">Limpar</a>
                    @endif
                </form>
            </div>
            <a class="btn btn-success" style="font-size: 16px; font-weight:500;"
               href="{{ route('admin.visitas.create') }}">NOVA VISITA</a>
        </div>

        <table class="table table-striped">
            <thead class="thead-Primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Assistente</th>
                    <th scope="col">Membro</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse($visitas as $visita)
                <tr>
                    <td>{{ $visita->id }}</td>
                    <td>{{ $visita->assistente->name ?? '—' }}</td>
                    <td>{{ $visita->membro }}</td>
                    <td>{{ $visita->estado }}</td>
                    <td>{{ $visita->cidade }}</td>
                    <td>{{ $visita->data->format('d/m/Y') }}</td>
                    <td>{{ \Illuminate\Support\Str::substr($visita->hora, 0, 5) }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('admin.visitas.edit', $visita) }}" class="edit_btn">
                            <img src="/pi353socialdigital/IMAGES/editar.png" alt="editar"
                                 onerror="this.replaceWith(Object.assign(document.createElement('a'),{href:this.parentElement.href,className:'btn btn-sm btn-outline-primary',textContent:'Editar'}))">
                        </a>
                        <a href="{{ route('admin.visitas.print', $visita) }}" target="_blank" class="view_btn">
                            <img src="/pi353socialdigital/IMAGES/impressao.png" alt="imprimir"
                                 onerror="this.replaceWith(Object.assign(document.createElement('a'),{href:this.parentElement.href,className:'btn btn-sm btn-outline-secondary',textContent:'Imprimir'}))">
                        </a>
                        <form action="{{ route('admin.visitas.destroy', $visita) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Excluir visita #{{ $visita->id }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="del_btn" style="background:none;border:none;padding:0;">
                                <img src="/pi353socialdigital/IMAGES/lixo.png" alt="excluir"
                                     onerror="this.closest('form').innerHTML='<button type=\'submit\' class=\'btn btn-sm btn-outline-danger\'>Excluir</button>'">
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Nenhuma visita encontrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $visitas->links() }}
    </div>
</div>
@endsection
