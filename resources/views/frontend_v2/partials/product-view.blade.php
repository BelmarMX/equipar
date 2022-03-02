<div class="product__card text-center">
    <div class="product__card__wrap position-relative d-inline-block">
        <div class="product__card__behind">
            @if( isset($tag_link) )
                <a href="{{ $tag_link }}" class="product__card__behind--tag">
                    {{ $tag }}
                </a>
            @else
                <span class="product__card__behind--tag">{{ $tag }}</span>
            @endif
            <div class="product__card__front">
                <button aria-label="Agrega el producto al cotizador"
                        data-bs-toggle="tooltip"
                        title="Agregar al cotizador"
                        data-quote-add="{{ json_encode([
                                'id'    => $id
                            ,   'model' => $model
                            ,   'title' => $title
                            ,   'image' => $image
                        ]) }}"
                >
                    <i class="bi bi-bag-plus-fill"></i>
                </button>
                <a href="{{ $route }}">
                    <img class="product__card__front--image img-fluid"
                         src="{{ $image }}"
                         alt="{{ $title }}"
                    >
                    <span class="product__card__front--model"><strong>Mod:</strong> {{ $model }}</span>
                </a>
            </div>
        </div>
    </div>
    <a href="{{ $route }}" class="product__card--title">
        {{ $title }}
    </a>
</div>
