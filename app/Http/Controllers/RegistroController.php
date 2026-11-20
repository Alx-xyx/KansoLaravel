<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function form(){
        return view('auth.register');
    }

    public function store(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email', 'unique:usuarios,email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], [
            'email.required' => 'El email no puede estar vacio',
            'email.email' => 'El email no tiene un formato valido',
            'email.unique' => 'El email ya fue usado para iniciar sesion',
            'password.required' => 'La contraseña no puede estar vacia',
            'password.min' => 'La contraseña debe tener al menos :min caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $usuario = User::create($data);

        Auth::login($usuario);
        $request->session()->regenerate();
        return to_route('productos.index')
            ->with('feedback.message', 'Tu cuenta fue creada con exito!');
    }
}
