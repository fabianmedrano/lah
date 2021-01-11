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
        $nosotros = query_database::findAll($query);
      return(($nosotros[0])['texto']);

    }

    public function insertContacto($tipo, $contacto) /** SIGUITE DE PASO REVISAR BASE DE DATOS */
    {
        $binParam = new BindParam();
        $query = "call sp_insertarContacto(?,?)";
        $binParam->add('i', 1); // IMPORTANTE  ID DE LA INSTITUCION ES EL 1
        $binParam->add('s', $contacto);
        $binParam->add('i', $tipo);

        echo json_encode(query_database::CUD($query, $binParam));
        
    }


    public function getTelefonos()  {
        $binParam = new BindParam();
        $query = "call db_liceo_web.sp_obtenerContacto(?,?);";
        $binParam->add('i', 1); // IMPORTANTE  ID DE LA INSTITUCION ES EL 1
        $binParam->add('i', 1);// telefono es 1
        
        $teletonos =query_database::find($query, $binParam) ;
        echo json_encode( $teletonos);
    }
    public function getRedes()
    {
        $binParam = new BindParam();
        $query = "call db_liceo_web.sp_obtenerRedes(?,?);";
        $binParam->add('i', 1); // IMPORTANTE  ID DE LA INSTITUCION ES EL 1
        $binParam->add('i', 1);// telefono es 1tiene que ser espesifico para esto
        $teletonos =query_database::find($query, $binParam) ;
        echo json_encode( $teletonos);
    }
    public function getCorreos()
    {
        $binParam = new BindParam();
        $query = "call db_liceo_web.sp_obtenerContacto(?,?);";
        $binParam->add('i', 1); // IMPORTANTE  ID DE LA INSTITUCION ES EL 1
        $binParam->add('i', 2);// telefono es 1
        
        $correos =query_database::find($query, $binParam) ;
        echo json_encode( $correos);
    }

    static public function deleteContacto($id)
    {
        $query = "call db_liceo_web.sp_eliminarContacto(?);";
        $binParam = new BindParam();
        $binParam->add('i',$id); 
        echo json_encode(query_database::delete_update_insert($query,$binParam) );
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
