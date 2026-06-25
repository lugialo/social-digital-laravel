@extends('layouts.app')

@section('title', 'Avaliação')

@section('content')
<form action="{{ route('user.avaliacao.store') }}" method="POST">
    @csrf
    <ul class="list-group">
        <li class="list-group-item active d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Avaliação</h4>
            <span>1 - Muito ruim &nbsp;|&nbsp; 2 - Ruim &nbsp;|&nbsp; 3 - Ok &nbsp;|&nbsp; 4 - Bom &nbsp;|&nbsp; 5 - Muito bom</span>
        </li>

        @foreach([
            'velocidade'  => 'Nota geral para a velocidade do sistema.',
            'usabilidade' => 'Nota geral para a usabilidade do sistema.',
            'design'      => 'Nota geral para o design do sistema.',
            'atendimento' => 'Nota geral para o atendimento.',
            'geral'       => 'Nota geral para o sistema.',
        ] as $campo => $label)
        <li class="list-group-item d-flex align-items-center justify-content-between">
            <span>{{ $label }}</span>
            <select name="{{ $campo }}" class="form-control-sm btn-outline-primary @error($campo) is-invalid @enderror" required>
                <option value="">Nota</option>
                @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ old($campo) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error($campo)
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </li>
        @endforeach

        <li class="list-group-item">
            <button type="submit" class="btn btn-primary col-md-12">Enviar</button>
        </li>
    </ul>
</form>
@endsection
