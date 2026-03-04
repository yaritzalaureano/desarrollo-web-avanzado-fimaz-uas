<?php

require_once "Usuario.php";

// Crear un objeto de la clase Usuario
$usuario = new Usuario("Tu Nombre", "correo@ejemplo.com");

// Mostrar los datos
echo "<h2>Datos del Usuario</h2>";
echo "Nombre: " . $usuario->getNombre() . "<br>";
echo "Correo: " . $usuario->getCorreo();

?>