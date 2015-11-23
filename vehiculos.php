<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    use source\database\DBManager;

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    // TODO: esto no debería estar aca, hacer refacto de AGREGAR EMPLEADO NUEVO, esta dando un bug.
    $db = new DBManager();
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Vehículos</h2>
        <!-- Contenido de pagina -->
        <!-- Filtro de busqueda -->
        <div class="card-panel grey lighten-5">
            <div class="row">
                <div class="col s12 m10">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Buscar Vehiculo</label>
                    </div>
                </div>
                <div class="col s12 m2">
                    <div class="input-field center-align">
                        <a class="light-blue darken-1 waves-effect waves-light btn-large">Buscar</a>
                    </div>
                </div>                        
            </div>
        </div>
        <!-- Fin Filtro de busqueda -->
        <div class="row">
            <!-- boton nuevo vehiculo -->
            <div class="col s12 margin-top-10 margin-bottom-10">
                <div class="center-align">
                    <a href ="#modalNuevoVehiculo" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                </div>
            </div>
            <!-- Fin boton nuevo vehiculo -->
            <div class="col s12">
                <!-- Lista Vehiculos -->
                <ul class="collection" id="lista-vehiculos"></ul>
                <!-- Fin Lista Vehiculos -->
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo Vehiculo -->
    <div id="modalNuevoVehiculo" class="modal">
        <div class="modal-content center-align">
            <?php include_once('source/views/shared/_formularioVehiculoNuevo.php'); ?>
        </div>
    </div>
    <!-- Fin Modal Nuevo Vehiculo -->

    <!-- Modal Ver Datos de Vehiculo -->
    <div id="modalDatosVehiculo" class="modal modal-fixed-footer">
        <div class="modal-content center-align"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat ">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Ver Datos de Vehiculo -->

    <!-- Modal Editar Vehiculo -->
    <div id="modalEditarVehiculo" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Editar de Vehiculo -->    
    <!-- Fin Contenido de pagina -->
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>