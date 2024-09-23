<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', [
            'users' => $users,
        ]);
    }
    public function showUniqueUser($id)
    {
        $user = User::find($id);
        return view('users', [
            'user' => $user,
        ]);
    }

    public function createUser(UserRequest $request)
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

    public function updateUser(UserRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if(!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function removeUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário removido com sucesso!');
    }
}
