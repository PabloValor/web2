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

	public function eliminarEmpleado($id) {
		try {
			$query = 'delete from empleado where Id = :id';
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


	/**/
}