<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;

class AuthController extends Controller
{
    public function store(Request $request) {
        $user = new User();
        $vehicle = new Vehicle();
        if(User::where('email', $request->email)->exists()) {
            return response()->json([
                "message" => "Email já cadastrado!"
            ], 400);
        }
       if ($request->type == 'passager'){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->telephone = $request->telephone;
        $user->password = $request->password;
        $user->save();
        
        return response()->json([
            "user" => $user
        ]);
         } 
       }

}