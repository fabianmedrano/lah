<?php
require_once "nosotros_controller.php";

if (isset($_REQUEST['accion'])) {

    $controlador_nosotros = new nosotros_controller();

    switch ($_REQUEST['accion']) {
        case 'update':
            $controlador_nosotros->uptateNosotros($_POST["editor_nosotros"]);

            //  header('Location: ' . BASE_URL . '/View/Nosotros/nosotros_edit.php');

            break;
        case 'guardar_contacto':
            $controlador_nosotros->insertContacto($_POST["select_tipo_contacto"], $_POST["input_contacto"]);

            //  header('Location: ' . BASE_URL . '/View/Nosotros/nosotros_edit.php');

            break;

        case 'getTipoContacto':
            $controlador_nosotros->cargarTipoContactos();
            break;


        case 'View':
            $controlador_nosotros->getNosotros($_POST["editor_nosotros"]);
            break;

        case 'get_telefonos':

        $controlador_nosotros->getTelefonos();
            break;

        case 'get_redes':
         $controlador_nosotros->getRedes();
            break;

        case 'get_correos':
           $controlador_nosotros->getCorreos();
            break;

        case 'eliminar_contacto':
            $controlador_nosotros->deleteContacto($_POST["id_contacto"]);

            break;
        case 'editar_contacto':
            $controlador_nosotros->updateContacto($_POST["id_contacto"], $_POST["input_contacto_edit"]);

            break;
        case 'guardar_direccion':
            $controlador_nosotros->escribirDirreccion($_REQUEST["direccion"]);

            break;

        default:

            break;
    }
}
