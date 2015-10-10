<?php
include 'database\DBManager.php';
include  'models\Empleado.php';

use source\database\DBManager;
use source\models\Empleado;

$db = new DBManager('localhost', 'root', '', 'dirtytrucksdb');

$usuario = $_POST['usuario'];	
$password = $_POST['password'];

$resultado = $db->validarUsuarioLogin($usuario, $password);

if(isset($usuario) && isset($password)) {
    if($usuario == $resultado['usuario'] && $password == $resultado['password']) {

    	session_start();
        $_SESSION['logueado'] = true;
        header("Location: ../index.php");
    } else {
        header('Location: ../login.php?error=true');
    }
}
