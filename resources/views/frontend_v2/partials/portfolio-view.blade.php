<div class="blog__view">
    <a class="blog__view__link" data-href="{{ $link }}"
       data-bs-toggle="modal"
       data-bs-target="#porfolio_modal"
    >
        <div class="blog__view__link--image">
            <img width=""
                 height=""
                 class="img-fluid"
                 src="{{ $image }}"
                 alt="{{ $title }}"
            >
            <div class="blog__view__link__float">
                <span class="blog__view__link__float--day">{{ $day }}</span>
                <span class="blog__view__link__float--month">{{ $month }}</span>
            </div>
        </div>
        <h3 class="blog__view__link--title">{{ $title }}</h3>
    </a>
    <p class="blog__view--summary">
        {{ $summary }}
    </p>
</div>
