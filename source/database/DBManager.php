<?php
namespace source\database;

use \PDO;

class DBManager {

	private $host;
	private $usuario;
	private $password;
	private $db;
	private $dbo;

	public function __construct($host, $usuario, $password, $db) {
		
		$this->host = $host;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->db = $db;

		try {
			$this->dbo = new PDO(
				'mysql:host=' . $this->host . ';dbname=' . $this->db, 
				$this->usuario,
				$this->password
			);
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function validarEmpleadoLogin($usuario, $password) {

		try {validarEmpleadoLogin
			$query = 'select * from empleado where usuario = :usuario AND password = :password';
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':usuario', $usuario);
			$stmt->bindParam(':password', $password);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetch();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	/*if(isset($_GET['accion']) {

		$accion = $_GET['accion'];

		switch ($accion) {

			case "agregar":
				agregarEmpleado();
				break;

			case "actualizar":
				actualizarEmpleado($_POST['idEmpleado']);
				break;

			case "eliminar":
				eliminarEmpleado($_POST['idEmpleado']);
				break;
			
			default:
				break;
		}		
	}


	public function obtenerEmpleados() {
		$query = "select * from empleado";
		$this->usuarios  = mysqli_query($this->conexion, $query) or die ('Falló la consulta ' . mysql_error());
		return $this->usuarios;
	}

	private function agregarEmpleado() {
		// crear un obj Empleado y llenarlo con cada elemento el $_POST[]
	}

	private function actualizarEmpleado($idEmpleado) {

	}

	private function eliminarEmpleado($idEmpleado) {
		$query = "delete from empleado
			where Id = ". $idEmpleado . ";";
		$this->usuarios  = mysqli_query($this->conexion, $query) or die ('Falló la consulta ' . mysql_error());
	}*/
}