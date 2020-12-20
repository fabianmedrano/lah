var listaCate = [];

$(document).ready(function () {
    $tel =getTelefonos();
 $red=getRedes();
 $email=getCorreos();
    iniciarTablaTelefonos($tel);
    iniciarTablaRedes( $red);
    iniciarTablaCorreos($email);

    $(".Telefono").mask("9999-9999");

    $("#select_tipo_contacto").change(function () {
        limpiarError();
        if($("#select_tipo_contacto")[0].selectedIndex == 0) {
             $("#input_contacto").prop("disabled", true);
              $('#btn_accion').prop("disabled", true); 
    }else{
         $("#input_contacto").prop("disabled", false);
        
         $('#btn_accion').prop("disabled", false); 
        }
        setinputRegistro($("#select_tipo_contacto option:selected").text());
    });

    var $ruleUrl = [{ error: "required_content", msg: "Debe ingresar una url"  },
    { error: "valid", msg: "URL no valida." }, ];

    var $ruleemail = [{ error: "required_content", msg: "Debe ingresar un correo"  },
    { error: "valid", msg: "Correo no valido" }, ];

    var $ruletel = [{ error: "required_content", msg: "Debe ingresar un teléfono"  } ];


    $("#input_contacto_edit").bind(" change click keyup input paste", function(event){
    
        $contacto =  $("#input_contacto_edit").val().trim();
        ($("#input_contacto_edit").hasClass("Red"))? console.log (validarURL($contacto,$ruleUrl,$('#error_contacto_edit'))) : '';
        ($("#input_contacto_edit").hasClass("Telefono"))?console.log (validarTelefono($contacto,$ruletel,$('#error_contacto_edit'))) : '';
        ($("#input_contacto_edit").hasClass("Correo"))?console.log (validarEmail($contacto,$ruleemail,$('#error_contacto_edit'))) : '';
       
    });

    $("#input_contacto").bind(" change click keyup input paste", function(event){
    
        $contacto =  $("#input_contacto").val().trim();
        ($("#input_contacto").hasClass("Red"))? console.log (validarURL($contacto,$ruleUrl,$('#error_contacto'))) : '';
        ($("#input_contacto").hasClass("Telefono"))?console.log (validarTelefono($contacto,$ruletel,$('#error_contacto'))) : '';
        ($("#input_contacto").hasClass("Correo"))?console.log (validarEmail($contacto,$ruleemail,$('#error_contacto'))) : '';
       
    });


    $("#form_contacto_create").submit(function (ev) {

        ev.preventDefault();

        Swal.fire({
            title: '¿Está seguro?',
            text: "¡Se guardara este contacto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Guardar!',
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                console.log('todo bien por haora');
                var $form = $("#form_contacto_create");
                var $accion = "&btn_accion=guardar_contacto";
                $.ajax({
                    method: 'POST',
                    url: '../../Controller/nosotros/switch_controller.php',
                    data: $form.serialize() + $accion,
                    async: false,
                    dataType: "json",

                    success: function () {
                        refreshTables();

                        Swal.fire(
                            'Guardada!',
                            'Infomacion guardada de forma exitosa',
                            'success'
                        )
                    },
                    error: function () {
                        Swal.fire(
                            "Ha ocurrido un error",
                            "intente refrescar la pagina",
                            "error"
                        );
                    }
                });
            } else {
                Swal.fire(
                    'Cancelado',
                    'Se ha cancelado la acción de guardar',
                    'error'
                )
            }
        });
    });



    $("#form_contacto_edit").submit(function (ev) {

        ev.preventDefault();

        Swal.fire({
            title: '¿Está seguro?',
            text: "¡Se editara este contacto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Guardar!',
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                var $form = $("#form_contacto_edit");
                var $accion = "&btn_accion=editar_contacto";
                $.ajax({
                    method: 'POST',
                    url: '../../Controller/nosotros/switch_controller.php',
                    data: $form.serialize() + $accion,
                    async: false,
                    dataType: "json",

                    success: function () {
                        refreshTables();

                        Swal.fire(
                            'Guardada!',
                            'Infomacion guardada de forma exitosa',
                            'success'
                        )
                    },
                    error: function () {
                        Swal.fire(
                            "Ha ocurrido un error",
                            "intente refrescar la pagina",
                            "error"
                        );
                    }
                });
            } else {
                Swal.fire(
                    'Cancelado',
                    'Se ha cancelado la acción de guardar',
                    'error'
                )
            }
        });
    });








});


function guardarDireccion() {

    var data = new FormData();

    data.append('btn_accion', 'guardar_direccion');
    data.append('direccion',  $('#direccion').val());

    $.ajax({
        method: 'POST',
        url: '../../Controller/nosotros/switch_controller.php',
        data:data,
        async: false,
        dataType: "json",
        processData: false,
contentType: false,

        success: function () {

        },
        error: function () {
 
        }
    });
}


