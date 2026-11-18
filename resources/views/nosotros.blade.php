<x-layouts.defaultComponent>
    <x-slot:title>Kanso</x-slot:title>

    <h1>¿Que es Kanso?</h1>

    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/bannerKanso.jpg') }}" alt="Banner de Kanso con utiles" class="banner-about">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/bannerKanso3.png') }}" alt="Banner de Kanso con utiles" class="banner-about">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/bannerKanso4.jpg') }}" alt="Banner de Kanso con utiles" class="banner-about">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <p>
        Kanso nace de una idea simple: encontrar belleza en lo esencial. Inspirada en la estética japonesa, nuestra
        marca
        busca transformar los artículos de escritura cotidianos en objetos donde el diseño, la funcionalidad y la
        simplicidad conviven en armonía.
        Creemos que un espacio ordenado y herramientas bien diseñadas pueden darle lugar a nuevas ideas. Por eso,
        elegimos un enfoque minimalista, donde cada forma, material y detalle tiene un propósito.
        Más que artículos de escritura, buscamos ofrecer pequeños elementos que acompañen tu creatividad, tu aprendizaje
        y tu día a día.
        <span class="destacado">
            Kanso es volver a lo esencial, para darle espacio a lo que realmente importa.
        </span>
    </p>

</x-layouts.defaultComponent>
