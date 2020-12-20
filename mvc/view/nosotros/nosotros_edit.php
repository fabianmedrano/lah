<?php
require_once "../../controller/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html lang="es">


<head>
<?php require_once "../base/metadata.php" ?>
    <?php require_once "../base/template.php" ?>
    
  
 <!-- <link href="../../public/css/general.css" rel="stylesheet"> -->
  <link href="../../public/css/nosotros/nosotros_edit.css" rel="stylesheet">
  <!-- CSS FILES START-->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">



  <script src="../../lib/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="../../lib/sweetalert2/dist/sweetalert2.min.css">


  <!-- INICIO CKEDITOR-->
  <script src="../../lib/ckeditor/ckeditor.js"></script>


  <script src="../../lib/ckeditor/plugins/textmatch/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/autolink/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/autoembed/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/image2/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/embedbase/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/embed/plugin.js"></script>



<!-- <script src="../../public/js/validacion.js"></script> -->

  <script src="../../public/js/nosotros/nosotros_edit.js"></script>



  <title>Asirea</title>

</head>

<body>
    <?php require_once "../base/navbarAdmin.php" ?>

  <div class="container  ">
  <div class="row">
  <h3>
    Nosotros
</h3>
  </div>


      
      <div class="row">
        <div id="error_nosotros" style="width:100%" class="error" role="alert"></div>
      </div>
      <div class="row">
        <!--   INICIO CKEDITOR   -->


        <form id="form-nosotros-edit" method="post" action="../../Controller/nosotros/switch_controller.php">
        
        <div class="form-group">
              <label for="editor_nosotros" class="control-label">Contenido</label>
          <textarea name="editor_nosotros" id="editor_nosotros" rows="10" cols="80" require>
                <?php
                $controlador_nosotros = new nosotros_controller();
                echo ($controlador_nosotros->getNosotros());
                ?>
            </textarea>
        </div>
          <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Actualizar" />
        </form>
        <!--   FIN CKEDITOR     <input type="button" onclick="history.back()" name="volver atrás" class="btn btn-success" value="volver atrás">  -->
      </div>
  


  </div>
</body>


<?php include("nosotros_edit_fileinput.php") ?>

</html>