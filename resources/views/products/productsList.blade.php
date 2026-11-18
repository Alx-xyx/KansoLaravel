<x-layouts.defaultComponent>
    <x-slot:title>Productos</x-slot:title>
    <h1>Nuestros productos</h1>
    @auth
        
    <div class="mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-success">Crear una nueva entrada</a>
    </div>
    @endauth
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Etiqueta</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)    
            <tr>
                <td> {{ $producto->nombre }} </td>
                <td> {{ $producto->descripcion }} </td>
                <td> ${{ number_format($producto->precio, 2, ',', '.') }} </td>
                <td> {{ $producto->stock }} </td>
                <td> {{ $producto->categoria->abreviacion }} </td>
                <td>
                    @forelse ($producto->etiqueta as $etiqueta)
                        <span class="badge bg-secondary">{{$etiqueta->nombre}}</span>
                    @empty
                        <i>Sin etiquetas asignadas</i>                    
                    @endforelse
                </td>
                <td> {{ $producto->imagen }} </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('productos.show', ['id' => $producto->producto_id]) }}" class="btn btn-primary">Ver mas</a>
                        @auth
                        <a href="{{ route('productos.edit', ['id' => $producto->producto_id]) }}" class="btn btn-secondary">Editar</a>
                        <a href="{{ route('productos.delete', ['id' => $producto->producto_id]) }}" class="btn btn-danger">Eliminar</a>
                        @endauth
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.defaultComponent>
