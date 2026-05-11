<?php
require_once "config/db.php";

$idAlumno = 1; 
$sql = "UPDATE alumnos
        SET nombre = :nombre,
            apellido = :apellido,
            correo = :correo
        WHERE idAlumno = :idAlumno";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    'nombre' => 'Alejandra',
    'apellido' => 'de la Cruz',
    'correo' => 'alejandra98@gmail.com',
    'idAlumno' => $idAlumno
]);

echo "Alumno actualizado correctamente<br>";
?>