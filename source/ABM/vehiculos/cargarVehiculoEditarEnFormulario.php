<?php
    session_start();

    include '../../database/DBManager.php';

    $db = new DBManager();

    $dominioVehiculo = $_POST["dominio"];

    $vehiculo = $db->ObtenervehiculoPorDominio($dominioVehiculo); 
?>

<form id="formEditarVehiculo">
    <h4>Editar ficha del Vehículo:</h4>
    <h4><?php echo $vehiculo["DOMINIO"];?></h4>
    <input type="hidden" name="DOMINIO" value="<?php echo $vehiculo["DOMINIO"]; ?>">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="dominio" placeholder="Ingrese dominio" name="DOMINIO" type="text" class="validate" value="<?php echo $vehiculo["DOMINIO"];?>" required disabled>
        </div>
        <div class="input-field col s12 m6">
            <input id="ano" placeholder="Ingrese año" name="ANO" type="number" class="validate" value="<?php echo $vehiculo["ANO"];?>" required>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="marca" placeholder="Ingrese marca" name="MARCA" type="text" class="validate" value="<?php echo $vehiculo["MARCA"];?>">
        </div>                                                
        <div class="input-field col s12 m6">
            <input id="modelo" placeholder="Ingrese modelo" name="MODELO" type="text" class="validate" value="<?php echo $vehiculo["MODELO"];?>">
        </div>        
    </div>                                        
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="nro_chasis" placeholder="Ingrese nro.chasis" name="NRO_CHASIS" type="number" class="validate" value="<?php echo $vehiculo["NRO_CHASIS"];?>">
        </div>                                                
        <div class="input-field col s12 m6">
            <input id="nro_motor" placeholder="Ingrese nro.motor" name="NRO_MOTOR" type="number" class="validate" value="<?php echo $vehiculo["NRO_MOTOR"];?>">
        </div>        
    </div>                                        
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-editar-vehiculo" class="modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar vehículo</a>
        </div>
    </div>    
</form>