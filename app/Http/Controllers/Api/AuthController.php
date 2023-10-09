<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $attributes['email'])->first();

        if (! $user || ! Hash::check($attributes['password'], $user->password)) {
            return response()->json(['error' => 'credentials are wrong for login'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(
            [
                'token' => $user->createToken('login-token')->plainTextToken
            ],
            Response::HTTP_OK
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['msg' => 'successfully logout'], Response::HTTP_OK);
    }
}
