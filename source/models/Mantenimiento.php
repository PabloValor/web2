<?php

namespace source\models\Mantenimiento;

class Mantenimiento {
	public $id;
	public $dominio_vehiculo;
	public $fecha;
	public $km_vehiculo;
	public $costo;
	public $es_interno;
	public $comentario;

	public function __construct($data = null) {
		if(is_array($data)) {
			$this->id = $data['id'];
			$this->dominio_vehiculo = $data['dominio_vehiculo'];
			$this->fecha = $data['fecha'];
			$this->km_vehiculo = $data['km_vehiculo'];
			$this->costo = $data['costo'];
			$this->es_interno = $data['es_interno'];
			$this->comentario = $data['comentario'];
		}
	}
}