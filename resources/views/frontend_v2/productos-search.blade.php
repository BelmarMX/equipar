@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner_productos.jpg')
            ,   'slide_mobile'  => asset('v2/images/samples/banner_productos-mv.jpg')
            ,   'slide_alt'     => 'Resultados de la búsqueda'
            ,   'summary'       => TRUE
            ,   'title'         => "<strong>Resultados para: $search</strong>"
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        Piliwots
    </main>
@endsection