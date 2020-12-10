<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\usuario;

class controlador extends Controller {

    /**
     * Cerrar sesion
     * @author Pedro
     * @param Request $req
     * @return type
     */
    public function cerrarSesion(Request $req) {
        session()->invalidate();
        session()->regenerate();
        return view('inicio');
    }

    /**
     * Método para comprobar si un usuario existe en la BD para hacer login
     * @param type $correo email del usuario
     * @param type $pwd contraseña del usuario
     * @return type usuario
     */
    static function inicioSesion(Request $req) {
        $correo = $req->get('usuario');
        $pass = $req->get('pwd');

        //Me traigo todos los usuarios 
        $usuarios = usuario::all();
        
        //Compruebo que el usuario y la password coincide con algun 
        //usuario de todos los que hay en la tabla usuarios

        $usuario = $usuarios->where([
                    ['EMAIL', '=', $correo],
                    ['PASSWORD', '=', $pass]
                ])->first();
        dd($usuario);
        $rol = rol::all();
        $tiene = tiene::all();

        return $v;
    }

}
