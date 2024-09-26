<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('home');
});

// Rotas de login!

Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::group(['middleware' => ['auth']],  function() {
    Route::post('/', [LoginController::class, 'logout'])->name('user.logout');
});




Route::prefix('users')->group(function () {
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
});



// Rotas de admin (Diretor/Coordenador)

Route::group(['middleware' => ['auth', 'role:Diretor']], function () {
    // Route::get('/diretor-dashboard', [DirectorController::class, 'index']);
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/create-user', [UserController::class, 'store'])->name('user.store');
    Route::patch('/edit-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete-user/{id}', [UserController::class, 'remove'])->name('user.remove');
    Route::post('/create-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/students', [DirectorController::class, 'showAllStudents'])->name('student.index');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
});



Route::group(['middleware' => ['auth', 'role:professor']], function () {
    Route::get('/professor-dashboard', 'ProfessorController@index');
});



Route::group(['middleware' => ['auth', 'role:aluno']], function () {
    Route::get('/aluno-dashboard', 'AlunoController@index');
});

