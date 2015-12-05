<?php
session_start();
include '../../database/DBManager.php';

$db = new DBManager();

$db->bajaViaje($_POST["id"]);