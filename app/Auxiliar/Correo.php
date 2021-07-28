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
        <body>
          <p> HOLA' . $nombre . '</p><br>
          <p>SU CUENTA SE HA CREADO CORRECTAMENTE</p>
          <p>Usuario: ' . $email . '</p><br>
          <p>Password: ' . $password . '</p><br>
          <p>Puede entrar en su cuenta en la siguiente direccion: <a href="http://localhost/laravel/peluqueria/public/inicio">Login</a></p><br>
          <p>GRACIAS POR CONFIAR EN NOSOTROS</p><br>
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
        <body>
          <p>SU CITA EN LA PELUQUERIA ES EL DIA</p>
          <p>' . $fecha . '</p><br>
          <p>' . $hora . '</p><br>
          <p>' . $observaciones . '</p><br>
          <p>GRACIAS POR CONFIAR EN NOSOTROS</p><br>
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
        <body>
          <p> LA CITA QUE TENIA EL DIA</p>
          <p>' . $fecha . '</p><br>
          <p>' . $hora . '</p><br>
          <p>' . $observaciones . '</p><br>
          <p>SE HA BORRADO CORRECTAMENTE</p>
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
        <body>
          <p> LA CONTRASEÑA NUEVA ES </p>
          <p>' . $contrasena . '</p><br>
          <p>SE HA CAMBIADO LA CONTRASEÑA POR FAVOR CUANDO INICIE CAMBIALA POR OTRA MAS SEGURA</p>
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
