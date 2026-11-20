<x-layouts.defaultComponent>
    <x-slot:title>Confirmacion de edad necesaria</x-slot:title>
    <h1>Confirmacion de edad</h1>
    <p>El producto <b>{{$producto->nombre}}</b> esta indicado como "Manejar cuidadosamente"</p>
    <p>Para poder continuar con su compra, es necesario cumplir con la confirmacion de edad</p>

    <form action="{{ route('productos.verificacion-edad.confirm', ['id' => $producto->producto_id]) }}" method="post">
    @csrf
        <button class="submit btn btn-primary">Soy mayor de 18 años</button>
        <button class="submit btn btn-warning">Tengo mas de 15 años y cuento con supervision adulta</button>
        <a href="{{ route('productos.index') }}" class="btn btn-danger">No, soy menor a la edad requerida</a>
    </form>
</x-layouts.defaultComponent> 