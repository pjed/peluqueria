<?php

$nombre = "";

if ($_POST["nombre"]) {
    $nombre = $_POST["nombre"];
}


if ($nombre != null) {
    obtenerCorreo($nombre);
}

/**
 * Función que obtiene el correo del cliente seleccionado por su numero de socio
 * @param type $nombre
 */
function obtenerCorreo($nombre) {
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

    $sql = "SELECT * FROM usuario WHERE NSOCIO=" . $nombre . ";";
    $result = mysqli_query($conn, $sql);
    
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $correo = $row["EMAIL"];
        }
    } 

    mysqli_close($conn);

    echo json_encode($correo);
}

//if ($_POST['obtenerCitas']) {
//    //call the function or execute the code
//    obtenerCitasFechaSeleccionada($_POST['fechaSeleccionada']);
//}