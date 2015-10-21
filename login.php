<!doctype html>
<html lang="es">

<?php
    session_start();
    require_once('/source/inc/head.php');

    unset($_SESSION['logueado']);
?>

<body>
    <?php if(isset($_GET['error'])) { ?>
            <script>alert('Su clave o contraseña es incorrecta o no existe el usuario')</script>
    <?php } ?>

    <div class="container">
        <div class="center-align">
            <h1>Dirty Trucks Inc.</h1>
            <img src="assets/imagenes/camion.png" alt="Camión" class="responsive-img logo-camion">
            <h2 class="margin-top-0">Sistema de gestión</h2>
        </div>

        <!-- Contenido de pagina -->
        <form action="source/validarLogin.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="user" type="text" name="usuario" required>
                    <label for="user" data-success="">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" required>
                    <label for="password" data-success="">Clave</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 center-align">
                    <input type="submit" class="light-blue darken-1 btn-large" value="enviar">
                </div>
            </div>
        </form>
    </div>

    <?php require_once('/source/inc/scripts.php'); ?>
</body>
</html>
