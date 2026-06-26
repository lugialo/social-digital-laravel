<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visita;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $visitas = Visita::with('assistente')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('membro', 'like', "%{$search}%")
                        ->orWhereHas('assistente', fn ($q2) => $q2->where('name', 'like', "%{$search}%"))
                        ->orWhere('id', is_numeric($search) ? $search : -1);
                });
            })
            ->orderByDesc('data')
            ->orderByDesc('hora')
            ->paginate(15)
            ->withQueryString();

        return view('admin.visitas.index', compact('visitas', 'search'));
    }

    public function create()
    {
        $assistentes = User::orderBy('name')->get();

        return view('admin.visitas.create', compact('assistentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'membro' => ['required', 'string', 'max:100'],
            'data' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i'],
            'logradouro' => ['required', 'string', 'max:100'],
            'numero' => ['nullable', 'string', 'max:20'],
            'bairro' => ['nullable', 'string', 'max:80'],
            'cidade' => ['required', 'string', 'max:80'],
            'estado' => ['required', 'string', 'size:2'],
            'descricao' => ['nullable', 'string'],
            'observacao' => ['nullable', 'string'],
        ]);

        Visita::create($data);

        return redirect()->route('admin.visitas.index')
            ->with('success', 'Visita registrada com sucesso.');
    }

    public function edit(Visita $visita)
    {
        $assistentes = User::orderBy('name')->get();

        return view('admin.visitas.edit', compact('visita', 'assistentes'));
    }

    public function update(Request $request, Visita $visita)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'membro' => ['required', 'string', 'max:100'],
            'data' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i'],
            'logradouro' => ['required', 'string', 'max:100'],
            'numero' => ['nullable', 'string', 'max:20'],
            'bairro' => ['nullable', 'string', 'max:80'],
            'cidade' => ['required', 'string', 'max:80'],
            'estado' => ['required', 'string', 'size:2'],
            'descricao' => ['nullable', 'string'],
            'observacao' => ['nullable', 'string'],
        ]);

        $visita->update($data);

        return redirect()->route('admin.visitas.index')
            ->with('success', 'Visita atualizada com sucesso.');
    }

    public function destroy(Visita $visita)
    {
        $visita->delete();

        return redirect()->route('admin.visitas.index')
            ->with('success', 'Visita excluída com sucesso.');
    }

    public function print(Visita $visita)
    {
        return view('admin.visitas.print', compact('visita'));
    }
}
