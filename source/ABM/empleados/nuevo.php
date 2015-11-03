<?php
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();
$datos = $_POST;
$db->altaEmpleado($datos);