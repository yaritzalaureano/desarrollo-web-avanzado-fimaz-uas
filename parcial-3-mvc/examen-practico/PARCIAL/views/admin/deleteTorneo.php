<?php
//Yaritza Alejandra Laureano de la Cruz
require_once("../../controllers/torneosControllers.php");

$objTorneosController = new torneosControllers();

// Obtener el id desde el botón que mandará eliminar el registro.
// Esto lo obtenemos de la pantalla del listado general de torneos.
$objTorneosController->delete($_GET['id']);
?>