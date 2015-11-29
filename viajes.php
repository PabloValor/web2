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
        <h2 class="center-align">Viajes</h2>
        <!-- Contenido de pagina -->
        <!-- Filtro de busqueda -->
        <div class="card-panel grey lighten-5">
            <div class="row">
                <form id="formularioListaFiltrada">
                    <div class="col s12 m10">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" class="validate" name="NOMBREEMPLEADO">
                            <label for="icon_prefix">Buscar Viaje</label>
                        </div>
                    </div>
                    <div class="col s12 m2">
                        <div class="input-field center-align">
                            <a id="btn-lista-viajes-filtrada" class="light-blue darken-1 waves-effect waves-light btn-large">Buscar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin Filtro de busqueda -->
        <div class="row">
            <!-- boton nuevo viaje -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Viaje sólo habilitado para rol Supervisor -->
                <div class="col s12 margin-top-10 margin-bottom-10">
                    <div class="center-align">
                        <a href ="#modalNuevoViaje" id="btn-nuevo-viaje-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo viaje -->
            <div class="col s12">
                <!-- Lista Viajes -->
                <ul class="collection" id="lista-viajes"></ul>
                <!-- Fin Lista Viajes -->
            </div>
        </div>             
    </div>
    <!-- Fin Contenido de pagina -->

    <!-- Modal Nuevo Viaje -->
    <div id="modalNuevoViaje" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Nuevo Viaje -->

    <!-- Modal Editar Viaje -->
    <div id="modalEditarViaje" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Editar de Viaje -->

    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>