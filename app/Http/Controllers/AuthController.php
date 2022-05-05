<?php

namespace App\Http\Controllers;

use App\Modules\Auth\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\Users\Models\User;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $this->service->login($request->only('email', 'password'));
        $token = $this->service->getResult();
        if (!$token) return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);

        $user = auth()->user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request)
    {
        $this->service->register($request->only('name', 'email', 'password'));
        
        $token = Auth::login($this->service->getResult());
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => auth()->user(),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'refreshed' => true,
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
