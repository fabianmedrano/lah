 var   $tablaServicios=[];
$(document).ready(function() {


    iniciarTabla();
});



function getEstudiantes() {
    respuesta = [];
    $.ajax({
        url: "../../controller/estudiante/estudiante_switch.php",
        type: "POST",
        dataType: "json",
        data: { "accion": "getEstudiantes" },
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
    $('#tb_estudiantes').dataTable({
        data: getEstudiantes(),
        language: { "url": "../../configDatatabble.json" },
        select: false,
        destroy: true,
        "scrollx": true,
        columns: [
            { title: "Nombre", data: "nombre" },
            { title: "Cédula", data: "cedula" },
            { title: "Grado", data: "id_seccion" },
            { title: "Contacto", data: "contacto" },

            { title: "Editar" },
            { title: "Eliminar" },
        ],
        columnDefs: [
            {
                targets: 4,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar noticia' class='btn btn-outline-success'   onclick='goEditEstudiante(" + data.idpersona + ")'><i class=\"fas fa-edit\"></i></button>";
                }
            },
            {
                targets: 5,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='"+data.idpersona+"' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar noticia' onclick='deleteEstudiante(" + data.idpersona + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}


function deleteEstudiante(id) {

    Swal.fire({
        title: '¿Está seguro?',
        text: "¡Se eliminara esta noticia!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: "Cancelar",
    }).then((result) => {
            if (result.value) {
                $data = [];
                $data.push({ name: 'accion', value: 'deleteEstudiante' });
                $data.push({ name: 'id_persona', value: id });

                $.ajax({
                method: "POST",
                url:  '../../controller/estudiante/estudiante_switch.php',
                data:$data,
                async: false,
                dataType: "json",

                success: function (res) {
                    console.log(res);
                    var result = limpiarJson(res);
                    alertas(JSON.parse(result));
                    
                    $('#'+id).parent().parent().remove();
                },          
                error: function (res) {
                    console.log(res);
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

function goEditEstudiante(id) {
    window.location.href ="/view/estudiante/estudiante_edit.php?estudiante="+id;
} 