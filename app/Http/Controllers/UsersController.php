<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials) === false){
            return response()->json('Unauthorized', 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token');
        
        return response()->json($token->plainTextToken);

    }
}
