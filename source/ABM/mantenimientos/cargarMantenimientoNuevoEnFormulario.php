<?php
    session_start();
    include '..\..\database\DBManager.php';

    use source\database\DBManager;

    $db = new DBManager();
 
    $dominios = $db->obtenerDominios();
    $empleados = $db->obtenerMecanicos();

?>

<form id="formNuevoMantenimiento">
    <h4>Agregar nuevo Mantenimiento</h4>
    <div class="row">
        <div class="input-field col s12 m6">
            <select name="DOMINIO_VEHICULO" required>
                <option value="" disabled selected>Seleccione dominio afectado</option>
                <?php foreach($dominios as $dominio): ?>
                    <option value="<?php echo $dominio["DOMINIO"]; ?>">
                        <?php echo $dominio["DOMINIO"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>                   
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Fecha" type="date" name="FECHA" required>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="KM_VEHICULO" type="number" class="validate" required>
            <label for="KM_VEHICULO">Kilometros del Vehículo</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="COSTO" type="number" class="validate" required>
            <label for="COSTO">Costo</label>
        </div>                                                
    <div class="row">
        <div class="input-field col s12 m6">
            <select name="EMPLEADO_ENCARGADO" required>
                <option value="" disabled selected>Seleccione mecanico</option>
                <?php foreach($empleados as $empleado): ?>
                    <option value="<?php echo $empleado["ID"]; ?>">
                        <?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>                   
        </div>
    </div>    
        <div class="input-field col s12">
            <input name="COMENTARIOS" type="text" class="validate" required>
            <label for="COMENTARIOS">Trabajo realizado</label>
        </div>
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-nuevo-mantenimiento" class="modal-action modal-close light-blue darken-1 waves-effect waves-light btn-large">Agregar Nuevo Mantenimiento</a>
        </div>
    </div>
</form>