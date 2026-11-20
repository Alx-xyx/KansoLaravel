<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de producto</title>
</head>
<body>
    <h1>Producto reservado correctamente</h1>
    <p>La reserva del producto <b>{{$producto->nombre}}</b> se realizo de manera exitosa</p>
    <p>Datos del producto:</p>
        <h1>{{ $producto->nombre }}</h1>
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
    <p>Guarda este email como una copia de seguridad por si necesitas realizar un reclamo</p>
    <p>Atentamente,<br>
        Equipo de Kanso
    </p>
</body>
</html>