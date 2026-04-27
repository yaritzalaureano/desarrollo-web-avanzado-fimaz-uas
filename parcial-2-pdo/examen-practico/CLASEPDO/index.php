<?php

require_once 'controllers/ProductoController.php';
require_once 'models/Producto.php';

$controller = new ProductoController();
$mensaje = "";
$productoEditar = null;

// BUSCADOR
$terminoBusqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';

// ELIMINAR
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];

    if ($controller->eliminar($idEliminar)) {
        $mensaje = "Producto eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar el producto.";
    }
}

// EDITAR
if (isset($_GET['editar'])) {
    $idEditar = $_GET['editar'];
    $productoEditar = $controller->obtenerPorId($idEditar);
}

// GUARDAR / ACTUALIZAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idProducto = !empty($_POST['idProducto']) ? $_POST['idProducto'] : null;

    $producto = new Producto();
    $producto->setIdProducto($idProducto);
    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setExistencia($_POST['existencia']);
    $producto->setPrecio($_POST['precio']);

    if ($idProducto) {

        if ($controller->actualizar($producto)) {
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $mensaje = "Error al actualizar el producto.";
        }

    } else {

        if ($controller->crear($producto)) {
            $mensaje = "Producto agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el producto.";
        }
    }
}

// LISTAR / BUSCAR
if ($terminoBusqueda !== '') {
    $productos = $controller->buscar($terminoBusqueda);
} else {
    $productos = $controller->listar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos con PHP PDO y POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

<?php if (!empty($mensaje)): ?>
<div class="alert alert-info">
    <?php echo htmlspecialchars($mensaje); ?>
</div>
<?php endif; ?>

<!-- FORMULARIO -->
<div class="card mb-4">

    <div class="card-header bg-primary text-white">
        <?php echo $productoEditar ? "Editar producto" : "Agregar producto"; ?>
    </div>

    <div class="card-body">

        <form method="POST">

            <input type="hidden" name="idProducto" value="<?php echo $productoEditar['idProducto'] ?? ''; ?>">

            <div class="row">

                <div class="col-md-3 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control"
                    value="<?php echo $productoEditar['nombre'] ?? ''; ?>" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control"
                    value="<?php echo $productoEditar['descripcion'] ?? ''; ?>" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="form-label">Existencia</label>
                    <input type="number" name="existencia" class="form-control"
                    value="<?php echo $productoEditar['existencia'] ?? ''; ?>" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control"
                    value="<?php echo $productoEditar['precio'] ?? ''; ?>" required>
                </div>

                <div class="col-md-2 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">
                        <?php echo $productoEditar ? "Actualizar" : "Guardar"; ?>
                    </button>
                </div>

            </div>

        </form>

        <?php if ($productoEditar): ?>
            <a href="index.php" class="btn btn-secondary">Cancelar edición</a>
        <?php endif; ?>

    </div>
</div>

<!-- TABLA -->
<div class="card">

    <div class="card-header bg-dark text-white">
        Lista de productos
    </div>

    <div class="card-body">

        <!-- 🔍 BUSCADOR -->
        <form method="GET" action="" class="row g-2 mb-3">

            <div class="col-md-10">
                <input type="text" name="buscar" class="form-control"
                    placeholder="Buscar por nombre o descripción"
                    value="<?php echo htmlspecialchars($terminoBusqueda); ?>">
            </div>

            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

            <?php if ($terminoBusqueda !== ''): ?>
                <div class="col-12">
                    <a href="index.php" class="btn btn-secondary btn-sm">Mostrar todos</a>
                </div>
            <?php endif; ?>

        </form>

        <!-- TABLA -->
        <table class="table table-bordered table-striped table-hover">

            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Existencia</th>
                    <th>Precio</th>
                    <th width="180">Acciones</th>
                </tr>
            </thead>

            <tbody>

            <?php if (count($productos) > 0): ?>

                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['idProducto']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['existencia']; ?></td>
                        <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                        <td>
                            <a href="?editar=<?php echo $producto['idProducto']; ?>" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <a href="?eliminar=<?php echo $producto['idProducto']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="6" class="text-center">No hay productos registrados.</td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>
</div>

</div>

</body>
</html>