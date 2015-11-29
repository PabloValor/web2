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
			e.FECHA_INGRESO, e.SUELDO, c.DESCRIPCION CARGO, e.USUARIO, e.AVATAR,
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

	public function obtenerEmpleadosFiltrados($datoEmpleado) {
		$query =
		" 
			select e.ID, e.NOMBRE, e.APELLIDO, e.DNI, e.SEXO, e.FECHA_NACIMIENTO,
			e.FECHA_INGRESO, e.SUELDO, c.DESCRIPCION CARGO, e.USUARIO, e.AVATAR,
			e.PASSWORD, r.DESCRIPCION ROL
			from empleado e 
			join cargo c on e.ID_CARGO = c.ID
			join rol r on e.ID_ROL = r.ID
			where e.NOMBRE = :datoEmpleado or e.apellido = :datoEmpleado
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':datoEmpleado', $datoEmpleado, PDO::PARAM_STR);
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
			e.FECHA_INGRESO, e.SUELDO, c.DESCRIPCION CARGO, e.USUARIO, e.AVATAR,
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
				`USUARIO`, `PASSWORD`, `ID_ROL`, `AVATAR`)
			values(:nombre, :apellido, :dni, :sexo, :fecha_nacimiento,
				:fecha_ingreso, :sueldo,:id_cargo, :usuario, :password,	:id_rol, :avatar)
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':nombre', $this->configGlobal->normalizarTexto($datos["NOMBRE"]), PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $this->configGlobal->normalizarTexto($datos["APELLIDO"]), PDO::PARAM_STR);
			$stmt->bindParam(':dni', $datos["DNI"], PDO::PARAM_INT);
			$stmt->bindParam(':sexo', $datos["SEXO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_nacimiento', $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_ingreso', $datos["FECHA_INGRESO"], PDO::PARAM_STR);
			$stmt->bindParam(':sueldo', $datos["SUELDO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cargo', $datos["CARGO"], PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $datos["USUARIO"], PDO::PARAM_STR);
			$stmt->bindParam(':password', $datos["PASSWORD"], PDO::PARAM_INT);
			$stmt->bindParam(':id_rol', $datos["ROL"], PDO::PARAM_INT);
			$stmt->bindParam(':avatar', $datos["AVATAR"], PDO::PARAM_STR);
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
			`ID_ROL` = :id_rol,
			`AVATAR` = :avatar
			where `ID` = :id;
		";

		// `ACTIVO` = :activo  <--- agregarlo a la query 
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $datos["ID"], PDO::PARAM_INT);
			$stmt->bindParam(':nombre', $this->configGlobal->normalizarTexto($datos["NOMBRE"]), PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $this->configGlobal->normalizarTexto($datos["APELLIDO"]), PDO::PARAM_STR);
			$stmt->bindParam(':dni', $datos["DNI"], PDO::PARAM_INT);
			$stmt->bindParam(':sexo', $datos["SEXO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_nacimiento', $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_ingreso', $datos["FECHA_INGRESO"], PDO::PARAM_STR);
			$stmt->bindParam(':sueldo', $datos["SUELDO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cargo', $datos["CARGO"], PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $datos["USUARIO"], PDO::PARAM_STR);
			$stmt->bindParam(':password', $datos["PASSWORD"], PDO::PARAM_INT);
			$stmt->bindParam(':id_rol', $datos["ROL"], PDO::PARAM_INT);
			$stmt->bindParam(':avatar', $datos["AVATAR"], PDO::PARAM_STR);
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

	/* Viajes */

	public function obtenerViajes() {
		$query =
		' 
			select vi.ID, des.DIRECCION, des.NUMERO, loc.DESCRIPCION LOCALIDAD, pais.DESCRIPCION PAIS, emp.NOMBRE, emp.APELLIDO, cli.RAZON_SOCIAL CLIENTE
			from viaje vi
			join vehiculo ve on vi.DOMINIO_VEHICULO = ve.DOMINIO
			join destino des on vi.ID_DESTINO = des.ID
			join localidad loc on des.ID_LOCALIDAD = loc.ID
			join pais on des.ID_PAIS = pais.ID
			join cliente cli on vi.ID_CLIENTE = cli.ID
			join acoplado aco on vi.ID_TIPO_ACOPLADO = aco.ID
			join empleado emp on vi.ID_EMPLEADO = emp.ID
			where emp.ID_CARGO = 1
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

	public function ObtenerViajePorId($idViaje) {
		$query =
		' 
			select vi.ID, vi.FECHA_PROGRAMADA, vi.FECHA_INICIO, vi.FECHA_FIN,
			vi.CANT_KILOMETROS,des.ID DESTINO_ID ,des.DIRECCION, des.NUMERO, loc.DESCRIPCION LOCALIDAD,
			pais.DESCRIPCION PAIS, emp.ID CHOFER_ID, emp.NOMBRE CHOFER_NOMBRE, emp.APELLIDO CHOFER_APELLIDO,
			cli.ID CLIENTE_ID, cli.RAZON_SOCIAL CLIENTE,aco.ID ACOPLADO_ID, aco.DESCRIPCION ACOPLADO, ve.DOMINIO DOMINIO ,ve.MARCA VEHICULO_MARCA,
			ve.MODELO VEHICULO_MODELO
			from viaje vi
			join vehiculo ve on vi.DOMINIO_VEHICULO = ve.DOMINIO
			join destino des on vi.ID_DESTINO = des.ID
			join localidad loc on des.ID_LOCALIDAD = loc.ID
			join pais on des.ID_PAIS = pais.ID
			join cliente cli on vi.ID_CLIENTE = cli.ID
			join acoplado aco on vi.ID_TIPO_ACOPLADO = aco.ID
			join empleado emp on vi.ID_EMPLEADO = emp.ID
			where vi.ID = :id
		';
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $idViaje, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetch();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}	

	public function bajaViaje($id) {
		try {
			$query = 'delete from viaje where ID = :id';
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function editarViaje($datos) {
		$query = "
			update `viaje`
			set
			`DOMINIO_VEHICULO` = :dominio_vehiculo,
			`ID_DESTINO` = :id_destino,
			`ID_CLIENTE` = :id_cliente,
			`FECHA_PROGRAMADA` = :fecha_programada,
			`FECHA_INICIO` = :fecha_inicio,
			`FECHA_FIN` = :fecha_fin,
			`CANT_KILOMETROS` = :cant_kilometros,
			`ID_TIPO_ACOPLADO` = :id_acoplado,
			`ID_EMPLEADO` = :id_empleado
			where `ID` = :id;
		";

		// `ACTIVO` = :activo  <--- agregarlo a la query 
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':id', $datos["ID"], PDO::PARAM_INT);
			$stmt->bindParam(':dominio_vehiculo', $datos["DOMINIO_VEHICULO"], PDO::PARAM_STR);			
			$stmt->bindParam(':id_destino', $datos["ID_DESTINO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cliente', $datos["ID_CLIENTE"], PDO::PARAM_INT);
			$stmt->bindParam(':fecha_programada', $datos["FECHA_PROGRAMADA"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_inicio', $datos["FECHA_INICIO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_fin', $datos["FECHA_FIN"], PDO::PARAM_STR);
			$stmt->bindParam(':cant_kilometros', $datos["CANT_KILOMETROS"], PDO::PARAM_INT);
			$stmt->bindParam(':id_acoplado', $datos["ID_ACOPLADO"], PDO::PARAM_INT);				
			$stmt->bindParam(':id_empleado', $datos["ID_EMPLEADO"], PDO::PARAM_INT);
			//$stmt->bindParam(':activo', $datos["ACTIVO"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}	

	public function obtenerDestinos() {
		$query = '
			select des.ID, des.DIRECCION, des.NUMERO, loc.DESCRIPCION LOCALIDAD, prov.DESCRIPCION PROVINCIA, pais.DESCRIPCION PAIS
			from destino des
			join localidad loc on des.ID_LOCALIDAD = loc.ID
			join provincia prov on des.ID_PROV = prov.ID
			join pais on des.ID_PAIS = pais.ID
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

	public function obtenerClientes() {
		$query = 'select * from cliente';
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

	public function obtenerAcoplados() {
		$query = 'select * from acoplado';
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

	public function obtenerChoferes() {
		$query = 'select * from empleado where ID_CARGO = 1';
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

	public function obtenerLocalidades() {
		$query = 'select * from localidad';
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

	public function obtenerProvincias() {
		$query = 'select * from provincia';
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

	public function obtenerPaises() {
		$query = 'select * from pais';
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

	public function altaViaje($datos) {
		$query = "
			insert into viaje (DOMINIO_VEHICULO, ID_EMPLEADO, ID_DESTINO, ID_CLIENTE, FECHA_PROGRAMADA,
				FECHA_INICIO, FECHA_FIN, CANT_KILOMETROS, ID_TIPO_ACOPLADO)
			values (:dominio_vehiculo, :id_empleado, :id_destino, :id_cliente, :fecha_programada, :fecha_inicio,
				:fecha_fin, :cant_kilometros, :id_tipo_acoplado)
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio_vehiculo', $datos["DOMINIO_VEHICULO"], PDO::PARAM_STR);
			$stmt->bindParam(':id_empleado', $datos["ID_EMPLEADO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_destino', $datos["ID_DESTINO"], PDO::PARAM_INT);
			$stmt->bindParam(':id_cliente', $datos["ID_CLIENTE"], PDO::PARAM_INT);
			$stmt->bindParam(':fecha_programada', $datos["FECHA_PROGRAMADA"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_inicio', $datos["FECHA_INICIO"], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_fin', $datos["FECHA_FIN"], PDO::PARAM_STR);
			$stmt->bindParam(':cant_kilometros', $datos["CANT_KILOMETROS"], PDO::PARAM_INT);
			$stmt->bindParam(':id_tipo_acoplado', $datos["ID_ACOPLADO"], PDO::PARAM_INT);
			//$stmt->bindParam(':activo', $datos["ACTIVO"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}		


	/* Vehículos */

	public function obtenerVehiculos() {
		$query =
		' 
			select v.DOMINIO, v.MARCA, v.MODELO, v.ANO, v.NRO_CHASIS, v.NRO_MOTOR
			from vehiculo v
			where v.ACTIVO = 1
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

	public function obtenerVehiculosFiltrados($dominio) {
		$query =
		" 
			select v.DOMINIO, v.MARCA, v.MODELO, v.ANO, v.NRO_CHASIS, v.NRO_MOTOR
			from vehiculo v
			where v.ACTIVO = 1
			and v.DOMINIO = :dominio
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio', $dominio, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetchAll();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function ObtenerVehiculoPorDominio($dominioVehiculo) {
		$query =
		' 
			select v.DOMINIO, v.MARCA, v.MODELO, v.ANO, v.NRO_CHASIS, v.NRO_MOTOR
			from vehiculo v 
			where v.DOMINIO = :dominio
		';
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio', $dominioVehiculo, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt->fetch();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function bajaVehiculo($dominio) {
		try {
			$query = 'UPDATE vehiculo SET activo = 0 WHERE dominio = :dominio';
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio', $dominio);
			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}
	}

	public function altaVehiculo($datos) {
		$query = "
			insert into `VEHICULO`(`DOMINIO`, `MODELO`, `MARCA`, `ANO`,
				`NRO_CHASIS`, `NRO_MOTOR`)
			values(:dominio, :modelo, :marca, :ano, :nro_chasis,
				:nro_motor)
		";
		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio', $datos["DOMINIO"], PDO::PARAM_STR);
			$stmt->bindParam(':modelo', $datos["MODELO"], PDO::PARAM_STR);
			$stmt->bindParam(':marca', $datos["MARCA"], PDO::PARAM_STR);
			$stmt->bindParam(':ano', $datos["ANO"], PDO::PARAM_INT);
			$stmt->bindParam(':nro_chasis', $datos["NRO_CHASIS"], PDO::PARAM_INT);
			$stmt->bindParam(':nro_motor', $datos["NRO_MOTOR"], PDO::PARAM_INT);
			//$stmt->bindParam(':activo', $datos["ACTIVO"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}

	public function editarVehiculo($datos) {
		$query = "
			update `VEHICULO`
			set
			`MODELO` = :modelo,
			`MARCA` = :marca,
			`ANO` = :ano,
			`NRO_CHASIS` = :nro_chasis,
			`NRO_MOTOR` = :nro_motor
			 where `DOMINIO` = :dominio;
		";

		try {
			$stmt = $this->dbo->prepare($query);
			$stmt->bindParam(':dominio', $datos["DOMINIO"], PDO::PARAM_STR);
			$stmt->bindParam(':modelo', $datos["MODELO"], PDO::PARAM_STR);
			$stmt->bindParam(':marca', $datos["MARCA"], PDO::PARAM_STR);
			$stmt->bindParam(':ano', $datos["ANO"], PDO::PARAM_INT);
			$stmt->bindParam(':nro_chasis', $datos["NRO_CHASIS"], PDO::PARAM_INT);
			$stmt->bindParam(':nro_motor', $datos["NRO_MOTOR"], PDO::PARAM_INT);

			$stmt->execute();
		}
		catch(PDOException $ex) {
			print "Chan: " . $ex->getMessage();
			die();
		}		
	}
	/*FIN VEHICULOS*/

}