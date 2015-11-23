<?php

namespace source\models\Vehiculo;

class Vehiculo {
	public $dominio;
	public $marca;
	public $ano;
	public $modelo;
	public $nro_chasis;
	public $nro_motor;
	public $activo;

	public function __construct($data = null) {
		if(is_array($data)) {
			$this->dominio = $data['dominio'];
			$this->ano = $data['ano'];
			$this->marca = $data['marca'];
			$this->modelo = $data['modelo'];
			$this->nro_chasis = $data['nro_chasis'];
			$this->nro_motor = $data['nro_motor'];
			$this->activo = $data['activo'];
		}
	}
}