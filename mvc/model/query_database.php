<?php
require_once "conexion.php";
require_once "BindParam.php";

error_reporting(E_ALL ^ E_WARNING ); // estar consiente de que no va a mostrar los warning

class query_database
{


    public static function CUD($query, $params)
    {
        $conn = null;
        $result = null;
        try {
            $conn = new conexion();

            $stmt = $conn->getConexion()->prepare($query);
            call_user_func_array( array($stmt, 'bind_param'), $params->get() );
            $estado=  $stmt->execute();

            /**esto podria ser $result =  $conn->getResultado(); y ya */
            
            if($estado){
                $result = $result = [
                    'status' => 1,
                    'msm' => "Éxito",
                    'mysqli'=> $conn->getResultado()/** status 0, msm "" */
                ];
            }else{
               
                $result =  $conn->getResultado();
                
            }

        } catch (Exception $e) {
            $result = $conn->getResultado();
        } finally {
            $conn->cerrarConexion();
           
        }

        return $result;
    }

    /********************************************************************************************************** */



    public static function delete_update_insert($query, $params)
    {
        $conn = null;
        $result = null;
        try {
            $conn = new conexion();

            $stmt = $conn->getConexion()->prepare($query);
            call_user_func_array( array($stmt, 'bind_param'), $params->get() );
            $estado=  $stmt->execute();
            echo($estado); // estado es true o false dependiendo del exito
            if($stmt->affected_rows > 0){
                $result = $result = [
                    'status' => 1,
                    'msm' => "Éxito"
                ];
            }else{
                $result = $conn->getResultado();
            }

        } catch (Exception $e) {
            $result = $conn->getResultado();
        } finally {
            $conn->cerrarConexion();
        }

        return $result;
    }

 


    public static function findAll($query){
        $conn = null;
        $result = null;
        try {
            $conn = new conexion();

            $stmt = $conn->getConexion()->prepare($query);
            $stmt->execute();

            $meta = $stmt->result_metadata();
            while ($field = $meta->fetch_field())
            {
                $params[] = &$row[$field->name];
            }

            call_user_func_array(array($stmt, 'bind_result'), $params);

            while ($stmt->fetch()) {
                foreach($row as $key => $val)
                {
                    $c[$key] = $val;
                }
                $result[] = $c;
            }

        }catch (Exception $e){
            $result = $conn->getResultado();
        } finally {
            $conn->cerrarConexion();
        }
        return $result;
    }

    //[{"id":1, "nombre":"CRIS", ...}, {}, ...]

    public static function find($query, $params){
        $conn = null;
        $result = null;
        try {
            $conn = new conexion();

            $stmt = $conn->getConexion()->prepare($query);
            call_user_func_array( array($stmt, 'bind_param'), $params->get());
            $stmt->execute();

            $meta = $stmt->result_metadata();
            while ($field = $meta->fetch_field())
            {
                $variables[] = &$row[$field->name];
            }

            call_user_func_array(array($stmt, 'bind_result'), $variables);

            while ($stmt->fetch()) {
                foreach($row as $key => $val)
                {
                    $c[$key] = $val;
                }
                $result[] = $c;
            }

            return $result;

        }catch (Exception $e){
            return "-1";
        } finally {
            $conn->cerrarConexion();
        }
    }

}