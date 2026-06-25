<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório — {{ $user->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        h1 { font-size: 20px; margin-bottom: 4px; }
        .subtitle { color: #666; font-size: 13px; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px 12px; border: 1px solid #ccc; }
        td:first-child { font-weight: bold; width: 180px; background: #f5f5f5; }
        @media print { button { display: none; } }
    </style>
</head>
<body>
    <h1>Social Digital</h1>
    <div class="subtitle">Relatório de Usuário — gerado em {{ now()->format('d/m/Y H:i') }}</div>

    <table>
        <tr><td>ID</td><td>{{ $user->id }}</td></tr>
        <tr><td>Nome</td><td>{{ $user->name }}</td></tr>
        <tr><td>CPF</td><td>{{ $user->cpf ?? '—' }}</td></tr>
        <tr><td>RG</td><td>{{ $user->rg ?? '—' }}</td></tr>
        <tr><td>Email</td><td>{{ $user->email }}</td></tr>
        <tr><td>Celular</td><td>{{ $user->phone ?? '—' }}</td></tr>
        <tr><td>Nascimento</td><td>{{ $user->birth_date ? $user->birth_date->format('d/m/Y') : '—' }}</td></tr>
        <tr><td>Tipo</td><td>{{ $user->role === 'admin' ? 'Admin' : 'Usuário' }}</td></tr>
        <tr><td>Cadastrado em</td><td>{{ $user->created_at->format('d/m/Y H:i') }}</td></tr>
    </table>

    <br>
    <button onclick="window.print()">Imprimir</button>
</body>
</html>
