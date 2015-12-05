<?php
require_once ('..\lib\jpgraph\jpgraph.php');
require_once ('..\lib\jpgraph\jpgraph_pie.php');
require_once ('..\lib\jpgraph\jpgraph_pie3d.php');
include_once ('..\database\DBManager.php');

$db = new DBManager();

$clientes = $db->obtenerClientesEnAcualAnio();
$clientesNombres = array();
$clientesUsos = array();

foreach($clientes as $cliente) {
	array_push($clientesNombres, $cliente["NOMBRE"]);
	array_push($clientesUsos, $cliente["CLIENTE_VECES"]);
}

$data = $clientesUsos;

// Create the Pie Graph.
$graph = new PieGraph(600,600);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Clientes con mas entregas realizas en el año " . date("Y"));


// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($clientesNombres);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();
