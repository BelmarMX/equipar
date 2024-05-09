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
        <section id="filter-box" class="row mb-4 pt-2 px-2">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label class="d-block w-100 text-center" for="sel-order">Ordenar por</label>
                    <span class="input-group-text"><i class="bi bi-piggy-bank-fill"></i></span>
                    <select data-filter="orderby" id="sel-order" class="form-select" aria-label="Ordenar por">
                        <option value="">Ordenar por</option>
                        <option value="min" @if(Request::get('orderby') == 'min') selected @endif>Precio menor a mayor</option>
                        <option value="max" @if(Request::get('orderby') == 'max') selected @endif>Precio mayor a menor</option>
                        <option value="az" @if(Request::get('orderby') == 'az') selected @endif>A-Z Alfabético</option>
                        <option value="za" @if(Request::get('orderby') == 'za') selected @endif>Z-A Alfabético</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label class="d-block w-100 text-center" for="sel-category">Filtrar por categoría</label>
                    <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                    <select data-filter="category" id="sel-category" class="form-select" aria-label="Filtro por categoría">
                        <option value="">Todas las categorías</option>
                        @foreach( $getCC AS $c => $category )
                            <option value="{{ $category }}" @if(Request::get('category') == $category) selected @endif>{{ $tCC[$c] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label class="d-block w-100 text-center" for="sel-brand">Filtrar por marca</label>
                    <span class="input-group-text"><i class="bi bi-patch-check-fill"></i></span>
                    <select data-filter="brand" id="sel-brand" class="form-select" aria-label="Filtro por marca">
                        <option value="">Todas las marcas</option>
                        @foreach( $getBrands AS $b => $brand )
                            @if( !empty($brand) )
                                <option value="{{ $brand }}" @if(Request::get('brand') == $brand) selected @endif>{{ $brand }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </section>

        <section id="filter-results">
            <h2>Productos encontrados</h2>
            <div class="row justify-content-center">
                @forelse($entries AS $product)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        @include('frontend_v2.partials.product-view', [
                                'id'        => $product -> idP
                            ,   'title'     => $product -> titleP
                            ,   'model'     => $product -> modelo
                            ,   'brand'     => $product -> marca
                            ,   'price'     => $product -> precio
                            ,   'promo'     => $product -> final_price
                            ,   'con_flete' => $product -> con_flete
                            ,   'tag'       => $product -> titleS
                            ,   'tag_link'  => route('productos-category', [$product -> slugC, $product -> slugS])
                            ,   'route'     => route('productos-open', [$product -> slugC, $product -> slugS, $product -> slugP])
                            ,   'image'     => url("storage/productos/{$product -> image_rxP}")
                        ])
                    </div>
                @empty
                    <div class="alert alert-warning p-2 mb-3" role="alert">
                        <h4 class="alert-heading mb-0">
                            <i class="bi bi-exclamation-triangle"></i> No hay resultados que coincidan con estos parámetros de búsqueda.
                        </h4>
                    </div>

                    <h2>Categorías de productos</h2>
                    <div class="row justify-content-center">
                        @foreach($categories AS $category)
                            <div class="col-md-3 d-flex justify-content-center mb-4">
                                @include('frontend_v2.partials.product-category-view', [
                                        'position'  => str_pad($loop -> index + 1, 2, '0', STR_PAD_LEFT)
                                    ,   'title'     => $category -> title
                                    ,   'route'     => route('productos-category-list', $category -> slug)
                                    ,   'image'     => url("storage/productos-categorias/{$category -> image_rx}")
                                ])
                            </div>
                        @endforeach
                    </div>
                @endforelse
            </div>
        </section>
    </main>
@endsection

@push('customJs')
<script>
    document.querySelectorAll('[data-filter]').forEach(element => {
        element.addEventListener('change', event => {
            event.preventDefault()

            let chain = '?filter=y'
            document.querySelectorAll('[data-filter]').forEach(element => {
                if( element.value !== "" )
                {
                    chain += `&${element.getAttribute('data-filter')}=${element.value}`
                }
            })
            location.href = chain;
        })
    })
</script>
@endpush