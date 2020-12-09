<!doctype html>
<html lang="es">
<head>
    <?php require_once "../base/metadata.php"?>



    <link rel="stylesheet" href="../../public/css/dashboard.css">
  <link rel="stylesheet" href="../../public/css/estudiante/estudiante.css">

  
<!--datepicker -->  
  <link  rel="stylesheet" href="../../lib/datepicker/datepicker.css" />



<!--datepicker -->  
  <script src="../../lib/datepicker/datepicker.min.js"></script>

  <script src="../../lib/datepicker/datepicker.es-ES.js"></script>
<!--Validate -->  
<script src="../../lib/jquery-validation/jquery.validate.min.js"></script>
<script src="../../lib/jquery-validation/additional-methods.min.js"></script>

  
<!--estudiante -->  
<script src="../../public/js/estudiante/estudiante_validate.js"></script>
<script src="../../public/js/estudiante/estudiante.js"></script>
<script src="../../public/js/estudiante/estudiante_edit.js"></script>

    
    <title>Edición estudiantes</title>
</head>
<body>

<?php require_once "../base/navbarAdmin.php"?>

<div class="container-fluid">
    <div class="row">
        <?php require_once "../base/menuVertical.php"?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      
        <h1> Agregar estudiante</h1>
        <form id="form_edit_estudiante" class="needs-validation">
          <div class="form-row">

            <div class="col-md-7 mb-3 ">
              <label for="in_nombre_completo">Nombre Completo</label>
              <input type="text" class="form-control" id="in_nombre_completo" name="in_nombre_completo" placeholder="Nombre Completo" required>
            </div>

          </div>

          <div class="form-row  ">

            <div class="col-md-5 mb-3 ">
              <label for="in_cedula">Cedula</label>
              <input type="text" class="form-control" id="in_cedula" name="in_cedula" placeholder="Cedula" required>
            </div>

            <div class="col-md-2 mb-3 mr-5">
              <label for="in_fecha_nacimiento">Fecha de nacimiento</label>
              <input name="in_fecha_nacimiento" id="in_fecha_nacimiento" class="form-control"data-toggle="datepicker">
            </div>

          </div>

          <div class="form-row  ">

            <span class="border form-row col-md-7 ">
             
              <div class="form-group col ">
                <label for="in_select_ano">Grado</label>
                <select id="in_select_ano" name="in_select_ano" class="form-control">
                  <option value="default" selected>Seleccione</option>
                </select>
              </div>

            </span>

          </div>



          
            <span class="border form-row col-md-7 mt-3">
            <div class="form-row mt-3">    
              <div class="col  ">

                <label for="in_contacto_telefono">Telefono</label>
                <div class="input-group ">
                <div class="input-group-append">
                    <input type="button" class="btn btn-success" onclick="agregarContacto('TELEFÓNO','in_contacto_telefono')" value="agregar">
                  </div>
                  <input type="text" class="form-control" id="in_contacto_telefono" name="in_contacto_telefono" placeholder="888888888" >
                </div>

              </div>

              </div>
              <div class="form-row mb-3">    
              <div class="col">

                <label for="in_contacto_correo">Correo</label>
                <div class="input-group ">
                <div class="input-group-append">
                    <input type="button" class="btn btn-success" onclick="agregarContacto('CORREO','in_contacto_correo')" value="agregar">
                  </div>
                  <input type="text" class="form-control" id="in_contacto_correo" name="in_contacto_correo" placeholder="ejemplo@ejemplo.com" >
                </div>

              </div>

              </div>
          
            </span>





          <div class="form-row mt-3 ">
            <div class=" col-md-7">

              <table id="tb_contactos" class="table table-striped">
                <tbody>
                </tbody>
              </table>

            </div>
          </div>
          <input type="button" class="btn btn-primary" onclick="guardarEstudiante()" value="Guardar">
        </form>
           

        </main>
    </div>
</div>

</body>
</html>