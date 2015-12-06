<?php
    session_start();
    include_once dirname(__FILE__) . '/source/database/DBManager.php';


    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    $db = new DBManager();
    $viajes = $db->obtenerViajes();
?>

<!doctype html>
<html lang="es">

<?php require_once('source/inc/head.php'); ?>

<body>
    <?php require_once('source/inc/ga.php'); ?>
    <?php require_once('source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Seguimientos</h2>
        <!-- Contenido de pagina -->
            <div class="col s12">
                <!-- Lista Empleados -->
                <ul class="collection" id="lista-viajes-con-mapa">
                    <?php foreach($viajes as $viaje): ?>
                        <li class="collection-item center-align">
                            <span class="title">
                                Viaje con destino a: <?php echo $viaje["DIRECCION"]; ?> <?php echo $viaje["NUMERO"]; ?>, <?php echo $viaje["LOCALIDAD"]; ?>, <?php echo $viaje["PAIS"]; ?>
                            </span>
                            <p class="grey-text">Cliente: <?php echo $viaje["CLIENTE"]; ?></p>
                            <p>
                                <a href="#modalMapa" data-id="<?php echo $viaje["ID"]; ?>" class="btn-mapa light-blue darken-1 waves-effect waves-light btn-large modal-trigger">Ver Paradas</a>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- Fin Lista Empleados -->
            </div>        
        <div class="row">
            <div class="col s12">
                
            </div>
        </div>
        <!-- Fin Contenido de pagina -->        
    </div>
    <!-- Modal Mapa -->
    <div id="modalMapa" class="modal">
        <div class="modal-content center-align">
            <div id="contenedor-mapa"></div>
        </div>
    </div>
    <!-- Fin Modal Mapa -->

    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>