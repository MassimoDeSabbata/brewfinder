<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['name', 'password']);
        $isAuthenticated = auth()->attempt($credentials);
        if (!$isAuthenticated) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
  
        $user = User::where('name', request('name'))->first();

        return ApiResponseClass::sendSuccessResponse($user->createToken($user->name));
    }
}
