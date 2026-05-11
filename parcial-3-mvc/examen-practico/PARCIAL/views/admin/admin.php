<?php
//Yaritza Alejandra Laureano de la Cruz
require_once("../admin/template/header.php");
?>
<div class="mx-auto p-5">
<div class="card text-center">

    <div class="card-header">
        MENÚ
    </div>

    <div class="card-body">

        <h5 class="card-title"></h5>

        <!-- PRIMERA FILA -->
        <div class="row">

            <!-- CARD 1 -->
            <div class="col">

                <div class="card text-center">

                    <div class="card-header">
                        CREAR TORNEO
                    </div>

                    <div class="card-body">
                        <a href="frmTorneos.php" class="btn btn-primary">
                            <img src="../../img/torneo-admin.png"
                                 alt="Crear un torneo"
                                 width="180"
                                 height="180">
                        </a>
                    </div>

                </div>

            </div>

            <!-- CARD 2 -->
            <div class="col">

                <div class="card text-center">

                    <div class="card-header">
                        LISTA DE TORNEOS
                    </div>

                    <div class="card-body">
                        <a href="readAllTorneos.php" class="btn btn-primary">
                            <img src="../../img/lista-torneos-admin.png"
                                 alt="Listar torneo."
                                 width="180"
                                 height="180">
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- SEGUNDA FILA -->
        <div class="row mt-3">

            <!-- CARD 3 -->
            <div class="col">

                <div class="card text-center">

                    <div class="card-header">
                        ESTADÍSTICAS
                    </div>

                    <div class="card-body">

                    </div>

                </div>

            </div>

            <!-- CARD 4 -->
            <div class="col">

                <div class="card text-center">

                    <div class="card-header">
                        ANUNCIOS
                    </div>

                    <div class="card-body">

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card-footer text-body-secondary">
        Configuracion de torneos. Web App Basket-Ball.
    </div>

</div>

<?php
require_once("../admin/template/footer.php");
?>