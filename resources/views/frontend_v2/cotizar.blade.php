@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <main class="container mt-5 mb-5">

        <div class="row align-items-center mb-5">
            <div class="col-12 mb-5">
                <h1 class="mb-5">Recibe la cotización de tus productos seleccionados</h1>

                <form class="custom_form mx-auto w-100 px-2 py-4"
                      enctype="multipart/form-data"
                      method="post"
                      action="{{ route('cotizaciones.mail') }}"
                      style="max-width: 630px"
                >
                    {!! csrf_field() !!}
                    @include('frontend_v2.master.alerts')
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="table-responsive">
                                <table id="quotation-table" class="table w-100">
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="nombre" class="form-label">¿Cuál es tu nombre?</label>
                            <input id="nombre"
                                   name="nombre"
                                   class="form-control"
                                   type="text"
                                   placeholder="E.G. Juan Antonio Hernández"
                                   required
                            >
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input id="email"
                                   name="email"
                                   class="form-control"
                                   type="email"
                                   placeholder="mi-email@mi-dominio.com"
                                   required
                            >
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="comments" class="form-label">¿Deseas agregar un comentario adicional?</label>
                            <textarea id="comments"
                                      name="comments"
                                      class="form-control"
                                      placeholder="Espacio para tus comentarios"
                                      rows="5"
                            ></textarea>
                        </div>
                        <div class="col-md-12 mb-4 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_PUBLIC') }}"></div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="hidden" name="phone" value="[not required]">
                            <input type="hidden" name="company" value="[not required]">
                            <input type="hidden" name="city" value="[not required]">
                            <input type="hidden" name="state" value="[not required]">
                            <button id="send_form"
                                    class="btn btn-primary"
                                    type="submit"
                            >
                                <i class="bi bi-send-fill"></i> Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </main>
@endsection

@push('customJs')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.querySelector('form').addEventListener('submit', () => {
            document.getElementById('load8').removeAttribute('hidden')
        })
    </script>
@endpush