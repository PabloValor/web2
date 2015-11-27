<?php
    include '..\..\database\DBManager.php';
    include '..\..\lib\phpqrcode\qrlib.php';

    use source\database\DBManager;

    $db = new DBManager();

  
    $dominioVehiculo = $_POST["dominio"];
    $codetext = 'DEMO -'.$dominioVehiculo;
    $vehiculo = $db->ObtenerVehiculoPorDominio($dominioVehiculo); 

?>

<h4>Ficha del Vehículo</h4>
    <div class="center-align">
        <img class="redondear-imagen" src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="">
    </div>
<h5 class="grey-text"><?php echo $vehiculo["DOMINIO"]; ?></h5>
<h5 class="redondear-imagen"><?php echo $vehiculo["DOMINIO"]; ?></h5> <!--Aca se mostraria el codigo Qr -->

<div class="row">
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">DOMINIO: <?php echo $vehiculo["DOMINIO"]; ?></li>
			<li class="collection-item">Marca: <?php echo $vehiculo["MARCA"]; ?></li>
			<li class="collection-item">Nro.Chasis: <?php echo $vehiculo["NRO_CHASIS"]; ?></li>
		</ul>		
	</div>
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">Año: <?php echo $vehiculo["ANO"]; ?></li>
			<li class="collection-item">Modelo: <?php echo $vehiculo["MODELO"]; ?></li>
			<li class="collection-item">Nro.Motor: <?php echo $vehiculo["NRO_MOTOR"]; ?></li>
			<!--<li class="collection-item">Usuario Activo:</li>-->
		</ul>		
	</div>
</div>