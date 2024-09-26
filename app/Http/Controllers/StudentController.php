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

    public function store(StudentRequest $request)
    {
        $student = $request->validated();

        if(!$student) {
            return back()->withErrors([
                'Preencha todos os campos corretamente!'
            ]);
        };

        User::create($student);

        return Redirect::route('student.index');
    }
}