async function iniciarTablaRedes($datos) {
    $('#red_list').dataTable({
        data: $datos,
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        destroy: true,
        paging: false,
        scrollY: "170px",
        scrollCollapse: true,
        searching: false,
        columns: [
            { title: "Redes:", data: "contacto" },

            { title: "Editar" },
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
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='red noticia' class='btn btn-outline-success'   onclick=' abrirModalEdit(" + data.idcontacto + "," + data.tipo_contacto + ", " + '"' + data.contacto + '"' + ")'><i class=\"fas fa-edit\"></i></button>";
                }
            },
            {
                targets: 2,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='" + data.idnoticia + "' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar contacto' onclick=' deleteContacto(" + data.idcontacto + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}

async function iniciarTablaTelefonos($datos) {
    $('#telefonos_list').dataTable({
        data: $datos,
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        destroy: true,
        paging: false,
        scrollY: "170px",
        scrollCollapse: true,
        searching: false,
        columns: [
            { title: "Teléfonos :", data: "contacto" },

            { title: "Editar" },
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
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar noticia' class='btn btn-outline-success'   onclick=' abrirModalEdit(" + data.idcontacto + "," + data.tipo_contacto + ", " + '"' + data.contacto + '"' + ")'><i class=\"fas fa-edit\"></i></button>";
                }
            },
            {
                targets: 2,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='" + data.idnoticia + "' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar noticia' onclick=' deleteContacto(" + data.idcontacto + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}

async function iniciarTablaCorreos($datos) {
    $('#correos_list').dataTable({
        data:$datos ,
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        destroy: true,
        paging: false,
        scrollY: "170px",
        scrollCollapse: true,
        searching: false,
        columns: [
            { title: "Correos:", data: "contacto" },

            { title: "Editar" },
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
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar correo' class='btn btn-outline-success'   onclick=' abrirModalEdit(" + data.idcontacto + "," + data.tipo_contacto + ", " + '"' + data.contacto + '"' + ")'><i class=\"fas fa-edit\"></i></button>";
                }
            },
            {
                targets: 2,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='" + data.idnoticia + "' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar correo' onclick=' deleteContacto(" + data.idcontacto + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}




/// inicio get data
function getTelefonos() {
    respuesta = [];
    $.ajax({
        url: "../../Controller/nosotros/switch_controller.php",
        type: "POST",
        dataType: "json",
        data: { "btn_accion": "get_telefonos" },
        async: false,
        success: function (data) {
            respuesta = data;
        },
        error: function (error) {
            console.log("Error:");
            console.log(error);
        }
    });
    return respuesta;
}

function getRedes() {
    respuesta = [];
    $.ajax({
        url: "../../Controller/nosotros/switch_controller.php",
        type: "POST",
        dataType: "json",
        data: { "btn_accion": "get_redes" },
        async: false,
        success: function (data) {
            respuesta = data;
        },
        error: function (error) {
            console.log("Error:");
            console.log(error);
        }
    });
    return respuesta;
}


function getCorreos() {
    respuesta = [];
    $.ajax({
        url: "../../Controller/nosotros/switch_controller.php",
        type: "POST",
        dataType: "json",
        data: { "btn_accion": "get_correos" },
        async: false,
        success: function (data) {
            respuesta = data;
        },
        error: function (error) {
            console.log("Error:");
            console.log(error);
        }
    });
    return respuesta;
}
// fin get data


function deleteContacto(id) {

    Swal.fire({
        title: '¿Está seguro?',
        text: "¡Se eliminara esta contacto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "../../Controller/nosotros/switch_controller.php",
                data: { "btn_accion": "eliminar_contacto", "id_contacto": id },
                async: false,
                dataType: "json",
                success: function () {
                    refreshTables();
                    Swal.fire(
                        'Eliminada!',
                        'contacto ha sido eliminada',
                        'success'
                    )
                    $('#' + id).parent().parent().remove();

                },
                error: function () {
                    Swal.fire(
                        'Ha ocurrido un error',
                        'intente refrescar la pagina',
                        'error'
                    )

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

function abrirModalRegistro() {
    $('#modalRegistro').modal('show');
}
function abrirModalEdit(id, tipo, contacto) {
    setinputEdit(tipo);
    $('#id_contacto').val(id);

    $('#input_contacto_edit').val(contacto);
    $('#modalEdit').modal('show');
}


function refreshTables() {

    $('#telefonos_list').DataTable().clear().rows.add(getTelefonos()).draw();

    $('#red_list').DataTable().clear().rows.add(getRedes()).draw();

    $('#correos_list').DataTable().clear().rows.add(getCorreos()).draw();
}


function setinputEdit(opcion) {
  
    $("#input_contacto_edit").removeClass("Correo Red Telefono");
    $("#input_contacto_edit").unmask();
    $("#input_contacto_edit").removeAttr("maxlength");

    switch (opcion) {
        case 1:
            $("#input_contacto_edit").addClass('Telefono');
            break;
        case 2:
            $("#input_contacto_edit").addClass('Red');
            break;
        case 3:
            $("#input_contacto_edit").addClass('Correo');
            break;
        default:
            break;
    }

}
function setinputRegistro(opcion) {
    (opcion == 'Selecione') ? $('#label_contacto').text('contacto') : $('#label_contacto').text(opcion);
    $("#input_contacto").val('');
    $("#input_contacto").removeClass("Correo Red Telefono");
    $("#input_contacto").removeAttr("maxlength");
    $("#input_contacto").unmask();
    $("#input_contacto").addClass(opcion);
}



