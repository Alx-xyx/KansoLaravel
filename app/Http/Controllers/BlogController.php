<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $entradas = Blog::all();

        return view('blog.blogList', [
            'entradas' => $entradas,
        ]);
    }

    public function show(int $id){
        $entrada = Blog::findOrFail($id);
        return view('blog.blogById', [
            'entrada' => $entrada,
        ]);
    }

//? <================================ FUNCIONES PARA CREAR ===================================================> ?/

    public function create(){
        return view('blog.blogCreate');
    }

    public function store(Request $request){
        $request->validate([
            'titulo'=>['required', 'min:2'],
            'contenido'=>['required'],
        ],[
            'titulo.required' => 'El titulo de la entrada no puede estar vacio',
            'contenido.required' => 'La entrada debe de contar con contenido'
        ]);

        $data = $request -> only(['titulo', 'contenido']);

        $entrada = Blog::create($data);

        return to_route('blog.index')
            ->with('feedback.message', 'La entrada fue añadida correctamente');
    }

//* <================================ FUNCIONES PARA EDITAR ==================================================> */

    public function edit(int $id){
        return view('blog.blogEdit', [
            'entrada' => Blog::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id){
        $request->validate([
        'titulo' => ['required','min:2'],
        'contenido' => ['required']
    ],[
        'titulo.required' => 'El campo titulo no puede estar vacio',
        'titulo.min' => 'El campo titulo debede tener al menos :min caracteres',
        'contenido.required' => 'El campo sinopsis no puede estar vacio',
    ]);
    $entrada = Blog::findOrFail($id);
    $data = $request->only(['titulo', 'contenido']);
    $entrada->update($data);
    return to_route('blog.index')
        ->with('feedback.message', 'La pelicula '.$entrada->titulo.' se actualizo con exito');
    }

//! <================================ FUNCIONES PARA BORRAR ==================================================> !/

    public function delete(int $id){
        return view('blog.blogDelete', [
            'entrada' => Blog::findOrFail($id),
        ]);
    }

    public function destroy(int $id){
        $entrada = Blog::findOrFail($id);
        $entrada->delete();
        return to_route('blog.index')
            ->with('feedback.message', 'La entrada fue eliminada correctamente');
    }
}
