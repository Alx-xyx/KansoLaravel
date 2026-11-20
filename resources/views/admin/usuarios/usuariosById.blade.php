<x-layouts.defaultComponent>
    <x-slot:title>Detalle de usuario</x-slot:title>

    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary mb-3">Volver al listado</a>

    <article>
        <h1>{{ $usuario->email }}</h1>

        <dl>
            <dt>Rol</dt>
            <dd>{{ ucfirst($usuario->rol) }}</dd>
            <dt>Registrado el</dt>
            <dd>
                <time datetime="{{ $usuario->created_at->toDateString() }}">
                    {{ $usuario->created_at->format('d/m/Y') }}
                </time>
            </dd>
        </dl>

        <section aria-labelledby="titulo-compras">
            <h2 id="titulo-compras">Compras y reservas</h2>

            @if ($usuario->compras->isEmpty())
                <p>Este usuario todavía no realizó compras.</p>
            @else
                <table class="table table-striped table-bordered">
                    <caption class="visually-hidden">Compras realizadas por {{ $usuario->email }}</caption>
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio unitario</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario->compras as $compra)
                            <tr>
                                <td>{{ $compra->producto->nombre }}</td>
                                <td>{{ $compra->cantidad }}</td>
                                <td>${{ number_format($compra->precio_unitario, 2, ',', '.') }}</td>
                                <td>{{ ucfirst($compra->estado) }}</td>
                                <td>{{ $compra->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </article>
</x-layouts.defaultComponent>