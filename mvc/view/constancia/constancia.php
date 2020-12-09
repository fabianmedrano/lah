<?php

require("../../lib/fpdf/fpdf.php");

require("../../controller/constancia/constancia_controller.php");

       $estudiante= $_GET['estudiante'];
     
       $controller= new constancia_controller() ;
$Datos=$controller->getDatosConstancia($estudiante)[0];






switch ($Datos['id_seccion']) {
       case '7':
          $año =  "Sétimo año de la Educación General Básica.";
      break;
      case '8':
             $año =  "Octavo año de la Educación General Básica.";
      break;
      case '9':
             $año =  "Noveno año de la Educación General Básica.";
      break;
      case '10':
             $año =  "Décimo año de La Educación Diversificada.";
      break;
       default:
       
       $año =  ",Undécimo año de La Educación Diversificada.";
              break;
}






$pdf = new FPDF('P', 'mm', 'A4');


$pdf->AddPage();


#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(30, 30, 30);

#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true, 30);




$pdf->Image('../../public/img/constancia/image001.png', 155, 30, 20);

$pdf->Image('../../public/img/constancia/image002.jpg', 30, 30, 33);
$pdf->SetFont('Arial', 'I', 8);
$pdf->SetY(35);
$pdf->SetTextColor(165, 165, 165);
$pdf->MultiCell('', 5,  iconv('utf-8', 'windows-1252', "Ministerio de Educación Pública\nDirección Regional de Educación Sarapiquí\nLiceo Ambientalista de Horquetas, Circuito 02 "), 0, "C");
$pdf->Ln(8);
$pdf->SetDrawColor(39, 114, 46);
$pdf->SetLineWidth(1);
$pdf->Line(30,  $pdf->GetY() + 1, 180, $pdf->GetY() + 2);
$pdf->Ln(22);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell('', 5,  iconv('utf-8', 'windows-1252', "DRS – SEC02 – LAH – Constancia xxxx-".date("Y")." \nCONSTANCIA DE ESTUDIANTE REGULAR"), 0, "C");
$pdf->Ln(28);


$pdf->MultiCell('', 5, iconv('utf-8', 'windows-1252', 
"Quien suscribe Marlon Juárez Gutiérrez, director Liceo Ambientalista de Horquetas, hace constar que: " . $Datos['nombre'].", " . $Datos['cedula'].", es estudiante regular de la institución y se encuentro (a) matriculado (a) en: ". $año), 0, "J");



$pdf->Ln(32);
$pdf->MultiCell('', 5,  iconv('utf-8', 'windows-1252', "Dado al " . date("d") . " del mes de " . date("m") . " del " . date("Y")." a solicitud del (a) interesado (a)."), 0, "C");
$pdf->Ln(18);

$pdf->MultiCell('', 5, "_______________________________________", 0, "C");
$pdf->MultiCell('', 5, iconv('utf-8', 'windows-1252',  "MSc. Marlon Juárez Gutiérrez\nDirector"), 0, "C");
$pdf->Ln(30);

$pdf->SetTextColor(165, 165, 165);
$pdf->MultiCell('', 5,  iconv('utf-8', 'windows-1252', "“Educar para una nueva ciudadanía”\nE-mail: lic.ambientalistadehorquetas@mep.go.cr\nTel: 2764-45-15\n1 de 1"), 0, "C");




$pdf->Output();