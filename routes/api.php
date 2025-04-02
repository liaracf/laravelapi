<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/user', function (Request $request) {
    return response()->json(['message'=>'API is working']);
});

Route::post('/register', function (Request $request) {
     $user = new User();
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password = $request->password;
     $user->save();
     return response ()->json([
        "user" => $user

     ]);
   });