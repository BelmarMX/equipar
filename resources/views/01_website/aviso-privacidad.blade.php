@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
    <div class="uk-container" uk-scrollspy="cls:uk-animation-fade">
        <h1 class="uk-text-center inner-h1">Aviso de privacidad</h1>
        <p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom uk-text-right">Actualizado el: 12 de Octubre de 2018</p>
    </div>

    <div class="uk-container" uk-scrollspy="cls:uk-animation-fade">
        <div class="uk-margin-large-top uk-margin-large-bottom" uk-grid>
            <div class="uk-width-1-1">
                <p class="uk-text-justify">
                    El aviso de privacidad forma parte del uso del sitio web en el que se esté accediendo.
                </p>
                <h2>Responsable</h2>
                <p class="uk-text-justify">
                    Equi-par estamos ubicados en Col. Jardines de San Antonio, Irapuato, Guanajuato. Nuestro(s) teléfono(s) es/son: +52 (462) 1350448 Nuestro Responsable de Protección de Datos es Álvaro Tomatani y se ubica en el mismo domicilio, usted podrá contactarlo en el correo electrónico: contacto@sinergiaalimenta.com Una de las prioridades de Equi-par es respetar la privacidad de sus usuarios/clientes y mantener segura la información y los datos personales que recolecta. Así mismo, Equi-par informará al usuario qué tipo de datos recolecta, cómo los almacena, la finalidad del archivo, cómo los protege, el alcance de su compromiso de confidencialidad y los derechos que éste posee como titular de la información.
                </p>
                <h2>Datos personales</h2>
                <p class="uk-text-justify">
                    En Equi-par recogemos información desde varias áreas de nuestros sitios web. Para cada uno de estos sitios, la información que se solicita es distinta y se almacena en bases de datos separadas. La información deberá ser veraz y completa. El usuario/cliente responderá en todo momento por los datos proporcionados y en ningún caso Equi-par será responsable de los mismos. Entre la información solicitada al usuario, se encuentra: Nombre, Correo electrónico, Empresa, Cargo, Teléfono, Ciudad, Estado, Razón social, R.F.C., domicilio fiscal, preferencias de consumo, requerimientos especiales, entre otros.
                </p>
                <h2>Qué son las cookies y como se utilizan</h2>
                <p class="uk-text-justify">
                    Los cookies son pequeñas piezas de información que son enviadas por el sitio Web a su navegador y se almacenan en el disco duro de su equipo y se utilizan para determinar sus preferencias cuando se conecta a los servicios de nuestros sitios, así como para rastrear determinados comportamientos o actividades llevadas a cabo por usted dentro de nuestros sitios. En algunas secciones de nuestro sitio requerimos que el cliente tenga habilitados los cookies ya que algunas de las funcionalidades requieren de éstas para trabajar. Los cookies nos permiten: a) reconocerlo al momento de entrar a nuestros sitios y ofrecerle de una experiencia personalizada, b) conocer la configuración personal del sitio especificada por usted, por ejemplo, los cookies nos permiten detectar el ancho de banda que usted ha seleccionado al momento de ingresar al home page de nuestros sitios, de tal forma que sabemos qué tipo de información es aconsejable descargar, c) calcular el tamaño de nuestra audiencia y medir algunos parámetros de tráfico, pues cada navegador que obtiene acceso a nuestros sitios adquiere un cookie que se usa para determinar la frecuencia de uso y las secciones de los sitios visitadas, reflejando así sus hábitos y preferencias, información que nos es útil para mejorar el contenido, los titulares y las promociones para los usuarios. Los cookies también nos ayudan a rastrear algunas actividades, por ejemplo, en algunas de las encuestas que lanzamos en línea, podemos utilizar cookies para detectar si el usuario ya ha llenado la encuesta y evitar desplegarla nuevamente, en caso de que lo haya hecho. Sin embargo, las cookies le permitirán tomar ventaja de las características más benéficas que le ofrecemos, por lo que le recomendamos que las deje activadas. La utilización de cookies no será utilizada para identificar a los usuarios, con excepción de los casos en que se investiguen posibles actividades fraudulentas.
                </p>
                <h2>Uso de la información</h2>
                <p class="uk-text-justify">
                    La información solicitada permite a Equi-par contactar a los usuarios y potenciales clientes, cuando sea necesario para completar los procedimientos de compra, así como contactar a los usuarios. Así mismo Equi-par utilizará la información obtenida para: Procurar un servicio eficiente Informar sobre nuevos productos o servicios que estén relacionados con lo contratado o adquirido por el cliente. Dar cumplimiento a obligaciones contraídas con nuestros clientes. Informar sobre cambios de nuestros productos o servicios. Proveer una mejor atención al usuario. Facturación. Evaluaciones de servicio. Encuestas de calidad.
                </p>
                <h2>Limitación de uso y divulgación de la información</h2>
                <p class="uk-text-justify">
                    En nuestro programa de notificación de promociones, ofertas y servicios a través de correo electrónico, sólo Equi-par tiene acceso a la información recabada. Este tipo de publicidad se realiza mediante avisos y mensajes promocionales de correo electrónico, los cuales sólo serán enviados a usted y a aquellos contactos registrados para tal propósito, esta indicación podrá usted modificarla en cualquier momento. En los correos electrónicos enviados, pueden incluirse ocasionalmente ofertas de terceras partes que sean nuestros socios comerciales. En el caso de empleo de cookies, el botón de "ayuda" que se encuentra en la barra de herramientas de la mayoría de los navegadores, le dirá cómo evitar aceptar nuevos cookies, cómo hacer que el navegador le notifique cuando recibe un nuevo cookie o cómo deshabilitar todos los cookies.
                </p>
                <p class="uk-text-justify">
                    Los datos personales de usted recabados por Equi-par serán debidamente resguardados conforme a las disposiciones de seguridad, administrativas, técnicas y físicas, establecidas en la Ley y el Reglamento para proteger dichos datos personales contra daño, pérdida, alteración, destrucción o su uso, acceso o divulgación no autorizada y serán tratados bajo los principios de licitud, consentimiento, información, calidad, finalidad, lealtad, proporcionalidad, responsabilidad, seguridad y confidencialidad previstos en dicha Ley y el Reglamento.
                </p>
                <h2>Derechos Arco</h2>
                <p class="uk-text-justify">
                    Asimismo, Equi-par le informa que, en términos de lo dispuesto en el artículo 28 de la Ley, usted tiene derecho al Acceso, Rectificación, Cancelación u Oposición de sus datos personales, para lo cual es necesario que (i) envíe una solicitud respecto a los datos personales que le pertenezcan en términos de lo dispuesto en los Artículos 29 y 31 de la Ley, dirigida a nuestro Departamento de Protección de Datos Personales, ubicado en Col. Jardines de San Antonio, Irapuato, Guanajuato. Con atención al encargado del Departamento de Protección de Datos Personales, (ii) llame al teléfono +52 (462) 1350448, o (iii) envíe un correo electrónico a contacto@sinergiaalimenta.com De igual forma, usted podrá revocar su consentimiento para el tratamiento de sus datos personales enviando una solicitud al respecto a través de los medios que se establecen en este párrafo.
                </p>
                <h2>Transferencia de información con terceros</h2>
                <p class="uk-text-justify">
                    Equi-par únicamente realiza transferencias de información con las empresas de webhosting con las que mantiene una relación jurídica vigente para poder mantener, actualizar y administrar sus sitios web, a través de los que informa a sus clientes, contratantes y usuarios sobre actividades, promociones, eventos y estudios.
                </p>
                <p class="uk-text-justify">
                    Equi-par únicamente realiza transferencias de información con las empresas de webhosting con las que mantiene una relación jurídica vigente para poder mantener, actualizar y administrar sus sitios web, a través de los que informa a sus clientes, contratantes y usuarios sobre actividades, promociones, eventos y estudios.
                </p>
                <h2>Cambios en el aviso de privacidad</h2>
                <p class="uk-text-justify">
                    Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas o jurisprudenciales, políticas internas, nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos y prácticas del mercado. Estas modificaciones estarán disponibles al público a través de los siguientes medios: en nuestro sitio de Internet www.sinergiaalimenta.com en la sección aviso de privacidad y/o se las haremos llegar al último correo electrónico que nos haya proporcionado.
                </p>
                <h2>Aceptación de los términos</h2>
                <p class="uk-text-justify">
                    Esta declaración de Confidencialidad / Privacidad está sujeta a los términos y condiciones de del sitio web de Equi-par antes descritos, lo cual constituye un acuerdo legal entre el usuario y Equi-par Si el usuario utiliza los servicios de Equi-par o de alguno de sus asociados, significa que ha leído, entendido y acordado los términos antes expuestos. Si no está de acuerdo con ellos, el usuario no deberá proporcionar ninguna información personal, ni utilizar los servicios de los sitios de Equi-par.
                </p>
                <p class="uk-text-justify">
                    En caso de que Equi-par no reciba su oposición expresa para que sus datos personales sean tratados en la forma y términos antes descrita, se entenderá que ha otorgado su consentimiento en forma tácita para ello.
                </p>
            </div>
        </div>
    </div>
@endsection