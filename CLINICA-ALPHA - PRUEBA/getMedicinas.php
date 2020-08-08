<?php

include 'connection.php';

$elSQL="SELECT * FROM Medicinas ";

$myArray = getArray($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
?>


