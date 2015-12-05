<?php
    session_start();
    include '../../database/DBManager.php';

    $db = new DBManager();
 
    $vehiculos = $db->obtenerVehiculos();
    $destinos = $db->obtenerDestinos();
    $clientes = $db->obtenerClientes();
    $acoplados = $db->obtenerAcoplados();
    $choferes = $db->obtenerChoferes();
?>

<form id="formNuevoViaje">
    <h4>Agregar nuevo Viaje</h4>
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col s12">
            <select name="DOMINIO_VEHICULO" required>
                <option value="" disabled selected>Seleccione el Vehículo</option>
                <?php foreach($vehiculos as $vehiculo): ?>
                    <option value="<?php echo $vehiculo["DOMINIO"]; ?>">
                        <?php echo $vehiculo["MARCA"]; echo " "; echo $vehiculo["MODELO"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <select name="ID_EMPLEADO" required>
                <option value="" disabled selected>Seleccione el Chofer</option>
                <?php foreach($choferes as $chofer): ?>
                    <option value="<?php echo $chofer["ID"]; ?>">
                        <?php echo $chofer["NOMBRE"]; echo " "; echo $chofer["APELLIDO"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>        
    </div>    
    <div class="row">
        <div class="input-field col s12">
            <select name="ID_DESTINO" required>
                <option value="" disabled selected>Seleccione el Destino</option>
                <?php foreach($destinos as $destino): ?>
                    <option value="<?php echo $destino["ID"]; ?>">
                        <?php echo $destino["DIRECCION"]; echo " "; echo $destino["NUMERO"]; echo ", "; echo $destino["LOCALIDAD"]; echo ", "; echo $destino["PROVINCIA"]; echo ", "; echo $destino["PAIS"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <select name="ID_CLIENTE" required>
                <option value="" disabled selected>Seleccione el Cliente</option>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?php echo $cliente["ID"]; ?>">
                        <?php echo $cliente["RAZON_SOCIAL"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <p class="center-align">Ingrese Fecha Programada</p>
            <input type="date" name="FECHA_PROGRAMADA">
        </div>        
    </div>
    <div class="row">
        <div class="input-field col s12">
            <p class="center-align">Ingrese Fecha Inicio</p>
            <input type="date" name="FECHA_INICIO">
        </div>        
    </div>
    <div class="row">
        <div class="input-field col s12">
            <p class="center-align">Ingrese Fecha Fin</p>
            <input type="date" name="FECHA_FIN">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input  placeholder="Cantidad de Kilometros" type="text" name="CANT_KILOMETROS">
        </div>
        <div class="input-field col s12 m6">
            <select name="ID_ACOPLADO" required>
                <option value="" disabled selected>Seleccione el Acoplado</option>
                <?php foreach($acoplados as $acoplado): ?>
                    <option value="<?php echo $acoplado["ID"]; ?>">
                        <?php echo $acoplado["DESCRIPCION"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <a href="#!" id="btn-nuevo-viaje" class="modal-action modal-close light-blue darken-1 waves-effect waves-light btn-large">Agregar Nuevo Viaje</a>
        </div>
    </div>
</form>