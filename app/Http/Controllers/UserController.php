<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsers() 
    {
        return dd(User::all());
    }
    public  function showUniqueUser($id) 
    {
        return dd(User::find($id));
    }
}
