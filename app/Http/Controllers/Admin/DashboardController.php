<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visita;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::where('role', 'user')->count();
        $totalVisitas  = Visita::count();
        $visitasMes    = Visita::whereMonth('data', now()->month)
                               ->whereYear('data', now()->year)
                               ->count();

        // Visitas por mês nos últimos 12 meses
        $visitasPorMes = Visita::selectRaw("strftime('%Y-%m', data) as mes, COUNT(*) as total")
            ->where('data', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        $mesesLabels = [];
        $mesesData   = [];
        for ($i = 11; $i >= 0; $i--) {
            $dt  = now()->subMonths($i);
            $key = $dt->format('Y-m');
            $mesesLabels[] = $dt->format('M/Y');
            $mesesData[]   = $visitasPorMes[$key] ?? 0;
        }

        // Visitas por assistente (top 8)
        $visitasPorAssistente = Visita::join('users', 'visitas.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('COUNT(*) as total'))
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total')
            ->limit(8)
            ->get();

        $visitasRecentes = Visita::with('assistente')
            ->orderByDesc('data')
            ->orderByDesc('hora')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalVisitas',
            'visitasMes',
            'mesesLabels',
            'mesesData',
            'visitasPorAssistente',
            'visitasRecentes',
        ));
    }
}
