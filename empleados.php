<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    use source\database\DBManager;

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    // Se traen los empleados de tabla Empleado
    $db = new DBManager();
    $empleados = $db->obtenerEmpleados();
    $cargos = $db->obtenerCargos();
    $roles = $db->obtenerRoles();
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class="container margin-top-20">
        <h2 class="center-align">Empleados</h2>
        <!-- Contenido de pagina -->
        <!-- Filtro de busqueda -->
        <div class="card-panel grey lighten-5">
            <div class="row">
                <div class="col s12 m5">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Buscar Empleado</label>
                    </div>
                </div>
                <div class="col s12 m5">
                    <div class="input-field">
                        <select>
                            <option value="" disabled selected>Filtrar por Cargo</option>
                            <?php foreach($cargos as $cargo): ?>
                                <option value="<?php echo $cargo["ID"]; ?>">
                                    <?php echo $cargo["DESCRIPCION"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col s12 m2">
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
                    <a href ="#modalNuevoEmpleado" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                </div>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach($empleados as $empleado): ?>
                            <li class="collection-item avatar">
                                <img src="assets/imagenes/avatar.png" alt="" class="circle hide-on-small-only">
                                <span class="title"><?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?></span>
                                <p class="grey-text"><?php echo $empleado["CARGO"]; echo " "; ?>
                                    <span class="tag"><?php echo $empleado["ROL"]; ?></span>
                                </p>
                                <p><a class="modal-trigger link margin-bottom-10" href="#modalDatosEmpleado">Ver perfil completo</a></p>
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
                </ul>  
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo Empleado -->
    <div id="modalNuevoEmpleado" class="modal">
        <div class="modal-content center-align">
            <?php include_once('source/views/shared/_formularioEmpleadoNuevo.php'); ?>
        </div>
    </div>
    <!-- Fin Modal Nuevo Empleado -->

    <!-- Modal Datos de Empleado -->
    <div id="modalDatosEmpleado" class="modal modal-fixed-footer">
        <div class="modal-content center-align">
            <?php include_once('source/views/shared/_empleadoDatos.php'); ?>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Datos de Empleado -->

    <!-- Modal Editar Empleado -->
    <div id="modalEditarEmpleado" class="modal">
        <div class="modal-content center-align">
            <?php include_once('source/views/shared/_formularioEmpleadoEditar.php'); ?>
        </div>
    </div>
    <!-- Fin Modal Editar de Empleado -->    
    <!-- Fin Contenido de pagina -->
    <?php
        require_once('/source/views/shared/_footer.php');
        require_once('/source/inc/scripts.php');
    ?>
</body>
</html>