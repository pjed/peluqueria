<?php
//
//function processDrpdown($selectedVal) {
//    echo "Fecha Seleccionada" . $selectedVal;
//}

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

// Multiple recipients
    $to = $email;

// Subject
    $subject = 'Reserva Cita';

// Message
    $message = '
        <html>
        <head>
          <title>CITA PELUQUERIA</title>
        </head>
        <body>
          <p>SU CITA CON EL PELUQUERIA ES EL DIA</p>
          <p>' . $fecha . '</p><br>
          <p>' . $hora . '</p><br>
          <p>' . $observaciones . '</p><br>
        </body>
        </html>
        ';

// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
//$headers[] = 'To: Pedro <espinosaduque@gmail.com>';
    $headers[] = 'From: Peluqueria El Paisano <peluqueriaelpaisano@gmail.com>';
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';
// Mail it
    mail($to, $subject, $message, implode("\r\n", $headers));

    echo json_encode($result);
}

//if ($_POST['obtenerCitas']) {
//    //call the function or execute the code
//    obtenerCitasFechaSeleccionada($_POST['fechaSeleccionada']);
//}