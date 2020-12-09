<?php
require_once "nosotros_controller.php";

if( isset($_REQUEST['accion'] )){

    $controller = new nosotros_controller();

    switch ($_REQUEST['accion']){
        case 'get':
            echo $controller->prueba();
            break;
        default:
            echo "Opcion incorecta";
            break;
    }

}
