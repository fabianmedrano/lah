var $form;

$(document).ready(function () {

    prepararPagina();
});

function prepararPagina() {
    initValidate();

    $form = $("#form_constancia");
    $form.validate();

}


function realizarSolicitud() {
    if ($form.valid()) {
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Se guardara este estudiante!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Guardar!'
        }).then((result) => {
            if (result.value) {

                $data = $('#form_constancia').serializeArray();
                $data.push({ name: 'accion', value: 'solicitud' });
                console.log($data);
                $.ajax({
                    url: '../../controller/constancia/constancia_switch.php',
                    type: 'POST',
                    data: $.param($data),
                    success: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result));
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
