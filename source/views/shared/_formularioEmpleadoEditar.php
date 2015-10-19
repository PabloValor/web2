<form id="formEditarEmpleado">
    <h4>Editar el perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
    <input type="hidden" name="ID" value="<?php echo $empleado["ID"]; ?>">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input placeholder="Ingrese nombre" name="NOMBRE" type="text" class="validate" value="<?php echo $empleado["NOMBRE"];?>">
            <label for="NOMBRE">Nombre</label>
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Ingrese apellido" name="APELLIDO" type="text" class="validate" value="<?php echo $empleado["APELLIDO"];?>">
            <label for="APELLIDO">Apellido</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input placeholder="Ingrese DNI" name="DNI" type="number" class="validate" value="<?php echo $empleado["DNI"];?>">
            <label for="DNI">Número de documento</label>
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Ingrese sueldo" name="SUELDO" type="number" class="validate" value="<?php echo $empleado["SUELDO"];?>">
            <label for="SUELDO">Sueldo</label>
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input name="SEXO" type="radio" value="M" <?php if ($empleado["SEXO"] == 'M') echo "checked"; ?>/>
            <label for="radioMasculino">Masculino</label>                                                
        </div>
        <div class="input-field col s6">
            <input name="SEXO" type="radio" value="F" <?php if ($empleado["SEXO"] == 'F') echo "checked"; ?>/>
            <label for="radioFemenino">Femenino</label>
        </div>                                                
    </div>                                            
    <div class="row">
        <div class="input-field col s12 m6">
            <input placeholder="Fecha de nacimiento" type="date" name="FECHA_NACIMIENTO" class="datepicker" value="">
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Fecha de ingreso" type="date" name="FECHA_INGRESO" class="datepicker" value="">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <select name="CARGO">
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
            <select name="ROL">
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
            <input placeholder="Ingrese usuario" name="USUARIO" type="text" class="validate" value="<?php echo $empleado["USUARIO"];?>">
            <label for="USUARIO">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Ingrese clave" name="PASSWORD" type="password" class="validate" value="<?php echo $empleado["PASSWORD"];?>">
            <label for="PASSWORD">Password</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" class="btn-editar-empleado modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar Empleado</a>
        </div>
    </div>
</form>