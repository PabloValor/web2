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
    if($usuario == $resultado['USUARIO'] && $password == $resultado['PASSWORD']) {

        $_SESSION['logueado'] = true;

        $_SESSION['id']             = $resultado['ID'];
        $_SESSION['usuario']        = $resultado['USUARIO'];
        $_SESSION['password']       = $resultado['PASSWORD'];
        $_SESSION['nombre']         = $resultado['NOMBRE'];
        $_SESSION['apellido']       = $resultado['APELLIDO'];
        $_SESSION['id_rol']         = $resultado['ID_ROL'];
        $_SESSION['id_cargo']       = $resultado['ID_CARGO'];
        $_SESSION['dni']            = $resultado['DNI'];

        header("Location: ../index.php");
    } else {
        header('Location: ../login.php?error=true');
    }
}