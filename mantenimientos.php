<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    use source\database\DBManager;

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Mantenimientos</h2>
        <!-- Contenido de pagina -->
        <div class="row">
            <!-- boton nuevo mantenimiento -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar mantenimiento sólo habilitado para rol Supervisor -->
                <div class="col s12 margin-top-10 margin-bottom-10">
                    <div class="center-align">
                        <a href ="#modalNuevoMantenimiento" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo mantenimiento -->
            <div class="col s12">
                <!-- Lista Mantenimientos -->
                <ul class="collection" id="lista-mantenimientos"></ul>
                <!-- Fin Lista mantenimientos -->
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo mantenimiento -->
    <div id="modalNuevoMantenimiento" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Nuevo mantenimiento -->

    <!-- Modal Ver Datos de mantenimiento -->
    <div id="modalDatosMantenimiento" class="modal modal-fixed-footer">
        <div class="modal-content center-align"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Ver Datos de mantenimiento -->

    <!-- Fin Modal Editar de mantenimiento -->    
    <!-- Fin Contenido de pagina -->
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>