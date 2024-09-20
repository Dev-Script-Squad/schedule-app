<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
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
}
