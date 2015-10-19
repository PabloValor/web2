<form id="formNuevoEmpleado">
    <h4>Agregar nuevo Empleado</h4>
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="nombre" name="NOMBRE" type="text" class="validate">
            <label for="nombre">Nombre</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="apellido" name="APELLIDO" type="text" class="validate">
            <label for="apellido">Apellido</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="DNI" type="number" class="validate">
            <label for="DNI">Número de documento</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="SUELDO" type="number" class="validate">
            <label for="SUELDO">Sueldo</label>
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input id="radioMasculino" name="SEXO" type="radio" value="M" checked/>
            <label for="radioMasculino">Masculino</label>                                                
        </div>
        <div class="input-field col s6">
            <input id="radioFemenino" name="SEXO" type="radio" value="F"/>
            <label for="radioFemenino">Femenino</label>
        </div>                                                
    </div>                                            
    <div class="row">
        <div class="input-field col s12 m6">
            <input placeholder="Fecha de nacimiento" type="date" name="FECHA_NACIMIENTO" class="datepicker" value="">
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Fecha de Ingreso" type="date" name="FECHA_INGRESO" class="datepicker" value="">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <select name="CARGO">
                <option value="" disabled selected>Seleccione el Cargo</option>
                <?php foreach($cargos as $cargo): ?>
	                <option value="<?php echo $cargo["ID"]; ?>">
	                    <?php echo $cargo["DESCRIPCION"]; ?>
	                </option>
                <?php endforeach; ?>
            </select>                   
        </div>
        <div class="input-field col s12">
            <select name="ROL">
                <option value="" disabled selected>Seleccione el Rol</option>
                <?php foreach($roles as $rol): ?>
                    <option value="<?php echo $rol["ID"]; ?>">
                        <?php echo $rol["DESCRIPCION"]; ?>
                    </option>                                                                
                <?php endforeach; ?>
            </select>                                                
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="USUARIO" type="text" class="validate">
            <label for="USUARIO">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="PASSWORD" type="password" class="validate">
            <label for="PASSWORD">Password</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" class="btn-nuevo-empleado modal-action modal-close light-blue darken-1 waves-effect waves-light btn-large">Agregar Nuevo Empleado</a>
        </div>
    </div>
</form>