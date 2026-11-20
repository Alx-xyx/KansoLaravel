<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerificacionEdadController extends Controller
{
    public function form(int $id){
        return view('products.productsVerificacion-edad', ['producto' => Producto::findOrFail($id)]);
    }

    public function confirm(int $id){
        Session::put('edad_minima', true);
        return to_route('productos.show', ['producto' => $id]);
    }
}
