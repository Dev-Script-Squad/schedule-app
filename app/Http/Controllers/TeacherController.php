<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() 
    {
        $users = User::where('role', 'Professor')->get();
        return view('teachers', compact('users'));
    }
}
