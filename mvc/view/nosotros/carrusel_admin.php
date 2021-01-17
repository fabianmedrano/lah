<!DOCTYPE html>
<html lang="es">


<head>
  <?php require_once "../base/metadata.php" ?>

  <link rel="stylesheet" href="../../public/css/dashboard.css">


  <link href="../../public/css/general.css" rel="stylesheet">
  <link href="../../public/css/nosotros/nosotros_edit.css" rel="stylesheet">
  <!-- CSS FILES START-->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">



  <!--INICIO FILE INPUT-->
  <link href="../../lib/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
  <script src="../../lib/fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="../../lib/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="../../lib/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../lib/fileinput/js/fileinput.js"></script>
  <script src="../../lib/fileinput/themes/fas/theme.min.js"></script>
  <script src="../../lib/fileinput/js/locales/es.js"></script>
  <!--FIN FILE INPUT-->


  <title>Carussel</title>

</head>

<body>
  <?php require_once "../base/navbarAdmin.php" ?>


  <div class="container-fluid">
    <div class="row">
      <?php require_once "../base/menuVertical.php" ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <div class="container  contenedor-nosotros-edit ">

          <div class="row">
            <h3>
              Nosotros
            </h3>
          </div>


          <div class="row">
            <!-- INICIO File Input -->

            <div id="error_fileinput" style="width:100%" class="error" role="alert"></div>

            <div id="container-fileinput-carrusel">
              <div class="form-group">
                <label for="inputcarrusel" class="control-label">Carrusel</label>
                <input id="inputcarrusel" name="inputcarrusel[]" type="file" multiple>
              </div>
            </div>

            <!-- FIN File Input -->
          </div>
        </div>
      </main>
    </div>
  </div>
</body>


<?php include("nosotros_edit_fileinput.php") ?>

</html>