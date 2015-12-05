<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();
$dato = $_POST["id"];

$db->bajaMantenimiento($dato);