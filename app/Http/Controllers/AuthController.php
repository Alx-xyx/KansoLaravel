<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function loginProcess(Request $request){
        $credentials = $request->only(['email','password']);
        if(!Auth::attempt($credentials)){
            return to_route('auth.login.form')
            ->withInput()
            ->with('feedback.error', 'Las credenciales ingresadas no son correctas. Intente nuevamente');
            }
        $request -> session()->regenerate();


        return to_route('blog.index')
            ->with('feedback.message', 'Sesion iniciada con exito');
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('auth.login.form')
            ->with('feedback.message', 'Sesion cerrada con exito');
    }
}
