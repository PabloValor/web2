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
			join rol r on e.ID_CARGO = r.ID
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
}