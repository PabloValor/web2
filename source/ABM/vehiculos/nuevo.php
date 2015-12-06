<?php
session_start();
include '../../database/DBManager.php';
if (empty($_SESSION['usuario'])) header("Location: login.php");

$db = new DBManager();
$datos = $_POST;
$db->altaVehiculo($datos);