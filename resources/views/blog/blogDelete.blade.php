```blade
<x-layouts.defaultComponent>
    <x-slot:title>Eliminar entrada | Kanso</x-slot:title>
    <section class="delete-page">
        <div class="delete-card">
            <div class="delete-icon">
                <span>!</span>
            </div>
            <h1>¿Eliminar esta entrada?</h1>
            <p class="delete-description">
                Estás a punto de eliminar una publicación de Kanso.
                Revisá los detalles antes de continuar.
            </p>
            <div class="entry-preview">
                <span class="preview-label">ENTRADA SELECCIONADA</span>
                <h2>{{ $entrada->titulo }}</h2>
                <div class="preview-divider"></div>
                <h3>Contenido</h3>
                <p class="entry-content">
                    {{ $entrada->contenido }}
                </p>
            </div>
            <div class="delete-warning">
                <span class="warning-symbol">✳</span>
                <p>
                    <strong>Esta acción es permanente.</strong>
                    Una vez eliminada, no podrás recuperar esta entrada.
                </p>
            </div>
            <form
                action="{{ route('blog.destroy', ['id' => $entrada->blog_id]) }}"
                method="POST"
            >
                @csrf
                <a href="{{ route('blog.index') }}" class="btn-cancel">
                    Cancelar
                </a>
                <button type="submit" class="btn-confirm-delete">
                    Eliminar entrada
                    <span aria-hidden="true">→</span>
                </button>
            </form>
        </div>
    </section>
</x-layouts.defaultComponent>