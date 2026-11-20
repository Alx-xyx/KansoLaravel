<x-layouts.defaultComponent>
    <h1>Iniciar sesión</h1>

    <form action="{{ route('auth.login.process') }}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</x-layouts.defaultComponent>