@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    .card-stat { border-left: 4px solid; }
    .card-stat.primary  { border-color: #007bff; }
    .card-stat.success  { border-color: #28a745; }
    .card-stat.info     { border-color: #17a2b8; }
    .card-stat .number  { font-size: 2rem; font-weight: 700; }
    .card-stat .label   { font-size: .85rem; text-transform: uppercase; color: #6c757d; }
</style>
@endpush

@section('content')
<h2 class="mb-4">Dashboard</h2>

{{-- Visão geral --}}
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card card-stat primary h-100">
            <div class="card-body">
                <div class="number text-primary">{{ $totalUsuarios }}</div>
                <div class="label">Usuários cadastrados</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card card-stat success h-100">
            <div class="card-body">
                <div class="number text-success">{{ $totalVisitas }}</div>
                <div class="label">Total de visitas</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card card-stat info h-100">
            <div class="card-body">
                <div class="number text-info">{{ $visitasMes }}</div>
                <div class="label">Visitas este mês</div>
            </div>
        </div>
    </div>
</div>

{{-- Gráficos --}}
<div class="row mb-4">
    <div class="col-md-8 mb-3">
        <div class="card h-100">
            <div class="card-header">Visitas por mês (últimos 12 meses)</div>
            <div class="card-body">
                <canvas id="chartMes" height="120"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-header">Visitas por assistente</div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <canvas id="chartAssistente"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Painel de visitas recentes --}}
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Visitas recentes</span>
        <a href="{{ route('admin.visitas.index') }}" class="btn btn-sm btn-outline-primary">Ver todas</a>
    </div>
    <div class="card-body p-0">
        @if($visitasRecentes->isEmpty())
            <p class="p-3 mb-0 text-muted">Nenhuma visita registrada.</p>
        @else
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Membro</th>
                        <th>Assistente</th>
                        <th>Data</th>
                        <th>Cidade</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitasRecentes as $visita)
                    <tr>
                        <td>{{ $visita->id }}</td>
                        <td>{{ $visita->membro }}</td>
                        <td>{{ $visita->assistente->name ?? '—' }}</td>
                        <td>{{ $visita->data->format('d/m/Y') }}</td>
                        <td>{{ $visita->cidade }} - {{ $visita->estado }}</td>
                        <td>
                            <a href="{{ route('admin.visitas.show', $visita) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    // Gráfico de barras — visitas por mês
    const labels  = @json($mesesLabels);
    const dataBar = @json($mesesData);

    new Chart(document.getElementById('chartMes'), {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: 'Visitas',
                data: dataBar,
                backgroundColor: 'rgba(0, 123, 255, 0.6)',
                borderColor: '#007bff',
                borderWidth: 1,
            }]
        },
        options: {
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
            plugins: { legend: { display: false } },
        }
    });

    // Gráfico de rosca — visitas por assistente
    const assistentes = @json($visitasPorAssistente->pluck('name'));
    const totaisAssistente = @json($visitasPorAssistente->pluck('total'));
    const cores = ['#007bff','#28a745','#17a2b8','#ffc107','#dc3545','#6f42c1','#fd7e14','#20c997'];

    new Chart(document.getElementById('chartAssistente'), {
        type: 'doughnut',
        data: {
            labels: assistentes,
            datasets: [{
                data: totaisAssistente,
                backgroundColor: cores.slice(0, assistentes.length),
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom' } },
        }
    });
</script>
@endpush
