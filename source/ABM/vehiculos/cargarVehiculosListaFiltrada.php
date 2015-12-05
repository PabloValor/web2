<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();

if(empty($_POST["DOMINIO"])) {
    $vehiculos = $db->obtenerVehiculos();
} else {
    $vehiculos = $db->obtenerVehiculosFiltrados($_POST["DOMINIO"]);
}

?>

<?php foreach($vehiculos as $vehiculo): ?>
    
    <?php $avatar = empty($vehiculo["AVATAR"]) ? "default" : $vehiculo["AVATAR"]; ?>

    <li class="collection-item avatar">
        <img src="assets/imagenes/avatares/vehiculos/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>" class="circle hide-on-small-only">
        <span class="title"><?php echo $vehiculo["DOMINIO"]; ?></span>
        <p><a class="btn-datos-vehiculo modal-trigger link margin-bottom-10" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" href="#modalDatosVehiculo">Ver ficha completa</a></p>
        <!-- 
            Los botones de de Editar y Eliminar Vehiculo solo estan disponibles si el usuario
            que esta navegando la aplicación tiene rol de Supervisor 
        -->
        <!-- Eliminar -->
        <?php if($_SESSION['id_rol'] == 3) { ?>
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-baja-vehiculo secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <a href ="#modalEditarVehiculo" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-editar-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-tooltip="Editar">
                <i class="material-icons">playlist_add</i>
            </a>
        <?php } ?>
    </li>
<?php endforeach; ?>