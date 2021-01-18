<?php
require_once "../../model/BindParam.php";
require_once "../../model/query_database.php";

class estudiante_controller
{

    public function insertarEstudiante($nombre, $cedula, $nacimiento, $seccion_ano, $contactos)
    {



      


        $binParam = new BindParam();

           
            $query = "call sp_insertarEstudiante(?,?,?,?)"; // revisar  porque no inserta el nacimiento
            $binParam->add('s', $nombre);
            $binParam->add('s', $cedula);
            $binParam->add('s', $nacimiento);
            $binParam->add('i', (int)$seccion_ano);

            $repuestaE = (query_database::CUD($query, $binParam));


            if (($repuestaE['mysqli'])['status'] == 0) { // if respuesta status != 0
              
                unset($binParam);
                $binParam = null;
              $binParam = new BindParam();

                // obtener ultimo id
                $query = "call sp_obetenerAutoIncrementablePersona()"; 
                $id =(query_database::find($query, $binParam))[0];

$id =$id['AUTO_INCREMENT']-1;

                foreach ((array) $contactos as $contacto) {

                    unset($binParam);
                    $binParam = null;
                    $binParam = new BindParam();

                    $tipo = ($contacto['tipo'] != 'CORREO') ?  1 :  2;
                    $query = "call sp_insertarContacto(?,?,?)";
                    $binParam->add('i', $id);
                    $binParam->add('s', $contacto['contacto']);
                    $binParam->add('i', $tipo);

                    $repuestaC =  query_database::CUD($query, $binParam);
                }

        }
       
       echo json_encode($repuestaE);
    }


    public function updateEstudiante($id_estudiante, $nombre, $cedula, $nacimiento, $seccion_ano)
    {

        $binParam = new BindParam();
        $query = "call sp_actualizarEstudiante(?,?,?,?,?)";
        $binParam->add('i', $id_estudiante);
        $binParam->add('s', $nombre);
        $binParam->add('s', $cedula);
        $binParam->add('s', $nacimiento);
        $binParam->add('i', (int)$seccion_ano);

        echo json_encode(query_database::CUD($query, $binParam));
    }


    public function insertContacto($id, $contacto, $tipo)
    {
        $binParam = new BindParam();
        $query = "call sp_insertarContacto(?,?,?)";
        $tipo_contacto = ($tipo != 'CORREO') ?  1 :  2;
        $binParam->add('i', $id);
        $binParam->add('s', $contacto);
        $binParam->add('i', $tipo_contacto);
        echo json_encode(query_database::CUD($query, $binParam));
    }


    public function eliminarContactoEstudiante($id)
    {
        $query = "call db_liceo_web.sp_eliminarContacto(?);";
        $binParam = new BindParam();
        $binParam->add('i', $id);

        echo json_encode(query_database::CUD($query, $binParam));
    }


    public function cargarGrados()
    {
        $query = "call db_liceo_web.sp_obtenerGrados();";
        $grados = query_database::findAll($query);
        echo json_encode($grados);
    }


    public function cargarlistaEstudiantes()
    {
        $query = "call db_liceo_web.sp_obtenerEstudiantes();";
        echo json_encode(query_database::findAll($query));
    }



    public function cargarDatosEstudiante($id)
    {
        $query = "call db_liceo_web.sp_obtenerDatosEstudiante(?);";
        $binParam = new BindParam();
        $binParam->add('i', $id);
        echo json_encode(query_database::find($query, $binParam));
    }

    public function cargarContactosEstudiante($id)
    {
        $query = "call db_liceo_web.sp_obtenerContactosEstudiante(?);";
        $binParam = new BindParam();
        $binParam->add('i', $id);
        echo json_encode(query_database::find($query, $binParam));
    }
    public function eliminarEstudiante($id)
    {
        $query = "call db_liceo_web.sp_eliminarEstudiante(?);";
        $binParam = new BindParam();
        $binParam->add('i', $id);
        echo json_encode(query_database::CUD($query, $binParam));
    }
    public function pasarGrado()
    {
        $query = "call db_liceo_web.sp_pasarDeGrado();";
        $binParam = new BindParam();
        echo json_encode(query_database::delete_update_insert($query,$binParam) );
    }
}
