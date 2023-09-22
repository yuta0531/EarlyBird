<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('users/profile')->with(['users' => $user->get()]);
    }
}