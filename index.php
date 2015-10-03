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
        <h1 class="center-align">Dirty Trucks Inc.</h1>
        <!-- Contenido de pagina -->
    </div>

    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>
