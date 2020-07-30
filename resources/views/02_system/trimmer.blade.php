@extends('00_layouts.02_system.app')
@section('title', 'Recortar miniatura')
@section('BodyClass', 'void')
@section('CustomCss')
    <link rel="stylesheet" href="{{ asset('vendor/jcrop/css/jquery.Jcrop.min.css') }}">
    <style>
        html{
            /*width: <?php echo $opciones['width'] ?>px !important;*/
        }
        form{
            margin: 0 auto;
            max-width: 100%;
            width: 100%;
        }
        #cut-bg{
            padding: 25px 0;
            background:rgba(0,0,0,.015);
            overflow: scroll;
            margin-top: 10px;
            overflow: scroll;
        }
        #ImageCenter{
            width: <?php echo $opciones['width'] ?>px;
            height: <?php echo $opciones['height'] ?>px;
            margin: auto auto;
        }
        .jcrop-holder{
            /*background-color: rgba(0,0,0,.05) !important;*/
            background: url('/images/layout/cut.png') !important;

        }
        .jcrop-holder,
        .jcrop-holder > div > div > img,
        .jcrop-holder > .jcrop-tracker,
        .jcrop-holder > img{
            width: <?php echo $opciones['width'] ?>px !important;
            height: <?php echo $opciones['height'] ?>px !important;
        }
    </style>
@endsection
@section('CustomJs')
    <script src="{{ asset('vendor/jcrop/js/jquery.Jcrop.min.js') }}"></script>
    <script>
        if( $(window).width() < <?php echo $opciones['width'] ?> ){
            $('html').width(<?php echo $opciones['width'] ?>);
        }
        function showCoords(c){
            $('#cut_cx').val(Math.round(c.x));
            $('#cut_cy').val(Math.round(c.y));
            $('#cut_cx2').val(Math.round(c.x2));
            $('#cut_cy2').val(Math.round(c.y2));
            $('#cut_w').val(Math.round(c.w));
            $('#cut_h').val(Math.round(c.h));
        };
        jQuery(function($) {
            var w = <?php echo $opciones['cut_width'] ?>
            ,   h = <?php echo $opciones['cut_height'] ?>;
            w = Math.round(w);
            h = Math.round(h);
            $('#target').Jcrop({
                minSize: [w,h],
                //maxSize: [w,h],
                //setSelect:   [ w, h, w, h ],
                onChange: showCoords,
                aspectRatio: w/h
            });
        });
    </script>
@endsection

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Recortar miniatura</h1>
    </div>
</div>

<div class="uk-margin-top">
    {{-- Imagen a recortar --}}
        <div class="uk-container uk-margin-bottom-small">
            <div class="uk-alert-primary" uk-alert>
                <small>Si estás remplazando una imagen, es posible que no se visualice correctamente debido al caché del navegador, para corregir este detalle basta presionar las teclas:<br>
                <b>Windows:</b> Ctrl + Shift + F5 <b>Mac:</b> Cmd + Shift + R</small>
            </div>
        </div>
        <form enctype="multipart/form-data" method="POST" action="{{ route('trim.update', $opciones['tipo']) }}">
            @csrf
            @method('PUT')
            @include('00_layouts.02_system.03_alert')

            <div id="cut-bg">
                <div id="ImageCenter">
                    <img id="target" src="{{ asset( $opciones['ruta']) }}" width="{{ $opciones['width'] }}" height="{{ $opciones['height'] }}" style="width:{{ $opciones['width'] }}px; height:{{ $opciones['height'] }}px" alt="Imagen original">
                </div>
            </div>

            <div class="uk-text-center">
                <div class="FormSending mb-3" style="display:none">
                    <div uk-spinner></div> Recortando, espere por favor...<br>
                </div>
                <button class="mt-1 uk-button uk-button-primary button-submit-prevent">Recortar</button>
            </div>
            {{-- Campos que se reciben --}}
            <input type="hidden" id="cut_id" name="xid" value="{{ $opciones['id'] }}">
            <input type="hidden" id="cut_cx" name="xinicial" value="1920">
            <input type="hidden" id="cut_cx2" name="xfinal">
            <input type="hidden" id="cut_cy" name="yinicial">
            <input type="hidden" id="cut_cy2" name="yfinal">
            <input type="hidden" id="cut_w" name="ancho">
            <input type="hidden" id="cut_h" name="alto">
        </form>
    {{-- Imagen a recortar --}}
</div>
@endsection