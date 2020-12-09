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
     * @param type $pwd contraseña del usuario
     * @return type usuario
     */
    static function existeUsuario($correo, $pwd) {
        $ur = usuario::all();
        $v = [];
        foreach ($ur as $a) {
            $p = usuario::where('email', $correo)->where('pass', $pwd)->where('activo', 1)->where('dni', $a->usuario_dni)->first(); //aqui se cruzan
            if ($p) {
                $v[] = ['dni' => $p->dni,
                    'nombre' => $p->nombre,
                    'apellidos' => $p->apellidos,
                    'domicilio' => $p->domicilio,
                    'email' => $p->email,
                    'pass' => $p->pass,
                    'tel' => $p->telefono,
                    'movil' => $p->movil,
                    'iban' => $p->iban,
                    'activo' => $p->activo,
                    'foto' => $p->foto,
                    'rol' => $a->rol_id,
                ];
            }
        }
        return $v;
    }

}
