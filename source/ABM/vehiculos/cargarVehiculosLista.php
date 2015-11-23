<?php
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$vehiculos = $db->obtenerVehiculos();
?>

<?php foreach($vehiculos as $vehiculo): ?>
        <li class="collection-item avatar">
            <img src="assets/imagenes/avatar.png" alt="" class="circle hide-on-small-only">
            <span class="title"><?php echo $vehiculo["DOMINIO"]; ?></span>
            <p><a class="btn-datos-vehiculo modal-trigger link margin-bottom-10" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" href="#modalDatosVehiculo">Ver ficha completa</a></p>
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-baja-vehiculo secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <a href ="#modalEditarVehiculo" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-editar-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-tooltip="Editar">
                <i class="material-icons">playlist_add</i>
            </a>
        </li>
<?php endforeach; ?>