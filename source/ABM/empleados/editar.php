<?php
include '..\..\database\DBManager.php';

use source\database\DBManager;

$db = new DBManager();

$db->editarEmpleado($_POST);
