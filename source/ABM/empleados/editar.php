<?php
include '..\..\database\DBManager.php';


$db = new DBManager();
$datos = $_POST;
$db->editarEmpleado($datos);