<x-layouts.defaultComponent>
    <x-slot:title>Entradas de blogs</x-slot:title>
    <h1>Reviews sobre Kanso</h1>
    @auth
        
    <div class="mb-3">
        <a href="{{ route('blog.create') }}" class="btn btn-success">Crear una nueva entrada</a>
    </div>
    @endauth
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entrada)    
            <tr>
                <td>{{ $entrada->titulo }} </td>
                <td>{{ $entrada->created_at->format('d/m/Y') }} </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('blog.show', ['id' => $entrada->blog_id]) }}" class="btn btn-primary">Ver mas</a>
                        @auth
                        @if(auth()->user()?->esAdministrador())
                        <a href="{{ route('blog.edit', ['id' => $entrada->blog_id]) }}" class="btn btn-secondary">Editar</a>
                        <a href="{{ route('blog.delete', ['id' => $entrada->blog_id]) }}" class="btn btn-danger">Eliminar</a>
                        @endif
                        @endauth
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.defaultComponent>
