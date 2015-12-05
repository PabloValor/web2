<?php
	session_start();
	include '../../database/DBManager.php';

    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $mantenimiento = $db->obtenerMantenimientoPorID($idUsuario); 
?>

<h4>Ficha del Mantenimiento</h4>
<div class="row">
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">ID: <?php echo $mantenimiento["ID"]; ?></li>
			<li class="collection-item">Dominio: <?php echo $mantenimiento["DOMINIO_VEHICULO"]; ?></li>
			<li class="collection-item">Fecha: <?php echo $mantenimiento["FECHA"]; ?></li>
		</ul>		
	</div>
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">Costo: $<?php echo $mantenimiento["COSTO"]; ?>.-</li>
			<li class="collection-item">Kilometros: <?php echo $mantenimiento["KM_VEHICULO"]; ?></li>
		    <li class="collection-item">Mecanico encargado: <?php echo $mantenimiento["NOMBRE"]; ?>&nbsp;<?php echo $mantenimiento["APELLIDO"]; ?></li>	
		</ul>		
	</div>
	<div class="col s12">
		<ul class="collection left-align">
	   		<li class="collection-item">Trabajo realizado: <?php echo $mantenimiento["COMENTARIO"]; ?></li>
		</ul>
	</div>
</div>