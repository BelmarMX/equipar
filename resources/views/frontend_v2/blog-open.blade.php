@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <main class="container mt-5">
        @include('frontend_v2.partials.scroll-categories', [
                'tag_title'     => 'Categorías'
            ,   'todas_link'    => route('blog')
            ,   'categories'    => array_map(function($category){
                return [$category['title'], route('blog-filter', $category['slug'])];
            }, $categories -> toArray() )
        ])

        <div class="row gx-5">
            <section class="blog__article col-md-8">
                <img width="{{ env('ARTICLE_WIDTH') }}"
                     height="{{ env('ARTICLE_HEIGHT') }}"
                     class="img-fluid"
                     src="{{ url('storage/articulos/'.$article -> image) }}"
                     alt="{{ $article -> title }}"
                >
                <div class="blog__article__tags p-2 mb-4">
                    <div class="d-inline">
                        <i class="bi bi-clock"></i> {{ $article -> publish }}
                    </div>
                    <div class="d-inline ms-1">
                        <i class="bi bi-tag"></i> <a href="{{ route('blog-filter', $article -> slugC) }}">{{ $article -> titleC }}</a>
                    </div>
                </div>

                <h1 class="blog__article__title">{{ $article -> title }}</h1>

                {!! $article -> content !!}
            </section>

            <aside class="col-md-4">
                <div class="mb-5">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => '/blog/como-equipar-una-cocina-industrial/como-equipar-una-cocina-industrial'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => '/blog/como-equipar-una-cocina-industrial'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="mb-5">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => '/blog/como-equipar-una-cocina-industrial/como-equipar-una-cocina-industrial'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => '/blog/como-equipar-una-cocina-industrial'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
            </aside>
        </div>
    </main>
@endsection