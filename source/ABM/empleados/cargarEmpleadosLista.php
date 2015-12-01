<?php
session_start();
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$empleados = $db->obtenerEmpleados();

?>

<?php foreach($empleados as $empleado): ?>

    <?php $avatar = empty($empleado["AVATAR"]) ? "default" : $empleado["AVATAR"]; ?>

    <li class="collection-item avatar">
        <img src="assets/imagenes/avatares/empleados/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>" class="circle hide-on-small-only">
        <span class="title"><?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?></span>
        <p class="grey-text"><?php echo $empleado["CARGO"]; echo " "; ?>
            <span class="tag"><?php echo $empleado["ROL"]; ?></span>
        </p>
        <p><a class="btn-datos-empleado modal-trigger link margin-bottom-10" data-id="<?php echo $empleado["ID"]; ?>" href="#modalDatosEmpleado">Ver perfil completo</a></p>
        <p><a class="btn-exportar-pdf link margin-bottom-10" data-id="<?php echo $empleado["ID"]; ?>" href="#">Exportar a PDF</a></p>
        <!-- 
            Los botones de de Editar y Eliminar Empleado solo estan disponibles si el usuario
            que esta navegando la aplicación tiene rol de Supervisor 
        -->
        <?php if($_SESSION['id_rol'] == 3) { ?>
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $empleado["ID"]; ?>" class="btn-baja-empleado secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <a href ="#modalEditarEmpleado" data-id="<?php echo $empleado["ID"]; ?>" class="btn-editar-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-tooltip="Editar">
                <i class="material-icons">playlist_add</i>
            </a>
        <?php } ?>
    </li>
<?php endforeach; ?>