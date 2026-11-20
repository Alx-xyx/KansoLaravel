<?php

namespace App\Http\Controllers;

use App\Mail\ReservaProductoRegistro;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservaProductoController extends Controller
{
    public function register(int $id){
        $producto = Producto::findOrFail($id);
        Mail::to(Auth::user())->send(new ReservaProductoRegistro($producto));
        return to_route('productos.index')
         ->with('feedback.message', 'El producto'. $producto->nombre .'se reservo con exito');
    }
}
