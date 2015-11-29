<?php
	session_start();
    include '..\..\database\DBManager.php';

    use source\database\DBManager;

    $db = new DBManager();

    $idViaje = $_POST["id"];

    $viaje = $db->ObtenerViajePorId($idViaje); 
?>

<h4>Datos de Viaje</h4>
<div class="row">
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">Id viaje: <?php echo $viaje["ID"]; ?></li>
			<li class="collection-item">Direccion: <?php echo $viaje["DIRECCION"]; ?></li>
			<li class="collection-item">Altura: <?php echo $viaje["NUMERO"]; ?></li>
			<li class="collection-item">Localidad: <?php echo $viaje["LOCALIDAD"]; ?></li>
			<li class="collection-item">Pais: <?php echo $viaje["PAIS"]; ?></li>
			<li class="collection-item">Camión: <?php echo $viaje["VEHICULO_MARCA"]; echo " "; echo $viaje["VEHICULO_MODELO"]; ?></li>
			<li class="collection-item">Acoplado Tipo: <?php echo $viaje["ACOPLADO"]; ?></li>
		</ul>		
	</div>
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">Cantidad de Kilometros: <?php echo $viaje["CANT_KILOMETROS"]; ?></li>
			<li class="collection-item">Chofer: <?php echo $viaje["CHOFER_NOMBRE"]; echo " "; echo $viaje["CHOFER_APELLIDO"]; ?></li>
			<li class="collection-item">Cliente: <?php echo $viaje["CLIENTE"]; ?></li>
			<li class="collection-item">Fecha Programada: <?php echo $viaje["FECHA_PROGRAMADA"]; ?></li>
			<li class="collection-item">Fecha de Inicio: <?php echo $viaje["FECHA_INICIO"]; ?></li>
			<li class="collection-item">Fecha de Fin: <?php echo $viaje["FECHA_FIN"]; ?></li>
			<!--<li class="collection-item">Usuario Activo:</li>-->
		</ul>		
	</div>
</div>