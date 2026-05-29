<?php
//Yaritza Alejandra Laureano de la Cruz
require_once("../admin/template/header.php");
require_once("../../controllers/torneosControllers.php");

//Instanciamos controlador para ejecutar la consulta.
$objTorneosController = new torneosControllers();

//Capturar el id y sacar la información del torneo.
$lstTorneo = $objTorneosController->readOneTorneo($_GET['id']);
?>

<div class="mx-auto p-5">
    <div class="card">
        <div class="card-header">
            INFORMACION DEL TORNEO
        </div>

        <div class="card-body">

            <form action="torneosInsert.php" method="post">

                <div class="mb-3">
                    <label for="nombreTorneo" class="form-label">
                        NOMBRE DEL TORNEO (ID: <?= $lstTorneo['id'] ?>)
                    </label>
                    <input type="text"
                        class="form-control"
                        name="txtnombreTorneo"
                        id="nombreTorneo"
                        value="<?= $lstTorneo['nombreTorneo'] ?>"
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="organizador" class="form-label">
                        ORGANIZADOR(nombre completo)
                    </label>
                    <input type="text"
                        name="txtOrganizador"
                        id="organizador"
                        class="form-control"
                        value="<?= $lstTorneo['organizador'] ?>"
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="patrocinador" class="form-label">
                        PATROCINADOR(ES)
                    </label>

                    <textarea
                        name="txtpatrocinador"
                        id="patrocinador"
                        cols="30"
                        rows="2"
                        class="form-control"
                        readonly><?= $lstTorneo['patrocinadores'] ?></textarea>

                    <span id="patrocinador" class="form-text">
                        Atencion: se puede separar con "," si hay mas de un patrocinador.
                    </span>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="sede" class="form-label">
                            SEDE(cancha)
                        </label>
                        <input type="text"
                            name="textSede"
                            id="sede"
                            class="form-control"
                            value="<?= $lstTorneo['sede'] ?>"
                            readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="categoria" class="form-label">
                            CATEGORIA
                        </label>
                        <input list="lstCategorias"
                            name="txtCategoria"
                            id="categoria"
                            class="form-control"
                            value="<?= $lstTorneo['categoria'] ?>"
                            readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="premio2" class="form-label">
                            PREMIO 1ER.LUGAR
                        </label>
                        <input type="text"
                            name="txtPremio2"
                            id="premio2"
                            class="form-control"
                            value="<?= $lstTorneo['premio2'] ?>"
                            readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="premio1" class="form-label">
                            PREMIO 2DO.LUGAR
                        </label>
                        <input type="text"
                            name="txtPremio1"
                            id="premio1"
                            class="form-control"
                            value="<?= $lstTorneo['premio1'] ?>"
                            readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="premio3" class="form-label">
                            PREMIO 3ER.LUGAR
                        </label>
                        <input type="text"
                            name="txtPremio3"
                            id="premio3"
                            class="form-control"
                            value="<?= $lstTorneo['premio3'] ?>"
                            readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="otroPremio" class="form-label">
                            OTRO PREMIO (CAMPEON CANASTERO)
                        </label>
                        <input type="text"
                            name="txtotroPremio"
                            id="otroPremio"
                            class="form-control"
                            value="<?= $lstTorneo['otroPremio'] ?>"
                            readonly>
                    </div>
                </div>

                <!-- Usuario Y Contrasena para el Organizador del Torneo -->
                <div class="row">
                    <div class="col mb-3">
                        <label for="usuario" class="form-label">
                            USUARIO
                        </label>
                        <input type="text"
                            name="txtUsuario"
                            id="usuario"
                            class="form-control"
                            value="<?= $lstTorneo['usuario'] ?>"
                            readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="contrasena" class="form-label">
                            CONTRASEÑA
                        </label>
                        <input type="password"
                            name="txtContrasena"
                            id="contrasena"
                            class="form-control"
                            value="<?= $lstTorneo['contrasena'] ?>"
                            readonly>
                    </div>
                </div>

                <div class="col-12">
                    <a href="readAlltorneos.php" class="btn btn-success">REGRESAR</a>
                </div>
                </div>

            </form>

        </div>

        <div class="card-footer text-body-secondary">
            DETALLE TORNEO
        </div>

    </div>
</div>

<?php
require_once("../admin/template/footer.php");
?>