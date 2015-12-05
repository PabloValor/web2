<?php
session_start();
include '../../database/DBManager.php';


$db = new DBManager();
$datos = $_POST;
$db->editarMantenimiento($datos);