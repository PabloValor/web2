<?php
include '..\database\DBManager.php';

use source\database\DBManager;


if(isset($_GET['accion'])) {

		$accion = $_GET['accion'];

		switch ($accion) {

			case "agregar":
				agregarVehiculo();
				break;

			case "editar":
				editarVehiculo($_POST['dominio']);
				break;

			case "eliminar":
				eliminarVehiculo($_POST['dominio']);
				break;
			
			default:
				break;
		}		
}	

/*function obtenerEmpleados() {
		$query = "select * from empleado";
		$stmt = $this->dbo->prepare($query);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt->fetch();
}*/

function agregarVehiculo() {
	// crear un obj Empleado y llenarlo con cada elemento el $_POST[]
}

function editarVehiculo($dominio) {
	$db = new DBManager('localhost', 'root', '', 'dirtytrucksdb');
	
	echo "Se llama a editarEmpleado()";
}

function eliminarVehiculo($dominio) {
	$db = new DBManager('localhost', 'root', '', 'dirtytrucksdb');

	$resultado = $db->eliminarVehiculo($dominio);
	if($resultado) {
		echo "Se borró el usuario correctamente";	
	}
	
}