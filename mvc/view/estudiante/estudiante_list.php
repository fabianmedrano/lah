<!doctype html>
<html lang="es">
<head>
    <?php require_once "../base/metadata.php"?>



  
<!--estudiante -->  
<script src="../../public/js/estudiante/estudiante.js"></script>
  


    <link rel="stylesheet" href="../../public/css/dashboard.css">
    
    
    <link rel="stylesheet" href="../../lib/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="../../lib/fontawesome/css/all.min.css">

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/estudiante/estudiante_view_admin.js"></script>

    
<script src="../../public/css/estudiante/estudiante.css"></script>
    





    <title>Gestión estudiantes</title>
</head>
<body>

<?php require_once "../base/navbarAdmin.php"?>

<div class="container-fluid">
    <div class="row">
        <?php require_once "../base/menuVertical.php"?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      
            
                <div class="mb-3">       
                     <button id="pasar-ano" class="cont-icono btn btn-outline-primary float-left" data-tooltip="tooltip" data-placement="top" title="Pasan los estudiantes al siguite grado " onclick="pasarDeAno()"><i class="far fa-calendar-check"></i></button>
          
                    <button id="registarServicios" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar estudiante" onclick="abrirModal()"><i class="far fa-plus-square"></i></button>
                </div>
                <div class="mb-5">
                    <table id="tb_estudiantes" class="table table-striped table-bordered dt-responsive display">
                    <thead></thead>
                    <tbody></tbody>

                    </table>
                </div>
           

        </main>
    </div>
</div>

</body>
</html>