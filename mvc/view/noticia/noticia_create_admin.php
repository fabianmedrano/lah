<?php
include ("../../controller/noticia/noticia_controller.php");

$controlador_noticia = new noticia_controller();
$numnews = $controlador_noticia->createFile();


?>

<!doctype html>
<html lang="es">

<head>

<?php require_once "../base/metadata.php"?>

<link rel="stylesheet" href="../../public/css/dashboard.css">
<link rel="stylesheet" href="../../public/css/estudiante/estudiante.css">






  <script src="../../lib/ckeditor/ckeditor.js"></script>




  <!--   JS Files END  -->

  <!-- INICIO jquery validation-->

  <script src="../../public/js/validacion.js"></script>
  <!-- FIN jquery validation-->

  <script src="../../public/js/noticia/noticia_create.js"></script>
  <script src="../../lib/ckeditor/plugins/textmatch/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/autolink/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/autoembed/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/image2/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/embedbase/plugin.js"></script>
  <script src="../../lib/ckeditor/plugins/embed/plugin.js"></script>

  <title>Agregar noticia</title>

</head>

<body>
      <?php require_once "../base/navbarAdmin.php" ?>



  <!--   INICIO CKEDITOR   -->
  <div class="container-fluid">
    <div class="row">
      <?php require_once "../base/menuVertical.php" ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <div class="container-flex">

          <section class="wrapper news-posts ">


            <div class="row">

              <form id="form-noticia-create" method="post" action="../../Controller/noticia/switch_controller.php">
                <fieldset>
                  <div id="error_autor" class="error" role="alert"></div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Autor</span>
                    </div>
                    <input id="autor_noticia" name="autor_noticia" type="text" class="form-control" aria-describedby="basic-addon3">
                  </div>


                  <div id="error_titulo" class="error" role="alert"></div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Título</span>
                    </div>
                    <input id="titulo_noticia" name="titulo_noticia" type="text" class="form-control" aria-describedby="basic-addon3">
                  </div>


                  <div id="error_noticia" class="error" role="alert"></div>

                  <div class="form-group">
                    <label for="street1_id" class="control-label">Contenido</label>
                    <textarea name="editor_noticia" id="editor_noticia" rows="10" cols="80"></textarea>
                    <script>
                      CKEDITOR.replace('editor_noticia', {
                        filebrowserBrowseUrl: '/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=noticias/noticias/<?php echo $numnews ?>/',
                        filebrowserUploadUrl: '/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=noticias/noticias/<?php echo $numnews ?>/',
                        filebrowserImageBrowseUrl: '/lib/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=noticias/noticias/<?php echo $numnews ?>/'
                      });
                    </script>
                  </div>
                  <input class="button btn btn-primary" id="btn-guardar" name="btn_accion" type="submit" value="Guardar" />

                </fieldset>
              </form>

            </div>
          </section>
        </div>
        <!--   FIN CKEDITOR   -->
      </main>
    </div>
  </div>

</body>

</html>