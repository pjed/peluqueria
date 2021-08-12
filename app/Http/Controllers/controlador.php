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
            if ($usuario[0]->PASSWORD === "098839d7476f9f50f875e650a10dc666400e2da8f8da637ade514f93470c9249") {
                //Mensaje para cambiar la contraseña
                echo '<div class="m-0 alert alert-warning alert-dismissible fade show" role="alert">
                        Debe de cambiar la contraseña que ha restablecido por una mas segura. Para ello pulse en la foto de perfil e introduzca la nueva contraseña.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">X</span>
                        </button>
                      </div>';
            }
            $citasSocio = Conexion::obtenerUltimasCitasSocio($usuario[0]->NSOCIO);

            if (count($citasSocio) != 0) {
                $fecha = $citasSocio[0]->FECHA;
                $date = new \DateTime($fecha);

                if (count($citasSocio) >= 1) {
                    //Mostramos el mensaje emergente de la ultima cita que tiene
                    echo '<div class="m-0 alert alert-warning alert-dismissible fade show" role="alert">
                        La próxima cita en la peluquería es el dia ' . date_format($date, 'd-m-Y') . ' a las ' . $citasSocio[0]->HORA . '. 
                            <br>Si quiere anular su reserva ir a Citas, seleccionar el dia y pulsar eliminar
                      </div>';
                }
            } else {

                //Mensaje que no tiene reservada ninguna cita 
                echo '<div class="m-0 alert alert-info alert-dismissible fade show" role="alert">
                        No tiene ninguna cita. 
                        <br>Para reservar una ir al apartado Citas
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
            $mensajeError = "Usuario y/o contraseña no son correctos";
            if ($correo == null && $pass == null) {
                $mensajeError = "El usuario y la contraseña no pueden estar vacías";
            } else if ($correo == null) {
                $mensajeError = "El correo no puede estar vacío";
            } else if ($pass == null) {
                $mensajeError = "La contraseña no puede estar vacía";
            }
            session()->put('error', $mensajeError);
            return view('inicio');
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
//        $dni = $req->get('dni');
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
            $usuario = Conexion::crearUsuario($nombre, $direccion, $fecha, $correo, $pwd, $telefono, 2);

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
     * Método que permite actualizar el perfil del usuario
     * @param Request $req
     */
    static function actualizarPerfil(Request $req) {
        $email = $req->get("email");
        $password = $req->get("pwd");
        $nya = $req->get("nya");
        $direccion = $req->get("direccion");
        $telefono = $req->get("telefono");

        $cambiarContrasena = false;

        if ($password !== null) {
            $cambiarContrasena = true;
        }

        if ($_FILES["file"]["name"] != "") {
            $statusMsg = '';

            // File upload path
            $targetDir = "img/perfil/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


            if (!empty($_FILES["file"]["name"])) {
                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                        $update = Conexion::actualizarFotoPerfilUsuario($fileName, $email);

                        if ($update) {
                            $statusMsg = "La foto " . $fileName . " se ha subido correctamente.";

                            //Mostramos la alerta
                            echo '<div class="m-0 alert alert-info alert-dismissible fade show" role="alert">
                                    ' . $statusMsg . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">X</span>
                                    </button>
                                  </div>';
                        } else {
                            $statusMsg = "La foto ya existe, foto actualizada.";

                            //Mostramos la alerta
                            echo '<div class="m-0 alert alert-warning alert-dismissible fade show" role="alert">
                                    ' . $statusMsg . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">X</span>
                                    </button>
                                  </div>';
                        }
                    } else {
                        $statusMsg = "Se ha producido un error al subir la foto, intentelo mas tarde.";

                        //Mostramos la alerta
                        echo '<div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
                                ' . $statusMsg . '
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">X</span>
                                </button>
                              </div>';
                    }
                } else {
                    $statusMsg = 'Perdona, solo admite fotos de tipo JPG, JPEG, PNG, GIF, & PDF para subir.';

                    //Mostramos la alerta
                    echo '<div class="m-0 alert alert-warning alert-dismissible fade show" role="alert">
                            ' . $statusMsg . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                          </div>';
                }
            } else {
                $statusMsg = 'Selecciona un archivo para subir.';

                //Mostramos la alerta
                echo '<div class="m-0 alert alert-info alert-dismissible fade show" role="alert">
                        ' . $statusMsg . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">X</span>
                        </button>
                      </div>';
            }
        }

        if ($cambiarContrasena) {
            //Guardamos los datos del usuario con la contraseña nueva actualizada
            Conexion::actualizarPerfilUsuario($email, $password, $nya, $direccion, $telefono);

            //Mostramos OK para que sepa que la contraseña se ha cambiado correctamente
            echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    La contraseña se ha cambiado correctamente. Inicie sesión con la nueva contraseña que se le ha enviado al correo eletronico.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';

            //Notificamos por correo el cambio de contraseña enviandole al correo su nueva contraseña
            $correo = new Correo();
            $correo->enviarCambiarContrasena($email, "CONTRASENA ACTUALIZADA", $password);
        }

        //Guardamos los datos del usuario sin la nueva contraseña por que no ha especificado ninguna nueva
        Conexion::actualizarPerfilUsuarioNoPassword($email, $nya, $direccion, $telefono);

        //Se ha actualizado el perfil correctamente
        echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    El perfil se ha actualizado correctamente. Inicie sesion nuevamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';


        self::cerrarSesion();
        return view('index');
    }

    /**
     * Función que cierra la sesion del programa
     */
    static function cerrarSesion() {
        Conexion::cerrarSesion();
    }

    static function generarContrasena() {
        //HACER EL PATRON GENERICO PARA GENERAR UNA CONTRASEÑA NUEVA
        return "paisano";
    }

    /**
     * Función que edita o elimina un usuario del panel de administracion
     */
    static function editarEliminar(Request $req) {
        $nsocio = $req->get("nsocio");
        $email = $req->get("email");
        $nya = $req->get("nya");
        $direccion = $req->get("direccion");
        $telefono = $req->get("telefono");
        $rol = $req->get("rol");

        $actualizado = Conexion::actualizarPerfilAdm($nsocio, $email, $nya, $direccion, $telefono, $rol);

        if ($actualizado == 1) {
            //Mostrar el mensaje de usuario actualizado
            echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
                    El usuario ha sido actualizado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
            //Recargar otra vez la pagina
            //
            //Cargamos todos los usuarios que hay en el sistema
            $usuarios = Conexion::obtenerUsuarios();

            //Guardamos los usuarios en la sesion para mostrarlo cuando 
            //se necesiten
            session()->put('usuarios', $usuarios);
        } else {
            echo '<div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
                    Error al actualizar el usuario
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">X</span>
                    </button>
                  </div>';
        }
        return view('adm.usuarios');
    }

}
