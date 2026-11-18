<x-layouts.defaultComponent>
    <h1>{{ $producto->nombre }}</h1>

    @if ($producto->imagen)
        <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid mb-3">
    @endif

    <p>{{ $producto->descripcion }}</p>
    <p>Precio: {{ $producto->precio }}</p>
    <p>Stock: {{ $producto->stock }}</p>
    <p>Categoria: {{ $producto->categoria->nombre }} ({{ $producto->categoria->abreviacion }})</p>
    <p>Etiqueta:
        @forelse ($producto->etiqueta as $etiqueta)
            <span class="badge bg-secondary">{{ $etiqueta->nombre }}</span>
        @empty
            <i>Sin etiquetas asignadas</i>
        @endforelse
    </p>
    <div>
        @if ($producto->imagen !== null && \Storage::exists($producto->imagen))
            <img src="<?= \Storage::url($producto->imagen) ?>" alt="{{ $producto->imagen_descripcion }}">
        @else
            <p>Sin portada</p>
        @endif
    </div>


    <small>Publicado el {{ $producto->created_at->format('d/m/Y') }}</small>

    <div class="mt-3">
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver a los productos</a>
    </div>
</x-layouts.defaultComponent>
