<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\usuario;
use App\Auxiliar\Conexion;
use App\Http\Controllers\Sesion;
use App\Auxiliar\Correo;

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

        //Comprobamos que existe el usuario y la contraseña es correcta
        $usuario = Conexion::existeUsuario($correo, $passHash);

        //Si existe creamos la sesion
        if (count($usuario) !== 0) {

            //Si el usuario ha restaurado la contraseña y no la ha cambiado vamos a monstar un mensaje de advertencia para cambiar la contraseña
            if($usuario[0]->PASSWORD ==="098839d7476f9f50f875e650a10dc666400e2da8f8da637ade514f93470c9249"){
                //Mensaje para cambiar la contraseña
                echo '<div class="m-0 alert alert-warning alert-dismissible fade show" role="alert">
                        Debe de cambiar la contraseña que ha restablecido por una mas segura. Para ello pulse en la foto de perfil e introduzca la nueva contraseña.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">X</span>
                        </button>
                      </div>';
            }
            
            $usuariosCitas = Conexion::obtenerTodosUsuarios();

            //Obtenemos los usuarios de la aplicacion para mostrar en citas y lo guardamos en sesion
            session()->put('usuariosCitas', $usuariosCitas);

            //Obtenemos el usuario logueado y lo guardamos en la sesion
            session()->put('usuario', $usuario);

            //Miramos que permisos tiene el usuario en la BBDD
            //Si solo hay 1 es cliente

            if ($usuario[0]->IDROL !== 1) {

                //Guardamos la sesion del usuario en la sesion
                session()->put('usuario', $usuario);

                //Redirigimos a la pagina cliente
                return view('cliente.index');
            } else {
                //Si tiene mas es administrador tambien
                //Cargamos todos los usuarios que hay en el sistema
                $usuarios = Conexion::obtenerUsuarios();

                //Guardamos los usuarios en la sesion para mostrarlo cuando 
                //se necesiten
                session()->put('usuarios', $usuarios);

                return view('adm.index');
            }
        } else {
            session()->put('usuario', $usuario);
            return view('index');
        }
    }

    /**
     * Método que permite obtener la contraseña
     * @param Request $req
     */
    static function olvidarContrasena(Request $req) {
        $correo = $req->get('correo');
        $contrasena = self::generarContrasena();

        $usuario = Conexion::existeUsuarioCorreo($correo);

        if (count($usuario) !== 0) {
            //Si existe el usuario generamos una contraseña para este usuario y la guardamos en la base de datos
            Conexion::cambiarPassword($usuario, $contrasena);

            //Enviamos la contrasena por correo electronico
            $mail = new \App\Auxiliar\Correo;
            $mail->enviarRestaurarContrasena($correo, "RESTAURAR CONTRASEÑA", $contrasena);


            //Mostramos que se ha creado el usuario correctamente
            echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    La contraseña se ha restaurado correctamente. Por favor compruebe el correo eletronico en su carpeta de entrada.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            return view('inicio', $usuario);
        } else {
            //Si no existe el usuario le decimos que el usuario no existe
            echo '<div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
                    El correo no existe. Compruebe que lo ha escrito bien
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            return view('olvidar');
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

        //Comprobamos que existe el usuario solo comprobando si ese email esta ya registrado
        $usuario = Conexion::existeUsuarioCorreo($correo);

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

            //Enviamos los datos de la cuenta al correo electronico facilitado en el registro
            $email = new \App\Auxiliar\Correo;
            $email->enviarCorreoUsuarioCreado("NUEVO USUARIO", $correo, $pwd, $nombre);

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

    /**
     * Función que permite la reserva de las citas a un cliente
     * @param Request $req
     */
    static function reservarCita(Request $req) {
        $nombre = $req->get("nombre");
        $observaciones = $req->get("observaciones");
        $fechacita = $req->get("fechacita");
        session()->put('fechacita', $fechacita);
        $horaLibre = $req->get("horasLibres");

        $reservaCita = false;

        if ($nombre !== null) {
            $reservaCita = true;
        }

        if ($fechacita !== null) {
            $reservaCita = true;
        }

        if ($horaLibre !== null) {
            $reservaCita = true;
        }

        if ($reservaCita) {
            //Registramos la cita en la bbdd en la tabla citas 
            $aux = Conexion::addCita($nombre, $observaciones, $fechacita, $horaLibre);

            $cita = Conexion::obtenerCitasFecha($fechacita);

            if ($aux) {
                //Mostramos que se ha creado la cita correctamente
                echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    Cita creada con éxito. El día ' . $fechacita . ' a las ' . $horaLibre . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';

                session()->put("citas", $cita);
            } else {
                //Mostramos ERROR
                echo '<div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
                    ERROR, no se ha podido crear la cita.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            }

            return view('cliente.citas', $cita);
        }
    }

    /**
     * Funcion que elimina una cita por su identificador 
     * @param Request $req
     */
    static function borrarCita(Request $req) {
        $idCITA = $req->get("idCITA");
        $fechacita = $req->get("fechaSeleccionada");

        //Comprobamos si el idCITA es diferente de null
        if ($idCITA != null) {
            if (Conexion::removeCita($idCITA)) {
                //Mostramos OK
                echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    Cita eliminada con éxito.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            } else {
                //Mostramos ERROR
                echo '<div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
                    ERROR, no se puede borrar la cita.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            }
            $idCITA = null;
            $cita = Conexion::obtenerCitasFecha($fechacita);
            session()->put("citas", $cita);
            return view('cliente.citas', $cita);
        }
    }

    /**
     * Función que cierra la sesion del programa
     */
    static function cerrarSesion(Request $req) {
        Conexion::cerrarSesion($req);
        return view('index');
    }

    static function generarContrasena() {
        //HACER EL PATRON GENERICO PARA GENERAR UNA CONTRASEÑA NUEVA
        return "paisano";
    }

}
