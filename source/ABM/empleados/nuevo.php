<?php
session_start();
include '..\..\database\DBManager.php';


$db = new DBManager();
$db->altaEmpleado($_POST);