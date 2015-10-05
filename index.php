<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class="container">
        <!-- Contenido de pagina -->
        <ul>
            <li><a href="usuarios.php">Ver usuarios</a></li>
            <li><a href="empleados.php">Ver Empleados</a></li>
            <li><a href="#">Ver Flota</a></li>
            <li><a href="#">Viajes</a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Seguimiento</a></li>
        </ul>
    </div>

    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>
