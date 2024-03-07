<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function register(RegistroRequest $request) {
        //Validar el Registro
        $data = $request->validated();

        //crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        //Retornar una respuesta
        return [
            'token' => $user->crateToken('token')->plainTextToken,
            'user' => $user
        ];
        
    }

    public function login(Request $request) {
        
    }

    public function logout(Request $request) {

    }
}
