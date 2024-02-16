<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registration(RegistrationRequest $request): UserResource|JsonResponse
    {
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        if(!$user) {
            return response()->json(['success' => false, 'message' => 'Registration failed'], 500);
        }
        $token = $user->createToken('AppName')->accessToken;
        $user['token'] = $token->token;
        return new UserResource($user);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AppName')->accessToken;
            return response()->json(['success' => true, 'message' => 'Login succeeded', 'token' => $token]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
