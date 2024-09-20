<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function createUser(Request $request)
    {
        $user = User::create([
            'name' => 'Thiaguinho Bentinho',
            'email' => 'thiago@a.com',
            'password' => 'thiago',
            'role' => 'Aluno'
        ]);

        return $user;
    }
}
