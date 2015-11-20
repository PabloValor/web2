<form id="formNuevoVehiculo">
    <h4>Agregar nuevo Vehículo</h4>
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="dominio" name="DOMINIO" type="text" class="validate">
            <label for="dominio">Dominio</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="modelo" name="MODELO" type="text" class="validate">
            <label for="modelo">Modelo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="marca" name="MARCA" type="text" class="validate">
            <label for="marca">Marca</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="ano" name="ANO" type="text" class="validate">
            <label for="ano">Año</label>
        </div>
    </div>
   <div class="row">
        <div class="input-field col s12 m6">
            <input id="nro_chasis" name="NRO_CHASIS" type="text" class="validate">
            <label for="nro_chasis">Nro de Chasis</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="nro_motor" name="NRO_MOTOR" type="text" class="validate">
            <label for="nro_motor">Nro de Motor</label>
        </div>
    </div>                                           
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" class="btn-nuevo-vehiculo modal-action modal-close light-blue darken-1 waves-effect waves-light btn-large">Agregar Nuevo Vehículo</a>
        </div>
    </div>
</form>