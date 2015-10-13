<?php
session_start();
include 'database\DBManager.php';
include  'models\Empleado.php';

use source\database\DBManager;
use source\models\Empleado;

$db = new DBManager();

$usuario = $_POST['usuario'];	
$password = $_POST['password'];

$resultado = $db->validarEmpleadoLogin($usuario, $password);

if(isset($usuario) && isset($password)) {
    if($usuario == $resultado['usuario'] && $password == $resultado['password']) {

        $_SESSION['logueado'] = true;

        $_SESSION['Id']             = $resultado['Id'];
        $_SESSION['usuario']        = $resultado['usuario'];
        $_SESSION['password']       = $resultado['password'];
        $_SESSION['nombre']         = $resultado['nombre'];
        $_SESSION['apellido']       = $resultado['apellido'];
        $_SESSION['rol']            = $resultado['rol'];
        $_SESSION['nro_documento']  = $resultado['nro_documento'];

        header("Location: ../index.php");
    } else {
        header('Location: ../login.php?error=true');
    }
}