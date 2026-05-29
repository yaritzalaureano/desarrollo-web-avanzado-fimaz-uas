<?php

require_once "Usuario.php";

$usuario = new Usuario("Yaritza Laureano", "yaritza@gmail.com");

echo "Nombre: " . $usuario->getNombre() . "<br>";
echo "Correo: " . $usuario->getCorreo();

?>