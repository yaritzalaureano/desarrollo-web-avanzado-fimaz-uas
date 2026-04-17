<?php
/***********
 * CONFIGURACIÓN
 ***********/
$host = "localhost";
$db = "escuela";
$user = "root";
$pass = '';
$charset = "utf8mb4";
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

/***********
 * CONEXIÓN PDO (con excepciones)
 ***********/
try {
    $pdo = new PDO(
        $dsn,
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

/***********
 * MENSAJES PARA MOSTRAR EN PANTALLA
 ***********/
$mensaje = "";
$detalle = "";

/***********
 * PROCESAR FORMULARIO
 ***********/
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Datos del formulario
    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");

    // Checkbox: simular error
    $simularError = isset($_POST["simular_error"]);

    // Validación mínima
    if ($nombre === "" || $apellido === "" || $correo === "") {
        $mensaje = "⚠️ Todos los campos son obligatorios.";
    } else {
        try {
            // 1) Iniciar transacción
            $pdo->beginTransaction();

            // 2) Insertar alumno
            $sqlAlumno = "INSERT INTO alumnos (nombre, apellido, correo)
                          VALUES (:nombre, :apellido, :correo)";
            $stmtAlumno = $pdo->prepare($sqlAlumno);
            $stmtAlumno->execute([
                "nombre" => $nombre,
                "apellido" => $apellido,
                "correo" => $correo
            ]);

            $idAlumno = (int) $pdo->lastInsertId();

            // 3) Insertar log
            if ($simularError) {
                throw new Exception("Simulación de error activada: se fuerza rollback.");
            } else {
                $sqlLog = "INSERT INTO logs_alumnos (idAlumno, accion)
                           VALUES (:idAlumno, :accion)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([
                    "idAlumno" => $idAlumno,
                    "accion" => "ALTA_ALUMNO"
                ]);
            }

            // 4) Confirmar transacción
            $pdo->commit();
            $mensaje = "✅ Transacción confirmada (COMMIT). Alumno registrado con ID: $idAlumno";

        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $mensaje = "❌ Ocurrió un error. Transacción revertida (ROLLBACK).";
            $detalle = $e->getMessage();
        }
    }
}

/***********
 * CONSULTAS PARA MOSTRAR TABLAS
 ***********/
$alumnos = $pdo->query("SELECT * FROM alumnos ORDER BY idAlumno DESC")->fetchAll();
$logs = $pdo->query("SELECT * FROM logs_alumnos ORDER BY idLog DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Práctica PDO: try/catch y transacciones</title>

<style>
body{font-family:Arial,sans-serif;margin:20px;line-height:1.4}
.row{display:flex;gap:12px;flex-wrap:wrap}
label{display:block;font-weight:bold;margin-bottom:6px}
input[type="text"],input[type="email"]{width:280px;padding:8px;border:1px solid #ccc;border-radius:6px}
button{padding:10px 14px;border:0;border-radius:8px;cursor:pointer}
.msg{padding:10px;border-radius:8px;background:#f5f5f5}
small{font-size:12px;color:#666}
table{border-collapse:collapse;width:100%}
th,td{border:1px solid #ddd;padding:8px;text-align:left}
th{background:#f0f0f0}
</style>
</head>

<body>

<h2>Práctica: try/catch y transacciones (PDO + MySQL)</h2>

<form method="POST">
<div class="row">

<div>
<label>Nombre</label>
<input type="text" name="nombre" maxlength="15"
value="<?= htmlspecialchars($_POST['nombre'] ?? 'Yaritza Alejandra') ?>">
</div>

<div>
<label>Apellido</label>
<input type="text" name="apellido" maxlength="10"
value="<?= htmlspecialchars($_POST['apellido'] ?? 'Laureano') ?>">
</div>

<div>
<label>Correo</label>
<input type="email" name="correo" maxlength="50"
value="<?= htmlspecialchars($_POST['correo'] ?? 'eyaritza90@gmail.com') ?>">
</div>

</div>

<p>
<label style="font-weight: normal">
<input type="checkbox" name="simular_error"
<?= isset($_POST['simular_error']) ? 'checked' : '' ?>>
Simular error para forzar ROLLBACK
</label>
<span class="small">(Activa para comprobar que no se guarda nada si falla un paso.)</span>
</p>

<button type="submit">Registrar alumno</button>
</form>

<?php if ($mensaje): ?>
<p class="msg"><?= htmlspecialchars($mensaje) ?></p>
<?php if ($detalle): ?>
<p class="small"><?= htmlspecialchars($detalle) ?></p>
<?php endif; ?>
<?php endif; ?>

<div>
<h3>Tabla alumnos</h3>
<?php if (!$alumnos): ?>
<p class="small">Sin registros.</p>
<?php else: ?>
<table>
<tr>
<th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th>
</tr>
<?php foreach ($alumnos as $a): ?>
<tr>
<td><?= $a['idAlumno'] ?></td>
<td><?= $a['nombre'] ?></td>
<td><?= $a['apellido'] ?></td>
<td><?= $a['correo'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</div>

<div>
<h3>Tabla logs_alumnos</h3>
<?php if (!$logs): ?>
<p class="small">Sin registros.</p>
<?php else: ?>
<table>
<tr>
<th>ID Log</th><th>ID Alumno</th><th>Acción</th><th>Fecha</th>
</tr>
<?php foreach ($logs as $l): ?>
<tr>
<td><?= $l['idLog'] ?></td>
<td><?= $l['idAlumno'] ?></td>
<td><?= $l['accion'] ?></td>
<td><?= $l['fecha'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</div>

</body>
</html>