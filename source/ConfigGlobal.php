<?php

namespace source\Globales;

class ConfigGlobal {

	public function ObtenerConfig() {
		return array(
			"db" => array(
				"nombre"    	=> "dirtytrucksdb",
				"usuario"   	=> "root",
				"password"  	=> "",
				"host"			=> "localhost"
			)
		);
	}

	public function normalizarTexto($input) {
		if(!empty($input)) {
			$texto = strtolower($input); // -->>> esto NO está funcionando!
			$texto = ucfirst($input);  // Primer letra en mayuscula.
			return $texto;
		}
	}	
}