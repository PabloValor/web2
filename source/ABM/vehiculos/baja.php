<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();
$dato = $_POST["dominio"];

$db->bajaVehiculo($dato);