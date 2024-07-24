<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoCollection;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ReadyController extends Controller
{
    public function index()
{
    return new PedidoCollection(Pedido::with('user')->with('productos')->where('estado', 1)->where('atendido', 0)->get());
}




     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $estadoActualAtendido = $pedido->atendido;

        if ($estadoActualAtendido === 0) {
            $pedido->atendido = 1;
        } 

        $pedido->save();

        return [
            'pedido' => $pedido
        ];
    }

}
