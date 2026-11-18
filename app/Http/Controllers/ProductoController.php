<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'etiqueta'])->get();

        return view('products.productsList', [
            'productos' => $productos,
        ]);
    }

    public function show(int $id)
    {
        $producto = Producto::findOrFail($id);

        return view('products.productsById', [
            'producto' => $producto,
        ]);
    }

    // ? <================================ FUNCIONES PARA CREAR ===================================================> ?/

    public function create()
    {
        return view('products.productsCreate', [
            'categoria' => Categoria::all(),
            'etiqueta' => Etiqueta::orderBy('nombre')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'descripcion' => ['required', 'min:5'],
            'precio' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio para su muestra',
            'nombre.min' => 'El nombre del producto debe tener un minimo de :min caracteres',
            'descripcion.required' => 'El descripcion del producto es obligatorio para su muestra',
            'descripcion.min' => 'El descripcion del producto debe tener un minimo de :min caracteres',
            'precio.required' => 'El precio del producto es obligatorio para su muestra',
            'precio.numeric' => 'El precio del producto debe de estar expresado en numeros',
            'stock.required' => 'El stock del producto es obligatorio para su muestra',
            'stock.numeric' => 'El stock del producto debe de estar expresado en numeros',
        ]);

        $data = $request->only(['nombre', 'descripcion', 'precio', 'stock', 'imagen_descripcion', 'categoria_fk']);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto = Producto::create($data);

        $producto->etiqueta()->attach($request->input('etiqueta_fks', []));

        return to_route('productos.index')
            ->with('feedback.message', 'El producto fue añadido correctamente');
    }
    // * <================================ FUNCIONES PARA EDITAR ==================================================> */

    public function edit(int $id)
    {
        return view('products.productsEdit', [
            'producto' => Producto::findOrFail($id),
            'categoria' => Categoria::all(),
            'etiqueta' => Etiqueta::orderBy('nombre')->get(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'descripcion' => ['required', 'min:5'],
            'precio' => ['required', 'numeric', 'gt:0'],
            'stock' => ['required', 'numeric'],
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio para su muestra',
            'nombre.min' => 'El nombre del producto debe tener un minimo de :min caracteres',
            'descripcion.required' => 'El descripcion del producto es obligatorio para su muestra',
            'descripcion.min' => 'El descripcion del producto debe tener un minimo de :min caracteres',
            'precio.required' => 'El precio del producto es obligatorio para su muestra',
            'precio.numeric' => 'El precio del producto debe de estar expresado en numeros',
            'precio.gt' => 'El precio del producto debe ser mayor a 0',
            'stock.required' => 'El stock del producto es obligatorio para su muestra',
            'stock.numeric' => 'El stock del producto debe de estar expresado en numeros',
        ]);
        $producto = Producto::findOrFail($id);
        $imagenVieja = $producto->imagen;
        $data = $request->only(['nombre', 'descripcion', 'precio', 'stock', 'imagen_descripcion', 'categoria_fk']);
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }
        $producto->update($data);
        $producto->etiqueta()->sync($request->input('etiqueta_fks', []));
        if (
            $request->hasFile('imagen') && $imagenVieja !== null && Storage::exists($imagenVieja)
        ) {
            Storage::delete($imagenVieja);
        }

        return to_route('productos.index')
            ->with('feedback.message', 'El producto fue modificado correctamente');
    }

    // ! <================================ FUNCIONES PARA BORRAR ==================================================> !/

    public function delete(int $id)
    {
        return view('products.productsDelete', [
            'producto' => Producto::findOrFail($id),
        ]);
    }

    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);

        DB::transaction(function() use($producto){
            $producto->etiqueta()->detach();
            $producto->delete();
        });

        if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
            Storage::delete($producto->imagen);
        }

        return to_route('productos.index')
            ->with('feedback.message', 'El producto fue eliminado con exito');
    }
}
