$(document).ready(function(){
    cargaCitas();
    });
    
    
    function cargaCitas(){
        try{
    $.ajax({
        url: 'getPacientes.php'
    })
    .done(function(data){
    ImprTablaJson(data);
    })
        }catch(err){
            alert(err);
        }
    }
    
    function ImprTablaJson(TextoJSON){
    
        let ObjetoJSON = JSON.parse(TextoJSON);
    $("#citas").append("<tr>");
    $("#citas").append("<th scope = 'col'>Pacientes</th>");
    $("#citas").append("<th scope = 'col'>Cedula</th>");
    $("#citas").append("<th scope = 'col'>Correo</th>");
    $("#citas").append("<th scope = 'col'>Doctor</th>");
    $("#citas").append("<th scope = 'col'>Día</th>");
    $("#citas").append("<th scope = 'col'>Hora</th>");
    $("#citas").append("<th scope = 'col'>Descripcion/Problema</th>");
   /* $("#citas").append("<th scope = 'col'>Recomendacion</th>");
    $("#citas").append("<th scope = 'col'>Padecimiento</th>");*/
    $("#citas").append("<th scope = 'col'>Ingresar Padecimientos/Recomendaciones</th>");
    
    $("#citas").append("</tr>");
    //alert(ObjetoJSON[0].cedula);
    for(i=0;i<ObjetoJSON.length;i++){
    
        $("#citas").append("<tr>");
        $("#citas").append("<th scope = 'row'>"+ObjetoJSON[i].nombre+" </th>");
        $("#citas").append("<td> "+ObjetoJSON[i].cedula+ " </td>");
        $("#citas").append("<td> "+ObjetoJSON[i].correo+ " </td>");
        $("#citas").append("<td> "+ObjetoJSON[i].doctor+ " </td>");
        $("#citas").append("<td> "+ObjetoJSON[i].dia+" </td>");
        $("#citas").append("<td> "+ObjetoJSON[i].hora+" </td>");
        $("#citas").append("<td> "+ObjetoJSON[i].descripcion+" </td>");
       /* $("#citas").append("<td> "+ObjetoJSON[i].recomendacion+" </td>");
        $("#citas").append("<td> "+ObjetoJSON[i].padecimiento+" </td>");*/
        $("#citas").append("<td> "+ "<a href = ingresaRecomendaciones.php?idCita="+ObjetoJSON[i].id+">Resolver</a>"+"</td>");
        $("#citas").append("</tr>");
    
    }
    
    }