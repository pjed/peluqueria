<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
        <title>@yield('titulo')</title>
        <style>
            .logo{
                width: 25px; height: 25px;
            }
            nav{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <!-- Header --> 
        <header>
            <nav>
                <a href="#"><img class="logo" src="../../../public/img/logo.jpg"></a>
                <a href="#">Inicio</a>
                <a href="#">Noticias</a>
                <a href="#">Servicios</a>
                <a href="#">Localizacion</a>
                <a href="#">¿Quiénes Somos?</a>
                <a href="#">Reserva Citas</a>
                <a href="#"><img class="logo" src="../../../public/img/login.svg"></a>
            </nav>
        </header>
        <main>
            @yield('contenido')
        </main>
        <footer>                     
            Página de una peluqueria cualquiera - Copyright © Todos los Derechos Reservados
        </footer>
    </body>
</html>