<?php
//Yaritza Alejandra Laureano de la Cruz
require_once("../../controllers/torneosControllers.php");
//Atrapar los valores introducidos por el usuario en el formulario.

$nombreTorneo = $_POST['txtnombreTorneo'];
$organizador = $_POST['txtOrganizador'];
$patrocinadores = $_POST['txtpatrocinador'];
$sede = $_POST['textSede'];
$categoria = $_POST['txtCategoria'];
$premio1 = $_POST['txtPremio1'];
$premio2 = $_POST['txtPremio2'];
$premio3 = $_POST['txtPremio3'];
$otroPremio = $_POST['txtotroPremio'];
$usuario = $_POST['txtUsuario'];
$contrasena = $_POST['txtContrasena'];


//Instanciamos nuestro Controlador
$objController = new torneosControllers();
$objController->saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, 
    $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
    ?>
















