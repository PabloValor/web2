<?php
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

if(empty($_POST["NOMBREEMPLEADO"])) {
    $empleados = $db->obtenerEmpleados();
} else {
    $empleados = $db->obtenerEmpleadosFiltrados($_POST["NOMBREEMPLEADO"]);
}

?>

<?php foreach($empleados as $empleado): ?>
        <li class="collection-item avatar">
            <img src="assets/imagenes/avatar.png" alt="" class="circle hide-on-small-only">
            <span class="title"><?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?></span>
            <p class="grey-text"><?php echo $empleado["CARGO"]; echo " "; ?>
                <span class="tag"><?php echo $empleado["ROL"]; ?></span>
            </p>
            <p><a class="btn-datos-empleado modal-trigger link margin-bottom-10" data-id="<?php echo $empleado["ID"]; ?>" href="#modalDatosEmpleado">Ver perfil completo</a></p>
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $empleado["ID"]; ?>" class="btn-baja-empleado secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-tooltip="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <a href ="#modalEditarEmpleado" data-id="<?php echo $empleado["ID"]; ?>" class="btn-editar-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-tooltip="Editar">
                <i class="material-icons">playlist_add</i>
            </a>
        </li>
<?php endforeach; ?>