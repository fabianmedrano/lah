<?php 
header('Content-Type: application/json; charset=utf-8');
$carpetaAdjunta="../../../public/img/nosotros/nosotros_carrusel/";
parse_str(file_get_contents("php://input"),$datosDELETE);
$key= $datosDELETE['key'];
unlink($carpetaAdjunta.$key);
echo 0;
?>