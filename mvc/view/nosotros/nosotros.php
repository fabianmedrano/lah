<!doctype html>
<html lang="es">

<head>


<?php require_once "../../controller/nosotros/nosotros_controller.php" ?>

    <?php require_once "../base/metadata.php" ?>
    <?php require_once "../base/template.php" ?>
    

    <script src="../../public/js/personal/personal.js"></script>
    
    <link  rel="stylesheet" href="../../public/css/personal/personal.css"/>

    <script src="../../public/js/personal/personal_institucion.js"></script>
    <title>Nosotros</title>
</head>

<body>
    <?php require_once "../base/navbarCliente.php" ?>




    <!-- INICIO CARRUSEL -->

    <div id="carousel-nosotros" class="carousel slide flex" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        $folder_path = '../../public/img/nosotros/nosotros_carrusel/';
        $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
        $folder = opendir($folder_path);
        $index = 0;
        if ($num_files > 0) {
          while (false !== ($file = readdir($folder))) {
            $file_path = $folder_path . $file;
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
        ?>
              <div class="carousel-item banner-altura-200 <?php if ($index == 0) echo ("active");  ?>">
                <img class="d-block w-100 " src="<?php echo $file_path; ?>" alt="First slide">

              </div>
        <?php
              $index++;
            }
          }
        }
        closedir($folder);
        ?>

        <a class="carousel-control-prev" href="#carousel-nosotros" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-nosotros" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


    </div>




      <!-- FIN CARRUSEL -->

      <div class="container">
<div class="row d-flex justify-content-center">
  <div class="col-md-9">
      <!-- INICIO CUERPO INFORMACION NOSOTROS-->
      <div class="card shadow p-3 mb-5 bg-white ">
      <div class="nosotros-cuerpo">
        <?php
        $controlador_nosotros = new nosotros_controller();
        echo ($controlador_nosotros->getNosotros());
        ?>
      </div>
      </div>
      <!-- INICIO CUERPO INFORMACION NOSOTROS-->
      </div>
    </div>
    </div>
    
</body>

</html>