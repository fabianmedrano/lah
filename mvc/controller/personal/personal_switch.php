<?php
require_once "personal_controller.php";

if (isset($_REQUEST['accion'])) {

    $controller = new personal_controller();

    switch ($_REQUEST['accion']) {

        case 'insert':
            $contactos = json_decode($_POST['in_contactos'], true); // array de contactos;

            echo $controller->insertarPersonal(
                $_POST['in_nombre_completo'],
                $_POST['in_select_rol'],
                $contactos
            );
            break;

        case 'update':

            echo $controller->updatePersonal(
                $_POST['id_personal'],
                $_POST['in_nombre_completo'],
                $_POST['in_select_rol']
            );

            break;


        case 'insertContacto':

            $controller->insertContacto(
                $_POST['id_personal'],
                $_POST['contacto'],
                $_POST['tipo_contacto']
            );

            break;

        case 'getRoles':
            $controller->cargarRoles();
            break;

        case 'getPersonal':
            $controller->cargarlistaPersonal();
            break;


        case 'getDatosPersonal':
            $controller->cargarDatosPersonal($_POST['id_persona']);
            break;

        case 'getContactosPersonal':
            $controller->cargarContactosPersonal($_POST['id_persona']);
            break;


        case 'deletePersonal':
            $controller->eliminarPersonal($_POST['id_persona']);
            break;

        case 'deleteContacto':
            $controller->eliminarContactoPersonal($_POST['id_contacto']);
            break;

        case 'getPersonalRol':
            $controller->cargarlistaPersonalROL($_POST['id_rol']);
            break;

        case 'insert_rol':
            $controller->insertarRol($_POST['input_rol']);
            break;

        case 'delete_rol':
            $controller->eliminarRol($_POST['id_rol']);
            break;

        default:
            echo "Opcion incorecta";
            break;
    }
}
