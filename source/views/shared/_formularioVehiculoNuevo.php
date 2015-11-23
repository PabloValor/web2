<form id="formNuevoVehiculo">
    <h4>Agregar nuevo Vehiculo</h4>
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="dominio" name="DOMINIO" type="text" class="validate" required>
            <label for="dominio">Dominio</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="marca" name="MARCA" type="text" class="validate" required>
            <label for="marca">Marca</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="MODELO" type="text" class="validate">
            <label for="MODELO">Modelo</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="ANO" type="text" class="validate">
            <label for="ANO">Año</label>
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input name="NRO_CHASIS" type="text" class="validate">
            <label for="NRO_CHASIS">Nro.Chasis</label>
        </div>
        <div class="input-field col s12 m6">
            <input name="NRO_MOTOR" type="text" class="validate">
            <label for="NRO_MOTOR">Nro.Motor</label>
        </div>                                                
    </div>                                           
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-nuevo-vehiculo" class="modal-action modal-close light-blue darken-1 waves-effect waves-light btn-large">Agregar Nuevo Vehiculo</a>
        </div>
    </div>
</form>btn-nuevo-lista