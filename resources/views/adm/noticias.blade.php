@extends('maestra.maestra_admin')

@section('titulo') 
El Paisano - Noticias Admin
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset ('css/noticias.css')}}" media="screen" />  
@endsection

@section('javascript')
<script src="{{asset ('js/noticias.js')}}"></script>
@endsection

@section('contenido') 
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index">Inicio</a></li>
        <li class="breadcrumb-item active">Noticias</li>
    </ol>
</nav>
<section>
    <h5>TODAS LAS NOTICIAS</h5>
    <table>
        <tr>
            <td>
                <img src=" {{asset ('img/noticias/noti3.jpg')}}" class="imgNoticias"  alt="imagennoticia3"/>
            </td>
            <td>
                <article>
                    <a href="https://www.msn.com/es-es/estilo/belleza/cortes-de-pelo-que-ser-c3-a1n-tendencia-en-2021-y-que-vas-a-pedir-en-tu-peluquer-c3-ada/ar-BB1budtl" target="_blank">
                        <h4 class="cuerpo">
                            Cortes de Pelo Temporada 2020-2021
                        </h4>
                    </a>
                    <p class="cuerpo">
                        ¿Estás pensando en cortarte el pelo este 2021? Tenemos la inspiración que necesitas. 
                        Pelo corto, media melena, pelo largo o pelo rizado... nuestras expertos te cuentan los cortes de pelo que 
                        más se llevan este año. Además, te vamos a ayudar a encontrar el corte más favorecedor según tus facciones y 
                        la forma de tu rostro (cuadrado, redondo, alargado, ovalado). También te mostramos las últimas tendencias en 
                        peluquería y los cortes más actuales del momento.
                    </p>
                </article>
            </td>
        </tr>
        <tr>
            <td>
                <img src=" {{asset ('img/noticias/noti2.jpg')}}" class="imgNoticias" alt="imagennoticia2"/>
            </td>
            <td>
                <article>
                    <a href="https://www.telva.com/belleza/pelo/2020/11/30/5fc022d502136e2c198b459d.html" target="_blank">
                        <h4 class="cuerpo">
                            Degradados Temporada 2020-2021
                        </h4>
                    </a>
                    <p class="cuerpo">
                        Si creías que existía un solo tipo de corte degradado, permíteme indicarte que has estado equivocado. 
                        Hay muchas variaciones con respecto a este tipo de corte en distintas épocas del año, o según ciertas 
                        tendencias. 
                        Es el momento para mostrarte cuáles son los tipos de corte degradado para que puedas escoger el que más 
                        se adapte a ti.
                    </p>
                </article>
            </td>
        </tr>
        <tr>
            <td>
                <img src=" {{asset ('img/noticias/noti1.jpg')}}" class="imgNoticias" alt="imagennoticia1"/>
            </td>
            <td>
                <article>
                    <a href="https://www.miciudadreal.es/2020/11/30/peluquerias-y-esteticas-de-puertollano-reprochan-al-equipo-de-gobierno-que-pasara-de-largo-por-su-concentracion/" target="_blank">
                        <h4 class="cuerpo">
                            Peluquerías y estéticas de Puertollano reprochan al equipo de Gobierno que «pasara de largo» 
                            por su concentración
                        </h4>
                    </a>
                    <p class="cuerpo">
                        Los profesionales del sector de salones de belleza de Puertollano volverán a concentrarse el próximo 
                        día 15 de diciembre frente al Ayuntamiento de Puertollano para reivindicar una bajada del  IVA al 10 %, 
                        convocados por la Federación de Empresarios de  la comarca de Puertollano
                    </p>
                </article>
            </td>
        </tr>
        <tr>
            <td>
                <img src=" {{asset ('img/noticias/noti4.jpg')}}" class="imgNoticias" alt="imagennoticia4" />
            </td>
            <td>
                <article>
                    <a href="https://alicanteplaza.es/ideas-para-reinventarse-desde-salones-de-belleza-y-peluquerias-en-la-segunda-ola-de-covid-19" target="_blank">
                        <h4 class="cuerpo">
                            Ideas para reinventarse desde salones de belleza y peluquerías en la segunda ola de covid-19
                        </h4>
                    </a>
                    <p class="cuerpo">
                        Las peluquerías y los salones de belleza abren desde mayo con cita previa, 
                        uso obligatorio de mascarillas, toallas desechables, sin revistas ni prensa y con una distancia 
                        de seguridad entre personas de dos metros, entre otras medidas de seguridad. 
                    </p>
                </article>
            </td>
        </tr>
    </table>
</section>
@endsection

@section('aside') 
<h4>Últimas Noticias</h4>
<a href="https://www.msn.com/es-es/estilo/belleza/cortes-de-pelo-que-ser-c3-a1n-tendencia-en-2021-y-que-vas-a-pedir-en-tu-peluquer-c3-ada/ar-BB1budtl" target="_blank">
    <p class="ultimasNoticias">
        Cortes de Pelo Temporada 2020-2021
    </p>
</a>
<a href="https://www.telva.com/belleza/pelo/2020/11/30/5fc022d502136e2c198b459d.html" target="_blank">
    <p class="ultimasNoticias">
        Degradados Temporada 2020-2021
    </p>
</a>
<a href="https://www.miciudadreal.es/2020/11/30/peluquerias-y-esteticas-de-puertollano-reprochan-al-equipo-de-gobierno-que-pasara-de-largo-por-su-concentracion/" target="_blank">
    <p class="ultimasNoticias">
        Peluquerías y estéticas de Puertollano reprochan al equipo de Gobierno que «pasara de largo» 
        por su concentración
    </p>
</a>
<a href="https://alicanteplaza.es/ideas-para-reinventarse-desde-salones-de-belleza-y-peluquerias-en-la-segunda-ola-de-covid-19" target="_blank">
    <p class="ultimasNoticias">
        Ideas para reinventarse desde salones de belleza y peluquerías en la segunda ola de covid-19
    </p>
</a>
@endsection