$(document).ready(function () {

    iniciarTabla();

});


function iniciarTabla() {
    $('#noticias_list').dataTable({
        data: getNoticias(),
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        destroy: true,
        "scrollx": true,
        columns: [
            { title: "Titulo", data: "titulo" },
            { title: "Fecha", data: "fecha" },

            { title: "Editar" },
            { title: "Eliminar" },
        ],
        columnDefs: [
            {
                targets: 2,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar noticia' class='btn btn-outline-success'   onclick='goEditNoticia(" + data.id_noticia + ")'><i class=\"fas fa-edit\"></i></button>";
                }
            },
            {
                targets: 3,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='"+data.idnoticia+"' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar noticia' onclick='deleteNoticia(" + data.id_noticia + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}


function getNoticias() {
    respuesta = [];
    $.ajax({
        url: "../../controller/noticia/noticia_switch.php",
        type: "POST",
        dataType: "json",
        data: { "accion": "obtener_noticias" },
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



function goEditNoticia(id) {
    location.href = "noticia_edit_admin.php?noticia=" + id
}

function deleteNoticia(id) {

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
            $.ajax({
                method: "POST",
                url: "../../controller/noticia/noticia_switch.php",
                data: { "accion": "delete", "id_noticia": id },
                async: false,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    alertas(res);
                    
                     $('#noticias_list').DataTable().clear().rows.add(getNoticias()).draw();
                 
                },          
                error: function (res) {
                    console.log(res);
                    var result = limpiarJson(res);
                    alertas(result);
                    
                
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