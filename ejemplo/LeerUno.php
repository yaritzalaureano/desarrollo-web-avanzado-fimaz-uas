<?php
require_once "config/db.php";
$idalumno = 6;

$sql = "SELECT * FROM alumnos WHERE idAlumno = :idAlumno";
$stmt = $pdo->prepare ($sql); 
$stmt->execute(['idAlumno' => $idalumno]);

$alumno = $stmt->fetch(PDO::FETCH_ASSOC); #array asociativo

if ($alumno){
    echo "<h3>Alumno encontrado</h3>";
    echo $alumno['nombre'] ." "
        .$alumno['apellido'] ."-"
        .$alumno['correo'] ."<br>";
 } else {
    echo "Alumno no encontrado<br>";
}
?>
