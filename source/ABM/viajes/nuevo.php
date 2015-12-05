<?php
session_start();
include '../../database/DBManager.php';


$db = new DBManager();
$db->altaViaje($_POST);