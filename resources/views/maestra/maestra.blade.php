<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
        <title>@yield('titulo')</title>

        <!-- Fuente -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet"> 

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset ('css/bootstrap.min.css')}}" media="screen" /> 
        
        
        <link rel="stylesheet" type="text/css" href="{{asset ('css/citas.css')}}" media="screen" />  
        <link rel="stylesheet" type="text/css" href="{{asset ('css/index.css')}}" media="screen" />  
        <link rel="stylesheet" type="text/css" href="{{asset ('css/localizacion.css')}}" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/maestra.css')}}" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/noticias.css')}}" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/servicios.css')}}" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/somos.css')}}" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/tarifas.css')}}" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="{{asset ('css/inicio.css')}}" media="screen" /> 
        
        <!-- Javascript bootstrap y jquery -->
        <script src="{{asset ('js/jquery.min.js')}}"></script>
        <script src="{{asset ('js/bootstrap.min.js')}}"></script>

    </head>
    <body>
        <!-- Header --> 
        <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                <!-- Brand -->
                <a href="index" class="navbar-brand"><img class="logo" alt="logo" src="{{asset ('img/logo.jpg')}}"></a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index" >Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="noticias">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="localizacion">Localización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="somos">¿Quienes Somos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="citas">Citas</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/hudy_elpaisano/" target="_blank"><img class="redes" alt="instagram" src="{{asset ('img/instagram.png')}}"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://facebook.com/elpaisanopeluqueria/" target="_blank"><img class="redes" alt="facebook" src="{{asset ('img/facebook.png')}}"></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="inicio"><input type="button" name="Login" value="Login" class="btn btn-info"/></a>
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

        <aside>
            @yield('aside')
        </aside>
        <footer class="bg-dark fixed-bottom">                     
            <div class="izquierda">
                Telefono de contacto 658 230 110<br>
                Ubicación Paseo de San Gregorio 91
            </div> 
            <div class="derecha">
                Copyright © Todos los Derechos Reservados
            </div>
        </footer>
    </body>
</html>