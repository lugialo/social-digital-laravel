<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    public function index()
    {
        return view('user.contato');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'assunto' => 'required|string|max:255',
            'mensagem' => 'required|string|max:2000',
        ]);

        Contato::create([...$data, 'user_id' => Auth::id()]);

        return redirect()->route('user.contato')->with('success', 'Mensagem enviada com sucesso!');
    }
}
