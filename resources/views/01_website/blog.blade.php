@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
    <div class="uk-container" uk-scrollspy="cls:uk-animation-fade">
        <div class="uk-width-3-5@m">
            <div class="rounded-container bg-gray">
                <h1 class="uk-text-uppercase">Blog de noticias</h1>
            </div>
        </div>

        <div class="uk-margin-medium-top" uk-grid>
            <div class="uk-width-1-3@m">
                <h2 class="ff-secondary-font light italic">Filtrar por categorías</h2>
                <ul class="uk-nav orange-links">
                    <li {!! Request::is('blog') ? 'class="uk-active"' : '' !!}>
                        <a href="{{ route('blog') }}">Todas</a>
                    </li>
                    @foreach($categories AS $category)
                        <li {!! Request::is('blog/' . $category -> slug) ? 'class="uk-active"' : '' !!}>
                            <a href="{{ route('blog-filter', $category -> slug) }}">{{ $category -> title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="uk-width-2-3@m">
                <div uk-grid>
                    @if( $articles -> total() == 0 )
                        <div class="uk-width-1-1">
                            <div class="uk-alert-warning" uk-alert>
                                <p>Todavía no hemos agregado artículos a esta categoría.</p>
                            </div>
                        </div>
                    @endif
                    @foreach($articles AS $article)
                        <div class="uk-width-1-2@m">
                            <div class="uk-card uk-card-default equi-card">
                                <div class="uk-card-header">
                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                        <div class="uk-width-1-1 uk-text-center">
                                            <img class="uk-border-circle" width="{{ env('ARTICLE_WIDTH_RX') }}" height="{{ env('ARTICLE_HEIGHT_RX') }}" src="{{ url('storage/' . env('ARTICLE_FOLDER') . $article -> image_rx ) }}" alt="">
                                        </div>
                                        <div class="uk-width-1-1">
                                            <h3 class="uk-card-title uk-margin-remove-bottom">{{ $article -> titleA }}</h3>
                                            <p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom uk-text-right"><time datetime="{{ $article -> publish }}">{{ Carbon::parse($article -> publish) -> format('d/m/Y') }}</time></p>
                                            <p class="uk-text-meta uk-margin-remove-top uk-text-right">{{ $article -> titleC }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <p>{{ $article -> shortdesc }}</p>
                                </div>
                                <div class="uk-card-footer">
                                    <a href="{{ route('blog-open', [$article -> slugC, $article -> slugA]) }}" class="uk-button uk-button-text">Seguir leyendo</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="uk-width-1-1 uk-text-center">
                {!! $articles -> render() !!}
            </div>
        </div>
    </div>
@endsection