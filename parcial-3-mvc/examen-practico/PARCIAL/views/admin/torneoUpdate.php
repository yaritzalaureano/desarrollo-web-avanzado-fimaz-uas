<?php
//Yaritza Alejandra Laureano de la Cruz
require_once("../../controllers/torneosControllers.php");

//Instanciamos nuestro Controlador
$objController = new torneosControllers();

//Obtener valores del formulario con POST !!! . Hay que traer el Id.
$id = $_POST['txtId'];
$nombreTorneo = $_POST['txtnombreTorneo'];
$organizador = $_POST['txtOrganizador'];
$patrocinadores = $_POST['txtpatrocinador'];
$sede = $_POST['textSede'];
$categoria = $_POST['txtCategoria'];
$premio1 = $_POST['txtPremio1'];
$premio2 = $_POST['txtPremio2'];
$premio3 = $_POST['txtPremio3'];
$otroPremio = $_POST['txtotroPremio'];

$objController->updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede,
$categoria, $premio1, $premio2, $premio3, $otroPremio);
header("Location: readOneTorneo.php?id=".$id);
?>
