<?php
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$dominioVehiculo = $_POST["dominio"];

$vehiculo = $db->ObtenerVehiculoPorDominio($dominioVehiculo); 
?>

<form id="formEditarVehiculo">
    <h4>Editar Vehiculo <?php echo $vehiculo["DOMINIO"];?></h4>
    <input type="hidden" name="DOMINIO" value="<?php echo $vehiculo["DOMINIO"]; ?>">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="modelo" placeholder="Ingrese modelo" name="MODELO" type="text" class="validate" value="<?php echo $vehiculo["MODELO"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input id="ano" placeholder="Ingrese año" name="ANO" type="text" class="validate" value="<?php echo $vehiculo["ANO"];?>">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="marca" placeholder="Ingrese marca" name="MARCA" type="text" class="validate" value="<?php echo $vehiculo["MARCA"];?>">
        </div>
        <div class="input-field col s12 m6">
            <input id="nro_chasis" placeholder="Ingrese Nro de Chasis" name="NRO_CHASIS" type="number" class="validate" value="<?php echo $vehiculo["NRO_CHASIS"];?>">
        </div>                                                
    </div>     
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="nro_motor" placeholder="Ingrese Nro de Motor" name="NRO_MOTOR" type="number" class="validate" value="<?php echo $vehiculo["NRO_MOTOR"];?>">
        </div>                                             
    </div>                                       
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" class="btn-editar-vehiculo modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar vehiculo</a>
        </div>
    </div>
</form>