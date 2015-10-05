<?php
namespace DBManager;

class DB {

	private $host;
	private $usuario;
	private $password;
	private $db;
	private $conexion;

	public function __construct($host, $usuario, $password, $db) {
		$this->host = $host;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->db = $db;
		$this->usuarios = null;

		$this->conexion = mysqli_connect($host, $usuario, $password, $db) or die ('No se pudo conectar: ' . mysql_error());
		mysqli_select_db($this->conexion, $db) or die ('No se pudo encontrar la base de datos');
	}

	public function __desctuct() {
		mysqli_free_result($this->usuarios);
		mysqli_close($this->conexion);
	}

	public function obtenerEmpleados() {
		$query = "select * from empleado";
		$this->usuarios  = mysqli_query($this->conexion, $query) or die ('Falló la consulta ' . mysql_error());
		return $this->usuarios;
	}

}