<!doctype html>
<html lang="es">
<head>
    <?php require_once "../base/metadata.php"?>



    <link rel="stylesheet" href="../../public/css/dashboard.css">
    
    
    <link rel="stylesheet" href="../../lib/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="../../lib/fontawesome/css/all.min.css">

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/personal/personal_view_admin.js"></script>

    
    <title>Gestión personal</title>
</head>
<body>

<?php require_once "../base/navbarAdmin.php"?>

<div class="container-fluid">
    <div class="row">
        <?php require_once "../base/menuVertical.php"?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      
            
                <div class="mb-3">
                    <a href="./personal_create.php" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar personal" ><i class="far fa-plus-square"></i></a>
                
                    <button type="button"  onclick="abrirModalRoles()" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar personal" ><i class="far fa-address-card"></i></button>
                
                </div>
                <div class="mb-5">
                    <table id="tb_personal" class="table table-striped table-bordered dt-responsive display">
                    <thead></thead>
                    <tbody></tbody>

                    </table>
                </div>
           

        </main>
    </div>
</div>

    <?php require_once "./rol_modal_list.php"?>

</body>
</html>