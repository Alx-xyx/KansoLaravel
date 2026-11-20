<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::withCount('compras')->orderBy('email')->get();

        return view('admin.usuarios.usuariosList', [
            'usuarios' => $usuarios,
        ]);
    }

    public function show(){
        $usuario = User::with('compras.producto')->findOrFail($id);
        return view('admin.usuarios.usuariosById', [
            'usuario' => $usuario,
        ]);
    }
}
