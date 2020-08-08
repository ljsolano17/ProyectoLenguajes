$(document).ready(function () {
    cargaDias();
    cargaDoctores();
    cargaCitas();

    $("#btEnviar").click(function () {
        actualizaCita($("#idCita").val(),
        $("#nombrePaciente").val(),$("#cedula").val(),$("#correo").val(),$("#idDoctor").val(),
            $("#idDia").val(),$("input[name='hora']:checked").val(),$("#descripcion").val());
    });

    $("#btRestablecer").click(function () {
        LimpiaCampos();
    });

});



function cargaDias() {
    try {
        $.ajax({

            url: 'getDias.php'

        })
            .done(function (data) {
                LlenaDiasJson(data);
            });
    } catch (err) {
        alert(err);
    }
}
function cargaDoctores() {
    try {
        $.ajax({

            url: 'getDoctores.php'

        })
            .done(function (data) {
                LlenaDoctorJson(data);
            });
    } catch (err) {
        alert(err);
    }
}
function cargaCitas() {
    try {
        $.ajax({
            url: 'getCita.php?idCita=' + $("#idCita").val()
        })
            .done(function (data) {
                LlenarCitaJson(data);
            })
    } catch (err) {
        alert(err);
    }
}


function actualizaCita(pidCita, pnombrePaciente,$pcedula,$pcorreo, pidDoctor, pidDia, pHora, pDescripcion) {
    
    try {
        $.ajax({
            data: {
                idCita: pidCita,
                nombrePaciente: pnombrePaciente,
                cedula:$pcedula,
                correo:$pcorreo,
                idDoctor: pidDoctor,
                idDia: pidDia,
                hora: pHora,
                descripcion: pDescripcion,
            },
            url: 'actualiza.php',
            type: 'POST',
            dataType: 'json',
            success: function (r) {
                ActualizacionInsercionCitaExitosa(r);
            },
            error: function (r) {
                ActualizacionTutoriaFallida(r);
            }
        });
    } catch (err) {
        alert(err);
    }
}

function LlenaDiasJson(TextoJSON) {
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].dia;
        $('#idDia').append($('<option></option>').val(elValor).html(elHTML));
    }
}
function LlenaDoctorJson(TextoJSON) {
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);

    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].Nombre;
        $('#idDoctor').append($('<option></option>').val(elValor).html(elHTML));
    }
}
function ActualizacionInsercionCitaExitosa(TextoJSON) {
    $("#pnlInfo").dialog();
    $("#pnlInfo").html('<p>' + TextoJSON + '</p>');
    LimpiaCampos();
    window.location.replace("citas.html");
}
function LimpiaCampos(){
    $('#nombrePaciente').val('');
    $('#cedula').val('');
    $('#correo').val('');
    $('#descripcion').val('');
    $("#idDoctor").val("1");
    $("idDia").val("1");
    $("input[name=hora][value='10']").prop("checked",true);
}
function ActualizacionCitaFallida(TextoJSON){
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p> Ocurrio un error en el servidor </p>'+TextoJSON.responseText);
}
function LlenarCitaJson(TextoJSON){
    var ObjetoJSON=JSON.parse(TextoJSON);
    $('#nombrePaciente').val(ObjetoJSON.nombre);
    $('#cedula').val(ObjetoJSON.cedula);
    $('#correo').val(ObjetoJSON.correo);
    $('#descripcion').val(ObjetoJSON.descripcion);
    $("#idDoctor").val(ObjetoJSON.idDoctor);
    $("#idDia").val(ObjetoJSON.idDia);
    $("input[name=hora][value="+ObjetoJSON.hora+"]").prop("checked",true);
   // input[name='Test'][value='1']").prop('checked', true)
    
}


