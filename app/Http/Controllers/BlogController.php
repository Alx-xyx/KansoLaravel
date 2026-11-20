<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'imagen'=>['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'imagen_descripcion'=>['nullable', 'string', 'max:255'],
        ],[
            'titulo.required' => 'El titulo de la entrada no puede estar vacio',
            'titulo.min' => 'La entrada debe de tener al menos :min caracteres',
            'contenido.required' => 'La entrada no puede estar vacia',
            'image.image' => 'El archivo debe de ser una imagen',
            'image.mimes' => 'La imagen debe ser JPG, PNG o WEBP',
            'image.max' => 'La imagen no puede pesar mas de 2 MB',
            'image.descripcion.max' => 'La descripcion de la imagen no puede superar los :max caracteres',
        ]);

        $data = $request -> only(['titulo', 'contenido', 'imagen_descripcion']);

        if ($request->hasFile('imagen')){
            $data['imagen'] = $request->file('imagen')->store('blog', 'public');
        }

        Blog::create($data);

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
            'titulo'=>['required', 'min:2'],
            'contenido'=>['required'],
            'imagen'=>['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'imagen_descripcion'=>['nullable', 'string', 'max:255'],
        ],[
            'titulo.required' => 'El titulo de la entrada no puede estar vacio',
            'titulo.min' => 'La entrada debe de tener al menos :min caracteres',
            'contenido.required' => 'La entrada no puede estar vacia',
            'image.image' => 'El archivo debe de ser una imagen',
            'image.mimes' => 'La imagen debe ser JPG, PNG o WEBP',
            'image.max' => 'La imagen no puede pesar mas de 2 MB',
            'image.descripcion.max' => 'La descripcion de la imagen no puede superar los :max caracteres',
        ]);

    $entrada = Blog::findOrFail($id);
    $imagenVieja = $entrada->imagen;
    $data = $request->only(['titulo', 'contenido', 'imagen_descripcion']);
    if($request->hasFile('imagen')){
        $data['imagen'] = $request->file('imagen')->store('blog','public');
    }
    $entrada->update($data);
    if($request->hasFile('imagen') && $imagenVieja){
        Storage::disk('public')->delete($imagenVieja);
    }
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
        if($entrada->imagen){
            Storage::disk('public')->delete($entrada->imagen);
        }
        return to_route('blog.index')
            ->with('feedback.message', 'La entrada fue eliminada correctamente');
    }
}
