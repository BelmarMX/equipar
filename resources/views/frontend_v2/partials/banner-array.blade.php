<div id="banner__array" class="container-fluid">
    <div id="banner__slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @include('frontend_v2.partials.banner-single', ['slide' => 'First slide'])
            </div>
            <div class="carousel-item">
                @include('frontend_v2.partials.banner-single', ['slide' => 'Second slide'])
            </div>
            <div class="carousel-item">
                @include('frontend_v2.partials.banner-single', ['slide' => 'Third slide'])
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#banner__slider" data-bs-slide="prev">
            <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner__slider" data-bs-slide="next">
            <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
