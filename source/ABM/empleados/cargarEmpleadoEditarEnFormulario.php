<?php
    session_start();    
    include '../../database/DBManager.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    
    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $empleado = $db->ObtenerEmpleadoPorId($idUsuario); 
    $cargos = $db->obtenerCargos();
    $roles = $db->obtenerRoles();
?>

<form id="formEditarEmpleado">
    <h4>Editar el perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
    <input type="hidden" name="ID" value="<?php echo $empleado["ID"]; ?>">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="nombre" placeholder="Ingrese nombre" name="NOMBRE" type="text" class="validate" value="<?php echo $empleado["NOMBRE"];?>" required>
        </div>
        <div class="input-field col s12 m6">
            <input id="apellido" placeholder="Ingrese apellido" name="APELLIDO" type="text" class="validate" value="<?php echo $empleado["APELLIDO"];?>" required>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="dni" placeholder="Ingrese DNI" name="DNI" type="number" class="validate" value="<?php echo $empleado["DNI"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input id="sueldo" placeholder="Ingrese sueldo" name="SUELDO" type="number" class="validate" value="<?php echo $empleado["SUELDO"];?>">
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input name="SEXO" id="radioMasculino" type="radio" value="M" <?php if ($empleado["SEXO"] == 'M') echo "checked"; ?>/>
        </div>
        <div class="input-field col s6">
            <input name="SEXO" id="radioFemenino" type="radio" value="F" <?php if ($empleado["SEXO"] == 'F') echo "checked"; ?>/>
        </div>                                                
    </div>                                            
    <div class="row">
        <div class="input-field col s12 m6">
            <input placeholder="Fecha de nacimiento" type="date" name="FECHA_NACIMIENTO" value="<?php echo $empleado["FECHA_NACIMIENTO"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Fecha de ingreso" type="date" name="FECHA_INGRESO" value="<?php echo $empleado["FECHA_INGRESO"];?>">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <select name="CARGO" required>
                <option value="" disabled selected>Seleccione el Cargo</option>
                <?php foreach($cargos as $cargo):
                    if($empleado["CARGO"] == $cargo["DESCRIPCION"]) {
                ?>
                        <option value="<?php echo $cargo["ID"];?>" <?php echo "selected";?>>
                            <?php echo $cargo["DESCRIPCION"]; ?>
                        </option>                                                            
                <?php    } else { ?>
                        <option value="<?php echo $cargo["ID"]; ?>">
                            <?php echo $cargo["DESCRIPCION"]; ?>
                        </option>
                <?php    } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-field col s12">
            <select name="ROL" required>
                <option value="" disabled selected>Seleccione el Rol</option>
                <?php foreach($roles as $rol):
                    if ($empleado["ROL"] == $rol["DESCRIPCION"]) {
                ?>
                        <option value="<?php echo $rol["ID"]; ?>" <?php echo "selected";?>>
                            <?php echo $rol["DESCRIPCION"]; ?>
                        </option>                                                                
                <?php } else { ?>
                    <option value="<?php echo $rol["ID"]; ?>">
                        <?php echo $rol["DESCRIPCION"]; ?>
                    </option>
                <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="usuario" placeholder="Ingrese usuario" name="USUARIO" type="text" class="validate" value="<?php echo $empleado["USUARIO"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input id="password" placeholder="Ingrese clave" name="PASSWORD" type="password" class="validate" value="<?php echo $empleado["PASSWORD"];?>">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="avatar" placeholder="Ingrese nombre de avatar" name="AVATAR" type="text" class="validate" value="<?php echo $empleado["AVATAR"];?>">
        </div>
    </div>    
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-editar-empleado" class="modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar Empleado</a>
        </div>
    </div>
</form>