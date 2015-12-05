<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();

$paradas = $db->obtenerParadas($_POST['id']);
$coordenadas = array();


foreach ($paradas as $parada) {
    array_push($coordenadas, $parada["LATITUD"], $parada["LONGITUD"]);
}

$json = 
    '{"latitud1":'. $coordenadas[0] .', "longitud1":'. $coordenadas[1] .', "latitud2":' . $coordenadas[2] .', "longitud2":' . $coordenadas[3] . '}';

echo json_encode($json);

