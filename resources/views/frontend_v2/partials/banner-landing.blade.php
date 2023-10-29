<div class="banner__single">
    <img width="100%"
         height="auto"
         class="img-fluid w-100 {{ $img_class ?? '' }}"
         src="{{$slide}}"
         alt="{{ $slide_alt ?? 'Banner image'}}"
    >
    @if( $summary )
    <div class="banner__single__summary">
        <img width="{{ $logo_width }}" height="{{ $logo_height ?? '100%' }}" src="{{ $logo_image }}" alt="{{ $title }}" class="img-fluid">
        @if( isset($h1) && $h1 )
            <h1 class="banner__single__summary--title @if(!isset($description)) alone @endif">
                {!! $title !!}
            </h1>
        @else
            <div class="banner__single__summary--title">
                {!! $title !!}
            </div>
        @endif
        @if( isset($cta) && $cta && isset($cta_href) && $cta_href )
        <a href="{{ $cta_href }}" class="banner__single__summary--cta btn btn-primary">
            {!! $cta !!}
        </a>
        @endif
    </div>
    @endif
</div>
