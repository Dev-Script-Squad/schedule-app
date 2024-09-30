<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClassRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    public function index()
    {
        $schoolclasses = SchoolClass::all();

        // $students = $schoolclasses->current;

        // dd($students);
        return view('director.schoolclasses', compact('schoolclasses'));
    }
    
    public function indexStudents()
    {
        $schoolclasses = SchoolClass::all();
        return view('director.schoolclasses', compact('schoolclasses'));
    }
    public function show(SchoolClass $schoolclass)
    {    
        // dd($schoolclass->students);
        return view('director.schoolclasses', [
            'schoolclass' => $schoolclass,
            'students' => $schoolclass->students,
        ]);
    }

    public function store(SchoolClassRequest $request)
    {
        $schoolclass = $request->validated();
        SchoolClass::create($schoolclass);

        return Redirect::route('schoolclass.index');
    }
    public function remove(SchoolClass $schoolclass)
    {
        $schoolclass->delete();
        return redirect()->route('schoolclass.index')->with('success', 'Turma removida com sucesso!');
    }
}
