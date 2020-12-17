<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\usuario;
use App\Auxiliar\Conexion;

class controlador extends Controller {

    /**
     * Método para iniciar la sesión comprueba si existe el usuario y redirige
     * a la pagina de cual sea su rol si Admin o Cliente
     * @param type $req request
     */
    static function inicioSesion(Request $req) {
        $correo = $req->get('usuario');
        $pass = $req->get('pwd');

        //Comprobamos que existe el usuario
        $usuario = Conexion::existeUsuario($correo, $pass);

        //Si existe creamos la sesion
        if (count($usuario) !== 0) {
            session()->put('usuario', $usuario);
            return view('adm.indexAdm');
        } else {
            session()->put('usuario', $usuario);
            return view('index');
        }
    }
    
    /**
     * Método para crear la cuenta de un usuario nuevo
     * @param type $req request
     */
    static function crearCuenta(Request $req) {
        $nombre = $req->get('nya');
        $direccion = $req->get('direccion');
        $fecha = $req->get('fecha');
        $correo = $req->get('correo');
        $pwd = $req->get('pwd');
        $dni = $req->get('dni');
        $telefono = $req->get('telefono');

        //Comprobamos que existe el usuario
        $usuario = Conexion::existeUsuario($correo, $pwd);

        //comprobamos si el usuario existe
        if (count($usuario) !== 0) {
            //Si existe el usuario lo redirigimos a la pagina 
            //de crear cuenta y le mostramos el 
            //mensaje de error que el usuario ya existe
            return view('crear');
        } else {
            //Que no existe lo creamos con tipo 2-Cliente 
            //y lo redirigimos a la pantalla de login
            //para que inicie sesion con su cuenta.
            $usuario = Conexion::crearUsuario($nombre, $direccion, $fecha, $correo, $pwd, $dni, $telefono, 2);
            
            return view('inicio', $usuario);
        }
    }

}
