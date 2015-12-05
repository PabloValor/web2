<?php
class ConfigGlobal {

	public function ObtenerConfig() {

		if($_SERVER["SERVER_ADDR"] == "::1" || $_SERVER["SERVER_ADDR"] == "127.0.01") {
			// Entorno Local
			$entorno =  array(
				"db" => array(
					"nombre"    	=> "dirtytrucksdb",
					"usuario"   	=> "root",
					"password"  	=> "",
					"host"			=> "localhost"
				)
			);
		} else {
			// Entorno Productivo
			$entorno =  array(
				"db" => array(
					"nombre"    	=> "a5687295_db",
					"usuario"   	=> "a5687295_pablo",
					"password"  	=> "",
					"host"			=> "mysql13.000webhost.com"
				)
			);
		}

		return $entorno;
	}

	public function normalizarTexto($input) {
		if(!empty($input)) {
			$texto = strtolower($input); // -->>> esto NO está funcionando!
			$texto = ucfirst($input);  // Primer letra en mayuscula.
			return $texto;
		}
	}	
}