<div class="product__card w-100">
    <div class="product__card__wrap position-relative">
        <div class="product__card__behind">
            <span class="product__card__behind--tag categoria">Categoría</span>
            <div class="product__card__front gray_light">
                <span class="product__card__front--number">
                    {{ $position }}
                </span>
                <a href="{{ $route }}">
                    <img width="200"
                         height="269"
                         class="product__card__front--image img-fluid"
                         src="{{ $image }}"
                         alt="{{ $title }}"
                    >
                </a>
            </div>
        </div>
    </div>
    <a href="{{ $route }}" class="product__card--title">
        {{ $title }}
    </a>
</div>
