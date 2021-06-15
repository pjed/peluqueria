<?php

//
//function processDrpdown($selectedVal) {
//    echo "Fecha Seleccionada" . $selectedVal;
//}

if ($_POST['citaSeleccionadaBorrar']) {
    //call the function or execute the code
    borrarCitaID($_POST['citaSeleccionadaBorrar']);
}

/**
 * Función que borra la cita por su idCITA
 * @param type $idCITA
 */
function borrarCitaID($idCITA) {
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

    $sql = "DELETE FROM cita WHERE idCITA = '" . $idCITA . "';";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    echo json_encode($result);
}

//if ($_POST['obtenerCitas']) {
//    //call the function or execute the code
//    obtenerCitasFechaSeleccionada($_POST['fechaSeleccionada']);
//}