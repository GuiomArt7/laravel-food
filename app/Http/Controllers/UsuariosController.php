<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  // Get all users
  $users = User::all();

  // Return the list of users in a response
  return response()->json($users);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuarios)
    {

    }


    
    public function destroy( $user) {
        // Check if user exists
        if (!$user) {
          return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        $user = User::find($user);
    
        // Delete the user
        $user->delete();
      
      
        // Return a success response
        return response()->json(['message' => 'Usuario eliminado correctamente.'], 200);
      }
      
}
