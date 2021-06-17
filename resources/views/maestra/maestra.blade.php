<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <!--<meta charset="utf-8" name="viewport" content="width=device-width">-->

        <title>@yield('titulo')</title>

        <!-- Fuente -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet"> 

        <!-- Bootstrap CSS 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/bootstrap.min.css')}}" media="screen" /> -->


        <link rel="stylesheet" type="text/css" href="{{asset ('css/maestra.css')}}" media="screen" /> 
        @yield('css')

        <link rel="stylesheet" type="text/css" href="{{asset ('css/cookies.css')}}" media="screen" /> 

        @yield('javascript')
        <!-- Javascript bootstrap y jquery -->
        <script src="{{asset ('js/jquery.min.js')}}"></script>
        <script src="{{asset ('js/bootstrap.min.js')}}"></script>
        <script src="{{asset ('js/cookies.js')}}"></script>
        <script src="{{asset ('js/maestra.js')}}"></script>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        <!-- Header --> 
        <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
<!--                <a href="index" class="navbar-brand"><img class="logo" alt="logo" src="{{asset ('img/logo.jpg')}}"></a>-->


                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <!-- Brand -->
                    <a href="index" class="navbar-brand"><img class="logo" alt="logo" src="{{asset ('img/logo.jpg')}}"></a>
                    <ul class="navbar-nav mr-auto">  
                        <li class="nav-item active">
                            <a class="nav-link" href="index" >Inicio</a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="noticias">Noticias</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="localizacion">Localización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="somos">¿Quienes Somos?</a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" href="citas">Citas</a>
                        </li-->
                    </ul>
                    <!--                    <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <audio controls autoplay>
                                                    <source src="{{asset ('audio/audio.ogg')}}" type="audio/ogg">
                                                    <source src="{{asset ('audio/audio.mp3')}}" type="audio/mpeg">
                                                    El navegador no admite el elemento de audio.
                                                </audio>
                                            </li>
                                        </ul>-->
                    <ul class="navbar-nav eliminar_margen_arriba">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/hudy_elpaisano/" target="_blank"><img class="redes" alt="instagram" src="{{asset ('img/instagram.png')}}"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://facebook.com/elpaisanopeluqueria/" target="_blank"><img class="redes" alt="facebook" src="{{asset ('img/facebook.png')}}"></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav eliminar_margen_arriba">
                        <li class="nav-item">
                            <input type="button" name="Login" value="Login" id="login" onclick="irLogin();" class="btn btn-info"/>
                        </li>
                        <li class="nav-item">
                            <!--<a class="nav-link" href="sesion">Crear Cuenta</a>-->
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            @yield('contenido')
        </main>

<!--        <aside>
            @yield('aside')
        </aside>-->
        <footer class="bg-dark">                     
            <div class="izquierda">
                Teléfono: 658 230 110<br>
                Ubicación: Paseo de San Gregorio 91
            </div> 
            <div class="derecha">
                Copyright © Todos los Derechos Reservados
            </div>
            <div id="cajacookies" class="fixed-bottom bg-dark">
                <p>
                    <button onclick="aceptarCookies()" class="pull-right btn btn-info mr-3"><i class="fa fa-times"></i> Aceptar y cerrar éste mensaje</button><br>
                    Éste sitio web usa cookies, si permanece aquí acepta su uso.<br>
                    Puede leer más sobre el uso de cookies en nuestra <a href="privacidad">política de privacidad</a>.
                </p>
            </div>
        </footer>
    </body>
</html>