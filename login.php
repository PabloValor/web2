<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php if(isset($_GET['error'])) { ?>
            <script>alert("Su clave o contraseña es incorrecta o no existe el usuario")</script>
    <?php } ?>

    <div class="container">
        <h1 class="center-align">Dirty Trucks Inc.</h1>
        <!-- Contenido de pagina -->
        <form action="source/validarLogin.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="user" type="text" class="validate" name="usuario" required>
                    <label for="user" data-error="mal" data-success="">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password" data-error="mal" data-success="">Clave</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 center-align">
                    <input type="submit" class="btn-large">
                </div>
            </div>
        </form>
    </div>

    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>
