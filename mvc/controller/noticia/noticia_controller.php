<?php

require_once "../../model/BindParam.php";
require_once "../../model/query_database.php";

class noticia_controller
{

    function __construct()
    {
    }


    static public function uptateNoticia($id, $titulo, $texto, $autor)
    {

        
        $binParam = new BindParam();

        $query = "CALL db_liceo_web.sp_actualizarNoticia(?,?,?,?);"; // revisar  porque no inserta el nacimiento
        $binParam->add('i',$id);
        $binParam->add('s', $titulo);
        $binParam->add('s', $texto);
        $binParam->add('s', $autor);

        $repuesta = (query_database::CUD($query, $binParam));

        echo json_encode($repuesta);
      
    }

    static public function getNoticiaID($id)
    {

        $query = "call db_liceo_web.sp_obtenerNoticiaId(? );";
        $binParam = new BindParam();
        $binParam->add('i', $id);

        
        $noticia =query_database::find($query, $binParam)[0];

     
        return $noticia ;
  
    }

    static public function getNoticiasPaginado($pagina, $noticias_pagina)
    {
        $noticias_pagina = 5;
        $cantidad_noticias = self::getNoticiasCantidad();
        $paginas = ceil($cantidad_noticias / $noticias_pagina);

        $respuesta = self::getNoticiasPaginadoD(($pagina - 1) * $noticias_pagina, $noticias_pagina);

        return array('noticias' => $respuesta, 'paginas' => $paginas);
    }


    static public function getNoticias()
    {

        $query = "call db_liceo_web.sp_obtenerNoticias();";
        $grados = query_database::findAll($query);
        echo json_encode($grados);
    
    }

    static public function insertNoticia($titulo, $texto, $autor)
    {


        $binParam = new BindParam();

        $query = "CALL sp_insertNoticia(?,?,?);"; // revisar  porque no inserta el nacimiento
        $binParam->add('s', $titulo);
        $binParam->add('s', $texto);
        $binParam->add('s', $autor);

        $repuesta = (query_database::CUD($query, $binParam));

        echo json_encode($repuesta);
    }


    static public function deleteNoticia($id)
    {

        
        $query = "call db_liceo_web.sp_eliminarNoticia(?);";
        $binParam = new BindParam();
        $binParam->add('i', $id);
        echo json_encode(query_database::CUD($query, $binParam));
      
    }

    static public function getNoticiasCantidad()
    {
        $query = "call db_liceo_web.sp_obetenerCantidadNoticias();";
        $cantidad = query_database::findAll($query);
        $cantidad =( ($cantidad[0]) ["cantidad"] );
        return $cantidad ;
    }

    static public function getLastIdNoticia()
    {
        $query = "call db_liceo_web.sp_obetenerAutoIncrementableNoticia();";
        $id = query_database::findAll($query);

        return (($id[0])["AUTO_INCREMENT"]);
    }

    static public function getNoticiasPaginadoD($pagina, $cantidad)
    {


        $query = "call db_liceo_web.sp_obtenerNoticiaspaginado(?, ? );";
        $binParam = new BindParam();
        $binParam->add('i', $pagina);
        $binParam->add('i', $cantidad);

        
        $noticias =query_database::find($query, $binParam);

     
        return $noticias ;
    }

    // eliminar carpetas e imagenes de las noticias
    static function deleteDirectory($idnoticia)
    {
        $dir = '../../public/img/noticias/noticias/' . ($idnoticia);
        if (!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
            if ($current != '.' && $current != '..') {
                if (!@unlink($dir . '/' . $current))
                    self::deleteDirectory($dir . '/' . $current);
            }
        }
        closedir($dh);
        @rmdir($dir);
    }

    // Creacion de carpetas para las imagenes
    static public function createFile()
    {
        $respuesta = self::getLastIdNoticia();
        $carpeta = '../../public/img/noticias/noticias/' . ((int)$respuesta);

        if ($respuesta == NULL) $respuesta = 0;
        //  $carpeta = $_SERVER["DOCUMENT_ROOT"].'/img_noticias/'.((int)$respuesta+1);   

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        } else {
        }
        return $respuesta;
    }
}
