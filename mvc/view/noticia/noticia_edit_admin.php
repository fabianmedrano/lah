<?php
require_once  "../../controller/noticia/noticia_controller.php";

?>

<!DOCTYPE html>

<html lang="es">

<head>


<?php require_once "../base/metadata.php"?>

<link rel="stylesheet" href="../../public/css/dashboard.css">

<link href="../../public/css/noticias/noticias.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

  

  
  <script src="../../public/js/noticia/noticia_edit.js"></script>

  <script src="../../lib/ckeditor/ckeditor.js"></script>



<script src="../../public/js/validacion.js"></script>
<!-- FIN jquery validation-->

<script src="../../public/js/noticia/noticia_create.js"></script>
<script src="../../lib/ckeditor/plugins/textmatch/plugin.js"></script>
<script src="../../lib/ckeditor/plugins/autolink/plugin.js"></script>
<script src="../../lib/ckeditor/plugins/autoembed/plugin.js"></script>
<script src="../../lib/ckeditor/plugins/image2/plugin.js"></script>
<script src="../../lib/ckeditor/plugins/embedbase/plugin.js"></script>
<script src="../../lib/ckeditor/plugins/embed/plugin.js"></script>
  <title>Edición noticia</title>

</head>

<body>

<?php require_once "../base/navbarAdmin.php" ?>



<!--   INICIO CKEDITOR   -->
<div class="container-fluid">
  <div class="row">
    <?php require_once "../base/menuVertical.php" ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

  <div class="container">
    <?php

    $controlador_noticia = new noticia_controller();
    $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

    ?>


    <!--   INICIO CKEDITOR   -->
    <div class="container-flex">
      <section class="wrapper news-posts ">
        <div class="row">
              <form id="form-noticia-edit" name="<?php echo $noticia['id_noticia'] ?>" method="post" action="../../Controller/noticia/switch_controller.php">
               
              <fieldset>

              <div id="error_autor" class="error" role="alert"></div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Autor</span>
  </div>
  <input id="autor_noticia" name="autor_noticia" type="text" class="form-control" aria-describedby="basic-addon3"value="<?php echo $noticia['autor'] ?>">
</div>
              
            <div id="error_titulo" class="error" role="alert"></div>
              <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Título</span>
                    </div>
                    <input id="titulo_noticia" name="titulo_noticia" type="text" class="form-control" aria-describedby="basic-addon3" value="<?php echo $noticia['titulo'] ?>">
                  </div>
                  
            <div id="error_noticia" class="error" role="alert"></div>
                  <div class="form-group">
                    <label for="street1_id" class="control-label">Contenido</label>
                    <textarea name="editor_noticia" id="editor_noticia" rows="10" cols="80">
                    <?php

                    echo ($noticia['texto']);

                    ?>
                    </textarea>
                  </div>

                  <input class="button btn btn-primary" id="btn-actualizar" name="btn_accion" type="submit" value="Actualizar" />
                  <a class="btn btn-success" href="../Noticia/noticia_list_view_admin.php">volver atrás</a>
    
                  <script>


              CKEDITOR.replace('editor_noticia', {
                        filebrowserBrowseUrl: '/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=noticias/noticias/<?php echo($noticia['id_noticia']) ?>/',
                        filebrowserUploadUrl: '/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=noticias/noticias/<?php echo($noticia['id_noticia'])?>/',
                        filebrowserImageBrowseUrl: '/lib/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=noticias/noticias/<?php echo($noticia['id_noticia']) ?>/'
                      });

                  </script>
                </fieldset>
              </form>
        </div>
        <!--   FIN CKEDITOR   -->
      </section>
    </div>
  </div>
    </main>
  </div>
</div>
</body>

</html>