@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
    <div class="uk-margin-large">
        <div class="uk-container" uk-scrollspy="cls:uk-animation-fade">
            <div class="uk-margin-large-top" uk-grid>
                <div class="uk-width-1-1 uk-text-center">
                    <div class="rounded-container bg-orange">
                        <h1 class="uk-text-uppercase">{{ $article -> titleA }}</h1>
                    </div>
                    <br>
                    <img width="1920" height="520" src="{{ url('storage/'.env('ARTICLE_FOLDER').'/' . $article -> image) }}" alt="{{ $article -> titleA }}">
                </div>
                <div class="uk-width-2-3@m article">
                    <p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom uk-text-right">Publicado el: <time datetime="{{ $article -> publish }}">{{ Carbon::parse($article -> publish) -> format('d/m/Y') }}</time></p>
                    <p class="uk-text-meta uk-margin-remove-top uk-text-right">En la categoría: <a href="{{ route('blog-filter', $article -> slugC) }}">{{ $article -> titleC }}</a></p>

                    <div uk-grid>
                        <div class="uk-width-1-1 article-content">
                            {!! $article -> content !!}
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-3@m">
                    <h2 class="ff-secondary-font light italic">Visitar categorías</h2>
                    <ul class="uk-nav orange-links">
                        <li {!! Request::is('blog') ? 'class="uk-active"' : '' !!}>
                            <a href="{{ route('blog') }}">Todas</a>
                        </li>
                        @foreach($categories AS $category)
                            <li {!! Request::is('blog/' . $category -> slug . '/*') ? 'class="uk-active"' : '' !!}>
                                <a href="{{ route('blog-filter', $category -> slug) }}">{{ $category -> title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection