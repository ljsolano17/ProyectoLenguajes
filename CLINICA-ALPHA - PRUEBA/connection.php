<?php

function connectDB(){
 
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "proyectolenguajes2";
 
    $conexion = mysqli_connect($server, $user, $pass,$bd);
 
        if($conexion){
            //echo 'La conexion de la base de datos se ha hecho satisfactoriamente';
        }else{
            //echo 'Ha sucedido un error inexperado en la conexion de la base de datos';
        }
 
    return $conexion;
}
 
function disconnectDB($conexion){
 
    $close = mysqli_close($conexion);
 
        if($close){
            //echo 'La desconexion de la base de datos se ha hecho satisfactoriamente';
        }else{
            //echo 'Ha sucedido un error inexperado en la desconexion de la base de datos';
        }   
 
    return $close;
}
 
function getArray($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();
 
    //generamos la consulta
 
    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
 
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
 
    $rawdata = array(); //creamos un array
 
    //guardamos en un array multidimensional todos los datos de la consulta
    $i = 0;
 
    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;//indice
    }
 
    disconnectDB($conexion); //desconectamos la base de datos
 
    return $rawdata; //devolvemos el array
}
 
      
function InsertaDatos($pnombrePaciente,$pcedula,$pcorreo,$pidDoctor,$pidDia,$phora,$pdescripcion){
//print($pnombrePaciente.$pcedula.$pcorreo.$pidDoctor.$pidDia.$phora.$pdescripcion);
	$response = "";
	$conn = connectDB();
		
	$stmt = $conn->prepare("INSERT INTO paciente(nombre,cedula,correo,idDoctor,idDia,hora,descripcion) VALUES (?,?,?,?,?,?,?)");
	$stmt->bind_param("sssiiis",$inombre,$icedula,$icorreo,$idoctor,$idia,$ihora,$idescripcion);

		
    $inombre = $pnombrePaciente;
    $icedula = $pcedula;
    $icorreo = $pcorreo;
    $idoctor = $pidDoctor;
    $idia = $pidDia;
    $ihora = $phora;
    $idescripcion = $pdescripcion;

	$stmt->execute();

	$response = "Se almaceno el paciente satisfactoriamente";

	$stmt->close();
    disconnectDB($conn);
    return $response;
}
function EliminaDato($pidCita){

    $response = "";
	$conn = connectDB();
		
	$stmt = $conn->prepare("DELETE FROM paciente where id = ?");
	$stmt->bind_param("i",$idCita);

    $idCita = $pidCita;
   
    

	$stmt->execute();

	$response = "Se elimino la tutoria satisfactoriamente";

	$stmt->close();
    disconnectDB($conn);
    return $response;

}
function actualizaDatos($pidCita,$pnombrePaciente,$pcedula,$pcorreo,$pidDoctor,$pidDia,$phora,$pasunto){

    $response = "";
	$conn = connectDB();
   $stmt = $conn->prepare(" UPDATE cita 
    set paciente=?,
    cedula=?,
    correo=?,
    idDoctor=?,
    idDia=?,
    hora=?,
    descripcion=?
    where id = ?");
	$stmt->bind_param("sssiiisi",$inombre,$icedula,$icorreo,$idoctor,$idia,$ihora,$idescripcion,$icita);

    
    $inombre = $pnombrePaciente;
    $icedula = $pcedula;
    $icorreo = $pcorreo;
    $idoctor = $pidDoctor;
    $idia = $pidDia;
    $ihora = $phora;
    $idescripcion = $pasunto;
    $icita = $pidCita;
    

	$stmt->execute();

	$response = "Se actualizo la tutoria satisfactoriamente";

	$stmt->close();
    disconnectDB($conn);
    return $response;
}


function insertaDatosCita($pidCita,$precomendacion,$ppadecimiento){

    $response = "";
	$conn = connectDB();
    $stmt = $conn->prepare(" INSERT INTO cita(idPaciente,recomendacion,padecimiento) VALUES (?,?,?)");
	$stmt->bind_param("iss",$icita,$ipadecimiento,$irecomendacion);

    
    $ipadecimiento = $ppadecimiento;
    $irecomendacion = $precomendacion;
    $icita = $pidCita;
    

	$stmt->execute();
	$response = "Se almaceno el paciente satisfactoriamente";
	$stmt->close();
    disconnectDB($conn);
    return $response;
}

function getObjeto($sql){
$conexion = connectDB();
mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die(); 
    $rawdata = null; 
    $i = 0;
    while($row = mysqli_fetch_array($result))
    {
        $rawdata = $row;
        $i++;
    }
    disconnectDB($conexion);
   return $rawdata;
    
}
