@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex justify-content-between d-flex align-items-center" style="padding: 10px;">
            <div>
                <form action="{{ route('admin.users.index') }}" method="GET"
                      class="d-flex justify-content-around d-flex align-items-center">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar"
                           name="search" id="search" value="{{ $search ?? '' }}">
                    <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="Buscar">
                    @if($search)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary my-2 my-sm-0 ml-1">Limpar</a>
                    @endif
                </form>
            </div>
            <a class="btn btn-success" style="font-size: 16px; font-weight:500;"
               href="{{ route('admin.users.create') }}">NOVO</a>
        </div>

        <table class="table table-striped">
            <thead class="thead-Primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">RG</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ação</th>
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
                    <td>{{ $user->role === 'admin' ? 'Admin' : 'Usuário' }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('admin.users.edit', $user) }}" class="edit_btn">
                            <img src="/pi353socialdigital/IMAGES/editar.png" alt="editar"
                                 onerror="this.replaceWith(Object.assign(document.createElement('a'),{href:this.parentElement.href,className:'btn btn-sm btn-outline-primary',textContent:'Editar'}))">
                        </a>
                        <a href="{{ route('admin.users.print', $user) }}" target="_blank" class="view_btn">
                            <img src="/pi353socialdigital/IMAGES/impressao.png" alt="imprimir"
                                 onerror="this.replaceWith(Object.assign(document.createElement('a'),{href:this.parentElement.href,className:'btn btn-sm btn-outline-secondary',textContent:'Imprimir'}))">
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Excluir {{ $user->name }}?')">
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
                    <td colspan="9" class="text-center text-muted">Nenhum usuário encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
@endsection
