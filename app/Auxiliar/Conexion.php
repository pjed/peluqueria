<?php

namespace App\Auxiliar;

use App\Models\usuario;
use App\Models\tiene;
use App\Models\rol;
use App\Models\cita;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase Conexión a base de datos
 *
 * @author Pedro
 */
class Conexion {

    static function existeUsuario($correo, $pass) {

        //Compruebo que el usuario y la password coincide con algun 
        //usuario de todos los que hay en la tabla usuarios
        $usuario = \DB::Table('usuario')
                ->join('tiene', 'usuario.NSOCIO', '=', 'tiene.usuario_NSOCIO')
                ->join('rol', 'rol.IDROL', '=', 'tiene.rol_IDROL')
                ->where('EMAIL', $correo)
                ->where('PASSWORD', $pass)
                ->get();
        
        return $usuario;
    }
    
    

    /**
     * Cerrar sesion
     * @author Pedro
     * @param Request $req
     * @return type
     */
    public function cerrarSesion(Request $req) {
        session()->invalidate();
        session()->regenerate();
        return view('index');
    }

}
