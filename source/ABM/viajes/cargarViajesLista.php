<?php
session_start();
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$viajes = $db->obtenerViajes();

?>

<?php foreach($viajes as $viaje): ?>
    <li class="collection-item avatar">
        <span class="title">
            Viaje con destino a: <?php echo $viaje["DIRECCION"]; ?> <?php echo $viaje["NUMERO"]; ?>, <?php echo $viaje["LOCALIDAD"]; ?>, <?php echo $viaje["PAIS"]; ?>
        </span>
        <p class="grey-text">Cliente: <?php echo $viaje["CLIENTE"]; ?></p>
        <p><a class="btn-datos-viaje modal-trigger link margin-bottom-10" data-id="<?php echo $viaje["ID"]; ?>" href="#modalDatosViaje">Ver datos de viaje</a></p>
        <!-- 
            Los botones de de Editar y Eliminar Empleado solo estan disponibles si el usuario
            que esta navegando la aplicación tiene rol de Supervisor 
        -->
        <?php if($_SESSION['id_rol'] == 3) { ?>
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $viaje["ID"]; ?>" class="btn-baja-viaje secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <a href ="#modalEditarViaje" data-id="<?php echo $viaje["ID"]; ?>" class="btn-editar-viaje-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-viaje-editar tooltipped modal-trigger" data-position="left" data-tooltip="Editar">
                <i class="material-icons">playlist_add</i>
            </a>
        <?php } ?>
    </li>
<?php endforeach; ?>