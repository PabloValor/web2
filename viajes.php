<?php
    session_start();
    include_once dirname(__FILE__) . '/source/database/DBManager.php';

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('source/inc/head.php'); ?>

<body>
  <?php require_once('source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Viajes</h2>
        <!-- Contenido de pagina -->
        <div class="row">
            <!-- boton nuevo viaje -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Viaje sólo habilitado para rol Supervisor -->
                <div class="col s12 margin-top-10 margin-bottom-10">
                    <div class="center-align">
                        <a href ="#modalNuevoViaje" id="btn-nuevo-viaje-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo viaje -->
            <div class="col s12">
                <!-- Lista Viajes -->
                <ul class="collection" id="lista-viajes"></ul>
                <!-- Fin Lista Viajes -->
            </div>
        </div>             
    </div>
    <!-- Fin Contenido de pagina -->

    <!-- Modal Nuevo Viaje -->
    <div id="modalNuevoViaje" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Nuevo Viaje -->

    <!-- Modal Editar Viaje -->
    <div id="modalEditarViaje" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Editar de Viaje -->

    <!-- Modal Ver Datos de Viaje -->
    <div id="modalDatosViaje" class="modal modal-fixed-footer">
        <div class="modal-content center-align"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Ver Datos de Viaje -->

    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>