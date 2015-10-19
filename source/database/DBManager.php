<?php
namespace source\database;

use source\Globales\ConfigGlobal;
use \PDO;

include_once dirname(dirname(__FILE__)) . '\ConfigGlobal.php';

class DBManager {

	private $configGlobal;
	private $globales;
	private $dbo;

	public function __construct() {

		try {
			$this->configGlobal = new ConfigGlobal();
			$this->globales = $this->configGlobal->ObtenerConfig();

			$this->dbo = new PDO(
				'mysql:host=' . $this->globales["db"]["host"] . ';dbname=' . $this->globales["db"]["nombre"], 
				$this->globales["db"]["usuario"],
				$this->globales["db"]["password"]
			);

			$this->dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function validarEmpleadoLogin($usuario, $password) {

		$query = 'select * from empleado where usuario = :usuario and password = :password';
		try {
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

	public function obtenerEmpleados() {
		$query =
		' 
			select e.ID, e.NOMBRE, e.APELLIDO, e.DNI, e.SEXO, e.FECHA_NACIMIENTO,
			e.FECHA_INGRESO, e.SUELDO, c.DESCRIPCION CARGO, e.USUARIO,
			e.PASSWORD, r.DESCRIPCION ROL
			from empleado e 
			join cargo c on e.ID_CARGO = c.ID
			join rol r on e.ID_ROL = r.ID
		';
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetchAll();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function editarEmpleado() {
		$query = "
			update `EMPLEADO`
			set
			`NOMBRE` = :nombre,
			`APELLIDO` = :apellido,
			`DNI` = :dni,
			`SEXO` = :sexo,
			`FECHA_NACIMIENTO` = :fecha_nacimiento,
			`FECHA_INGRESO` = :fecha_ingreso,
			`SUELDO` = :sueldo,
			`ID_CARGO` = :id_cargo,
			`USUARIO` = :usuario,
			`PASSWORD` = :password,
			`ID_ROL` = :id_rol,
			`ACTIVO` = :activo
			where `ID` = :id;
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $_POST["ID"], PDO::PARAM_INT);
			$stmt->bindParam(':nombre', $_POST["NOMBRE"], PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $_POST["APELLIDO"], PDO::PARAM_STR);
			$stmt->bindParam(':dni', $_POST["DNI"], PDO::PARAM_INT);
			$stmt->bindParam(':sexo', $_POST["SEXO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_nacimiento', $_POST["FECHA_NACIMIENTO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_ingreso', $_POST["FECHA_INGRESO"], PDO::PARAM_STR);
			$stmt->bindParam(':sueldo', $_POST["SUELDO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cargo', $_POST["CARGO"], PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $_POST["USUARIO"], PDO::PARAM_STR);
			$stmt->bindParam(':password', $_POST["PASSWORD"], PDO::PARAM_INT);
			$stmt->bindParam(':id_rol', $_POST["ROL"], PDO::PARAM_INT);
			$stmt->bindParam(':activo', $_POST["ACTIVO"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function eliminarEmpleado($id) {
		try {
			$query = 'delete from empleado where ID = :id';
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$stmt->fetch();
			return true;
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function obtenerCargos() {
		$query = 'select * from cargo';
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetchAll();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function obtenerRoles() {
		$query = 'select * from rol';
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetchAll();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}	
}