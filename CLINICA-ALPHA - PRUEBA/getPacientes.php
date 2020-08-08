<?php

include 'connection.php';

$elSQL="SELECT p.id,p.hora,p.descripcion,dr.nombre as doctor,dd.dia,p.nombre,p.cedula,p.correo 
        FROM paciente p, diadisponible dd, doctor dr 
        WHERE p.idDoctor = dr.id and p.idDia=dd.id";



$myArray = getArray($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
?>


