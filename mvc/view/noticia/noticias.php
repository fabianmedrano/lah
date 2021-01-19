<?php


require_once  "../../controller/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html lang="es">


<head>
  <?php require_once "../base/metadata.php" ?>

  <link rel="stylesheet" href="../../public/css/dashboard.css">

    <link href="../../public/css/noticias/noticias_view.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">

    <title>noticias</title>

</head>

<body>
    <?php 





    if (!$_GET) {
        header("Location:" . 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] . "?pagina=1");
        exit;
    }


    $noticias = noticia_controller::getNoticiasPaginado($_GET['pagina'], 5);


    if (count($noticias['noticias']) <= 0) {
        include( "noticia_none.php");
        exit;
    }

    if ($_GET['pagina'] > $noticias['paginas'] || $_GET['pagina'] < 1) {
        header("Location:" .'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] . "?pagina=1");
    }

    ?>



    <div class="container ">
       
            <div class="blog-list ">

                <!--Blog Post Start-->

                <?php

     
                foreach ( $noticias['noticias'] as $noticia) {

                ?>
                 <div class="row">
                    <div class="card shadow p-3  bg-white">
                        <div class="blog-post">
                            <?php
                            $folder_path = "../../public/img/noticias/noticias/";
                            $folder_path = $folder_path . $noticia["id_noticia"] . "/";
                            $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
                            if (file_exists($folder_path)) {

                                $folder = opendir($folder_path);
                                $imgcargada = false;
                                if ($num_files > 0) {
                                    while ((false !== ($file = readdir($folder))) && (!$imgcargada)) {
                                        $file_path = $folder_path . $file;

                                        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') { // revisar que pasa cuando no carga imagen
                            ?>
                                            <div class="col-md-4">
                                                <!-- incio imagenes -->
                                              
                                                    <img class="tfoto  rounded float-left img-thumbnail" src="<?php echo $file_path; ?>" alt="Imagen" title="Imagen">
                                               
                                                <!-- Fin imagenes -->
                                            </div>
                            <?php
                                            $imgcargada = true;
                                        }
                                    }
                                    closedir($folder);
                                }
                            }
                            ?>
                            <div class="col-md post-txt ">
 

                                    <!-- Inicio Titulo -->
                                    <h7>
                                        <strong>

                                            <?php echo $noticia["titulo"] ?>
                                        </strong>
                                    </h7>
                                    <!-- Fin Titulo -->

                                    <!-- Inicio informacion de publicacion -->
                                    <ul class="post-meta">
                                        <li >
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php
                                            echo  date("d/m/Y", strtotime($noticia['fecha']));
                                            ?>
                                        </li>
                                        <li >
                                            <i class="fas fa-user-tie"></i>
                                            <?php
                                            echo ($noticia['autor']);
                                            ?>
                                        </li>
                                    </ul>
                                    <!-- Fin informacion de publicacion -->

                                    <!--Inicio Descripcion-->
                                    <div class="resumen_noticia  ">
                                        <?php echo trim(strip_tags($noticia["texto"])) ?>
                                    </div>
                                    <!-- Fin Descripcion-->

                                    <!-- Inicio Leer mas-->
                                    <a class="float-right" href="./noticia.php?noticia=<?php echo $noticia['id_noticia'] ?>">Leer más</a>
                                    <!-- Fin Leer mas-->

                           
                            </div>
                        </div>
                    </div>
                        </div>
                <?php } ?>

                <!--Blog Post End-->
        
        </div>

        <div class="row">

            <div class="gt-pagination">
                <nav>
                    <ul class="pagination">

                        <li class="page-item  <?php echo $_GET['pagina'] == 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?PHP echo'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] ?>?pagina=<?php echo 1;  ?>" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
                        </li>
                    </ul>
                    <ul class="pagination">

                        <li class="page-item  <?php echo $_GET['pagina'] == 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?PHP echo'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']?>?pagina=<?php echo (intval($_GET['pagina'])  - 1);  ?>" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                        </li>
                    </ul>

                    <?php for ($i = 0; $i < $noticias['paginas']; $i++) { ?>
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pagina'] == ($i + 1) ? 'active' : '' ?>">
                                <a class="page-link" href="<?PHP echo'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] ?>?pagina=<?php echo $i + 1  ?> "><?php echo $i + 1 ?> <span class="sr-only"></span></a>
                            </li>
                        </ul>
                    <?php } ?>
                    <ul class="pagination">
                        <li class="page-item  <?php echo $_GET['pagina'] >= $noticias['paginas'] ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?PHP echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] ?>?pagina=<?php echo (intval($_GET['pagina']) + 1);  ?>"><i class="fas fa-angle-right"></i></a>
                        </li>
                    </ul>
                    <ul class="pagination">

                        <li class="page-item  <?php echo $_GET['pagina'] == $noticias['paginas'] ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?PHP echo'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] ?>?pagina=<?php echo $noticias['paginas'];  ?>" tabindex="-1"><i class="fas fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>



    </div>




</body>

</html>