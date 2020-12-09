 var $tabla;
$(document).ready(function() {


    iniciarTabla();
});



function getconstancia() {
    respuesta = [];
    // puedo seleccionar todo y poner las resueltas  al final 
    // recordar tratar poner tiempo para que se eliminen automaticamente
    $.ajax({
        url: "../../controller/constancia/constancia_switch.php",
        type: "POST",
        dataType: "json",
        data: { "accion": "getConstancias" },
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
    $tabla =$('#tb_constancias').dataTable({
        data: getconstancia(),
        language: { "url": "../../configDatatabble.json" },
        select: false,
        destroy: true,
        "scrollx": true,
        columns: [
            { title: "Nombre", data: "nombre" },
            { title: "cedula", data: "cedula" },
            { title: "seccion", data: "id_seccion" },
            
            { title: "Estado" },
            { title: "Ver" },
            { title: "Finalizar" },
        ],
        columnDefs: [
            {
                targets: 3,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return  ( data.estado == 0 )?'PENDIENTE' : 'FINALIZADO'  ;
                }
            },
            {
                targets: 4,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar constancia' class='btn btn-outline-success'   onclick='goConstancia(" + data.cedula + ")'><i class=\"fas fa-eye\"></i></button>";
                }
            },
            {
                targets: 5,
                data: null,
                orderable: true,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    $clase ="";
                    if(!data.estado ){ $clase = "class='btn btn-outline-info'" ;}else{ $clase= "class='btn btn-outline-light'" ;};
return "<button id='" +data.idnoticia+"' type='button' data-toggle='tooltip' data-placement='top' title='Finalizar' onclick='cambiarEstado(" + data.id+ ")' "+$clase+" ><i class=\"fas fa-check\" ></i></button>";



                }
            }
        ],
    });
}


function cambiarEstado(id) {

    Swal.fire({
        title: '¿Está seguro?',
        text: "¡Se cabiara el estado de la constancia!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar!',
        cancelButtonText: "Cancelar",
    }).then((result) => {
            if (result.value) {
                $data = [];
                $data.push({ name: 'accion', value: 'cambiarConstancia' });
                $data.push({ name: 'id', value: id });

                $.ajax({
                method: "POST",
                url:  '../../controller/constancia/constancia_switch.php',
                data:$data,
                async: false,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                  //var result = limpiarJson(res);
                   // alertas(JSON.parse(result));
                   location.reload(); 
                  // $tabla.destroy();
                   //iniciarTabla() ;
                },
                error: function (res) {
                    console.log(res);
                    location.reload(); 
                  //  var result = limpiarJson(res);
                    //alertas(JSON.parse(result));
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

function goConstancia(id) {
    window.location.href ="/view/constancia/constancia.php?estudiante="+id;
} 
