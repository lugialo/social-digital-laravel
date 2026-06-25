<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visita #{{ $visita->id }} — Social Digital</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; margin: 40px; color: #222; }
        h1 { font-size: 20px; margin-bottom: 4px; }
        .subtitle { color: #555; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td { padding: 6px 10px; vertical-align: top; }
        td:first-child { font-weight: bold; width: 180px; color: #444; }
        tr:nth-child(even) { background: #f5f5f5; }
        .section { font-size: 13px; font-weight: bold; text-transform: uppercase;
                   letter-spacing: 1px; color: #555; border-bottom: 1px solid #ccc;
                   padding-bottom: 4px; margin: 20px 0 8px; }
        .block { background: #f9f9f9; border: 1px solid #ddd; border-radius: 4px;
                 padding: 10px 14px; margin-bottom: 10px; white-space: pre-wrap; }
        @media print { button { display: none; } }
    </style>
</head>
<body>
    <h1>Relatório de Visita #{{ $visita->id }}</h1>
    <p class="subtitle">Social Digital — emitido em {{ now()->format('d/m/Y H:i') }}</p>

    <div class="section">Dados da visita</div>
    <table>
        <tr><td>Assistente Social</td><td>{{ $visita->assistente->name ?? '—' }}</td></tr>
        <tr><td>Membro</td><td>{{ $visita->membro }}</td></tr>
        <tr><td>Data</td><td>{{ $visita->data->format('d/m/Y') }}</td></tr>
        <tr><td>Hora</td><td>{{ \Illuminate\Support\Str::substr($visita->hora, 0, 5) }}</td></tr>
    </table>

    <div class="section">Endereço</div>
    <table>
        <tr><td>Logradouro</td><td>{{ $visita->logradouro }}{{ $visita->numero ? ', ' . $visita->numero : '' }}</td></tr>
        <tr><td>Bairro</td><td>{{ $visita->bairro ?? '—' }}</td></tr>
        <tr><td>Cidade / Estado</td><td>{{ $visita->cidade }} — {{ $visita->estado }}</td></tr>
    </table>

    @if($visita->descricao)
    <div class="section">Descrição</div>
    <div class="block">{{ $visita->descricao }}</div>
    @endif

    @if($visita->observacao)
    <div class="section">Observação</div>
    <div class="block">{{ $visita->observacao }}</div>
    @endif

    <br>
    <button onclick="window.print()">Imprimir</button>
</body>
</html>
