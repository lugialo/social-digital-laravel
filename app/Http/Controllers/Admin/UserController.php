<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('cpf', 'like', "%{$search}%")
                        ->orWhere('id', is_numeric($search) ? $search : -1);
                });
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:65'],
            'cpf'        => ['required', 'string', 'max:20', 'unique:users,cpf'],
            'rg'         => ['nullable', 'string', 'max:20'],
            'email'      => ['required', 'email', 'max:45', 'unique:users,email'],
            'phone'      => ['nullable', 'string', 'max:25'],
            'birth_date' => ['nullable', 'date'],
            'role'       => ['required', Rule::in(['admin', 'user'])],
            'password'   => ['required', 'string', 'min:8'],
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuário cadastrado com sucesso.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:65'],
            'cpf'        => ['required', 'string', 'max:20', Rule::unique('users', 'cpf')->ignore($user->id)],
            'rg'         => ['nullable', 'string', 'max:20'],
            'email'      => ['required', 'email', 'max:45', Rule::unique('users', 'email')->ignore($user->id)],
            'phone'      => ['nullable', 'string', 'max:25'],
            'birth_date' => ['nullable', 'date'],
            'role'       => ['required', Rule::in(['admin', 'user'])],
            'password'   => ['nullable', 'string', 'min:8'],
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuário excluído com sucesso.');
    }

    public function print(User $user)
    {
        return view('admin.users.print', compact('user'));
    }
}
