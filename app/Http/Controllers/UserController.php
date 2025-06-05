<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function register(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'senha' => 'required|min:6',
    ]);

    $user = \App\Models\User::create([
        'email' => $request->email,
        'senha' => bcrypt($request->senha),
    ]);

    return response()->json($user, 201);
}
}
