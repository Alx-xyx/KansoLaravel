<x-layouts.defaultComponent>
    <x-slot:title>
        {{ $entrada->titulo }} | Kanso
    </x-slot:title>
    <article class="blog-article">
        <nav class="article-navigation" aria-label="Navegación">
            <a href="{{ route('blog.index') }}" class="back-to-blog">
                <span aria-hidden="true">←</span>
                Volver al blog
            </a>
        </nav>
        <header class="article-header">
            <p class="article-eyebrow">IDEAS · INSPIRACIÓN · CREATIVIDAD</p>
            <h1>{{ $entrada->titulo }}</h1>
            <div class="article-meta">
                <span>Por Kanso</span>
                <span class="meta-separator">/</span>
                <time datetime="{{ $entrada->created_at->toDateString() }}">
                    Publicado el {{ $entrada->created_at->format('d/m/Y') }}
                </time>
            </div>
        </header>
        @if ($entrada->imagen_url)
            <figure class="article-cover">
                <img src="{{ $entrada->imagen_url }}" alt="{{ $entrada->imagen_descripcion ?: $entrada->titulo }}"
                    class="article-image">
            </figure>
        @endif
        <div class="article-body">
            <div class="article-content">
                {{ $entrada->contenido }}
            </div>
        </div>
        <footer class="article-footer">
            <div class="footer-divider"></div>
            <p class="article-closing">
                Menos <span class="destacadoNegro">ruido</span>, más <span class="destacado">claridad.</span>
            </p>
            <a href="{{ route('blog.index') }}" class="article-return">
                <span aria-hidden="true">←</span>
                Explorar otras entradas
            </a>
        </footer>
    </article>
</x-layouts.defaultComponent>
