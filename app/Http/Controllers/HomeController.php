<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //? Function para el inicio
    public function index(){
        return view('home');
    }

    //? Function para el nosotros
    public function about(){
        return view('nosotros');
    }

    //? Function para el blog
    public function blog(){
        return view ('blogShowcase');
    }

    //? Function para los productos
    public function products(){
        return view ('productsShowcase');
    } 
}
