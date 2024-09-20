<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DirectorController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('home');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/{id}', [UserController::class, 'showUniqueUser'])->name('user.show');
    Route::post('/createUser', [UserController::class, 'createUser']);
});


Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::group(['middleware' => ['auth']],  function() {
    Route::post('/', [LoginController::class, 'logout'])->name('user.logout');
});


Route::group(['middleware' => ['auth', 'role:Diretor']], function () {
    Route::get('/diretor-dashboard', [DirectorController::class, 'index']);
    Route::get('/showStudents', [DirectorController::class, 'showAllStudents'])->name('show.students');
});

Route::group(['middleware' => ['auth', 'role:professor']], function () {
    Route::get('/professor-dashboard', 'ProfessorController@index');
});

Route::group(['middleware' => ['auth', 'role:aluno']], function () {
    Route::get('/aluno-dashboard', 'AlunoController@index');
});

