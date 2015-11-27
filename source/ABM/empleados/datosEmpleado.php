<?php
	session_start();
    include '..\..\database\DBManager.php';
    include '..\..\lib\phpqrcode\qrlib.php';

    use source\database\DBManager;

    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $empleado = $db->ObtenerEmpleadoPorId($idUsuario); 
    $cargos = $db->obtenerCargos();
    $roles = $db->obtenerRoles();
?>

<h4>Perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
    <div class="center-align">
        <img class="avatar-perfil-usuario" src="assets/imagenes/avatares/empleados/<?php echo $empleado["AVATAR"];?>.jpg" alt="<?php echo $empleado["AVATAR"];?>">
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
			<!--<li class="collection-item">Usuario Activo:</li>-->
		</ul>		
	</div>
</div>