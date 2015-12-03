<?php
    session_start();    
    include '..\..\database\DBManager.php';

    use source\database\DBManager;

    $db = new DBManager();

    $idMantenimiento = $_POST["id"];

    $mantenimiento = $db->ObtenerMantenimientoPorId($idMantenimiento); 
    $empleados = $db->obtenerMecanicos();
?>

<form id="formEditarMantenimiento">
    <h4>Editar ficha de Mantenimiento</h4>
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="dominio_vehiculo" placeholder="Ingrese dominio" name="DOMINIO_VEHICULO" type="text" class="validate" value="<?php echo $mantenimiento["DOMINIO_VEHICULO"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input id="fecha" placeholder="Ingrese fecha" name="FECHA" type="date" class="validate" value="<?php echo $mantenimiento["FECHA"];?>">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="km_vehiculo" placeholder="Ingrese km" name="KM_VEHICULO" type="number" class="validate" value="<?php echo $mantenimiento["KM_VEHICULO"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input id="costo" placeholder="Ingrese costo" name="COSTO" type="number" class="validate" value="<?php echo $mantenimiento["COSTO"];?>">
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <select name="EMPLEADO_ENCARGADO" required>
                <option value="" disabled selected>Seleccione el Rol</option>
                <?php foreach($empleados as $empleado):
                    if ($empleado["ID"] == $mantenimiento["EMPLEADO_ENCARGADO"]) {
                ?>
                    <option value="<?php echo $empleado["ID"]; ?>" <?php echo "selected";?>>
                        <?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?>                        
                    </option>
                <?php } else { ?>
                    <option value="<?php echo $empleado["ID"]; ?>">
                        <?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?>                        
                    </option>
                <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
        <div class="input-field col s12 m6">
            <input id="comentario" placeholder="Ingrese el trabajo realizado" name="COMENTARIO" type="text" class="validate" value="<?php echo $mantenimiento["COMENTARIO"];?>">
        </div>
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-editar-mantenimiento" class="modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar Mantenimiento</a>
        </div>
    </div>
</form>