<?php
require_once(__DIR__ . "/../models/modeloProducto.php");class productosController {

    private $model;

    public function __construct() {
        $this->model = new productosModel();
    }

    public function saveProducto($producto, $cantidad, $precio_unitario) {
        $id = $this->model->insert($producto, $cantidad, $precio_unitario);

        return ($id == false)
    ? header("Location: index.php")
    : header("Location: views/lstProducto.php");
    }

    public function readProductos() {
        return ($this->model->read()) ? $this->model->read() : false;
    }
}