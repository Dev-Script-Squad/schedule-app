<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('director.users', compact('users'));
    }
    public function show(User $user)
    {
        return view('director.users', [
            'user' => $user,
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = $request->validated();

        User::create($user);
        return redirect()->route('user.index')->with('ok','Deu certo');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
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
