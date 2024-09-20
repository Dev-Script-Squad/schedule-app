<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function showAllStudents() 
    {
        $students = User::where('role', 'Aluno')->get();
        return view('students', [
            'users' => $students,
        ]);
    }
}