<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();

$listaAlarmas = $db->obtenerAlarmasMantenimientos();

$json = "[";

foreach ($listaAlarmas as $alarma) {
	$objeto = "{" . '"dominio":"' . $alarma["DOMINIO_VEHICULO"] . '",' . '"comentario":"' . $alarma["COMENTARIO"] . '"},';
	$json .= $objeto;
}

$json = substr_replace($json ,"",-1);
$json .= "]";


echo json_encode($json);
