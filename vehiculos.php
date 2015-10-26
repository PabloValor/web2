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
                    <a class="light-blue darken-1 waves-effect waves-light btn-large"><i class="material-icons right">input</i>agregar nuevo</a>
                </div>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach($vehiculos as $vehiculo): ?>
                            <li class="collection-item avatar">
                                <img src="http://i353.photobucket.com/albums/r389/ashantiblanco/ford_f650_09.jpg" alt="" class="circle hide-on-small-only">
                                <span class="title"><?php echo $vehiculo["DOMINIO"]; ?></span>
                                <p><a class="modal-trigger link margin-bottom-10" href="#modalDatosEmpleado">Ver ficha del vehiculo</a></p>                                
                                <div class="center-align">
                                <a href ="#modalEliminarVehiculo" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" data-accion="eliminar" class="ABMEmpleados secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar">
                                    <i class="material-icons">delete</i>
                                </a>
                                <a href ="#modalEditarVehiculo" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" data-accion="editar" class="ABMEmpleados secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Editar">
                                    <i class="material-icons">playlist_add</i>
                                </a>
                                
                                <!-- Modal Datos de usuario -->
                                <div id="modalDatosEmpleado" class="modal modal-fixed-footer">
                                    <div class="modal-content center-align">
                                        <h4>Datos del Vehículo</h4>
                                            <div class="center-align">
                                                <img class="redondear-imagen" src="http://i353.photobucket.com/albums/r389/ashantiblanco/ford_f650_09.jpg" alt="">
                                            </div>
                                            <h5 class="grey-text">supersayayin</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora iusto fugit, quis veniam autem illo optio dolores facilis, facere, molestiae voluptatem reprehenderit reiciendis, quas molestias alias nihil? Dolores, nihil similique!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <!--<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Eliminar</a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>-->
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
                                    </div>
                                </div>
                                <!-- Fin Modal Datos de usuario -->

                                <!-- Modal Editar Usuario -->
                                <div id="modalEditarVehiculo" class="modal modal-fixed-footer">
                                    <div class="modal-content center-align">
                                        <h4>Editar Vehículo</h4>
                                        <form action="ABM/Vehiculos.php">
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="modelo" type="text" class="validate">
                                                    <label for="modelo">Modelo</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="anio" type="text" class="validate">
                                                    <label for="anio">Año</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="marca" type="text" class="validate">
                                                    <label for="marca">Marca</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="chasis" type="text" class="validate">
                                                    <label for="chasis">Nro Chasis</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="motor" type="text" class="validate">
                                                    <label for="motor">Nro Motor</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="ABMEmpleados modal-action modal-close waves-effect waves-green btn-flat" data-id="1" data-accion="editar">Actualizar Vehículo</a>
                                    </div>
                                </div>
                                <!-- Fin Modal Datos de usuario -->                        
                            </li>
                    <?php endforeach; ?>
                </ul>  
            </div>
        </div>        
    </div>
    
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>