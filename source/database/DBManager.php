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
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	/*EMPLEADOS*/
	public function validarEmpleadoLogin($usuario, $password) {

		try {
			$query = 'select * from empleado where usuario = :usuario and password = :password';
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
		try {
			$query = 'select * from empleado';
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

	public function eliminarEmpleado($id) {
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
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetch();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}	

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


	/*VEHICULOS*/

	public function obtenerVehiculos() {
		try {
			$query = 'select * from vehiculo';
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
	
	public function eliminarVehiculo($dominio) {
		try {
			$query = 'delete from empleado where DOMINIO = :dominio';
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio', $dominio);
			$stmt->execute();
			$stmt->fetch();
			return true;
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

}