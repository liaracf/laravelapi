<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class AuthController extends Controller
{
   public function store (Request $request) {
        $user = new User();
        if(user::where('email', $request->email)->exists()){
         return response()->json([
            "message" => "Email ja cadastrado!"
         ],400 );
      }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response ()->json([
           "user" => $user
   
        ]);
      }
}
