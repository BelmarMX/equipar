@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner-promos.jpg')
            ,   'slide_alt'     => $category -> title
            ,   'summary'       => TRUE
            ,   'title'         => "<strong>{$category -> title}</strong>"
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        @include('frontend_v2.partials.scroll-categories', [
                'tag_title'     => 'Subcategorías'
            ,   'todas_link'    => route('productos-category-list', $category -> slug)
            ,   'categories'    => array_map(function($subcategory) use($category) {
                return [
                        $subcategory['title']
                    ,   route('productos-category', [$category -> slug, $subcategory['slug']])
                ];
            }, $subcategories -> toArray() )
        ])

        <section>
            <div class="row justify-content-center">
                @foreach($entries AS $product)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        @include('frontend_v2.partials.product-view', [
                                'id'        => $product -> idP
                            ,   'title'     => $product -> titleP
                            ,   'model'     => $product -> modelo
                            ,   'tag'       => $product -> titleS
                            ,   'tag_link'  => route('productos-category', [$product -> slugC, $product -> slugS])
                            ,   'route'     => route('productos-open', [$product -> slugC, $product -> slugS, $product -> slugP])
                            ,   'image'     => url("storage/productos/{$product -> image_rxP}")
                        ])
                    </div>
                @endforeach
            </div>

            <div class="col-12">
                {{ $entries -> render() }}
            </div>
        </section>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection