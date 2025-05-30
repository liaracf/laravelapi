<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;

/**
    @OA\Info(
    title="API Carona ",
    version="1.0.0",
    ),
    @OA\SecurityScheme(
    securityScheme="bearerAuth",
    in="header",
    name="bearerAuth",
    type="http",
    scheme="bearer",
    bearerFormat="JWT",
    ),
 */

class AuthController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Auth"},
     *     summary="Register a new user",
     *     description="Register a new user with optional vehicle information",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "type", "telephone", "password"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="type", type="string"),
     *             @OA\Property(property="telephone", type="string"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="brand", type="string"),
     *             @OA\Property(property="model", type="string"),
     *             @OA\Property(property="year", type="integer"),
     *             @OA\Property(property="plate", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User registered successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", ref="#/components/schemas/User")
     *         )
     *     ),
     * )
    */

    public function store(Request $request) {
        $user = new User();
        $vehicle = new Vehicle();
        if(User::where('email', $request->email)->exists()) {
            return response()->json([
                "message" => "Email já cadastrado!"
            ], 400);
        }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->type = $request->type;
            $user->telephone = $request->telephone;
            $user->password = $request->password;
            $user->save();

        if($request->type === 'driver'){
            $vehicle->brand = $request->brand;
$vehicle->model = $request->model;
$vehicle->year = $request->year;
$vehicle->plate = $request->plate;
            $vehicle->save();   
        }
        
        return response()->json([
            "user" => $user
        ]);
    }
}