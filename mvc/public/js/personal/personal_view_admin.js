 var   $tablaServicios=[];
$(document).ready(function() {


    iniciarTabla();


});



function getPersonal() {
    respuesta = [];
    $.ajax({
        url: "../../controller/personal/personal_switch.php",
        type: "POST",
        dataType: "json",
        data: { "accion": "getPersonal" },
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
function getRoles() {
    respuesta = [];
    $.ajax({
        url: "../../controller/personal/personal_switch.php",
        type: "POST",
        dataType: "json",
        data: { "accion": "getRoles" },
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


function iniciarTabla() {
    $('#tb_personal').dataTable({
        data: getPersonal(),
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        destroy: true,
        "scrollx": true,
        columns: [
            { title: "Nombre", data: "nombre" },
            { title: "Función", data: "rol" },
            { title: "Contacto", data: "contacto" },

            { title: "Editar" },
            { title: "Eliminar" },
        ],
        columnDefs: [
            {
                targets: 3,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar noticia' class='btn btn-outline-success'   onclick='goEditpersonal(" + data.idpersona + ")'><i class=\"fas fa-edit\"></i></button>";
                }
            },
            {
                targets: 4,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='"+data.idpersona+"' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar noticia' onclick='deletePersonal(" + data.idpersona + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}


function deletePersonal(id) {

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
                $data.push({ name: 'accion', value: 'deletePersonal' });
                $data.push({ name: 'id_persona', value: id });

                $.ajax({
                method: "POST",
                url:  '../../controller/personal/personal_switch.php',
                data:$data,
                async: false,
                dataType: "json",
                success: function (res) {
                  var result = limpiarJson(res);
                    alertas(JSON.parse(result));
                    $('#tb_personal').DataTable().clear().rows.add(getEstudiantes()).draw();

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

function goEditpersonal(id) {
    window.location.href ="/view/personal/personal_edit.php?personal="+id;
} 


/***+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ ***/





