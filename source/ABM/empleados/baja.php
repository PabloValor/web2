<?php
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();
$dato = $_POST["id"];

$db->bajaEmpleado($dato);