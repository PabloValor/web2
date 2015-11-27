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
        <h2 class="center-align">Empleados</h2>
        <!-- Contenido de pagina -->
        <!-- Filtro de busqueda -->
        <div class="card-panel grey lighten-5">
            <div class="row">
                <form id="formularioListaFiltrada">
                    <div class="col s12 m10">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" class="validate" name="NOMBREEMPLEADO">
                            <label for="icon_prefix">Buscar Empleado</label>
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
            <!-- boton nuevo empleado -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
                <div class="col s12 margin-top-10 margin-bottom-10">
                    <div class="center-align">
                        <a href ="#modalNuevoEmpleado" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo empleado -->
            <div class="col s12">
                <!-- Lista Empleados -->
                <ul class="collection" id="lista-empleados"></ul>
                <!-- Fin Lista Empleados -->
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo Empleado -->
    <div id="modalNuevoEmpleado" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Nuevo Empleado -->

    <!-- Modal Ver Datos de Empleado -->
    <div id="modalDatosEmpleado" class="modal modal-fixed-footer">
        <div class="modal-content center-align"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Ver Datos de Empleado -->

    <!-- Modal Editar Empleado -->
    <div id="modalEditarEmpleado" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Editar de Empleado -->    
    <!-- Fin Contenido de pagina -->
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>