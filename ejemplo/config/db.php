<?php
$host = "localhost";
$db = "casa";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion exitosa<br>";
}catch (PDOException $e) {
    die("Error de conexcion:". $e->getMessage());
}
?>