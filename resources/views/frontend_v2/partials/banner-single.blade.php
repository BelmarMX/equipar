<div class="banner__single">
    <img width="100%"
         height="400"
         class="img-fluid w-100"
         src="{{$slide}}"
         alt="{{ isset($slide_alt) ? $slide_alt : 'Banner image'}}"
    >
    @if( $summary )
    <div class="banner__single__summary">
        <div class="banner__single__summary--title">
            {!! $title !!}
        </div>
        <p class="banner__single__summary--description">
            {!! $description !!}
        </p>
        <a href="{{ $cta_href }}" class="banner__single__summary--cta btn btn-primary">
            {!! $cta !!}
        </a>
    </div>
    @endif
</div>
