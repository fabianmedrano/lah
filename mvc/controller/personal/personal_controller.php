<?php
require_once "../../model/BindParam.php";
require_once "../../model/query_database.php";

class personal_controller
{

    public function insertarPersonal($nombre, $funcion ,$contactos){
        $resultado = null;
        $binParam = new BindParam();
        $query = "call sp_insertarFuncionario(?,?)";
        $binParam->add('s',$nombre); 
        $binParam->add('i', $funcion);
     
        $repuesta = (query_database::CUD($query, $binParam));


        if (($repuesta['mysqli'])['status'] == 0) { // if respuesta status != 0
              
            unset($binParam);
            $binParam = null;
            $binParam = new BindParam();
            $query = "call sp_obetenerAutoIncrementablePersona()"; 
            $id =(query_database::find($query, $binParam))[0];
            $id =$id['AUTO_INCREMENT']-1;   


            foreach ( (array) $contactos as $contacto) 
            {
                
                unset($binParam );
                $binParam = null;
                $binParam = new BindParam();
                
                $tipo =($contacto['tipo'] != 'CORREO')?  1 :  2;
                $query = "call sp_insertarContacto(?,?,?)";
                $binParam->add('i', $id); 
                $binParam->add('s', $contacto['contacto']);
                $binParam->add('i', $tipo); 
                $repuestaC =  query_database::CUD($query, $binParam);
            }

    }
   
   echo json_encode($repuesta);
    
    }

    
    public function updatePersonal($id_personal,$nombre, $rol){
       

     
        $binParam = new BindParam();
        $query = "call sp_actualizarFuncionario(?,?,?)";
        $binParam->add('i',(int)$id_personal); 
        $binParam->add('s',$nombre); 
        $binParam->add('i',(int) $rol);
     
        echo  json_encode (query_database::CUD($query, $binParam)); // revisar esta respuesta por que actualiza y estatus es 0 ver como manipular stats desde la vase de datos
    }


    public function insertContacto($id , $contacto, $tipo)
    {   
        $binParam = new BindParam();   
        $query = "call sp_insertarContacto(?,?,?)";
        $tipo_contacto =($tipo!= 'CORREO')?  1 :  2;
        $binParam->add('i', $id); 
        $binParam->add('s', $contacto);
        $binParam->add('i', $tipo_contacto); 
        echo json_encode(query_database::delete_update_insert($query, $binParam));
    }


    public function eliminarContactoPersonal($id)
    {
        $query = "call db_liceo_web.sp_eliminarContacto(?);";
        $binParam = new BindParam();
        $binParam->add('i',$id); 
        echo json_encode(query_database::delete_update_insert($query,$binParam) );
    }


    public function cargarRoles()
    {
        $query = "call db_liceo_web.sp_obtenerRoles();";
        $roles =query_database::findAll($query) ;
        echo json_encode( $roles);
    }
    
    
    public function cargarlistaPersonal()
    {
        $query = "call sp_obtenerPersonal();";
        echo json_encode(query_database::findAll($query) );
    }
  
    public function   cargarlistaPersonalROL($id)
    {
        $query = "call db_liceo_web.sp_obtenerPersonalRol(?);";
        $binParam = new BindParam();
        $binParam->add('i',$id); 
        echo json_encode(query_database::find($query,$binParam) );
    }
    
    public function cargarDatosPersonal($id)
    {
        $query = "call db_liceo_web.sp_optenerDatosFuncionario(?);";
        $binParam = new BindParam();
        $binParam->add('i',$id); 
        echo json_encode(query_database::find($query,$binParam) );
    }
    
    public function cargarContactosPersonal($id)
    {
        $query = "call db_liceo_web.sp_obtenerContactosEstudiante(?);";
        $binParam = new BindParam();
        $binParam->add('i',$id); 
        echo json_encode(query_database::find($query,$binParam) );
    }
    public function eliminarPersonal($id)
    {
        $query = "call db_liceo_web.sp_eliminarFuncionario(?);";
        $binParam = new BindParam();
        $binParam->add('i',$id); 
        echo json_encode(query_database::CUD($query,$binParam) );
    } 
    
    

}
