<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Sitio Examen</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/fotograma.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="js/cita.js"></script>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1>Sitio de Examen</h1>
        <p>Sitio responsive, <b>flexible</b> y layout.</p>
    </div>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="index.html">Inicio</a>
    </div>
    <!-- The flexible grid (content) -->
    <div class="row">
        <div class="side">
            <div class="sidebar-wrapper">
                <div class="sidebar">
                    <div class="sidebar__logo">
                        <h3> Web Cliente Servidor </h3>
                    </div>
                    <ul class="sidebar__nav">
                    <li class="active"> <a href="index.html">Ingresar Cita</a> </li>
                        <li> <a href="citas.html">Mostrar Citas</a> </li>
                        <li> <a href="medicinas.html">Visualizar Medicamentos </a> </li>
                        <li> <a href="acercaDe.html">Acerca de</a> </li>
                        <li> <a href="contactenos.html">Contacto</a> </li>
                    </ul>
                    <div class="sidebar__profile">
                        <img class="imagen" src="imagenes/curso.jpg" alt="Profile Photo">
                        <h4>Ufidelitas</h4>
                    </div>
                </div>
            </div>
        </div>
        <div id="formCitas" class="main">
            <strong><span id="idFotograma" style="font-family: Arial; font-size: 24pt">MODIFICA DATOS DEL PACIENTE</span></strong><br />
            <br />
            <div ID="pnlMensaje" title="Error" style="display:none">
                <div>
                    <strong>Atención!</strong> Se ha presentado el siguiente problema.
                    <br />
                    <br />
                    <p ID="blMensajes"></p>
                </div>
            </div>
            <div ID="pnlInfo" title="Mensaje" style="display : none;">
                <div>
                    <strong>Información!</strong> Procesamiento éxitoso.
                    <br />
                    <br />
                    <p ID="blInfo"></p>
                </div>
            </div>
            <?php
            $idCita = $_REQUEST['idCita'];
            
            
           
            ?>
            <div style="text-align: left; font-family: Arial">
                <input name="idCita" type="text" id="idCita" value='<?php echo $idCita ?>' hidden /><br />
                Paciente:<br />
                <input name="nombrePaciente" type="text" id="nombrePaciente"  style="width:504px;" /><br />
                Cédula:<br />
                <input name="cedula" type="text" id="cedula" style="width:504px;" placeholder="1-1111-1111" /><br />
                Correo:<br />
                <input name="correo" type="text" id="correo" style="width:504px;" /><br />
                Con el doctor:<br />
                <select name="idDoctor" id="idDoctor" style="font-size:Medium;width:296px;">
                </select><br />
                Día:<br />
                <select name="idDia" id="idDia" style="font-size:Medium;">
                </select><br />
                Hora: &nbsp;
                <span id="sHora">
                    <label for="lHora10">10</label>
                    <input id="hora" type="radio" name="hora" value="10" che cked="checked" />
                    <label for="lhora12">12</label>
                    <input id="hora" type="radio" name="hora" value="12" />
                    <label for="lhora16">16</label>
                    <input id="hora" type="radio" name="hora" value="16" />
                    <label for="lhora18">18</label>
                    <input id="hora" type="radio" name="hora" value="18" />
                    </span> <br />
                    Asunto:<br />
                    <textarea name="descripcion" rows="2" cols="20" id="descripcion" style="height:64px;width:440px;"></textarea><br />
                    <input type="submit" name="btEnviar" value="Enviar datos" id="btEnviar" style="width:112px;" />
                    &nbsp;
                    <input type="reset" name="btRestablecer" value="Restablecer" id="btRestablecer" style="width:112px;" />
            </div>
        </div>
    </div>
    </div>
    <!-- Footer -->
    <div class="footer">
        <object data="Footer.html"> Error </object>
    </div>
    <script src="js/actualiza.js"></script>
</body>

</html>