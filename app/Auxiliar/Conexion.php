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
     * Método para comprobar si un usuario existe en la BD para hacer login
     * @param type $correo email del usuario
     * @param type $pass contraseña del usuario
     * @return type usuario
     */
    static function existeUsuarioCorreo($correo) {
        //Compruebo que el usuario y la password coincide con algun 
        //usuario de todos los que hay en la tabla usuarios
        $usuario = \DB::Table('usuario')
                ->join('tiene', 'usuario.NSOCIO', '=', 'tiene.usuario_NSOCIO')
                ->join('rol', 'rol.IDROL', '=', 'tiene.rol_IDROL')
                ->where('EMAIL', $correo)
                ->get();
        return $usuario;
    }

    /**
     * Método para obtener todos los usuarios que tienen rol de la aplicacion para mostrarlos en la parte de administracion usuarios
     * @return type usuarios
     */
    static function obtenerUsuarios() {

        //Compruebo que el usuario y la password coincide con algun 
        //usuario de todos los que hay en la tabla usuarios
        $usuarios = \DB::Table('usuario')
                ->join('tiene', 'usuario.NSOCIO', '=', 'tiene.usuario_NSOCIO')
                ->join('rol', 'rol.IDROL', '=', 'tiene.rol_IDROL')
                ->get();

        return $usuarios;
    }

    /**
     * Método para obtener todos los usuarios registrados de la aplicacion para mostrar en la parte de citas
     * @return type usuarios
     */
    static function obtenerTodosUsuarios() {

        //Compruebo que el usuario y la password coincide con algun 
        //usuario de todos los que hay en la tabla usuarios
        $usuarios = \DB::Table('usuario')
                ->select('NYA', 'NSOCIO')
                ->orderBy('NYA')
                ->get();

        return $usuarios;
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
    static function crearUsuario($nombre, $direccion, $fecha, $correo, $pwd, $telefono, $tipo) {
        //Si el tipo es 2-Cliente creamos 
        //el usuario con rol cliente
        if ($tipo == 2) {
            //Creamos el objeto usuario y lo rellenamos con los datos
            $usuario = new usuario();
            $usuario->NSOCIO = NULL;
//            $usuario->DNI = $dni;
            $usuario->EMAIL = $correo;
            $usuario->PASSWORD = hash('sha256', $pwd);
            $usuario->NYA = $nombre;
            $usuario->DIRECCION = $direccion;
            $usuario->F_NACIMIENTO = $fecha;
            $usuario->TELEFONO = $telefono;
            $usuario->FOTO = 'noimage.jpg';
            $usuario->save();

            //Obtenemos el numero de socio del usuario que acabamos de 
            //insertar en la tabla usuario
            $usuario_NSOCIO = \DB::Table('usuario')
                    ->select('NSOCIO')
                    ->where('EMAIL', $correo)
                    //->where('PASSWORD', hash('sha256', $pwd))
                    ->get();

            $nsocio = json_decode(json_encode($usuario_NSOCIO), true);
            //Creamos el objeto tiene para dar de alta al usuario con 
            // el rol de Cliente
            $tiene = new tiene();
            $tiene->idtiene = NULL;
            $tiene->usuario_NSOCIO = (int) $nsocio[0]['NSOCIO'];
            $tiene->rol_IDROL = $tipo;
            $tiene->save();
        }
        return $usuario;
    }

    /**
     * Función que obtiene las horas libres que quedan
     * @param type $fecha
     */
    static function obtenerHorariosCitasLibres($fecha) {
        $array = array("10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30", "20:00");
        $horas = \DB::Table('cita')
                ->select('HORA')
                ->where('FECHA', $fecha)
                ->get();

        $cuantos = 0;
        foreach ($horas as $value) {
            $horas_bbdd[$cuantos] = $value->HORA;
            $cuantos++;
        }
        $cuantos = 0;
        $horasLibres = array_diff($array, $horas_bbdd);

        return $horasLibres;
    }

    /**
     * Función que añade citas en una fecha y una hora determinada
     * @param type $nombre
     * @param type $observaciones
     * @param type $fechacita
     * @param type $horaLibre
     * @return cita
     */
    static function addCita($nombre, $observaciones, $fechacita, $horaLibre) {

        //Creamos el objeto cita y lo rellenamos con los datos de la cita
        $cita = new cita();
        $cita->idCita = NULL;
        $cita->FECHA = date(('Y-m-d'), strtotime($fechacita));
        $cita->TURNO = "1";
        $cita->HORA = $horaLibre;
        $cita->NOMBRE = NULL;
        $cita->OBSERVACIONES = $observaciones;
        $cita->usuario_NSOCIO = (int) $nombre;
        $cita->save();

        return $cita;
    }

    /**
     * Función obtener todas las citas con sus nombres y tal para poder 
     * mostrarlo por la pantalla filtrando por la fecha de la cita que se registre.
     * @param type $fechacita
     */
    static function obtenerCitasFecha($fechacita) {
        $citas = \DB::Table('cita')
                //->select('HORA, FECHA, NYA, OBSERVACIONES')
                ->join('usuario', 'cita.usuario_NSOCIO', '=', 'usuario.NSOCIO')
                ->where('FECHA', $fechacita)
                ->orderby('HORA')
                ->get();

        return $citas;
    }

    /**
     * Cerrar sesion
     * @author Pedro
     * @param Request $req
     * @return type
     */
    static function cerrarSesion() {
        session_unset();
        //session_destroy();
        session()->invalidate();
        session()->regenerate();
        //return view('index');
    }

    /**
     * Función que elimina una cita por su ID
     * @param type $idCITA
     */
    static function removeCita($idCITA) {

        if ($idCITA != null) {
            //Creamos el objeto cita y lo rellenamos con los datos de la cita
            $cita = \DB::Table('cita')->where('idCITA', $idCITA)->delete();
        }

        return $cita;
    }

    /**
     * Función que permite cambiar la contraseña en la base de datos
     * @param type $usuario
     * @param type $password
     */
    static function cambiarPassword($usuario, $password) {
        $nsocio = $usuario[0]->NSOCIO;

        $usu = \DB::table('usuario')
                ->where('NSOCIO', $nsocio)
                ->update(['PASSWORD' => (hash('sha256', $password))]);
        return $usu;
    }

    /**
     * Función que permite actualizar el perfil del usuario
     * @param type $correo
     * @param type $password
     * @param type $nya
     * @param type $direccion
     * @param type $telefono
     * @return type
     */
    static function actualizarPerfilUsuario($correo, $password, $nya, $direccion, $telefono) {
        $usu = \DB::table('usuario')
                ->where('EMAIL', $correo)
                ->update(['PASSWORD' => (hash('sha256', $password)), 'NYA' => $nya], ['DIRECCION' => $direccion, 'TELEFONO' => $telefono]);
        return $usu;
    }

    /**
     * Función que permite actualizar el perfil del usuario sin la password
     * @param type $correo
     * @param type $nya
     * @param type $direccion
     * @param type $telefono
     * @return type
     */
    static function actualizarPerfilUsuarioNoPassword($correo, $nya, $direccion, $telefono) {
        $usu = \DB::table('usuario')
                ->where('EMAIL', $correo)
                ->update(['NYA' => $nya, 'DIRECCION' => $direccion, 'TELEFONO' => $telefono]);

        return $usu;
    }

    /**
     * Función que permite actualizar la foto del perfil del usuario
     * @param type $foto
     * @return type
     */
    static function actualizarFotoPerfilUsuario($foto, $correo) {

        $usu = \DB::table('usuario')
                ->where('EMAIL', $correo)
                ->update(['FOTO' => $foto]);

        return $usu;
    }

    /**
     * Función que obtiene las ultimas citas del socio
     * @param type $nsocio
     */
    static function obtenerUltimasCitasSocio($nsocio) {
        $citas = \DB::Table('usuario')
                ->join('cita', 'usuario.NSOCIO', '=', 'cita.usuario_NSOCIO')
                ->where('NSOCIO', $nsocio)
                ->orderBy('FECHA', 'DESC')
                ->get();
        return $citas;
    }

    /**
     * Función que actualiza el perfil desde el usuario administrador
     * @param type $nsocio
     * @param type $email
     * @param type $nya
     * @param type $direccion
     * @param type $telefono
     * @param type $rol
     */
    static function actualizarPerfilAdm($nsocio, $email, $nya, $direccion, $telefono, $rol) {
        $usu = \DB::table('usuario')
                ->join('tiene', 'usuario.NSOCIO', '=', 'tiene.usuario_NSOCIO')
                ->join('rol', 'rol.IDROL', '=', 'tiene.rol_IDROL')
                ->where('NSOCIO', $nsocio)
                ->update(['EMAIL' => $email, 'NYA' => $nya, 'DIRECCION' => $direccion, 'TELEFONO' => $telefono, 'rol_IDROL' => $rol]);

        return $usu;
    }

}
