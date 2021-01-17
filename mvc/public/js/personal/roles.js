var $form;
$(document).ready(function() {


    prepararPagina();
    
});


function prepararPagina() {
    // validate
    initValidate();
    $form = $("#form_rol");
    $form.validate();
    
}

 
function guardarRol() {
    if ($form.valid()) {
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Se guardara este rol!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Guardar!'
        }).then((result) => {
            if (result.value) {

                $data = $('#form_rol').serializeArray();
                $data.push({ name: 'accion', value: 'insert_rol' });
                console.log($data);
                $.ajax({
                    url: '../../controller/personal/personal_switch.php',
                    type: 'POST',
                    data: $.param($data),
                    success: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result)); 
                        
                    $('#tb_roles').DataTable().clear().rows.add(getRoles()).draw();
                    },
                    error: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result));
                    }
                    
                });
   
            }
        });
    } else {
        console.log('no valido');
    }

}

function deleteROL(id) {

    Swal.fire({
        title: '¿Está seguro?',
        text: "¡Se eliminara !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: "Cancelar",
    }).then((result) => {
            if (result.value) {
                $data = [];
                $data.push({ name: 'accion', value: 'delete_rol' });
                $data.push({ name: 'id_rol', value: id });

                $.ajax({
                method: "POST",
                url:  '../../controller/personal/personal_switch.php',
                data:$data,
                async: false,
                dataType: "json",
                success: function (res) {
                 
                    $('#tb_roles').DataTable().clear().rows.add(getRoles()).draw();

                    var result = limpiarJson(res);
                    alertas(JSON.parse(result)); 
                },
                error: function (res) {
                    var result = limpiarJson(res);
                    alertas(JSON.parse(result)); 
                }
            });
        }
        else {
            Swal.fire(
                'Cancelado',
                'Se ha cancelado la acción de eliminar',
                'error'
            )
        }
    });

}

function abrirModalRoles() {
    iniciarTablaRoles();
    $('#modal-roles').modal('show') 
 }


 
function iniciarTablaRoles() {
    $('#tb_roles').dataTable({
        data: getRoles(),
        responsive: true,
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        destroy: true,
        "scrollx": true,
        columns: [
            { title: "Función", data: "rol" },
            
            { title: "Eliminar" },
        ],
        columnDefs: [

            {
                targets: 1,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='"+data.id_rol+"' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar noticia' onclick='deleteROL(" + data.id_rol + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}
$.validator.addMethod('letras_espacios', function (value) { 
    return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/g.test(value);
});
function initValidate(){
    jQuery.validator.setDefaults({
        debug: true,        
        success: "valid",
        rules: {
            input_rol: {
              required: true,
              letras_espacios:true
            }
          },   
          messages: {
            input_rol: {
              required: "Debe ingresar un rol",
              letras_espacios: "Caracteres no validos"
           
            },
           
          },
        
      });
    }
