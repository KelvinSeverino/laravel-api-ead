<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        //Busca dados do User
        $user = User::where('email', $request->email)->first();

        //Verifica a senha informada com a senha do BD
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        //Possibilidade de Login Unico, passando param na requisicao para deletar os token de outros dispositivos
        //if ($request->has('logout_others_devices')) { $user->tokens()->delete(); }     
        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'logout' => true
        ]);
    }

    public function me()
    {
        $user = auth()->user();

        return new UserResource($user);
    }
}
