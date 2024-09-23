<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role === 'Diretor') {
                return redirect('/users');
            } elseif ($user->role === 'Professor') {
                return 'Olá professor!';
            } elseif ($user->role === 'Aluno') {
                return 'Olá Aluno!';
            }
            return redirect('/home');
        }
        return 'Dados incorretos';
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
