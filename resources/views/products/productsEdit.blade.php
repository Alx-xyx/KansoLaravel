<?php
    $etiquetasIds = $producto->etiqueta->pluck('etiqueta_id')->all();
?>

<x-layouts.defaultComponent>
    <x-slot:title>Editar un producto</x-slot:title>
    <h1>Editar un producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hay errores en los datos enviados. Por favor, revisarlos antes de enviarlos de manera definitiva.
        </div>
    @endif

    <form action="{{ route('productos.update', ['id' => $producto->producto_id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" @class(['form-control', 'is-invalid' => $errors->has('nombre')])
                @error('nombre')
                    aria-invalid="true"
                    aria-errormessage="error-nombre"
                @enderror
                value='{{ old('nombre', $producto->nombre) }}'>
            @error('nombre')
                <div class="text-danger" id="error-nombre">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion del producto</label>
            <textarea type="text" id="descripcion" name="descripcion" class="form-control" @class(['form-control', 'is-invalid' => $errors->has('descripcion')])
                @error('descripcion')
                    aria-invalid="true"
                    aria-errormessage="error-descripcion"
                @enderror>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <div class="text-danger" id="error-descripcion">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio del producto</label>
            <input type="text" id="precio" name="precio" class="form-control" @class(['form-control', 'is-invalid' => $errors->has('precio')])
                @error('precio')
                    aria-invalid="true"
                    aria-errormessage="error-precio"
                @enderror
                value='{{ old('precio', $producto->precio) }}'>
            @error('precio')
                <div class="text-danger" id="error-precio">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Cantidad de stock del producto</label>
            <input type="text" id="stock" name="stock" class="form-control" @class(['form-control', 'is-invalid' => $errors->has('stock')])
                @error('stock')
                    aria-invalid="true"
                    aria-errormessage="error-stock"
                @enderror
                value='{{ old('stock', $producto->stock) }}'>
            @error('stock')
                <div class="text-danger" id="error-stock">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="categoria_fk" class="form-label">Categoria</label>
            <select id="categoria_fk" name="categoria_fk" class="form-control" @class(['form-control', 'is-invalid' => $errors->has('categoria_fk')])
                @error('categoria_fk')
                    aria-invalid="true"
                    aria-errormessage="error-categoria_fk"
                @enderror>
                @foreach ($categoria as $categoria)
                    <option value="{{ $categoria->categoria_id }}" @selected($categoria->categoria_id == old('categoria_fk', $producto->categoria_fk))>
                        {{ $categoria->nombre }} ({{ $categoria->abreviacion }})
                    </option>
                @endforeach
            </select>
            @error('categoria_fk')
                <div class="text-danger" id="error-categoria_fk">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="mb-2">
                Imagen actual
            </div>
            @if ($producto->imagen && \Storage::disk('public')->exists($producto->imagen))
                <div class="col-2">
                    <img src="{{ \Storage::disk('public')->url($producto->imagen) }}" alt="" class="img-fluid">
                </div>
            @else
                Sin imagen actual
            @endif
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del producto</label>
            <input type="file" id="imagen" name="imagen" class="form-control" @class(['form-control', 'is-invalid' => $errors->has('imagen')])
                @error('imagen')
                    aria-invalid="true"
                    aria-errormessage="error-imagen"
                @enderror>
            @error('imagen')
                <div class="text-danger" id="error-imagen">
                    {{ $message }}
                </div>
            @enderror
            <div class="text-muted" id="help-cover">Solo selecciona una imagen si queres cambiarla</div>
        </div>
        <div class="mb-3">
            <label for="imagen_descripcion" class="form-label">Descripción de la imagen</label>
            <input type="text" id="imagen_descripcion" name="imagen_descripcion" @class([
                'form-control',
                'is-invalid' => $errors->has('imagen_descripcion'),
            ])
                value="{{ old('imagen_descripcion', $producto->imagen_descripcion) }}">
            <div class="form-text">Texto que se muestra si la imagen no carga y que leen los lectores de pantalla.</div>
            @error('imagen_descripcion')
                <div class="text-danger" id="error-imagen_descripcion">{{ $message }}</div>
            @enderror
        </div>
        <fieldset class="mb-3">
            <legend>
                Etiquetas
            </legend>
            @foreach ($etiqueta as $etiqueta)
                <label class="me-3">
                    <input type="checkbox" name="etiqueta_fks[]" value="{{ $etiqueta->etiqueta_id }}"
                        @checked(in_array($etiqueta->etiqueta_id, old('etiqueta_fks', $etiquetasIds)))>
                    {{ $etiqueta->nombre }}
                </label>
            @endforeach
        </fieldset>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-layouts.defaultComponent>
