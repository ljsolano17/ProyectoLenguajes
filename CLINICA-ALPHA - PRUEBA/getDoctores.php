<?php 

include 'connection.php';
$elSQL = "SELECT * FROM DOCTOR";
$myArray = getArray($elSQL);
echo json_encode($myArray,JSON_UNESCAPED_UNICODE);

?>
