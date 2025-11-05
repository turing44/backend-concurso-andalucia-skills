<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(["message" => "Credenciales incorrectas"], 401);
        }

        $token = $user->createToken("api_token")->plainTextToken;

        return response()->json([
            "token" => $token,
            "rol" => $user->rol,
        ]);


    }

    public function register(RegisterUserRequest $request) {

        if (User::where("email", $request->email)->first()) {
            return response()->json([
                "message" => "Ya hay un usuario con ese correo"
            ], 422);
        }

        $user = User::create($request->validated());

        $token = $user->createToken("api_token")->plainTextToken;

        return response()->json([
            "token" => $token,
            "user" => $user,
        ]);

        
    }


    public function logout() {
        $user = auth()->user()->tokens()->delete();

        return $user;
    }
}
