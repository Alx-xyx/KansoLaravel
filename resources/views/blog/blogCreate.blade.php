<x-layouts.defaultComponent>
    <x-slot:title>Publicar una nueva entrada</x-slot:title>
    <h1>Publicar una nueva entrada</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hay errores en los datos enviados. Por favor, revisarlos antes de enviarlos de manera definitiva.
        </div>
    @endif

    <form action="{{ route('blog.store') }}" method="POST">
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo de la entrada</label>
            <input type="text" id="titulo" name="titulo" @class(['form-control', 'is-invalid' => $errors->has('titulo')])
                @error('titulo')
                    aria-invalid="true"
                    aria-errormessage="error-titulo"
                @enderror
                value='{{ old('titulo') }}'>
            @error('titulo')
                <div class="text-danger" id="error-titulo">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido de la entrada</label>
            <textarea type="text" id="contenido" name="contenido" class="form-control" @class(['form-control', 'is-invalid' => $errors->has('contenido')])
                @error('contenido')
                    aria-invalid="true"
                    aria-errormessage="error-contenido"
                @enderror
                value='{{ old('contenido') }}'></textarea>
            @error('contenido')
                <div class="text-danger" id="error-contenido">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen de la entrada</label>
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
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-layouts.defaultComponent>
