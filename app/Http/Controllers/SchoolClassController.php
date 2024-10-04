<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClassRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $schoolclasses = SchoolClass::all();
        return view('director.schoolclasses', compact('schoolclasses'));
    }

    public function indexStudents()
    {
        $schoolclasses = SchoolClass::all();
        return view('director.schoolclasses', compact('schoolclasses'));
    }

    public function show(SchoolClass $schoolclass)
    {
        $students = $schoolclass->students()
            ->with('user', 'guardianUser')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->orderBy('users.name', 'asc')
            ->select('students.*')
            ->get();
        $studentCount = $students->count();

        $teachers = $schoolclass->teachers()
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->orderBy('users.name', 'asc')
            ->select('teachers.*')
            ->get();
        $teacherCount = $teachers->count();

        $availableStudents = Student::whereDoesntHave('classes', function ($query) use ($schoolclass) {
            $query->where('school_class_id', $schoolclass->id);
        })->get();

        return view('director.schoolclasses', [
            'schoolclass' => $schoolclass,
            'students' => $students,
            'teachers' => $teachers,
            'studentCount' => $studentCount,
            'teacherCount' => $teacherCount,
            'availableStudents' => $availableStudents
        ]);
    }

    public function addStudents(Request $request, SchoolClass $schoolclass)
    {
        $validatedData = $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
        ]);

        $schoolclass->students()->attach($validatedData['students'], ['current' => true]);

        return redirect()->route('schoolclass.show', $schoolclass->id)
            ->with('success', 'Alunos adicionados com sucesso à turma.');
    }
    public function removeStudents(Request $request, SchoolClass $schoolclass)
    {
        $validatedData = $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
        ]);
    
        $schoolclass->students()->detach($validatedData['students']);
    
        return redirect()->route('schoolclass.show', $schoolclass->id)
            ->with('success', 'Alunos removidos com sucesso da turma.');
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
