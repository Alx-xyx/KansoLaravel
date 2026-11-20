<x-layouts.defaultComponent>
    <x-slot:title>Usuarios</x-slot:title>

    <h1>Usuarios registrados</h1>

    <table class="table table-striped table-bordered">
        <caption class="visually-hidden">Listado de usuarios registrados y su cantidad de compras</caption>
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Compras</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ ucfirst($usuario->rol) }}</td>
                    <td>{{ $usuario->compras_count }}</td>
                    <td>
                        <a href="{{ route('admin.usuarios.show', ['id' => $usuario->usuario_id]) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.defaultComponent>