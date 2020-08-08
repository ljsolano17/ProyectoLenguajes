<?php 
$idCita = $_GET["idCita"];

include 'connection.php';
$elSQL = "SELECT id,nombre,cedula,correo,idDoctor,idDia,hora,descripcion FROM paciente where id=$idCita ";
////$elSQL ="SELECT p.id,p.nombre,p.cedula,p.correo,p.idDoctor,p.idDia,p.hora,p.descripcion,c.recomendacion,c.padecimiento 
//FROM paciente p, cita c where p.id=$idCita order by p.hora DESC";

$myArray = getObjeto($elSQL);
echo json_encode($myArray,JSON_UNESCAPED_UNICODE);
?>