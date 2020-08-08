<?php 

function recoge($var, $m = "")
{
  if (!isset($_REQUEST[$var])) {
    $tmp = (is_array($m)) ? [] : "";
  } elseif (!is_array($_REQUEST[$var])) {
    $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
  } else {
    $tmp = $_REQUEST[$var];
    array_walk_recursive($tmp, function (&$valor) {
      $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
    });
  }
  return $tmp;
}

$nombrePaciente = recoge("nombrePaciente");
$cedula = recoge("cedula");
$correo = recoge("correo");
$idDoctor = recoge("idDoctor");
$idDia = recoge("idDia");
$hora = recoge("hora");
$descripcion = recoge("descripcion");
$idCita = recoge("idCita");

$nombrePacienteOk = false;
$cedulaOk = false;
$correoOk = false;
$idDoctorOk = false;
$idDiaOk = false;
$horaOk = false;
$descripcionOk = false;
$idCitaOk= false;

if ($idCita == "") {
  print "<p class=\"aviso\">No ha enviado la tutoria para actualizar.</p>\n";
  print "\n";
} elseif(!is_numeric($idCita)) {
  print "<p class=\"aviso\">El dato de la tutoria no es valido.</p>\n";
  print "\n";
}else{

  $idCitaOk = true;
}

if ($nombrePaciente == "") {
  print "  <p class=\"aviso\">No ha escrito el nombre del paciente.</p>\n";
  print "\n";
} else {
  $nombrePacienteOk = true;
}


if ($cedula == "") {
  print "  <p class=\"aviso\">No ha escrito su cedula.</p>\n";
  print "\n";
} else {

  if (preg_match("#^\d{1}.-?\d{4}[\s\.-]?\d{4}$#", $cedula)) {
    $cedulaOk = true;
  } else {
    print "  <p class=\"aviso\">Formato incorrecto del cedula.</p>\n";
  }
}

if ($correo == "") {
  print "  <p class=\"aviso\">No ha escrito el correo del paciente.</p>\n";
  print "\n";
} else {
  $correoOk = true;
}


if ($idDoctor == "") {
  print "  <p class=\"aviso\">No ha seleccionado al doctor.</p>\n";
  print "\n";
} elseif (!is_numeric($idDoctor)) {
  print "  <p class=\"aviso\">El dato del doctor no es valido</p>\n";
  print "\n";
} else {
  $idDoctorOk = true;
}

if ($idDia == "") {
  print "  <p class=\"aviso\">No ha seleccionado el dia.</p>\n";
  print "\n";
} elseif (!is_numeric($idDia)) {
  print "  <p class=\"aviso\">El dato del dia no es valido</p>\n";
  print "\n";
} elseif ($idDia < 1 || $idDia > 5) {
  print "  <p class=\"aviso\">El dia es incorrecto</p>\n";
  print "\n";
} else {
  $idDiaOk = true;
}

if ($hora == "") {
  print "  <p class=\"aviso\">No ha indicado la hora.</p>\n";
  print "\n";
} elseif ($hora != "10" &&  $hora != "12" && $hora != "16" && $hora != "18") {
  print "  <p class=\"aviso\">Por favor, indique la hora de la tutoria</p>\n";
  print "\n";
} else {
  $horaOk = true;
}

if ($descripcion == "") {
  print "  <p class=\"aviso\">No ha escrito la descripcion del paciente.</p>\n";
  print "\n";
} else {
  $descripcionOk = true;
}

if ($nombrePacienteOk && $cedulaOk && $correoOk && $idDoctorOk && $idDiaOk && $horaOk && $descripcionOk) {

  include 'connection.php';
  echo json_encode(actualizaDatos($idCita,$nombrePaciente, $cedula, $correo, $idDoctor, $idDia, $hora, $descripcion));
}

?>