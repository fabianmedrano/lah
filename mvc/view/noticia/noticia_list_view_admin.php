<?php


require_once "../../controller/noticia/noticia_controller.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <?php require_once "../base/metadata.php" ?>



    <link rel="stylesheet" href="../../public/css/dashboard.css">

    <link href="./css/general.css" rel="stylesheet">
    <link href="../../public/css/noticias/noticias.css" rel="stylesheet">


    <link rel="stylesheet" href="../../public/css/dashboard.css">


    <link rel="stylesheet" href="../../lib/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../../lib/fontawesome/css/all.min.css">

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/estudiante/estudiante_view_admin.js"></script>

    <script type="text/javascript" charset="utf8" src="../../public/js/noticia/noticia_view.js"></script>

    <!--   JS Files END  -->



    <title>Gestión noticias</title>

</head>

<body>

    <?php require_once "../base/navbarAdmin.php" ?>

    <div class="container-fluid">
        <div class="row">
            <?php require_once "../base/menuVertical.php" ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


                <div class="container">
                    <div class="row mb-3">

                        <a class="btn btn-success " href="noticia_create_admin.php"><i class="far fa-plus-square"></i> Noticia</a>
                    </div>

                    <table id="noticias_list" class="table table-striped table-bordered dt-responsive display">
                        <thead></thead>
                        <tbody></tbody>
                    </table>

                </div>
            </main>
        </div>
    </div>
</body>

</html>