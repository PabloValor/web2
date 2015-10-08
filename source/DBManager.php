<?php
namespace DBManager;

class DB {

	private $host;
	private $usuario;
	private $password;
	private $db;
	private $conexion;
	private $usuarios;

	public function __construct($host, $usuario, $password, $db) {
		$this->host = $host;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->db = $db;
		$this->usuarios = null;

		$this->conexion = mysqli_connect($this->host, $this->usuario, $this->password, $this->db) 
			or die ('No se pudo conectar: ' . mysql_error());

		mysqli_select_db($this->conexion, $this->db)
			or die ('No se pudo encontrar la base de datos');
	}

	public function __destruct() {
		mysqli_free_result($this->usuarios);
		mysqli_close($this->conexion);
	}

	if(isset($_GET['accion']) {

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
	}
}