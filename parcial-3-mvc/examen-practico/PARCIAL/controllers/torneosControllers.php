<?php

require_once("../../models/torneosModel.php");

class torneosControllers {

    private $model;

    public function __construct()
    {
        $this->model = new torneoModel();
    }

    //Creamos metodo controlador que mandara llamar la funcion insert del Modelo.
    //Tambien mandara los parametros necesarios para guardar en la tabla "torneos".
    //Si los datos se guardan redireccionara al usuario a la pantalla de inicio lo 
    //contrario se mantendra en la pantalla del formulario de captura de datos del torneo.

    public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, 
    $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena)
    {

        //Recordamos que la funcion Insert del modelo, regresa el ultimo id generado.
        $id = $this->model->insert(
            $nombreTorneo,
            $organizador,
            $patrocinadores,
            $sede,
            $categoria,
            $premio1,
            $premio2,
            $premio3,
            $otroPremio,
            $usuario,
            $contrasena,
        );

        return ($id != false)
            ? header("Location: admin.php")
            : header("Location: frmTorneos.php");
    }

    //Metdodo para ejecutar la funcion read del modelo del Torneo
    public function readTorneo(){
        return($this->model->read()) ? $this->model->read() : false;
     }

     // Método para ejecutar la función readOne del modelo torneo
public function readOneTorneo($id)
{
    return ($this->model->readOne($id) != false)
        ? $this->model->readOne($id)
        : header("Location: admin.php");
}
public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio)
{
    return ($this->model->update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio))
        ? header("Location: readOneTorneo.php?id=" . $id)
        : header("Location: readAllTorneo.php");
}
//Metodo que manda llamar a la funcion delete del torneo
public function delete($id)
{
    return ($this->model->delete($id))
        ? header("Location: readAllTorneos.php")
        : header("Location: readOneTorneo.php?id=" . $id);
}

}
?>