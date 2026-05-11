<?php
include_once(__DIR__ . '/template/header.php');
?>

<div class="container p-5">

  <div class="card">
    <div class="card-header text-center">
      REGISTRAR PRODUCTO
    </div>

    <div class="card-body">

      <form action="../productoInsert.php" method="post">

        <div class="mb-3">
          <label class="form-label">Producto</label>
          <input type="text" name="txtProducto" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Cantidad</label>
          <input type="text" name="txtCantidad" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input type="text" name="txtPrecio" class="form-control">
        </div>

        <button class="btn btn-primary">Guardar</button>
        <a href="/MODEL-VIEW-CONTROLLER/index.php" class="btn btn-danger">Cancelar</a>

      </form>

    </div>
  </div>

</div>

<?php include_once(__DIR__ . '/template/footer.php'); ?>