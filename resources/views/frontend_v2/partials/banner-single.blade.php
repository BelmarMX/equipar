<div class="banner__single">
    <img width="100%"
         height="400"
         class="img-fluid w-100"
         src="{{$slide}}"
         alt="{{ isset($slide_alt) ? $slide_alt : 'Banner image'}}"
    >
    @if( $summary )
    <div class="banner__single__summary">
        @if( isset($h1) && $h1 )
            <h1 class="banner__single__summary--title @if(!isset($description)) alone @endif">
                {!! $title !!}
            </h1>
        @else
            <div class="banner__single__summary--title">
                {!! $title !!}
            </div>
        @endif
        @if( isset($description) && $description )  )
        <p class="banner__single__summary--description">
            {!! $description !!}
        </p>
        @endif
        @if( isset($cta) && $cta )
        <a href="{{ $cta_href }}" class="banner__single__summary--cta btn btn-primary">
            {!! $cta !!}
        </a>
        @endif
    </div>
    @endif
</div>
