<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Auxiliar;

/**
 * Clase para enviar un correo electronico
 *
 * @author DarkS
 */
class Correo {

    private $paginaLogin = "http://localhost/laravel/peluqueria/public/inicio";
    private $nombrePeluqueria = "Peluqueria el Paisano";

    public function enviarCorreoUsuarioCreado($tipo, $email, $password, $nombre) {
        // Multiples destinatarios
        $to = $email;

        // Asunto
        $subject = $tipo;

        // Mensaje
        $message = '
        <html>
        <head>
          <title>' . $tipo . '</title>
        </head>
            <body style="background:lightgray; padding: 10px; text-align: center;">
                <h3>NUEVO USUARIO CREADO</h3>
                <p><img src="' . asset('img/logo.jpg') . '" alt="logo" style="height: 200px; width: 200px;"></p>
                <p> Hola ' . $nombre . ' <br>Bienvenido a <b>' . $this->nombrePeluqueria . '</b></p>
                <p style="color: green;">SU CUENTA SE HA CREADO CORRECTAMENTE</p>
                <p>Puede iniciar sesion con los siguientes datos:</p>
                <ul>
                <li>Usuario: ' . $email . '</li>
                <li>Contraseña: ' . $password . '</li>
                </ul>
                <p>Cuando acceda a la aplicación use su correo electronico <b>' . $email . '</b> y la contraseña <b>' . $password . '</b></p>
                <p>Para entrar con su cuenta pulse <a href="' . $this->paginaLogin . '">aqui</a></p>
            </body>
        </html>
        ';

        // Cabeceras obligatorias para enviar el correo electronico
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Cabeceras opcionales
        //$headers[] = 'To: Pedro <espinosaduque@gmail.com>';
        $headers[] = 'From: Peluqueria El Paisano <peluqueriaelpaisano@gmail.com>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        //$headers[] = 'Bcc: birthdaycheck@example.com';
        //
        // Enviar el correo
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function enviarCorreoCita($email, $tipo, $fecha, $hora, $observaciones) {

        // Multiples destinatarios
        $to = $email;

        // Asunto
        $subject = $tipo;

        // Mensaje
        $message = '
        <html>
        <head>
          <title>' . $tipo . '</title>
        </head>        
            <body style="background:lightgray; padding: 10px; text-align: center;">
                <h3>SU CITA EN LA PELUQUERIA ES EL DIA</h3>
                <p>Su cita es el dia: <b>' . $fecha . '</b></p>
                <p>A las : <b>' . $hora . '</b></p>
                <p>Observaciones: <b>' . $observaciones . '</b></p>
                <p>Gracias por confiar en nosotros. <b>' . $this->nombrePeluqueria . '</b></p>
                <p>Puede cancelar su cita iniciando sesión y en el apartado citas, seleccionando el dia y pulsando en el boton eliminar</p>
                <p>Para entrar con su cuenta pulse <a href="' . $this->paginaLogin . '">aqui</a></p>
            </body>
        </html>
        ';

        // Cabeceras obligatorias para enviar el correo electronico
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Cabeceras opcionales
        //$headers[] = 'To: Pedro <espinosaduque@gmail.com>';
        $headers[] = 'From: Peluqueria El Paisano <peluqueriaelpaisano@gmail.com>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        //$headers[] = 'Bcc: birthdaycheck@example.com';
        //
        // Enviar el correo
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function enviarCorreoBorrarCita($email, $tipo, $fecha, $hora, $observaciones) {

        // Multiples destinatarios
        $to = $email;

        // Asunto
        $subject = $tipo;

        // Mensaje
        $message = '
        <html>
        <head>
          <title>' . $tipo . '</title>
        </head>
        <body style="background:lightgray; padding: 10px; text-align: center;">
            <h3>ELIMINAR CITA</h3>
            <p>Su cita del dia: <b>' . $fecha . '</b></p>
            <p>A las : <b>' . $hora . '</b></p>
            <p>Observaciones: <b>' . $observaciones . '</b></p>
            <p style="color: green;">SE HA BORRADO CORRECTAMENTE</p>
            <p>Gracias por confiar en nosotros. <b>' . $this->nombrePeluqueria . '</b></p>
            <p>Recuerde que puede volver a solicitar otra cita cuando hayan horas disponibles. GRACIAS.</p>
            <p>Para iniciar sesion con su cuenta pulse <a href="' . $this->paginaLogin . '">aqui</a></p>
        </body>
        </html>
        ';

        // Cabeceras obligatorias para enviar el correo electronico
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Cabeceras opcionales
        //$headers[] = 'To: Pedro <espinosaduque@gmail.com>';
        $headers[] = 'From: Peluqueria El Paisano <peluqueriaelpaisano@gmail.com>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        //$headers[] = 'Bcc: birthdaycheck@example.com';
        // Enviar el correo
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function enviarRestaurarContrasena($email, $tipo, $contrasena) {

        // Multiples destinatarios
        $to = $email;

        // Asunto
        $subject = $tipo;

        // Mensaje
        $message = '
        <html>
            <head>
              <title>' . $tipo . '</title>
            </head>
            <body style="background:lightgray; padding: 10px; text-align: center;">
                <h3>ALERTA DE CAMBIO DE CONTRASEÑA</h3>
                <p><img src="' . asset('img/logo.jpg') . '" alt="logo" style="height: 200px; width: 200px;"></p>
                <p>Su nueva contraseña es: <b>' . $contrasena . '</b></p>
                <p>Cuando acceda a la aplicación use su correo electronico <b>' . $email . '</b> y la contraseña <b>' . $contrasena . '</b></p>
                <p style="background: yellow;">No se olvide de cambiar su contraseña al iniciar sesion para mayor seguridad</p>
                <p>Para iniciar sesion pulse <a href="' . $this->paginaLogin . '">aqui</a>
            </body>
        </html>';

        // Cabeceras obligatorias para enviar el correo electronico
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Cabeceras opcionales
        //$headers[] = 'To: Pedro <espinosaduque@gmail.com>';
        $headers[] = 'From: Peluqueria El Paisano <peluqueriaelpaisano@gmail.com>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        //$headers[] = 'Bcc: birthdaycheck@example.com';
        // Enviar el correo
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function enviarCambiarContrasena($email, $tipo, $contrasena) {

        // Multiples destinatarios
        $to = $email;

        // Asunto
        $subject = $tipo;

        // Mensaje
        $message = '
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
          <title>' . $tipo . '</title>
        </head>
        <body style="background:lightgray; padding: 10px; text-align: center;">
            <h3>CAMBIO DE CONTRASEÑA</h3>
            <p>Su nueva contraseña es: <b>' . $contrasena . '</b></p>
            <p style="color: green;">SE HA CAMBIADO LA CONTRASEÑA CORRECTAMENTE</p>
            <p>Gracias por confiar en nosotros. <b>' . $this->nombrePeluqueria . '</b></p>
            <p>Puede volver a iniciar sesion con su usuario <b>' . $email . '</b> y su nueva contraseña <b>' . $contrasena . '</b>. GRACIAS.</p>
            <p>Para entrar con su cuenta pulse <a href="'.$this->paginaLogin.'">aqui</a></p>
        </body>
        </html>
        ';

        // Cabeceras obligatorias para enviar el correo electronico
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Cabeceras opcionales
        //$headers[] = 'To: Pedro <espinosaduque@gmail.com>';
        $headers[] = 'From: Peluqueria El Paisano <peluqueriaelpaisano@gmail.com>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        //$headers[] = 'Bcc: birthdaycheck@example.com';
        // Enviar el correo
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

}
