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

    /**
     * Método para comprobar si un usuario existe en la BD para hacer login
     * @param type $correo email del usuario
     * @param type $pass contraseña del usuario
     * @return type usuario
     */
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
     * Método que crea el usuario en la base de datos
     * @param type $nombre nombre y apellidos
     * @param type $direccion del usuario
     * @param type $fecha fecha de nacimiento 
     * @param type $correo correo electronico
     * @param type $pwd contraseña
     * @param type $dni 
     * @param type $telefono movil o fijo
     * @param type $tipo tipo de rol del usuario 1-Admin 2-Cliente
     * @return type
     */
    static function crearUsuario($nombre, $direccion, $fecha, $correo, $pwd, $dni, $telefono, $tipo) {
        //Si el tipo es 2-Cliente creamos 
        //el usuario con rol cliente
        if ($tipo == 2) {
            $usuario = usuario::create(
                            ['NSOCIO' => null],
                            ['DNI' => $dni],
                            ['EMAIL' => $correo],
                            ['PASSWORD' => $pwd],
                            ['NYA' => $nombre],
                            ['DIRECCION' => $direccion],
                            ['F_NACIMIENTO' => $fecha],
                            ['TELEFONO' => $telefono]
            );
        }
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
