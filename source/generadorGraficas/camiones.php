<?php

require_once ('..\lib\jpgraph\jpgraph.php');
require_once ('..\lib\jpgraph\jpgraph_pie.php');
require_once ('..\lib\jpgraph\jpgraph_pie3d.php');
include_once ('..\database\DBManager.php');
if (empty($_SESSION['usuario'])) header("Location: login.php");
$db = new DBManager();

$camiones = $db->obtenerUsosdeCamionesEnAcualAnio();
$camionesMarcas = array();
$camionesCantUsos = array();

foreach($camiones as $camion) {
	array_push($camionesMarcas, $camion["MARCA"] . " " . $camion["MODELO"]);
	array_push($camionesCantUsos, $camion["CANT_VEHICULO_VIAJES"]);
}

$data = $camionesCantUsos;

// Create the Pie Graph. 
$graph = new PieGraph(600,600);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Camiones mas usados en el año " . date("Y"));


// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($camionesMarcas);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();
