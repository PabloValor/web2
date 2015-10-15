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

}