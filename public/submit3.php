<?php

require_once "../app/Auxiliar/Correo.php";
//
//function processDrpdown($selectedVal) {
//    echo "Fecha Seleccionada" . $selectedVal;
//}

if ($_POST['citaSeleccionadaBorrar'] && $_POST['email']) {

    borrarCitaID($_POST['citaSeleccionadaBorrar'], $_POST['email']);
}

/**
 * Función que borra la cita por su idCITA
 * @param type $idCITA
 */
function borrarCitaID($idCITA, $email) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peluqueria";

    


    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    //RECUPERAMOS LOS DATOS DE LA CITA A BORRAR PARA NOTIFICARLO POR CORREO LA ANULACION DE LA CITA
    $sql2 = "SELECT * FROM cita WHERE idCITA = '" . $idCITA . "';";

    $result2 = mysqli_query($con, $sql2);

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result2)) {
        $fecha = $row["FECHA"];
        $hora = $row["HORA"];
        $observaciones = $row["OBSERVACIONES"];
    }

    mysqli_close($con);

    
    
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM cita WHERE idCITA = '" . $idCITA . "';";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    
    /* ENVIAMOS EL CORREO DE NOTIFICACION PARA EL USUARIO QUE HA BORRADO LA CITA */
    $correo = new \App\Auxiliar\Correo;
    $correo->enviarCorreoBorrarCita($email, "BORRAR CITA", $fecha, $hora, $observaciones);

    echo json_encode($result);
}

//if ($_POST['obtenerCitas']) {
//    //call the function or execute the code
//    obtenerCitasFechaSeleccionada($_POST['fechaSeleccionada']);
//}