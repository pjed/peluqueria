<?php
require_once "../app/Auxiliar/Correo.php";

$nombre = "";
$fecha = "";
$hora = "";
$observaciones = "";

if ($_POST["nombre"]) {
    $nombre = $_POST["nombre"];
}
if ($_POST["fecha"]) {
    $fecha = $_POST["fecha"];
}
if ($_POST["hora"]) {
    $hora = $_POST["hora"];
}
if ($_POST["observaciones"]) {
    $observaciones = $_POST["observaciones"];
}
if ($_POST["email"]) {
    $email = $_POST["email"];
}

if ($nombre != null && $fecha != null && $hora != null && $observaciones != null && $email != null) {
    revervarCitaID($nombre, $fecha, $hora, $observaciones, $email);
}

/**
 * Función que reserva la cita 
 * @param type $nombre
 * @param type $fecha
 * @param type $hora
 * @param type $observaciones
 */
function revervarCitaID($nombre, $fecha, $hora, $observaciones, $email) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peluqueria";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO cita(idCITA, FECHA, TURNO, HORA, NOMBRE, OBSERVACIONES, usuario_NSOCIO) VALUES ('NULL','$fecha','1','$hora','NULL','$observaciones',$nombre);";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    /* ENVIAMOS EL CORREO DE NOTIFICACION PARA EL USUARIO QUE HA CREADO LA CITA */
    $correo = new \App\Auxiliar\Correo;
    $correo->enviarCorreoCita($email, "RESERVA CITA", $fecha, $hora, $observaciones);

    echo json_encode($result);
}

//if ($_POST['obtenerCitas']) {
//    //call the function or execute the code
//    obtenerCitasFechaSeleccionada($_POST['fechaSeleccionada']);
//}