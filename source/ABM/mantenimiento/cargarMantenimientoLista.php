<?php
session_start();
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$vehiculos = $db->obtenerMantenimientos();
?>

<?php foreach($vehiculos as $vehiculo):?>

    
    <li class="collection-item avatar">
        <span class="title"><?php echo $vehiculo["DOMINIO_VEHICULO"]; ?></span>
        <p><a class="btn-nuevo-mantenimiento modal-trigger link margin-bottom-10" data-id="<?php echo $vehiculo["DOMINIO_VEHICULO"]; ?>" href="#modalDatosVehiculo">Ver mantenimiento completo</a></p>
        <!-- 
            Los botones de de Editar y Eliminar Empleado solo estan disponibles si el usuario
            que esta navegando la aplicación tiene rol de Supervisor 
        -->
        <!-- Eliminar -->
        
    </li>
<?php endforeach; ?>