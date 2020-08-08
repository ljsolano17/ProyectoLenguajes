<?php

include 'connection.php';

$elSQL ="SELECT p.id,p.nombre,p.cedula,p.correo,p.idDoctor,p.idDia,p.hora,p.descripcion,c.recomendacion,c.padecimiento 
FROM paciente p, cita c where p.id=c.id ";



$myArray = getArray($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
?>
