<?php
    session_start();

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
        <!-- Lista de Reportes -->
        <div class="row">
            <div class="col s12">
                <div class="center-align">
                    <img class="responsive-img" src="source/generadorGraficas/camiones.php" alt="">
                </div>                
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="center-align">
                    <img class="responsive-img" src="source/generadorGraficas/clientes.php" alt="">
                </div>                
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="center-align">
                    <img class="responsive-img" src="source/generadorGraficas/choferes.php" alt="">
                </div>                
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="center-align">
                    <img class="responsive-img" src="source/generadorGraficas/acoplados.php" alt="">
                </div>                
            </div>
        </div>         
        <!-- Fin Lista de Reportes -->
    </div>
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>