<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoCollection;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ReadyController extends Controller
{
    public function index()
    {
        return new PedidoCollection(Pedido::with('user')->with('productos')->where('estado', 1)->get());
    }
}
