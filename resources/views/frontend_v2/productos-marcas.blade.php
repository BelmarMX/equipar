@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner-promos.jpg')
            ,   'slide_alt'     => $brand
            ,   'summary'       => TRUE
            ,   'title'         => "<strong>{$brand}</strong>"
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        <section>
            <div class="row justify-content-center">
                @forelse($entries AS $product)
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
                @empty
                    <div class="alert alert-warning p-2" role="alert">
                        <h4 class="alert-heading mb-0">
                            <i class="bi bi-exclamation-triangle"></i>No se encontraron productos
                        </h4>
                    </div>
                @endforelse
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    {{ $entries -> render() }}
                </div>
            </div>
        </section>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection