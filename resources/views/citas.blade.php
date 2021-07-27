@extends('maestra.maestra_cliente')

@section('titulo') 
El Paisano - CitasClienteA
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset ('css/citas.css')}}" media="screen" />  
@endsection

@section('javascript')
<script src="{{asset ('js/citas.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(function () {
    /*Funcion que oculta los alerts de crear citas y borrar citas*/
    mensajesOcultos();

    var fecha;
    $("#fechacita").change(function () {
        fecha = $(this).val();
        $('#fechaSeleccionada').text(fecha);
    });

    $("#fechacita").change(function () {
        var selectedDate = $(this).val();
        $('#fechaSeleccionada').text(selectedDate);
        $.ajax({
            data: {"fechaSeleccionada": selectedDate}, //datos json recogidos del formulario formu
            type: "POST", // método de envío de datos
            url: "submit.php", //código a ejecutar en el servidor
            success: function (respuesta) {
                var citas = JSON.parse(respuesta); //conversión a json de los datos de respuesta

                if (citas.length !== 0) {

                    var $boton = $('#reservar');
                    $boton.prop('disabled', false);
                    var $horas = $('#horasLibres');
                    $horas.prop('disabled', false);
                    $horas.empty();
                    $.each(citas, function (index, item) {
                        $horas.append($('<option></option>').val(item).html(item));
                    });
                } else {
                    var $horas = $('#horasLibres');
                    $horas.empty();
                    $horas.append($("<option></option>")
                            .attr("value", 0)
                            .text(" --- NO HAY HORAS LIBRES ---"));
                    $horas.prop('disabled', true);
                    var $boton = $('#reservar');
                    $boton.prop('disabled', true);
                }
            }
        });
        $.ajax({
            data: {"fechaSeleccionadaCitas": selectedDate}, //datos json recogidos del formulario formu
            type: "POST", // método de envío de datos
            url: "submit2.php", //código a ejecutar en el servidor
            success: function (respuesta) {
                var citas = JSON.parse(respuesta); //conversión a json de los datos de respuesta

                var $tabla_citas = $('#citas_dia');
                var $nsocio = $('#nsocio').val();
                var $rol = $('#rol').val();

                $tabla_citas.empty();
                if (citas !== null) {
                    if (citas.length !== 0) {
                        $tabla = "";
                        $tabla += "<thead>";
                        $tabla += "<th>Hora</th>";
                        $tabla += "<th>Cliente/a</th>";
                        $tabla += "<th>Observaciones</th>";
                        $tabla += "<th></th>";
                        $tabla += "</thead>";
                        $tabla += "<tbody>";
                        for (var i = 0; i < citas.length; i++) {
                            cita = citas[i];
                            $fila = "";
                            if ($rol === "1") {
                                $fila += '<tr>';
                                $fila += '<input type="hidden" name="idCITA" id="' + cita["idCITA"] + '" value="' + cita["idCITA"] + '"/>';
                                $fila += '<input type="hidden" name="EMAIL" id="' + cita["EMAIL"] + '" value="' + cita["EMAIL"] + '"/>';
                                $fila += '<td>' + cita["HORA"] + '</td>';
                                $fila += '<td>' + cita["NYA"] + '</td>';
                                $fila += '<td>' + cita["OBSERVACIONES"] + '</td>';
                                $fila += '<td><input type="submit" name="borrar_cita"  id="borrar_cita" class="btn btn-danger" value="Eliminar"/></td>';
                            } else if ($nsocio !== cita["NSOCIO"]) {
//                                $fila += '<tr>';
//                                $fila += '<input type="hidden" name="idCITA" id="' + cita["idCITA"] + '" value="' + cita["idCITA"] + '"/>';
//                                $fila += '<td>' + cita["HORA"] + '</td>';
//                                $fila += '<td> OCUPADO </td>';
//                                $fila += '<td> SIN OBSERVACIONES </td>';
//                                $fila += '<td><input type="submit" name="borrar_cita" disabled id="borrar_cita" class="btn btn-danger" value="Eliminar"/></td>';
                            } else {
                                $fila += '<tr>';
                                $fila += '<input type="hidden" name="idCITA" id="' + cita["idCITA"] + '" value="' + cita["idCITA"] + '"/>';
                                $fila += '<td>' + cita["HORA"] + '</td>';
                                $fila += '<td>' + cita["NYA"] + '</td>';
                                $fila += '<td>' + cita["OBSERVACIONES"] + '</td>';
                                $fila += '<td><input type="submit" name="borrar_cita" id="borrar_cita" class="btn btn-danger" value="Eliminar"/></td>';
                            }
                            $fila += '</tr>';
                            $tabla += $fila;
                        }
                        $tabla += "</tbody>";
                        $tabla_citas.html($tabla);
                    } else {
                        $tabla_citas.append($('<tr>'));
                        $tabla_citas.append($('<td></td>').text("No hay citas programadas para el dia seleccionado"));
                        $tabla_citas.append($('</tr>'));
                    }
                } else {
                    $tabla_citas.append($('<tr>'));
                    $tabla_citas.append($('<td></td>').text("No hay citas programadas para el dia seleccionado"));
                    $tabla_citas.append($('</tr>'));
                }
            }
        });
    });
    $('#citas_dia').on('click', 'tbody tr', function (event) {
        $(this).addClass('highlight').siblings().removeClass('highlight');
        var selrow = getRow();
        var idCITA =0;
        var email ="";
        
        selrow.each(function (index, value) {
            if (index === 0) {
                idCITA = value.value;
            }
            if (index === 1) {
                email = value.value;
            }
        });

        $.ajax({
            data: {"citaSeleccionadaBorrar": idCITA, "email": email}, //datos json recogidos del formulario formu
            type: "POST", // método de envío de datos
            url: "submit3.php", //código a ejecutar en el servidor
            success: function (respuesta) {
                var borrado = JSON.parse(respuesta); //conversión a json de los datos de respuesta

                if (borrado) {
                    citaBorrarOK();
                    actualizarFecha();
                } else {
                    citaBorrarERROR();
                }
            }
        });
    });

    // Boton para reservar cita por jquery
    $('#reservar').click(function () {
        var nombre = $('#nombre').val();
        var observaciones = $('#observaciones').val();
        var hora = $('#horasLibres').val();
        var email = $('#EMAIL').val();

        $.ajax({
            data: {"nombre": nombre, "observaciones": observaciones, "fecha": fecha, "hora": hora, "email": email}, //datos json recogidos del formulario formu
            type: "POST", // método de envío de datos
            url: "submit4.php", //código a ejecutar en el servidor
            success: function (respuesta) {
                var insertado = JSON.parse(respuesta); //conversión a json de los datos de respuesta
                if (insertado) {
                    citaOK();
                    actualizarFecha();
                } else {
                    citaERROR();
                }
            }
        });
    });

    function getRow() {
        return $('table > tbody > tr.highlight > input');
    }

    function actualizarFecha() {
        $('#fechacita').val(new Date().toISOString().substring(0, 10)).change();
    }


    function mensajesOcultos() {
        $('#citaOK').hide();
        $('#citaERROR').hide();
        $('#citaBorrarOK').hide();
        $('#citaBorrarERROR').hide();
    }

    function citaOK() {
        $('#citaOK').show();
        setTimeout(function () {
            // Closing the alert
            $('#citaOK').alert('hide');
        }, 5000);
        $('#citaERROR').hide();
    }

    function citaERROR() {
        $('#citaOK').hide();
        $('#citaERROR').show();
        setTimeout(function () {
            // Closing the alert
            $('#citaERROR').alert('hide');
        }, 5000);
    }

    function citaBorrarOK() {
        $('#citaBorrarOK').show();
        setTimeout(function () {
            // Closing the alert
            $('#citaBorrarOK').alert('hide');
        }, 5000);
        $('#citaBorrarERROR').hide();
    }

    function citaBorrarERROR() {
        $('#citaBorrarOK').hide();
        $('#citaBorrarERROR').show();
        setTimeout(function () {
            // Closing the alert
            $('#citaBorrarERROR').alert('hide');
        }, 5000);
    }

});
</script>
@endsection

@section('contenido')
<!--ALERT PARA CREAR LAS CITAS-->
<div class="m-0 alert alert-success alert-dismissible fade show" id="citaOK" role="alert">
    Cita CREADA con éxito. Se le ha enviado a su correo electronico un mensaje con la fecha y hora de la cita. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">X</span>
    </button>
</div>

<div class="m-0 alert alert-danger alert-dismissible fade show" id="citaERROR" role="alert">
    ERROR al CREAR la cita. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">X</span>
    </button>
</div>

<!--ALERT PARA ELIMINAR LAS CITAS-->
<div class="m-0 alert alert-success alert-dismissible fade show" id="citaBorrarOK" role="alert">
    Cita BORRADA con éxito. Se le ha enviado a su correo electronico notificando el borrado de su cita. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">X</span>
    </button>
</div>

<div class="m-0 alert alert-danger alert-dismissible fade show" id="citaBorrarERROR" role="alert">
    ERROR al BORRAR la cita. Este mensaje se cerrará en 5 segundos.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">X</span>
    </button>
</div>
<?php
$usuario_log = json_decode(session()->get('usuario'), true);
?>
<input type="hidden" id="nsocio" value="<?php echo $usuario_log[0]['NSOCIO']; ?>">
<input type="hidden" id="rol" value="<?php echo $usuario_log[0]['IDROL']; ?>">
<?php
if ($usuario_log[0]['IDROL'] == 1) {
    ?>
    <input type="hidden" id="EMAIL" value="<?php echo $usuario_log[0]['EMAIL']; ?>">
    <?php
}
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index">Inicio</a></li>
        <li class="breadcrumb-item active">Citas</li>
    </ol>
</nav>
<h4>Reservar / Consultar Cita </h4>
<br>
<div class="datoscliente row justify-content-center">
    <form action="" name="reservarCita" method="post" class="col-lg-4 col-md-10 col-sm-10 m-5 mb-5 text-center">
        {{ csrf_field() }} 
        <table>
            <tr>
                <td>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre Cliente</span>
                        </div>
                        <?php
                        $usuario_log = json_decode(session()->get('usuario'), true);

//                        if ($usuario_log[0]['DESC_ROL'] === "Admin") {
                        ?>
                        <select id="nombre" name="nombre" required="">
                            <?php
//                            } else {
                            ?>
                                <!--<select id="nombre" name="nombre" disabled>-->
                            <?php
//                                }
                            $usuariosCitas = json_decode(session()->get('usuariosCitas'), true);

                            foreach ($usuariosCitas as $usuario) {
                                $usuario_log = json_decode(session()->get('usuario'), true);

                                if ($usuario_log[0]['NYA'] == $usuario["NYA"]) {
                                    ?>
                                    <option value="<?php echo $usuario["NSOCIO"] ?>" selected><?php echo $usuario["NYA"] ?></option>
                                    <?php
                                } else {
                                    if ($usuario_log[0]['DESC_ROL'] !== "Admin") {
                                        ?>
                                                                                                                                                <!--<option value="<?php echo $usuario["NSOCIO"] ?>" disabled><?php echo $usuario["NYA"] ?></option>-->
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $usuario["NSOCIO"] ?>"><?php echo $usuario["NYA"] ?></option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Observaciones</span>
                        </div>
                        <textarea rows="4" cols="30" name="observaciones" id="observaciones" required placeholder="Escribe alguna observación ..."></textarea>
                    </div>
                </td>  
            </tr>
        </table>
        <br>
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">Fecha</span>
            </div>
            <input type="date" class="form-control" required id="fechacita" name="fechacita" ">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" >Hora</span>
            </div>
            <select id="horasLibres" name="horasLibres">
                <!--<option value="">-- SELECCIONA UNA FECHA --</option>-->
            </select>
        </div>
        <br>
        <input type="button" value="Reservar Cita" id="reservar" class="btn btn-info">                
    </form>
    <div class="col-lg-7 m-3">
        <h4>Fecha Seleccionada: 
            <label id="fechaSeleccionada" name="fechaSeleccionada">
            </label>
        </h4>
        <BR>
        <table class="text-center" id="citas_dia">
            <thead>
            <th>Hora</th>
            <th>Cliente/a</th>
            <th>Observaciones</th>
            <th></th>
            </thead>
            <?php
            if (!isset($citas)) {
                ?>
                <td colspan="3" class="texto_rojo">Seleccione una fecha para obtener las citas</td>
                <?php
            }
            ?>
        </table>
    </div>
</div>
@endsection

<!--@section('aside') 
<h5>Patrocinadores</h5>
<p><a href="#"><img class="patrocinadores" alt="elpaisano" src="{{asset ('img/logo.jpg')}}"></a></p>
<p><a href="https://es-es.facebook.com/servimozos.puertollano"><img class="patrocinadores" alt="servimozos" src="{{asset ('img/servimozos.jpg')}}"></a></p>
<p><a href="https://www.wella.com/professional/es-ES/home"><img class="patrocinadores" alt="wella" src="data:image/jpeg;base64,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"></a></p>
<p><a href="https://wahlspain.es/"><img class="patrocinadores" alt="wahl" src="https://th.bing.com/th/id/OIP.7-Zij_zao1ibfOI4_RHLLwAAAA?pid=Api&rs=1"></a></p>
@endsection-->