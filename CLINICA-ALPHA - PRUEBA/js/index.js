$(document).ready(function () {
    cargaDias();
    cargaDoctores();
    
    $("#btEnviar").click(function () {
       
       /* ingresaTutoria($("#nombreAlumno").val().$("#idProfesor").val().$("#idDia").val().
            $("input[name='hora']:checked").val().$("#asunto").val());*/

      ingresaCita($("#nombrePaciente").val(),$("#cedula").val(),$("#correo").val(),$("#idDoctor").val(),$("#idDia").val(),
            $("input[name='hora']:checked").val(),$("#descripcion").val());

            
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


