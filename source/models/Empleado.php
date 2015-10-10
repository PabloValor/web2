<?php

namespace source\models\Empleado;

class Empleado {
	public $Id;
	public $nombre;
	public $apellido;
	public $nro_documento;
	public $rol;
	public $usuario;
	public $password;

	public function __construct($data = null) {
		if(is_array($data)) {
			$this->id = $data['id'];
			$this->nombre = $data['nombre'];
			$this->apellido = $data['apellido'];
			$this->nro_documento = $data['nro_documento'];
			$this->rol = $data['rol'];
			$this->usuario = $data['usuario'];
			$this->password = $data['password'];
		}
	}
}