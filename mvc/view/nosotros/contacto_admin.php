<?php
require_once  "../../controller/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html lang="es">


<head>
  <?php require_once "../base/metadata.php" ?>

  <link href="../../css/public/general.css" rel="stylesheet">

  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="../../lib/DataTables/datatables.css">

  <link rel="stylesheet" type="text/css" href="../../lib/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css">
  <script type="text/javascript" charset="utf8" src="../../lib/DataTables/datatables.js"></script>

  <script src="../../lib/bootstrap/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>


  <script src="../../public/js/validacion.js"></script>

  <script src="../../public/js/nosotros/contacto_edit.js"></script>



  <title>Asirea</title>

</head>

<body>
  <?php require_once "../base/navbarAdmin.php" ?>




  <div class="container">
    <button class="btn btn-success " onclick="abrirModalRegistro()"><i class="far fa-plus-square"></i> Contacto</button>
    <div class="row">
      <div class="col">

        <table id="telefonos_list" class="table table-striped table-bordered dt-responsive display">
          <thead></thead>
          <tbody></tbody>
        </table>


      </div>

      <div class="col">
        <table id="red_list" class="table table-striped table-bordered dt-responsive display">
          <thead></thead>
          <tbody></tbody>
        </table>


      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col">
        <table id="correos_list" class="table table-striped table-bordered dt-responsive display">
          <thead></thead>
          <tbody></tbody>
        </table>
      </div>

    </div>
    <hr>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="direccion">Dirección:</label>
          <textarea class="form-control" rows="5" id="direccion" name="direccion">
          <?php
          $file = fopen(  "../../controller/nosotros/adress.txt", "r");
          while (!feof($file)) {
             $direccion =(fgets($file));
          }
          echo trim($direccion,"\t");
          fclose($file);
          ?></textarea>
        </div>

        <button class="btn btn-success" id="guardar_direccion" onclick=" guardarDireccion()">Guardar dirreción</button>
      </div>
    </div>
  </div>


  <!--- START MODAL REGISTRO-->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalRegistro">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Contacto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- START FORM -->
          <form id="form_contacto_create" name="form_contacto_create" method="post" action="../../Controller/nosotros/switch_controller.php">

            <div id="error_contacto" class="error" role="alert"></div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <label class="input-group-text" for="select_tipo_contacto">Tipo de contacto</label>
              </div>
              <select class="custom-select" name="select_tipo_contacto" id="select_tipo_contacto">
                <option selected>Selecione</option>
                <option value="1">Telefono</option>
                <option value="2">Red</option>
                <option value="3">Correo</option>
              </select>

            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="label_contacto">Contacto</span>
              </div>
              <input type="text" id="input_contacto" name="input_contacto" class="form-control" disabled="true">
            </div>
          </form>
          <!-- END FORM -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" form="form_contacto_create" class="btn btn-success" id="btn_accion" disabled="true">

            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="btnGuardarSpinner" style="visibility: hidden"></span>
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!--- START MODAL REGISTRO-->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Contacto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- START FORM -->
          <form id="form_contacto_edit" name="form_contacto_edit" method="post" action="../../Controller/nosotros/switch_controller.php">

            <input type="hidden" id="id_contacto" name="id_contacto" value="">

            <div id="error_contacto_edit" class="error" role="alert"></div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="label_contacto">Contacto</span>
              </div>
              <input type="text" id="input_contacto_edit" name="input_contacto_edit" class="form-control">
            </div>
          </form>
          <!-- END FORM -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" form="form_contacto_edit" class="btn btn-success" id="btn_accion">

            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="btnGuardarSpinner" style="visibility: hidden"></span>
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>