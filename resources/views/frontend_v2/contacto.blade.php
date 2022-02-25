@section('title', 'Comunícate con nosotros')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    <main class="container mt-5 mb-5">

        <div class="row align-items-center mb-5">
            <div class="col-12 mb-5">
                <h1 class="mb-5">Ponte en contacto con nosotros</h1>

                <form class="custom_form mx-auto w-100 px-2 py-4"
                      enctype="multipart/form-data"
                      method="post"
                      action="{{ route('mail.store') }}"
                      style="max-width: 630px"
                >
                    {!! csrf_field() !!}
                    @include('frontend_v2.master.alerts')
                    <div class="row">
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
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input id="correo"
                                   name="correo"
                                   class="form-control"
                                   type="email"
                                   placeholder="mi-email@mi-dominio.com"
                                   required
                            >
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="telefono" class="form-label">Celular (opcional)</label>
                            <input id="telefono"
                                   name="telefono"
                                   class="form-control"
                                   type="number"
                                   min="1000000000"
                                   max="9999999999"
                                   placeholder="3315559999"
                            >
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="empresa" class="form-label">Empresa (opcional)</label>
                            <input id="empresa"
                                   name="empresa"
                                   class="form-control"
                                   type="text"
                                   placeholder="E.G. Equi-par Guadalajara"
                            >
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="asunto" class="form-label">Motivo de contacto</label>
                            <select id="asunto"
                                    name="asunto"
                                    class="form-select"
                                    aria-label="Selección del motivo de contacto"
                            >
                                <option selected>Por favor selecciona uno</option>
                                <option value="Dudas">Dudas</option>
                                <option value="Sugerencias">Sugerencias</option>
                                <option value="Queja">Queja</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="cuerpo" class="form-label">Motivo de contacto</label>
                            <textarea id="cuerpo"
                                      name="cuerpo"
                                      class="form-control"
                                      placeholder="Espacio para tus comentarios, dudas y sugerencias"
                                      rows="5"
                            ></textarea>
                        </div>
                        <div class="col-md-12 mb-4 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_PUBLIC') }}"></div>
                        </div>
                        <div class="col-md-12 text-center">
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

            <div class="col-md-12">
                <div class="col-md-12">
                    <h2>Ubicaciones</h2>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 order-md-2 contact-location">
                        <i class="bi bi-geo-alt-fill"></i> <h3>Guadalajara matriz</h3>
                        <p class="pt-3">
                            Av. Cvln. Jorge Álvarez del Castillo núm. 1442<br>
                            Col. Lomas del Country<br>
                            Guadalajara, Jalisco. México.<br>
                            <a href="tel:+5213328862661" target="-_blank">
                                +52 1 33 2886 2661
                            </a>
                        </p>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7464.423907058208!2d-103.36637900000001!3d20.701616!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8573938c634944dd!2sEqui-par%20Cocinas%20Industriales!5e0!3m2!1ses!2smx!4v1645771932888!5m2!1ses!2smx"
                                width="100%"
                                height="400"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                        >
                        </iframe>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 order-md-2 contact-location">
                        <i class="bi bi-geo-alt-fill"></i> <h3>Sucursal Zapopan</h3>
                        <p class="pt-3">
                            Av. Mariano Otero núm. 3519<br>
                            Col. La Calma<br>
                            Zapopan, Jalisco. México.<br>
                            <a href="tel:+5213335751334" target="-_blank">
                                +52 1 33 3575 1334
                            </a>
                        </p>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d16562.04313701228!2d-103.42620814629664!3d20.637281778034207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3c7c1293fe6c83fd!2sEqui-par!5e0!3m2!1ses!2smx!4v1645772008948!5m2!1ses!2smx"
                                width="100%"
                                height="400"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                        >
                        </iframe>
                    </div>
                </div>
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