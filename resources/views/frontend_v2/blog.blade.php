@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner.jpg')
            ,   'slide_alt'     => 'Blog Banner'
            ,   'summary'       => TRUE
            ,   'title'         => '<strong>BLOG</strong>'
            ,   'description'   => 'Artículos de interés general sobre <strong>equipamientos de cocinas industriales</strong>'
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        @include('frontend_v2.partials.scroll-categories', [
                'tag_title'     => 'Categorías'
            ,   'todas_link'    => route('blog')
            ,   'categories'    => array_map(function($category){
                return [$category['title'], route('blog-filter', $category['slug'])];
            }, $categories -> toArray() )
        ])

        <section>
            <div class="row">
                @foreach($articles AS $blog)
                    <div class="col-md-4 mb-4">
                        @include('frontend_v2.partials.blog-view', [
                                'title'             => $blog -> titleA
                            ,   'link'              => route('blog-open', [
                                    $blog -> slugC, $blog -> slugA
                                ])
                            ,   'image'             => url('storage/articulos/'.$blog -> image_rx)
                            ,   'day'               => split_date($blog -> publish) -> day
                            ,   'month'             => split_date($blog -> publish) -> short_month
                            ,   'category_title'    => $blog -> titleC
                            ,   'category_link'     => route('blog-filter', $blog -> slugC)
                            ,   'summary'           => $blog -> shortdesc
                        ])
                    </div>
                @endforeach

                <div class="col-12">
                    <div class="table-responsive">
                        {{ $entries -> render() }}
                    </div>
                </div>
            </div>
        </section>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection