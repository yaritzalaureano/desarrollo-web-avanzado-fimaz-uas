<?php

require_once "Usuario.php";


$usuario = new Usuario("Tu Nombre", "correo@ejemplo.com");


echo "<h2>Datos del Usuario</h2>";
echo "Nombre: " . $usuario->getNombre() . "<br>";
echo "Correo: " . $usuario->getCorreo();

?>