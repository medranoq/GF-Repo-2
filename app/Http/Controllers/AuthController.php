<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $credentials = $request->only('email', 'password');

        return response()->json([
            'message' => 'User created',
            'token' => JWTAuth::attempt($credentials),
            'user' => $user
        ], Response::HTTP_OK);
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Login failed',
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Error',
            ], 500);
        }
        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ]);
    }
    public function logout(Request $request){

        $request->validate([
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success' => true,
                'message' => 'User disconnected'
            ]);
        } catch (JWTException $exception) {

            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function getUser(Request $request){

        $request->validate([
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        if(!$user)
            return response()->json([
                'message' => 'Invalid token / token expired',
            ], 401);
        return response()->json(['user' => $user]);

    }
}
