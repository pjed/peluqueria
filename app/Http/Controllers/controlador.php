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

        //Desencriptamos la contraseña que ha introducido el usuario
        $passHash = hash('sha256', $pass);

        //Comprobamos que existe el usuario
        $usuario = Conexion::existeUsuario($correo, $passHash);

        
        //Si existe creamos la sesion
        if (count($usuario) !== 0) {

            //Guardamos la sesion del usuario en la sesion
            session()->put('usuario', $usuario);

            //Miramos que permisos tiene el usuario en la BBDD
            //Si solo hay 1 es cliente
            if (count($usuario) === 1) {
                //Guardamos la sesion del usuario en la sesion
                session()->put('usuario', $usuario);
                
                //Redirigimos a la pagina cliente
                return view('cliente.indexCliente');
            } else {
                //Si tiene mas es administrador tambien
                //Cargamos todos los usuarios que hay en el sistema
                $usuarios = Conexion::obtenerUsuarios();

                //Guardamos los usuarios en la sesion para mostrarlo cuando 
                //se necesiten
                session()->put('usuarios', $usuarios);

                return view('adm.indexAdm');
            }
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
            echo '<div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
                    El correo electronico ya esta registrado, por favor elija otro.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            return view('crear');
        } else {
            //Que no existe lo creamos con tipo 2-Cliente 
            //y lo redirigimos a la pantalla de login
            //para que inicie sesion con su cuenta.
            $usuario = Conexion::crearUsuario($nombre, $direccion, $fecha, $correo, $pwd, $dni, $telefono, 2);

            //Mostramos que se ha creado el usuario correctamente
            echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    Usuario creado con éxito.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            return view('inicio', $usuario);
        }
    }

}
