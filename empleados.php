<?php
    session_start();
    include_once (__DIR__ . '\source\database\DBManager.php');

    use source\database\DBManager;

    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    // Se traen los empleados de tabla Empleado
    $db = new DBManager();
    $empleados = $db->obtenerEmpleados();
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
                            <option value="" disabled selected>Buscar por categoría...</option>
                            <option value="1">Administradores</option>
                            <option value="1">Mecánico</option>
                            <option value="2">Chofer</option>
                            <option value="3">Gerente</option>
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
                    <a class="light-blue darken-1 waves-effect waves-light btn-large"><i class="material-icons right">input</i>agregar nuevo</a>
                </div>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach($empleados as $empleado): ?>
                            <li class="collection-item avatar">
                                <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle hide-on-small-only">
                                <span class="title"><?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?></span>
                                <p class="grey-text"><?php echo $empleado["CARGO"]; ?></p>
                                <p><a class="modal-trigger link margin-bottom-10" href="#modalDatosEmpleado">Ver perfil completo</a></p>
                                    <a href ="#modalEliminarEmpleado" data-id="<?php echo $empleado["ID"]; ?>" data-accion="eliminar" class="ABMEmpleados secondary-content light-blue lighten-1 waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar">
                                        <i class="material-icons">delete</i>
                                    </a>
                                    <a href ="#modalEditarEmpleado" data-id="<?php echo $empleado["ID"]; ?>" data-accion="editar" class="btnEditar ABMEmpleados secondary-content light-blue lighten-1 waves-effect waves-light btn btn-empleado-editar tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Editar">
                                        <i class="material-icons">playlist_add</i>
                                    </a>
                                
                                <!-- Modal Datos de usuario -->
                                <div id="modalDatosEmpleado" class="modal modal-fixed-footer">
                                    <div class="modal-content center-align">
                                        <h4>Perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
                                            <div class="center-align">
                                                <img class="redondear-imagen" src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="">
                                            </div>
                                            <h5 class="grey-text"><?php echo $empleado["CARGO"]; ?></h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos repellat quidem architecto magnam unde quisquam inventore illo impedit quod ipsum voluptate, vitae vel deleniti ut blanditiis voluptatum suscipit beatae, ratione!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <!--<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Eliminar</a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>-->
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
                                    </div>
                                </div>
                                <!-- Fin Modal Datos de usuario -->

                                <!-- Modal Editar Usuario -->
                                <div id="modalEditarEmpleado" class="modal modal-fixed-footer">
                                    <div class="modal-content center-align">
                                        <h4>Editar el perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
                                        <form action="ABM/Empleados.php">
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="nombre" name="NOMBRE" type="text" class="validate" value="<?php echo $empleado["NOMBRE"];?>">
                                                    <label for="NOMBRE">Nombre</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="APELLIDO" id="apellido" type="text" class="validate" value="<?php echo $empleado["APELLIDO"];?>">
                                                    <label for="APELLIDO">Apellido</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="dni" name="DNI" type="number" class="validate" value="<?php echo $empleado["DNI"];?>">
                                                    <label for="DNI">Número de docuento</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="sueldo" name="SUELDO" type="number" class="validate" value="<?php echo $empleado["SUELDO"];?>">
                                                    <label for="SUELDO">Sueldo</label>
                                                </div>                                                
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input type="date" name="FECHA_NACIMIENTO" id="fecha_nacimiento" class="datepicker" value="">
                                                    <label for="FECHA_NACIMIENTO">Fecha de nacimiento</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input type="date" name="FECHA_INGRESO" id="fecha_ingreso" class="datepicker" value="">
                                                    <label for="FECHA_INGRESO">Fecha de ingreso</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="cargo" name="CARGO" type="text" class="validate" value="<?php echo $empleado["CARGO"];?>">
                                                    <label for="CARGO">Cargo</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="ROL" id="rol" type="text" class="validate" value="<?php echo $empleado["ROL"];?>">
                                                    <label for="ROL">Rol</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="usuario" name="USUARIO" type="text" class="validate" value="<?php echo $empleado["USUARIO"];?>">
                                                    <label for="USUARIO">Usuario</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="PASSWORD" id="password" type="password" class="validate" value="<?php echo $empleado["PASSWORD"];?>">
                                                    <label for="PASSWORD">Password</label>
                                                </div>
                                            </div>                                                                                                                                                                                
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="ABMEmpleados modal-action modal-close waves-effect waves-green btn-flat" data-id="1" data-accion="editar">Actualizar Usuario</a>
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