<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Resources\CategoriaCollection;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        //return response()->json(['categorias' => Categoria::all()]);

        return new CategoriaCollection(Categoria::all());
    }
}
