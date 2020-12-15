<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\usuario;
use App\Auxiliar\Conexion;

class controlador extends Controller {

    /**
     * Método para comprobar si un usuario existe en la BD para hacer login
     * @param type $correo email del usuario
     * @param type $pwd contraseña del usuario
     * @return type usuario
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

}
