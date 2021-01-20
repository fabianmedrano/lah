<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/Login.php";

$login = new Login();

if(isset($_REQUEST["submit"])){
    $result = $login->validarSesion($_REQUEST["user"], $_REQUEST["pass"]);
    if($result == 1){
        header("Location: ../../View/Nosotros/nosotros_edit.php");
    }else{
        header("Location: ../../View/Login/Login.php");
    }
}

if(isset($_REQUEST["validarDatos"])){
    $login->validarClave($_REQUEST["dato1"],$_REQUEST["dato2"],$_REQUEST["dato3"]);
    header("Location: ../../View/Login/recuperar.php");
}

if(isset($_REQUEST["cambiarPass"])){
    $pass1 = $_REQUEST["pass1"];
    $pass2 = $_REQUEST["pass2"];

    if($pass1 == $pass2){
        $login->cambiarPass($pass1);
        $_SESSION["alerta"] = null;
        header("Location: ../../View/Login/Login.php");
    }else{
        $_SESSION["alerta"] = 1;
        header("Location: ../../View/Login/recuperar.php");
    }
}
