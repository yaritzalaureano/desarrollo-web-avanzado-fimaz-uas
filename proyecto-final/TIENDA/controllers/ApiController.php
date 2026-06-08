<?php

namespace Controllers;

use Config\Database;
use PDOException;

/*
 * Controlador de API REST.
 *
 * Este controlador se encarga de responder solicitudes en formato JSON.
 * En este caso, la ruta /TIENDA/api/productos consulta la tabla productos
 * de la base de datos tienda_mvc y devuelve la información de los productos.
 *
 * Esta API sirve para comprobar que el proyecto no solo funciona como página web,
 * sino también como servicio de datos dentro del clúster de alta disponibilidad.
 */
class ApiController
{
    /*
     * Método productos()
     *
     * Función:
     * - Establece que la respuesta será JSON.
     * - Se conecta a la base de datos usando la clase Database.
     * - Consulta todos los productos registrados.
     * - Devuelve una respuesta JSON con:
     *   status: estado de la petición
     *   total: cantidad de productos encontrados
     *   data: lista de productos
     *
     * Si ocurre un error, devuelve código HTTP 500 y un mensaje en JSON.
     */
    public function productos(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            // Crear conexión a la base de datos configurada en config/Database.php
            $db = new Database();
            $conexion = $db->connect();

            // Consulta SQL para obtener todos los productos registrados
            $sql = "SELECT id, sku, nombre, descripcion, precio_compra, precio_venta, existencia, imagen, created_at, updated_at
                    FROM productos
                    ORDER BY id DESC";

            $stmt = $conexion->prepare($sql);
            $stmt->execute();

            // Obtener todos los registros como arreglo asociativo
            $productos = $stmt->fetchAll();

            // Respuesta correcta en formato JSON
            echo json_encode([
                'status' => 'success',
                'total' => count($productos),
                'data' => $productos
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            // Si ocurre un error de base de datos, se responde con error 500
            http_response_code(500);

            echo json_encode([
                'status' => 'error',
                'mensaje' => 'Error al consultar productos',
                'detalle' => $e->getMessage()
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    }
}
?>