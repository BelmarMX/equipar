@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner.jpg')
            ,   'slide_mobile'  => asset('v2/images/samples/banner-mv.jpg')
            ,   'slide_alt'     => 'Proyectos para personas'
            ,   'summary'       => TRUE
            ,   'title'         => 'Proyectos para <strong>Personas</strong>'
            ,   'description'   => 'Aseguramos el correcto diseño y selección de equipo necesarios para la <strong>operación eficiente de su cocina</strong>'
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        <section>
            <div class="row">
                @foreach($entries AS $portafolio)
                    <div class="col-md-4 mb-4">
                        @include('frontend_v2.partials.portfolio-view', [
                                'title'             => $portafolio -> title
                            ,   'link'              => route('portfolio-open', $portafolio -> slug)
                            ,   'image'             => url('storage/portafolio/'.$portafolio -> image_rx)
                            ,   'summary'           => strip_tags($portafolio -> content)
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

    <div class="modal fade" id="porfolio_modal" aria-hidden="true" aria-labelledby="portfolioModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        </div>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('v2/js/projects.js') }}" async defer></script>
@endpush