<x-layouts.defaultComponent>
    <x-slot:title>Confirmacion para eliminar</x-slot:title>
    <h1>Confirmacion necesaria para eliminar este producto: {{ $producto->nombre }}</h1>
    
    <p>Para eliminar la producto {{$producto->nombre}} es necesario hacer una confirmacion</p>

    <h2>{{$producto->nombre}}</h2>

    <h2>Descripcion</h2>

    <div>
        {{ $producto->descripcion}}
    </div>

    <p>Esta accion es irreversible</p>
    <form action="{{ route('productos.destroy', ['id' => $producto->producto_id]) }}" method="POST">
        <button type="submit" class="btn btn-danger">
            Eliminar
        </button>
    </form>
</x-layouts.defaultComponent>
