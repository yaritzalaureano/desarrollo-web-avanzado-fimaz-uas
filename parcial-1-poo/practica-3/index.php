<?php
require_once "clases/Usuario.php";
require_once "clases/Admin.php";
require_once "clases/Alumno.php";

try {
    $admin = new Admin("Alfonso Calderon", "alfonsoncal@gmail.com");
    echo "Nombre: " . $admin->getNombre() . "<br>";
    echo "Correo: " . $admin->getCorreo() . "<br>";
    echo "Rol: " . $admin->getRol() . "<br><br>";

    $alumno = new Alumno("Yaritza Laureano", "yaritza@gmail.com", "2023001");
    echo "Nombre: " . $alumno->getNombre() . "<br>";
    echo "Correo: " . $alumno->getCorreo() . "<br>";
    echo "Rol: " . $alumno->getRol() . "<br>";
    echo "Matrícula: " . $alumno->getMatricula() . "<br><br>";

    
    $usuarioInvalido = new Usuario("Alejandra Cruz",
"correo-invalido");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>



