<?php
require_once "../../model/BindParam.php";
require_once "../../model/query_database.php";

class nosotros_controller
{

    public function prueba(){
        $query = "call sp_buscarNoticia(?,?)";

        $binParam = new BindParam();

        $binParam->add('s', '14/08/2020');
        $binParam->add('s', '08:30');

        return json_encode(query_database::find($query, $binParam));
    }

}