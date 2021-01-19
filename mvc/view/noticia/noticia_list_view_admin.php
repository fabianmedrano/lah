<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <?php include(TEMPLATES_PATH . "/metadata.php") ?>
    <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias.css" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="<?php echo LIB_PATH ?>/DataTables/datatables.css">

    <link rel="stylesheet" type="text/css" href="<?php echo LIB_PATH ?>/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css">
    <script type="text/javascript" charset="utf8" src="<?php echo LIB_PATH ?>/DataTables/datatables.js"></script>

    <script src="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.css">

    <script type="text/javascript" charset="utf8" src="<?php echo PUBLIC_PATH ?>/js/noticia/noticia_view.js"></script>

    <!--   JS Files END  -->



    <title>Gestión noticias</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/nav.php") ?>
    <div class="container">
        <div class="row mb-3">

            <a class="btn btn-success " href="../Noticia/noticia_create_admin.php"><i class="far fa-plus-square"></i> Noticia</a>
        </div>

        <table id="noticias_list" class="table table-striped table-bordered dt-responsive display">
            <thead></thead>
            <tbody></tbody>
        </table>

    </div>
</body>

</html>