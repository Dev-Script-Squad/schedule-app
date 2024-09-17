<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('login');
});

Route::prefix('users')->group(function() {
    Route::get('/', [UserController::class, 'showUsers']);
    Route::get('/{id}',[UserController::class, 'showUniqueUser']);
});


