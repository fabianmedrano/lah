<?php


require_once "noticia_controller.php";
$controlador_noticia = new noticia_controller();


if (isset($_REQUEST['accion'])) {



    switch($_REQUEST['accion']) {

        case 'update':
            $controlador_noticia->uptateNoticia($_POST["id_noticia"], $_POST["titulo_noticia"], $_POST["editor_noticia"] ,$_POST["autor_noticia"] );
            break;

        case 'insert':
            $controlador_noticia->insertNoticia($_POST["titulo_noticia"], $_POST["editor_noticia"], $_POST["autor_noticia"]);

            break;

        case 'delete':

            $controlador_noticia->deleteNoticia($_POST["id_noticia"]);

        break;

        case 'obtener_noticias':
            
         $controlador_noticia->getNoticias();
            break;


        default:
            echo ("por aqui");
            //    $controlador_noticia->deleteNoticia($_get["id_noticia"]);
            break;
    }
}
