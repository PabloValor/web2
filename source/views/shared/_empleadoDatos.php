<h4>Perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
    <div class="center-align">
        <img class="redondear-imagen" src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="">
    </div>
<h5 class="grey-text"><?php echo $empleado["CARGO"]; ?></h5>
<div class="row">
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">ID: <?php echo $empleado["ID"]; ?></li>
			<li class="collection-item">Nombre: <?php echo $empleado["NOMBRE"]; ?></li>
			<li class="collection-item">Apellido: <?php echo $empleado["APELLIDO"]; ?></li>
			<li class="collection-item">N° Documento: <?php echo $empleado["DNI"]; ?></li>
			<li class="collection-item">Sexo: <?php echo $empleado["SEXO"]; ?></li>
			<li class="collection-item">Fecha de nacimiento: <?php echo $empleado["FECHA_NACIMIENTO"]; ?></li>
			<li class="collection-item">Fecha de ingreso: <?php echo $empleado["FECHA_INGRESO"]; ?></li>
		</ul>		
	</div>
	<div class="col s12 m6">
		<ul class="collection left-align">
			<li class="collection-item">Suedo: $<?php echo $empleado["SUELDO"]; ?>.-</li>
			<li class="collection-item">Cargo: <?php echo $empleado["CARGO"]; ?></li>
			<li class="collection-item">Nombre de Usuario: <?php echo $empleado["USUARIO"]; ?></li>
			<li class="collection-item">Password: <?php echo $empleado["PASSWORD"]; ?></li>
			<li class="collection-item">Rol de Usuario: <?php echo $empleado["ROL"]; ?></li>
			<!--<li class="collection-item">Usuario Activo: <?php echo $empleado["ACTIVO"]; ?></li>-->
		</ul>		
	</div>
</div>