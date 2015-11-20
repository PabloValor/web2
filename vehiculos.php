<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    use source\database\DBManager;

    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    // Se traen los vehiculos de tabla Vehiculo
    $db = new DBManager();
    $vehiculos = $db->obtenerVehiculos();
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
                <div class="col s12 m8">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Buscar Vehículo por dominio</label>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="input-field center-align">
                        <a class="light-blue darken-1 waves-effect waves-light btn-large">Buscar</a>
                    </div>
                </div>                        
            </div>
        </div>
        <!-- Fin Filtro de busqueda -->
        <div class="row">           
            <div class="col s12 margin-top-10 margin-bottom-10">
                <div class="center-align">
                    <a href ="#modalNuevoVehiculo" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                </div>
            </div>
            <div class="col s12">
                <ul class="collection" id="lista-vehiculos">
                    <?php foreach($vehiculos as $vehiculo): ?>
                            <li class="collection-item avatar">
                                <img src="assets/imagenes/avatar.png" alt="" class="circle hide-on-small-only">
                                <span class="title"><?php echo $vehiculo["DOMINIO"]; ?></span>
                                <p><a class="modal-trigger link margin-bottom-10" href="#modalDatosVehiculo">Ver ficha del vehiculo</a></p>                                
                                <div class="center-align">
                                <!-- Eliminar -->
                                <a href ="#!" data-id-eliminar="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-baja-vehiculo secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                                    <i class="material-icons">delete</i>
                                </a>
                              <!-- Editar -->
                                <a href ="#modalEditarVehiculo" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-editar-vehiculo secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-tooltip="Editar">
                                    <i class="material-icons">playlist_add</i>
                                </a>                    
                            </li>
                    <?php endforeach; ?>
                </ul>  
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

    <!-- Modal Datos de Vehiculo -->
    <div id="modalDatosVehiculo" class="modal modal-fixed-footer">
        <div class="modal-content center-align">
            <?php include_once('source/views/shared/_vehiculoDatos.php'); ?>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Datos de Vehiculo -->

    <!-- Modal Editar Vehiculo -->
    <div id="modalEditarVehiculo" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Editar de Vehiculo --> 

    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>