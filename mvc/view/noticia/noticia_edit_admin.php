<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>

<html lang="es">

<head>

<?php include(TEMPLATES_PATH . "/metadata.php") ?>

<link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

  

  <script src="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.css">

  
  <script src="<?php echo PUBLIC_PATH ?>/js/noticia/noticia_edit.js"></script>
  
  <script src="<?php echo LIB_PATH ?>/ckeditor/ckeditor.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/textmatch/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/autolink/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/autoembed/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/image2/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/embedbase/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/embed/plugin.js"></script>

  
  <script src="<?php  echo PUBLIC_PATH ?>/js/validacion.js"></script>
  <title>Edición noticia</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container">
    <?php

    $controlador_noticia = new NoticiaController();
    $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

    ?>


    <!--   INICIO CKEDITOR   -->
    <div class="container-flex">
      <section class="wrapper news-posts ">
        <div class="row">
              <form id="form-noticia-edit" name="<?php echo $noticia['id'] ?>" method="post" action="../../Controller/noticia/switch_controller.php">
               
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

                    echo ($noticia['descripcion']);

                    ?>
                    </textarea>
                  </div>

                  <input class="button btn btn-primary" id="btn-actualizar" name="btn_accion" type="submit" value="Actualizar" />
                  <a class="btn btn-success" href="../Noticia/noticia_list_view_admin.php">volver atrás</a>
    
                  <script>

CKEDITOR.replace('editor_noticia', {
                filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=noticias/noticias/<?php echo($noticia['id']) ?>/',
                filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=noticias/noticias/<?php echo($noticia['id']) ?>/',
           filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=noticias/noticias/<?php echo($noticia['id']) ?>/'
              });

                  </script>
                </fieldset>
              </form>
        </div>
        <!--   FIN CKEDITOR   -->
      </section>
    </div>

</body>

</html>