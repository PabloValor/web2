<?php
session_start();
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$dummyUsuario = 'admin';
$dummyPassword = 123;

if(isset($usuario) && isset($password)) {
    if($usuario == $dummyUsuario && $password == $dummyPassword) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $password;
        header("Location: ../index.php");
    } else {
        header('Location: ../login.php?error=1');
    }
}
