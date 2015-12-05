<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('source/inc/head.php'); ?>

<body>
    <?php require_once('source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Vehículos</h2>
        <!-- Contenido de pagina -->
        <!-- Filtro de busqueda -->
        <div class="card-panel grey lighten-5">
            <div class="row">
                <form id="formularioListaFiltrada">
                    <div class="col s12 m10">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" class="validate" name="DOMINIO">
                            <label for="icon_prefix">Buscar Vehículo</label>
                        </div>
                    </div>
                    <div class="col s12 m2">
                        <div class="input-field center-align">
                            <a id="btn-lista-filtrada" class="light-blue darken-1 waves-effect waves-light btn-large">Buscar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin Filtro de busqueda -->
        <div class="row">
            <!-- boton nuevo vehiculo -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
                <div class="col s12 margin-top-10 margin-bottom-10">
                    <div class="center-align">
                        <a href ="#modalNuevoVehiculo" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                        <!--<a href ="#" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar mantenimiento</a>-->
                    </div>
                </div>
            <?php } ?>
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
        <div class="modal-content center-align"></div>
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
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>