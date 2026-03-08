<?php
require_once "Admin.php";

$admin = new Admin("Yaritza Laureano", "yaritza@gmail.com");

echo "Datos del Admin<br>";
echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: " . $admin->getRol();
?>