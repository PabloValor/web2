<?php
session_start();
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();
$dato = $_POST["dominio"];

$db->bajaVehiculo($dato);