<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();
$db->editarViaje($_POST);