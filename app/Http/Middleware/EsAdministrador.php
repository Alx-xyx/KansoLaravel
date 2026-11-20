<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->user()?->esAdministrador()){
            return to_route('home')
            ->with('feedback.error', 'No tenes los permisos necesarios para acceder');
        }
        return $next($request);
    }
}
