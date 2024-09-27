<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'Aluno')->get();
        $title = 'Lista de Alunos';
        return view('director.students', compact('users', 'title'));
    }

    public function show(User $student)
    {

        return view('users', [
            'user' => $student,
        ]);
    }

    public function store(StudentRequest $request)
    {
        $student = $request->validated();

        User::create($student);

        return Redirect::route('student.index');
    }
}
