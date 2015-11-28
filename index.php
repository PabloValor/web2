<?php
    session_start();
    if (empty($_SESSION['logueado'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class=" tarjetas container margin-top-20">
        <!-- Contenido de pagina -->
        <div class="row">
            <!-- Tarjeta Empleados -->
            <?php if($_SESSION['id_rol'] != 1) { ?>
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/imagenes/empleados.png">
                        </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Empleados<i class="material-icons right">more_vert</i></span>
                                <p><a href="empleados.php" class="link">Ver Empleados</a></p>
                            </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Empleados<i class="material-icons right">close</i></span>
                            <p>Ver información acerca de los empleados de esta empresa</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Empleados -->

            <!-- Tarjeta Flota -->
            <?php if($_SESSION['id_rol'] != 1) { ?>
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/imagenes/camion.png">
                        </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Flota<i class="material-icons right">more_vert</i></span>
                                <p><a href="vehiculos.php" class="link">Ver flota de Vehículos</a></p>
                            </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Flota de vehículos<i class="material-icons right">close</i></span>
                            <p>Ver información acerca de los vehículos de esta empresa</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Flota -->

            <!-- Tarjeta Viajes -->
            <?php if($_SESSION['id_rol'] != 1) { ?>
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/imagenes/viajes.jpg">
                        </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Viajes<i class="material-icons right">more_vert</i></span>
                                <p><a href="viajes.php" class="link">Ver Viajes</a></p>
                            </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Viajes<i class="material-icons right">close</i></span>
                            <p>Ver información acerca de los viajes realizados</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Viajes -->

            <!-- Tarjeta Reportes -->
            <?php if($_SESSION['id_rol'] == 3) { ?>
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/imagenes/graficos.jpg">
                        </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Reportes<i class="material-icons right">more_vert</i></span>
                                <p><a href="#">Ver Reportes</a></p>
                            </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Reportes<i class="material-icons right">close</i></span>
                            <p>Ver información acerca de los reportes de esta empresa</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Reportes -->

            <!-- Tarjeta Seguimiento -->
            <div class="col s12 m4">
                <div class="card hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/imagenes/seguimientos.jpg">
                    </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Seguimiento<i class="material-icons right">more_vert</i></span>
                            <p><a href="#">Ver Seguimientos</a></p>
                        </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Seguimientos<i class="material-icons right">close</i></span>
                        <p>Ver información acerca de los seguimientos de los viajes que realiza esta empresa</p>
                    </div>
                </div>
            </div>
            <!-- Fin Tarjeta Seguimiento -->                                   
        </div>
    </div>

    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>
