<?php
session_start();
require('../../lib/fpdf/fpdf.php');
include '../../database/DBManager.php';


$db = new DBManager();
//$dato = $_POST["id"];
$empleados = $db->obtenerEmpleados(); 

	class PDF extends FPDF
	{
	// Page header
	function Header()
	{
	    // Logo
	    //$this->Image('http://localhost/web2/web2/assets/imagenes/avatar.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(50);
	    // Title
		$this->Cell(100,10,'EMPLEADOS DE LA EMPRESA',1,0,'C');
	    // Line break
	    $this->Ln(10);

	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}

	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);


	foreach($empleados as $empleado):

		//$pdf->Cell(1,8, $pdf->Image('http://localhost/web2/web2/assets/imagenes/avatar.png', $pdf->GetX() + 80, null, 30));
		$pdf->Cell(0,0,'',1,1,'C');
	    $pdf->Cell(0,8,'',0,1);
	    $pdf->Cell(0,8,'NOMBRE : ' . $empleado["NOMBRE"],0,1);
	    $pdf->Cell(0,8,'APELLIDO : ' . $empleado["APELLIDO"],0,1);
	    $pdf->Cell(0,8,'DNI : ' . $empleado["DNI"],0,1);
		$pdf->Cell(0,8,'SEXO : ' . $empleado["SEXO"],0,1);
		$pdf->Cell(0,8,'FECHA DE NACIMIENTO : ' . $empleado["FECHA_NACIMIENTO"],0,1);
		$pdf->Cell(0,8,'FECHA DE INGRESO : ' . $empleado["FECHA_INGRESO"],0,1);
		$pdf->Cell(0,8,'SUELDO : $' . $empleado["SUELDO"],0,1);
		$pdf->Cell(0,8,'CARGO : ' . $empleado["CARGO"],0,1);
		$pdf->Cell(0,8,'ROL : ' . $empleado["ROL"],0,1);
		$pdf->Ln();
		If ($empleado <> end($empleados))
			$pdf->Cell(0,0,'',1,1,'C');

	endforeach;

	$pdf->Output();
?>