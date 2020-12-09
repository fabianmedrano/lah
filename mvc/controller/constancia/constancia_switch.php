<?php
require_once "constancia_controller.php";

if (isset($_REQUEST['accion'])) {

    $controller = new constancia_controller();

    switch ($_REQUEST['accion']) {

        case 'solicitud':


            $controller->solicitarConstancia(
                $_POST['input_solicitud_constancia']
            );
            break;



        case 'getConstancias':
            $controller->cargarlistaConstancias();
            break;

            

        case 'cambiarConstancia':
            $controller->cambiarConstancia( $_POST['id']);
            break;

        default:
            echo "Opcion incorecta";
            break;
    }
}
