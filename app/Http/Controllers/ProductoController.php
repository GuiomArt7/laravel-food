<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductoCollection(Producto::where('disponible', 1)->orderBy('id')->get());
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
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $estadoActualDisponibilidad = $producto->disponible;

        if ($estadoActualDisponibilidad === 1) {
            $producto->disponible = 0;
        } else {
            $producto->disponible = 1;
        }

        $producto->save();

        return [
            'producto' => $producto
        ];


        /* //
        $producto->disponible =0;
        $producto->save();
        return [
            'producto' => $producto
        ]; */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
