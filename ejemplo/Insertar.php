<?php
require_once "config/db.php";
$sql = "INSERT INTO alumnos (nombre,apellido,correo)
    VALUES (:nombre, :apellido, :correo)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    'nombre' => 'Yaritza',
    'apellido' => 'Laureano',
    'correo' => 'eyaritza90@gmail.com'
]);

echo "Alumno insertado correctamente<br>";
?>