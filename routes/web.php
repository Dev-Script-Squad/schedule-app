<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('home');
});


Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::group(['middleware' => ['auth']], function () {
    Route::post('/', [LoginController::class, 'logout'])->name('user.logout');
});


Route::group(['middleware' => ['auth', 'role:Diretor']], function () {
    // Route::get('/diretor-dashboard', [DirectorController::class, 'index']);

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::patch('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'remove'])->name('user.remove');
    });
    Route::prefix('school-classes')->group(function () {
        Route::get('/', [SchoolClassController::class, 'index'])->name('schoolclass.index');
        Route::post('/', [SchoolClassController::class, 'store'])->name('schoolclass.store');
        Route::get('/{schoolclass}', [SchoolClassController::class, 'show'])->name('schoolclass.show');
        Route::delete('/{schoolclass}', [SchoolClassController::class, 'remove'])->name('schoolclass.remove');
        
        Route::post('/{schoolclass}/add-students', [SchoolClassController::class, 'addStudents'])
            ->name('schoolclass.addStudents');
        Route::delete('/{schoolclass}/remove-students/{student}', [SchoolClassController::class, 'removeStudents'])
            ->name('schoolclass.removeStudents');

        Route::post('/{schoolclass}/add-teachers', [SchoolClassController::class, 'addTeachers'])
            ->name('schoolclass.addTeachers');
        Route::delete('/{schoolclass}/remove-teachers/{teacher}', [SchoolClassController::class, 'removeTeachers'])
            ->name('schoolclass.removeTeachers');
    });

    Route::post('/create-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
    
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
});

Route::group(['middleware' => ['auth', 'role:professor']], function () {
    Route::get('/professor-dashboard', 'ProfessorController@index');
});

Route::group(['middleware' => ['auth', 'role:aluno']], function () {
    Route::get('/aluno-dashboard', 'AlunoController@index');
});