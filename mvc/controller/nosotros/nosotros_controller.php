<?php

require_once "../../model/BindParam.php";
require_once "../../model/query_database.php";

class nosotros_controller
{

    function __construct()
    {
  
    }


    public function uptateNosotros($texto)
    {

        $binParam = new BindParam();
        $query = "call sp_actualizarNosotros(?)";
        $binParam->add('s', $texto);

        echo json_encode(query_database::CUD($query, $binParam));
    }
    public function getNosotros()
    {

        $query = "call db_liceo_web.sp_obtenerNosotros();";
        $grados = query_database::findAll($query);
        echo json_encode($grados);

    }

    public function insertContacto($tipo, $contacto)
    {
        $respuesta = DataNosotros::insertContacto($tipo, $contacto);
        return $respuesta;
    }


    public function getTelefonos()
    {
        $respuesta = DataNosotros::getTelefonos();
        return $respuesta;
    }
    
    public function getRedes()
    {
        $respuesta = DataNosotros::getRedes();
        return $respuesta;
    }
    public function getCorreos()
    {
        $respuesta = DataNosotros::getCorreos();
        return $respuesta;
    }

    static public function deleteContacto($id)
    {
        $respuesta = DataNosotros::deleteContactoID($id);
    
        exit(json_encode($respuesta)); 
    }

    
    static public function updateContacto($id,$contacto)
    {
            $respuesta = DataNosotros::updateContacto($id,$contacto);
            return $respuesta; 
    }
        static public function escribirDirreccion($direccion)
    {
            $respuesta = DataNosotros::escribirDirreccion($direccion);
            return $respuesta; 
    }
    
}
