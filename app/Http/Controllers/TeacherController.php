<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function index() 
    {
        $users = User::where('role', 'Professor')->get();
        $title = 'Lista de Professores';
        return view('director.teachers', compact('users', 'title'));
    }

    public function store(TeacherRequest $request)
    {
        $teacher = $request->validated();

        User::create($teacher);

        return Redirect::route('teacher.index');
    }
}
