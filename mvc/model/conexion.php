<?php


class conexion
{
 /*
    private static $host_name = "127.0.0.1";
    private static $user_name = "root";
    private static $user_pass = "";
    private static $data_base = "db_liceo_web";
*/

//private static $host_name = "160.153.43.133";
    private static $host_name = "160.153.63.133";
  
    private static $user_name = "liceo";
    private static $user_pass = "6i[y0%7pSW7$";
    private static $data_base = "db_liceo_web";

    private $conexion;

    function __construct() {

        try{

            $this->conexion  = new mysqli(self::$host_name, self::$user_name, self::$user_pass, self::$data_base);

        } catch (mysqli_sql_exception $e){
            echo($e);
            throw $e;
        }

    }


    public function getConexion(){
        return $this->conexion;
    }

    public function getResultado(){

        $result = [
            'status' => mysqli_errno($this->conexion),
            'msm' => mysqli_error($this->conexion)
        ];

        return $result;
    }

    public function cerrarConexion(){
        $this->conexion->close();
    }

}