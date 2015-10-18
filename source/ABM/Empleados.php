<?php
include '..\database\DBManager.php';

use source\database\DBManager;


if(isset($_GET['accion'])) {

		$accion = $_GET['accion'];

		switch ($accion) {

			case "agregar":
				agregarEmpleado();
				break;

			case "editar":
				editarEmpleado($_POST['id']);
				break;

			case "eliminar":
				eliminarEmpleado($_POST['id']);
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

function agregarEmpleado() {
	// crear un obj Empleado y llenarlo con cada elemento el $_POST[]
}


function eliminarEmpleado($id) {
	$db = new DBManager();

	$resultado = $db->eliminarEmpleado($id);
	if($resultado) {
		echo "Se borró el usuario correctamente";	
	}
	
}