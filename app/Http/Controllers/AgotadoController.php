<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use App\Models\Agotado;
use Illuminate\Http\Request;

class AgotadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductoCollection(Producto::where('disponible', 0)->orderBy('id')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Agotado $agotado, Producto $producto)
    {
        //
        $producto = new Producto;
        $producto->id = $request->id;
        $producto->disponible = $request->disponible;
        $producto->save();

        $id = $producto->id;

        return[
            'message' => 'Producto disponible'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Agotado $agotado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $producto->disponible =1;
        $producto->save();
        return [
            'producto' => $producto
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agotado $agotado)
    {
        //
    }
}
