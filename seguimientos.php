<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    use source\database\DBManager;

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    $db = new DBManager();
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Seguimientos</h2>
        <!-- Contenido de pagina -->
        <div class="row">
            <div class="col s12">
                <a href="#modalMapa" class="btn-mapa light-blue darken-1 waves-effect waves-light btn-large modal-trigger">Abrir Mapa</a>
            </div>
        </div>        
    </div>
    <!-- Fin Contenido de pagina -->

    <!-- Modal Mapa -->
    <div id="modalMapa" class="modal">
        <div class="modal-content center-align">
            <div id="contenedor-mapa"></div>
        </div>
    </div>
    <!-- Fin Modal Mapa -->

    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>