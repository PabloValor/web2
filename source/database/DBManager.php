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

	public function ObtenerEmpleadoPorId($idEmpleado) {
		$query =
		' 
			select e.ID, e.NOMBRE, e.APELLIDO, e.DNI, e.SEXO, e.FECHA_NACIMIENTO,
			e.FECHA_INGRESO, e.SUELDO, c.DESCRIPCION CARGO, e.USUARIO,
			e.PASSWORD, r.DESCRIPCION ROL
			from empleado e 
			join cargo c on e.ID_CARGO = c.ID
			join rol r on e.ID_ROL = r.ID
			where e.ID = :id
		';
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $idEmpleado, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetch();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function altaEmpleado($datos) {
		$query = "
			insert into `EMPLEADO`(`NOMBRE`, `APELLIDO`, `DNI`, `SEXO`,
				`FECHA_NACIMIENTO`, `FECHA_INGRESO`, `SUELDO`, `ID_CARGO`,
				`USUARIO`, `PASSWORD`, `ID_ROL`)
			values(:nombre, :apellido, :dni, :sexo, :fecha_nacimiento,
				:fecha_ingreso, :sueldo,:id_cargo, :usuario, :password,	:id_rol)
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':nombre', $datos["NOMBRE"], PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $datos["APELLIDO"], PDO::PARAM_STR);
			$stmt->bindParam(':dni', $datos["DNI"], PDO::PARAM_INT);
			$stmt->bindParam(':sexo', $datos["SEXO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_nacimiento', $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_ingreso', $datos["FECHA_INGRESO"], PDO::PARAM_STR);
			$stmt->bindParam(':sueldo', $datos["SUELDO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cargo', $datos["CARGO"], PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $datos["USUARIO"], PDO::PARAM_STR);
			$stmt->bindParam(':password', $datos["PASSWORD"], PDO::PARAM_INT);
			$stmt->bindParam(':id_rol', $datos["ROL"], PDO::PARAM_INT);
			//$stmt->bindParam(':activo', $datos["ACTIVO"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function editarEmpleado($datos) {
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
			`ID_ROL` = :id_rol
			where `ID` = :id;
		";

		// `ACTIVO` = :activo  <--- agregarlo a la query 
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $datos["ID"], PDO::PARAM_INT);
			$stmt->bindParam(':nombre', $datos["NOMBRE"], PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $datos["APELLIDO"], PDO::PARAM_STR);
			$stmt->bindParam(':dni', $datos["DNI"], PDO::PARAM_INT);
			$stmt->bindParam(':sexo', $datos["SEXO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_nacimiento', $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_ingreso', $datos["FECHA_INGRESO"], PDO::PARAM_STR);
			$stmt->bindParam(':sueldo', $datos["SUELDO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cargo', $datos["CARGO"], PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $datos["USUARIO"], PDO::PARAM_STR);
			$stmt->bindParam(':password', $datos["PASSWORD"], PDO::PARAM_INT);
			$stmt->bindParam(':id_rol', $datos["ROL"], PDO::PARAM_INT);
			//$stmt->bindParam(':activo', $datos["ACTIVO"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function bajaEmpleado($id) {
		try {
			$query = 'delete from empleado where ID = :id';
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
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