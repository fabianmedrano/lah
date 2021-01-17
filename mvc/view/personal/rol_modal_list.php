
<div class="modal fade" id="modal-roles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      
        <form id="form_rol">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Rol detro de la institución:</label>
            <input type="text" class="form-control" id="input_rol"  name="input_rol">
          </div>
          <input type="button" class="btn btn-primary" onclick="guardarRol()" value="Guardar">
      
        </form>
        <br>
   
        <div class="container-fluid">
            <div class="row">
                <table id="tb_roles" class="table table-bordered dt-responsive display w-100">
                </table>
              
            </div>
        </div>



      </div>
    
    </div>
  </div>
</div>