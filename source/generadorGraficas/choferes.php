<?php

require_once ('..\lib\jpgraph\jpgraph.php');
require_once ('..\lib\jpgraph\jpgraph_pie.php');
require_once ('..\lib\jpgraph\jpgraph_pie3d.php');
include_once ('..\database\DBManager.php');

use source\database\DBManager;

$db = new DBManager();

$choferes = $db->obtenerViajesChoferesEnAcualAnio();
$choferesNombres = array();
$choferesVeces = array();

foreach($choferes as $chofer) {
	array_push($choferesNombres, $chofer["NOMBRE"] . " " . $chofer["APELLIDO"]);
	array_push($choferesVeces, $chofer["CHOFER_VECES"]);
}

$data = $choferesVeces;

// Create the Pie Graph. 
$graph = new PieGraph(600,600);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Choferes con mas viajes realizados en el año " . date("Y"));

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($choferesNombres);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();
