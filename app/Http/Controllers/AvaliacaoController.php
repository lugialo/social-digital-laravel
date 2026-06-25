<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function index()
    {
        return view('user.avaliacao');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'velocidade'  => 'required|integer|min:1|max:5',
            'usabilidade' => 'required|integer|min:1|max:5',
            'design'      => 'required|integer|min:1|max:5',
            'atendimento' => 'required|integer|min:1|max:5',
            'geral'       => 'required|integer|min:1|max:5',
        ]);

        Avaliacao::create([...$data, 'user_id' => Auth::id()]);

        return redirect()->route('user.avaliacao')->with('success', 'Avaliação cadastrada!');
    }
}
