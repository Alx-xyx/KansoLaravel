<x-layouts.defaultComponent>
    <x-slot:title>Editar {{ $entrada->titulo }} </x-slot:title>
    <h1>Editar {{ $entrada->titulo }} </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hay errores en los datos enviados. Por favor, revisarlos antes de enviarlos de manera definitiva.
        </div>
    @endif

    <form action="{{ route('blog.edit', ['id' => $entrada->blog_id]) }}" method="POST" enctype="multipart/form-data"
        novalidate>
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" id="titulo" name="titulo" @class(['form-control', 'is-invalid' => $errors->has('titulo')])
                @error('titulo')
                    aria-invalid="true"
                    aria-errormessage="error-titulo"
                @enderror
                value='{{ old('titulo', $entrada->titulo) }}'>
            @error('titulo')
                <div class="text-danger" id="error-titulo">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Sinopsis</label>
            <textarea type="text" id="contenido" name="contenido" class="form-control rows='10' @class(['form-control', 'is-invalid' => $errors->has('contenido')])
                @error('contenido')
                    aria-invalid="true"
                    aria-errormessage="error-contenido"
                @enderror>{{ old('contenido', $entrada->contenido) }}</textarea>
            @error('contenido')
                <div class="text-danger" id="error-contenido">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <p class="form-label">Imagen actual</p>
            @if ($entrada->imagen_url)
                <img src="{{ $entrada->imagen_url }}" alt="{{ $entrada->imagen_descripcion }}" class="img-fluid mb-2"
                    style="max-height: 200px">
            @else
                <p class="text-muted">Sin imagen actual</p>
            @endif
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Portada (coming soon&trade;)</label>
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
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</x-layouts.defaultComponent>
