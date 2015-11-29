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
        <h2 class="center-align">Reportes</h2>
        <!-- Contenido de pagina -->
        <div class="row">
            <div class="col s12">
                <!-- Lista Vehiculos -->
                <ul class="collection" id="lista-reportes">

                    <div class="center-align">
                        <img src="source/generadorGraficas/usoCamionesEnViaje.php?data1=33&data2=33&data3=33&data4=1" alt="">
                    </div>

                </ul>
                <!-- Fin Lista Vehiculos -->
            </div>
        </div>
        <!-- Fin Contenido de pagina -->        
    </div>
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>