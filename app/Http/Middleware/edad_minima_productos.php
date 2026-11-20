<?php

namespace App\Http\Middleware;

use App\Models\Producto;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class edad_minima_productos
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $producto = $request->route('producto');
        if($producto->categoria_fk == 5){
            if(!session('edad_minima', false)){
                return to_route('productos.verificacion-edad.form', ['id' => $producto->producto_id]);
            }
        }
        return $next($request);
    }
}
