@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomCss')
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arimo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=News+Cycle&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet"> 
    <style>
        h1, h2, h3, h4{
            margin: 0;
        }
        a:hover{ text-decoration: none; }
        #bg-wh{ background: #FFF; }
        .social-sharing > a > svg{ max-width: 20px; opacity: .75; margin: 0 2px;}
        .social-sharing > a:hover > svg{ opacity: 1; }
        a.a-link-box{
            background: none;
            text-align: right;
            color: #A6CE38;
            margin-bottom: 3px;
            border-bottom: dashed 1px #fff;
            background: rgba(193, 221, 117,.06);
        }
        a.a-link-box.contract{
            border-bottom: dashed 1px #aaa;
        }
        a.a-link-box:hover{
            color: #A6CE38;
            border-bottom: dashed 1px #aaa;
        }
        #NavSubcat > li{
            text-align: center;
        }
        #NavSubcat > li > a{
            font-size: 1rem !important;
        }
        .fs885 > li > a{
            font-size: 1.3rem !important;
        }
        .modifier{
            font-size: 1.3rem;
            line-height: 150%;
        }
        #TheMagicIsDiscovered *{
            font-family: 'Montserrat', sans-serif;
        }
        #TheMagicIsDiscovered h1{
            font-weight: 600;
            font-size: 3.5rem;
            /*color: #42C8F5;*/
            color: #374355;
        }
        #TheMagicIsDiscovered h2{
            font-weight: 600;
            text-transform: uppercase;
        }
        #TheMagicIsDiscovered p{
            margin: 5px auto;
        }
        #TheMagicIsDiscovered span.tag-precio{
            font-size: 1.5rem;
            text-transform: uppercase;
            color: #42C8F5;
        }
        #TheMagicIsDiscovered span.tag-precio-number{
            font-size: 2.5rem;
            font-weight: 600;
            color: #42C8F5;
        }
        #TheMagicIsDiscovered p.shortdesc{
            font-size: 1.4rem;
        }
        #TheMagicIsDiscovered div.primary-info{
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        #TheMagicIsDiscovered div.primary-info > span{
            display: block;
        }
        #TheMagicIsDiscovered div.primary-info > span.LeTag{
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #000;
            font-weight: 600;
        }
        #TheMagicIsDiscovered div.primary-info > span.LeInfo{
            font-size: 1.5rem;
            padding-left: 10px;
            margin-bottom: 10px;
        }
        #TheMagicIsDiscovered a#info{
            display: block;
            margin: 15px auto;
            background: #F15A40;
            -webkit-box-shadow: 0px 2px 5px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 2px 5px 2px rgba(0, 0, 0, 0.2);
            color: #FFF;
            text-transform: uppercase;
            border-radius: 5px;
            max-width: 215px;
            padding: 10px;
            text-align: center;
        }
        #TheMagicIsDiscovered a#info-tec{
            display: block;
            margin: 15px auto;
            background: #be0d17;
            -webkit-box-shadow: 0px 2px 5px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 2px 5px 2px rgba(0, 0, 0, 0.2);
            color: #FFF;
            text-transform: uppercase;
            border-radius: 5px;
            max-width: 215px;
            padding: 10px;
            text-align: center;
            margin-top: 30px;
        }
        #TheMagicIsDiscovered .infor{
            font-size: 1.2rem;
        }
        #TheMagicIsDiscovered .infor > table > caption{
            text-transform: uppercase;
            font-weight: 600;
            font-size: 1rem;
        }
        h3.vermas{
            text-transform: uppercase;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .discount-tag{
            position: relative !important;
        }
        .price-before-open{
            text-decoration: line-through;
        }
    </style>
@endsection

@section('Content')
<div class="uk-container uk-visible@s">
    <div class="uk-width-3-5@m">
        <div class="rounded-container bg-blue">
            <h3 class="uk-text-uppercase">{{ $entry -> title }}</h3>
        </div>
    </div>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav" id="NavSubcat" uk-nav>
                @php
                    $counter    = 1;
                    $last       = count($subcategories);
                @endphp
                @foreach( $subcategories AS $subcategory )
                    @if($subcategory -> category_id == $entry -> idC )
                        @if( $last >= 12 && $counter >= 12 )
                            @if( $counter == 12 )
                                <button class="uk-button uk-button-default modifier" type="button">VER MÁS</button>
                                <div uk-dropdown>
                                    <ul class="uk-nav uk-dropdown-nav fs885">
                            @endif
                                        <li><a href="{{ route('productos-category', [Route::current() -> slug_category, $subcategory -> slug]) }}" >{{ $subcategory -> title }}</a></li>
                            @if( $counter == $last)
                                    </ul>
                                </div>
                            @endif
                        @else
                            <li @if(Route::current() -> slug_subcategory == $subcategory -> slug) class="uk-active" @endif><a href="{{ route('productos-category', [Route::current() -> slug_category, $subcategory -> slug]) }}" >{{ $subcategory -> title }}</a></li>
                        @endif
                        @php
                            $counter++;
                        @endphp
                    @endif
                @endforeach                
            </ul>
        </div>
    </nav>
</div>

<div class="uk-container-expand uk-padding-small" id="bg-wh">
    <div class="uk-margin-medium-top" uk-grid>
        
        <div class="uk-width-4-5@m" id="TheMagicIsDiscovered">
            <div uk-grid>
                <div class="uk-width-2-5@m uk-text-center" uk-lightbox>
                    <a href="{{ url('storage/'.env('PRODUCT_FOLDER').'/' . $entry -> imageP) }}">
                        <img width="100%" src="{{ url('storage/'.env('PRODUCT_FOLDER').'/' . $entry -> imageP) }}" alt="{{ $entry -> titleP }}">
                    </a>
                    <small>* Click en la foto para ampliar.</small>
                </div>
                <div class="uk-width-3-5@m">
                    @if( !empty($entry -> final_price) )
                        <div class="discount-tag">
                            <span>{{ percent( $entry -> precio, $entry -> final_price ) * -1 }}% de descuento</span>
                        </div>
                    @endif
                    <h1>{{ $entry -> titleP }}</h1>
                    @if( !empty($entry -> precio) && $entry -> precio > 0 )
                        @if( !empty($entry -> final_price) )
                            <span class="price-before-open">Precio normal:</span> <span class="price-before-open">${{ number_format($entry -> precio, 2) }}</span><br>
                            <span class="tag-precio">Precio promoción:</span> <span class="tag-precio-number">${{ number_format($entry -> final_price, 2, '.', ',') }}</span>
                        @else
                            <span class="tag-precio">Precio:</span> <span class="tag-precio-number">${{ number_format($entry -> precio, 2, '.', ',') }}</span>
                        @endif
                    @endif
                    <p class="shortdesc">
                        {{ $entry -> resumen }}
                    </p>

                    <div class="primary-info">
                        <span class="LeTag">Modelo</span> <span class="LeInfo">{{ $entry -> modelo }}</span>
                        @if( !empty($entry -> marca) )
                        <span class="LeTag">Marca</span> <span class="LeInfo">{{ $entry -> marca }}</span>
                        @endif
                        <span class="LeTag">Tipo de producto</span> <span class="LeInfo">{{ $entry -> titleS }}</span>
                        <span class="LeTag">Categoría</span> <span class="LeInfo">{{ $entry -> titleC }}</span>
                    </div>
                </div>
            </div>
            <div uk-grid>
                <div class="uk-width-1-2@m uk-margin-small-top infor">
                    <h2>Características</h2>
                    <ul>
                        @foreach(explode(';', $entry -> caracteristicas) as $caracteristica)
                        @if( $caracteristica != "" )
                            <li>{{ ucfirst( ltrim($caracteristica) ) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="uk-width-expand uk-margin-small-top infor">
                    <h2>Información técnica</h2>
                    {!! $entry -> tecnica !!}
                    
                    @if( !empty($entry -> ficha) )
                    <a id="info-tec" target="_blank" href="{{ url('storage/'.env('PRODUCT_FOLDER').'fichas/' . $entry -> ficha) }}">
                        Descargar Ficha técnica
                    </a>
                    @endif
                </div>

                <div class="uk-width-1-5@m uk-text-center">
                    <a id="agregarCotizador" class="addQuote" data-prod="{{ $entry -> idP }}" data-disc="false"><span uk-icon="cart"></span> Agregar al cotizador</a>
                    <a id="info" href="{{ route('contacto', 's=i&p='.$entry -> idP.'&t='.$entry -> titleP.'&m='.$entry -> modelo) }}">Solicitar información</a>

                    <div class="social-sharing">
                        <small class="uk-text-uppercase">Compartir: </small> 
                        <a class="facebook" target="_blank" href="//www.facebook.com/sharer.php?u={{ Request::url() }}" uk-tooltip title="Compartir en Facebook">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-facebook" viewBox="0 0 20 20"><path fill="#415797" d="M18.05.811q.439 0 .744.305t.305.744v16.637q0 .439-.305.744t-.744.305h-4.732v-7.221h2.415l.342-2.854h-2.757v-1.83q0-.659.293-1t1.073-.342h1.488V3.762q-.976-.098-2.171-.098-1.634 0-2.635.964t-1 2.72V9.47H7.951v2.854h2.415v7.221H1.413q-.439 0-.744-.305t-.305-.744V1.859q0-.439.305-.744T1.413.81H18.05z"></path></svg>
                        </a>  
                        <a class="twitter" target="_blank" href="//twitter.com/share?text={{ $entry -> titleP }}&amp;url={{ Request::url() }}" uk-tooltip title="Compartir en Twitter">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-twitter" viewBox="0 0 20 20"><path fill="#1a9ef6" d="M19.551 4.208q-.815 1.202-1.956 2.038 0 .082.02.255t.02.255q0 1.589-.469 3.179t-1.426 3.036-2.272 2.567-3.158 1.793-3.963.672q-3.301 0-6.031-1.773.571.041.937.041 2.751 0 4.911-1.671-1.284-.02-2.292-.784T2.456 11.85q.346.082.754.082.55 0 1.039-.163-1.365-.285-2.262-1.365T1.09 7.918v-.041q.774.408 1.773.448-.795-.53-1.263-1.396t-.469-1.864q0-1.019.509-1.997 1.487 1.854 3.596 2.924T9.81 7.184q-.143-.509-.143-.897 0-1.63 1.161-2.781t2.832-1.151q.815 0 1.569.326t1.284.917q1.345-.265 2.506-.958-.428 1.386-1.732 2.18 1.243-.163 2.262-.611z"></path></svg>
                        </a>

                        <a class="pinterest" target="_blank" href="//pinterest.com/pin/create/button/?url={{ Request::url() }}&amp;media={{ url('storage/'.env('PRODUCT_FOLDER').'/' . $entry -> imageP) }}&amp;description={{ $entry -> titleP }}" uk-tooltip title="Compartir en Pinterest">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-pinterest" viewBox="0 0 20 20"><path fill="#be0d17" d="M9.958.811q1.903 0 3.635.744t2.988 2 2 2.988.744 3.635q0 2.537-1.256 4.696t-3.415 3.415-4.696 1.256q-1.39 0-2.659-.366.707-1.147.951-2.025l.659-2.561q.244.463.903.817t1.39.354q1.464 0 2.622-.842t1.793-2.305.634-3.293q0-2.171-1.671-3.769t-4.257-1.598q-1.586 0-2.903.537T5.298 5.897 4.066 7.775t-.427 2.037q0 1.268.476 2.22t1.427 1.342q.171.073.293.012t.171-.232q.171-.61.195-.756.098-.268-.122-.512-.634-.707-.634-1.83 0-1.854 1.281-3.183t3.354-1.329q1.83 0 2.854 1t1.025 2.61q0 1.342-.366 2.476t-1.049 1.817-1.561.683q-.732 0-1.195-.537t-.293-1.269q.098-.342.256-.878t.268-.915.207-.817.098-.732q0-.61-.317-1t-.927-.39q-.756 0-1.269.695t-.512 1.744q0 .39.061.756t.134.537l.073.171q-1 4.342-1.22 5.098-.195.927-.146 2.171-2.513-1.122-4.062-3.44T.59 10.177q0-3.879 2.744-6.623T9.957.81z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-1-5@m">
            @if( isset($promos) && $promos !== 0 )
            <div class="uk-margin-bottom uk-text-center">
                <a href="{{ route('cotizar') }}">
                    <img width="210" height="75" alt="Cotiza productos en promoción" src="{{ asset('/images/template/banner-cotizacion.png') }}" uk-tooltip title="Ver promociones">
                </a>
            </a>
            </div>
            @endif
            <h3 class="vermas uk-text-center uk-margin-small-bottom">Ver más categorías</h3>
            @foreach($CC AS $LaCat)
            @if( $LaCat -> slug != Route::current() -> slug_category )
            <div>
                <a class="a-link-box expand"><span class="not">{{ $LaCat -> title }}</span> <i class="material-icons vm">keyboard_arrow_down</i> <i class="material-icons vm">keyboard_arrow_up</i></a>
                <div class="link-box sidebar contracted">
                    <ul>
                        @foreach( $SS AS $LeSub )
                            @if( $LeSub -> category_id == $LaCat -> id )
                            <li><a href="{{ route('productos-category', [$LaCat -> slug, $LeSub -> slug]) }}">{{ $LeSub -> title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <div class="uk-width-1-1">
            <hr class="uk-margin-large">
        </div>

        <div class="uk-width-1-1 uk-margin-large">
            <div class="rounded-container bg-blue">
                <h2>Productos que quizá te interesen:</h2>
            </div>
            <div class="uk-grid-match uk-margin-small-top" uk-grid>
                @foreach($related AS $relate)
                <div class="uk-width-1-5@m">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            @if( !empty($relate -> final_price) )
                                <div class="discount-tag">
                                    <span>{{ percent( $relate -> precio, $relate -> final_price ) }}%</span>
                                </div>
                            @endif
                            <img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $relate -> image_rxP) }}" alt="{{ $relate -> titleP }}">
                        </div>
                        <div class="uk-card-body ofProduct">
                            <h3 class="uk-card-title">{{ $relate -> titleP }}</h3>
                            <small>{{ $relate -> modelo }}</small>
                            <a href="{{ route('productos-open', [$relate -> slugC, $relate -> slugS, $relate -> slugP]) }}">Ir al producto</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('CustomJs')
    <script src="{{ asset('/js/expand.js') }}"></script>
    <script>
		var url_find	= "{{ route('cotizaciones.find') }}"
		,	url_add		= "{{ route('cotizaciones.add') }}"
		,	url_remove	= "{{ route('cotizaciones.remove') }}"
		,	url_update	= "{{ route('cotizaciones.upd') }}";
	</script>
	<script src="{{ asset('/js/quotas.js') }}"></script>
@endsection