<div class="container px-4 py-2" id="featured-3">
    <h2 class="pb-2  pt-2 border-bottom">Noticias</h2>
    <div class="row g-4 py-2 row-cols-1 row-cols-lg-3">
        @foreach ($noticias as $noticia)
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <img src="{{ asset('recursos/img/noticia01.png') }}" alt="{{ $noticia['titulo'] }}">
                </div>
                <h3 class="fs-2 text-body-emphasis">{{ $noticia['titulo'] }}</h3>
                <p>
                    {{ $noticia['descripcion'] }}
                </p>
                <a href="#" class="btn btn-primary">
                    Ver más
                </a>
            </div>
        @endforeach
    </div>
</div>
