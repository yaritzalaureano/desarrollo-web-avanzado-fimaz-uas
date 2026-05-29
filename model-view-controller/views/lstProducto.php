<?php
include_once(__DIR__ . '/template/header.php');
require_once(__DIR__ . '/../controllers/controladorProductos.php');

$objProductosControllers = new productosController();
$rows = $objProductosControllers->readProductos();
?>

<div class="mx-auto p-5">
    <div class="card text-center">

        <div class="card-header">
            LISTADO DE PRODUCTOS
        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered">

                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">PRECIO</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($rows): ?>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['producto'] ?></td>
                                <td><?= $row['cantidad'] ?></td>
                                <td><?= $row['precio_unitario'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">
                                No hay productos aún.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>

        </div>
    </div>

    <div class="mx-auto p-2 text-center">
        <a href="/MODEL-VIEW-CONTROLLER/index.php" class="btn btn-primary">
            REGRESAR
        </a>
    </div>
</div>

<?php include_once(__DIR__ . '/template/footer.php'); ?>