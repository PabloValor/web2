<?php
session_start();
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$mantenimientos = $db->obtenerMantenimientos();

?>

<?php foreach($mantenimientos as $mantenimiento): ?>

    <li class="collection-item avatar">
        <span class="title">Fecha: <?php echo $mantenimiento["FECHA"]; ?></span>
        <p class="title">Vehiculo: <?php echo $mantenimiento["DOMINIO_VEHICULO"]; echo " "; ?></p>
        <p class="title">Trabajo realizado: <?php echo $mantenimiento["COMENTARIO"]; echo " "; ?></p>
        <p><a class="btn-datos-mantenimiento modal-trigger link margin-bottom-10" data-id="<?php echo $mantenimiento["ID"]; ?>" href="#modalDatosMantenimiento">Ver ficha completa</a></p>
        <!-- 
            Los botones de de Editar y Eliminar Mantenimiento solo estan disponibles si el usuario
            que esta navegando la aplicación tiene rol de Supervisor 
        -->
        <?php if($_SESSION['id_rol'] == 3) { ?>
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $mantenimiento["ID"]; ?>" class="btn-baja-mantenimiento secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <?php if($mantenimiento["REALIZADO"] == 0) { ?>
                <a href ="#!" data-id-editar="<?php echo $mantenimiento["ID"]; ?>" class="btn-editar-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped" data-position="left" data-tooltip="Marcar como realizado">
                    <i class="material-icons">done</i>
                </a>
            <?php } ?>
        <?php } ?>
    </li>
<?php endforeach; ?>