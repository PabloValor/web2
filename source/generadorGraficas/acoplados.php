<?php
require_once ('../lib/jpgraph/jpgraph.php');
require_once ('../lib/jpgraph/jpgraph_pie.php');
require_once ('../lib/jpgraph/jpgraph_pie3d.php');
include_once ('../database/DBManager.php');

$db = new DBManager();

$acoplados = $db->obtenerAcopladosUsadosEnAcualAnio();
$acopladosNombres = array();
$acopladosUsos = array();

foreach($acoplados as $acoplado) {
	array_push($acopladosNombres, $acoplado["DESCRIPCION"]);
	array_push($acopladosUsos, $acoplado["VECES"]);
}

$data = $acopladosUsos;

// Create the Pie Graph.
$graph = new PieGraph(600,600);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Acoplados mas usados en viajes en el año " . date("Y"));

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($acopladosNombres);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();
