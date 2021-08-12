<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width">


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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
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
                    <ul class="navbar-nav eliminar_margen_arriba">
                        <li class="nav-item">
                            <!-- Brand -->
                            <a href="index" class="navbar-brand"><img class="logo" alt="logo" src="{{asset ('img/logo.jpg')}}"></a>
                        </li>
                    </ul>
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

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section
                class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
                >
                <!-- Left -->
                <div class="me-5 d-none d-lg-block ml-5">
                    <span>Conecta con nosotros en redes sociales:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div class="justify-content-center">
                    <a href="" class="me-4 text-reset mr-3">
                        <a href="https://facebook.com/elpaisanopeluqueria/"><i class="fab fa-facebook-f"></i></a>
                    </a>
                    <a href="" class="me-4 text-reset mr-3">
                        <a href="https://www.instagram.com/hudy_elpaisano/"><i class="fab fa-instagram"></i></a>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-cut me-3"></i>&nbsp;Peluqueria
                            </h6>
                            <p>
                                Pida cita o bien por la página web o por teléfono
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Servicios
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Cortes de pelo</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Degradados</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Barbas</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Tintes</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Enlaces
                            </h6>
                            <p>
                                <a class="nav-link" href="index" >Inicio</a>
                            </p>
                            <p>
                                <a class="nav-link" href="servicios">Servicios</a>
                            </p>
                            <p>
                                <a class="nav-link" href="localizacion">Localización</a>
                            </p>
                            <p>
                                <a class="nav-link" href="somos">¿Quienes Somos?</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contacto
                            </h6>
                            <p><i class="fas fa-home me-3"></i> Paseo de San Gregorio 91, Puertollano</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                peluqueriaelpaisano@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> 658 230 110</p>
                            <!--<p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>-->
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright <br> Todos los derechos reservados
                <!--<a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>-->
            </div>
            <!-- Copyright -->
            <div id="cajacookies" class="bg-dark">
                <div class="row justify-content-center align-content-center">
                    <div class="col-sm-12 mt-2">
                        <button onclick="aceptarCookies()" class="btn btn-info"><i class="fa fa-times"></i> Aceptar</button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <p>
                            Éste sitio web usa cookies, si permanece aquí acepta su uso. &nbsp;<br>Puede leer más sobre el uso de cookies en nuestra <a href="privacidad">política de privacidad</a>.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </body>
</html>