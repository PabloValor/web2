<?php
    session_start();

    include '..\..\database\DBManager.php';

    use source\database\DBManager;

    $db = new DBManager();

  //  $idservice = $_POST["dominio_vehiculo"];

  //  $mantenimiento = $db->altaService($service); 
?>

<form id="">
    <h4>Agregar nuevo mantenimiento</h4>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="dominio_vehiculo" name="DOMINIO_VEHICULO" type="text" class="validate" required>
            <label for="dominio_vehiculo">Dominio</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="km_vehiculo" name="KM_VEHICULO" type="text" class="validate" required>
            <label for="km_vehiculo">Kilometraje</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="FECHA" type="text" class="validate">
            <label for="FECHA">Fecha</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="COSTO" type="text" class="validate">
            <label for="COSTO">Costo</label>
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="ES_INTERNO" type="text" class="validate">
            <label for="ES_INTERNO">Nro.Interno</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="COMENTARIO" type="text" class="validate">
            <label for="COMENTARIO">COMENTARIO</label>
        </div>                                                
    </div>                                          
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-nuevo-vehiculo" class="modal-action modal-close light-blue darken-1 waves-effect waves-light btn-large">Agregar Nuevo Vehiculo</a>
        </div>
    </div>
</form>
    


    