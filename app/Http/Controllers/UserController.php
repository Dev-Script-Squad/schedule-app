<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users', [
            'user' => $user,
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = $request->validated();

        if(!$user) {
            return back()->withErrors([
                'Preencha todos os campos corretamente!'
            ]);
        };
        User::create($user);

        return Redirect::route('user.index');
    }

    public function update(HttpRequest $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);
        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if(!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function remove($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário removido com sucesso!');
    }
}
