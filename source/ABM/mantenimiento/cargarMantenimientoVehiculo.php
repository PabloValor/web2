<?php
    session_start();

    include '..\..\database\DBManager.php';

    use source\database\DBManager;

    $db = new DBManager();

    $idservice = $_POST["dominio_vehiculo"];

    $mantenimiento = $db->altaService($service); 
?>

<form id="formEditarVehiculo">
    <h4>Editar ficha del Vehículo:</h4>
    <h4><?php echo $mantenimiento["DOMINIO_VEHICULO"];?></h4>
    <input type="hidden" name="DOMINIO_VEHICULO" value="<?php echo $mantenimiento["DOMINIO_VEHICULO"]; ?>">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="id" placeholder="Ingrese dominio a reparar" name="DOMINIO_VEHICULO" type="text" class="validate" value="<?php echo $mantenimiento["DOMINIO_VEHICULO"];?>" required disabled>
        </div>
        <div class="input-field col s12 m6">
            <input id="fecha" placeholder="Ingrese fecha" name="FECHA" type="number" class="validate" value="<?php echo $mantenimiento["FECHA"];?>" required>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="km_vehiculo" placeholder="Ingrese Kilometraje" name="KM_VEHICULO" type="text" class="validate" value="<?php echo $mantenimiento["KM_VEHICULO"];?>">
        </div>                                                
        <div class="input-field col s12 m6">
            <input id="costo" placeholder="Ingrese costo" name="COSTO" type="text" class="validate" value="<?php echo $mantenimiento["COSTO"];?>">
        </div>        
    </div>                                        
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="es_interno" placeholder="Ingrese intero" name="ES_INTERNO" type="number" class="validate" value="<?php echo $mantenimiento["ES_INTERNO"];?>">
        </div>                                                
        <div class="input-field col s12 m6">
            <input id="COMENTARIO" placeholder="Ingrese comentario" name="COMENTARIO" type="number" class="validate" value="<?php echo $mantenimiento["COMENTARIO"];?>">
        </div>        
    </div>                                        
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-editar-vehiculo" class="modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar vehículo</a>
        </div>
    </div>    
</form>