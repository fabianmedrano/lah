<?php
require_once "estudiante_controller.php";

if (isset($_REQUEST['accion'])) {

    $controller = new estudiante_controller();

    switch ($_REQUEST['accion']) {
        
        case 'insert':
            $contactos = json_decode($_POST['in_contactos'], true); // array de contactos;
            
            echo $controller->insertarEstudiante(
                $_POST['in_nombre_completo'],
                $_POST['in_cedula'],
                $_POST['in_fecha_nacimiento'],
                $_POST['in_select_ano'],
                $contactos
            );
            break;
        
        case 'update':

            echo $controller->updateEstudiante(
                $_POST['id_estudiante'],
                $_POST['in_nombre_completo'],
                $_POST['in_cedula'],
                $_POST['in_fecha_nacimiento'],
                $_POST['in_select_ano']
            );

            break;

            
        case 'insertContacto':

                $controller->insertContacto(    
                    $_POST['id_estudiante'],
                    $_POST['contacto'],
                    $_POST['tipo_contacto']);
                  
                break;

        case 'getGrados':
            $controller->cargarGrados();
            break;

        case 'getEstudiantes':
            $controller->cargarlistaEstudiantes();
            break;

            
        case 'getDatosEstudiante':
            $controller->cargarDatosEstudiante(  $_POST['id_persona']);
            break;

        case 'getContactosEstudiante':
            $controller->cargarContactosEstudiante(  $_POST['id_persona']);
            break;

            
        case 'deleteEstudiante':
            $controller->eliminarEstudiante(  $_POST['id_persona']);
            break;

        case 'deleteContacto':
            $controller->eliminarContactoEstudiante(  $_POST['id_contacto']);
            break;
    
                
        default:
            echo "Opcion incorecta";
            break;
    }
}
