$(document).ready(function(){
    cargaMedicina();
    });
    
 
    function cargaMedicina(){
        try{
    $.ajax({
        url: 'getMedicinas.php'
    })
    .done(function(data){
    ImprTablaMJson(data);
    })
        }catch(err){
            alert(err);
        }
    }
    
    function ImprTablaMJson(TextoJSON){
      //  filtrar(TextoJSON);
        let ObjetoJSON = JSON.parse(TextoJSON);
        //alert(ObjetoJSON[0].Descripcion);
    $("#medicamentos").append("<tr>");
    $("#medicamentos").append("<th scope = 'col'>Identificador del Medicamento</th>");
    $("#medicamentos").append("<th scope = 'col'>Nombre del Medicamento</th>");
    $("#medicamentos").append("<th scope = 'col'>Precio del Medicamento</th>");
    $("#medicamentos").append("<th scope = 'col'>Descripcion del Medicamento</th>");
    $("#medicamentos").append("</tr>");
    
    for(i=0;i<ObjetoJSON.length;i++){
    
        $("#medicamentos").append("<tr>");
        $("#medicamentos").append("<th scope = 'row'>"+ObjetoJSON[i].id+" </th>");
        $("#medicamentos").append("<td> "+ObjetoJSON[i].Nombre+ " </td>");
        $("#medicamentos").append("<td> "+ObjetoJSON[i].Precio+ " </td>");
        $("#medicamentos").append("<td> "+ObjetoJSON[i].Descripcion+ " </td>");
        $("#medicamentos").append("</tr>");
        
    
    }
    
    }



    function filtrarMedicinas(){
        try{
    $.ajax({
        url: 'getMedicinas.php'
    })
    .done(function(data){
    filtrar(data);
    })
        }catch(err){
            alert(err);
        }
    }
function limpiarTabla(){
    $("#medicamentos").remove(); 
}
    function filtrar(TextoJSON) {
       
        let ObjetoJSON = JSON.parse(TextoJSON);
        var filtro = document.getElementById("myInput").value;
      // alert(filtro);
        for(i=0;i<ObjetoJSON.length;i++){
            $("#medicamentos").append("<tr>");
        $("#medicamentos").append("<th scope = 'col'>Identificador del Medicamento</th>");
        $("#medicamentos").append("<th scope = 'col'>Nombre del Medicamento</th>");
        $("#medicamentos").append("<th scope = 'col'>Precio del Medicamento</th>");
        $("#medicamentos").append("<th scope = 'col'>Descripcion del Medicamento</th>");
        $("#medicamentos").append("</tr>");
            if(filtro==ObjetoJSON[i].Nombre){
               
                limpiarTabla();
                
        
                $("#medicamentos").append("<tr>");
                $("#medicamentos").append("<th scope = 'row'>"+ObjetoJSON[i].id+" </th>");
                $("#medicamentos").append("<td> "+ObjetoJSON[i].Nombre+ " </td>");
                $("#medicamentos").append("<td> "+ObjetoJSON[i].Precio+ " </td>");
                $("#medicamentos").append("<td> "+ObjetoJSON[i].Descripcion+ " </td>");
                $("#medicamentos").append("</tr>");
                
            }
        }
      }