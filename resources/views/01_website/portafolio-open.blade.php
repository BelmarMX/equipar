@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
    <div class="uk-container">
        <div class="uk-width-4-5@m">
            <div class="rounded-container bg-blue">
                <h1 class="uk-text-uppercase">{{ $entry -> title }}</h1>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-small-top">
        <div uk-grid>
            <div class="uk-width-1-1">
                <div uk-grid>
                    <div class="uk-width-1-1">
                        <div class="uk-card uk-card-default uk-padding">

							<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; animation: push">
								<ul class="uk-slideshow-items" uk-lightbox>
									<li>
										<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
											<img src="{{ url('storage/'.env('PORTFOLIO_FOLDER').'/' . $entry -> image) }}" alt="{{ $entry -> title }}" uk-cover>
										</div>
										<div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom uk-padding-small">
											<a class="ampliar" href="{{ url('storage/'.env('PORTFOLIO_FOLDER').'/' . $entry -> image) }}" data-caption="{{ $entry -> title }}">
												<span class="uk-visible@s">{{ $entry -> title }}</span> <i class="material-icons">zoom_in</i>
											</a>
										</div>
									</li>
									@foreach($gallery AS $g => $item)
										<li>
											<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
												<img src="{{ url('storage/'.env('PORTFOLIO_IMG_FOLDER').'/' . $item -> image) }}" alt="{{ $item -> title }}" uk-cover>
											</div>
											<div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom uk-padding-small">
												<a class="ampliar" href="{{ url('storage/'.env('PORTFOLIO_IMG_FOLDER').'/' . $item -> image) }}" data-caption="{{ $item -> title }}">
													<span class="uk-visible@s">{{ $item -> title }}</span> <i class="material-icons">zoom_in</i>
												</a>
											</div>
										</li>
									@endforeach
								</ul>

								<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
								<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
							</div>

							<div id="ProductInformation" class="uk-width-1-1 uk-margin-top">
								<div class="rounded-container bg-orange">
									<h1 class="uk-text-uppercase"">Acerca del proyecto</h1>
								</div>
								{!! $entry -> content !!}
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection