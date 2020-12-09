<?php
require_once "../../model/BindParam.php";
require_once "../../model/query_database.php";


class constancia_controller
{


    public function getDatosConstancia($cedula)
    {
       //$constancia-> ( array('nombre'=>'na', 'cedula'=>'71151', 'año'=>'7'));
       $query = "call db_liceo_web.sp_obtenerDatosConstacia(?);";
       $binParam = new BindParam();
       $binParam->add('s',$cedula); 
       
       return (query_database::find($query,$binParam) );
	}

    public function solicitarConstancia($cedula)
    {

/*IMPORTANTE : VALIDAR EXISTENCIA DE CEDULA EN BASE 
VALIDAR DESDE LA VASE QUE NO SE PERMITA DUPICAR LA SOLICITD
*/

$result = null;
       $query = "call db_liceo_web.sp_solicitarConstancia(?);";
       $binParam = new BindParam();
       $binParam->add('s',$cedula); 
       echo json_encode  (query_database::CUD($query,$binParam) );
  
	}


    public function cargarlistaConstancias()
    {
        $query = "call db_liceo_web.sp_obtenerConstancias();";
        echo json_encode(query_database::findAll($query));
    }

    
    public function cambiarConstancia($id)
    {
        $query = "call db_liceo_web.sp_cambiarConstancia(?);";
        $binParam = new BindParam();
       $binParam->add('i',$id); 
        echo json_encode(query_database::delete_update_insert($query,$binParam));
    }
    

}
