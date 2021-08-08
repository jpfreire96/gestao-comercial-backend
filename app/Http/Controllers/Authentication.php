<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    public function __construct()
    {
    }

    public function auth(Request $request)
    {
        $validated = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'success' => false,
                'error' => 'Ausência de campos obrigatorios',
            ], 401);
        }

        try {
            $user = User::GetUser($request['email'])->first();
            if (is_null($user)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Usuário não existe',
                ], 401);
            }

            if (!Hash::check($request['password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Senha incorreta',
                ], 401);
            }

            return response()->json([
                'success' => true,
                'msg' => 'Logado!',
            ], 200);
        } catch (\Throwable $thw) {
            return response()->json([
                'success' => false,
                'error' => 'Problema durante a tentativa de login',
            ], 500);
        }
    }

    public function error()
    {
        
    }
}
