<?php

function processDrpdown($selectedVal) {
    echo "Fecha Seleccionada" . $selectedVal;
}

/**
 * Función que obtiene las horas libres que quedan
 * @param type $fecha
 */
function obtenerHorariosCitasLibres($fecha) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peluqueria";



    $array = array("10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30", "20:00");


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT HORA FROM cita WHERE FECHA = '" . $fecha . "'";
    $result = mysqli_query($conn, $sql);

    $horas_bbdd = null;
    $cuantos = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $horas_bbdd[$cuantos] = $row["HORA"];
            $cuantos++;
        }
    } 
    mysqli_close($conn);


    if (mysqli_num_rows($result) > 0) {
        $horasLibres = array_diff($array, $horas_bbdd);
        echo json_encode($horasLibres);
    } else {
        echo json_encode($array);
    }
}

if ($_POST['fechaSeleccionada']) {
    //call the function or execute the code
    obtenerHorariosCitasLibres($_POST['fechaSeleccionada']);
}