var $form;

$(document).ready(function () {

    prepararPagina();
});

function prepararPagina() {
    initValidate();

    $form = $("#form_create_personal");
    $form.validate();

    cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getRoles' })
        .then(response => response.json())
        .then(response => gregarOpcionesSelect('in_select_rol', response, 'rol', 'id_rol'))
        .then(response => console.log(response))
        .catch(error => { console.error(error) });
}


function guardarPersonal() {
    if ($form.valid()) {
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Se guardara este personal!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Guardar!'
        }).then((result) => {
            if (result.value) {

                $data = $('#form_create_personal').serializeArray();
                $data.push({ name: 'in_contactos', value: contactosToJson() });
                $data.push({ name: 'accion', value: 'insert' });
                console.log($data);
                $.ajax({
                    url: '../../controller/personal/personal_switch.php',
                    type: 'POST',
                    data: $.param($data),
                    success: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result)); // error con este parse
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



function agregarContacto($tipoContacto, $input) {
    var contacto = $("#" + $input).val(); // poner aqui valid(); recordar ignorar estos campos para el submit
    if (contacto != ""&& + $( "#"+$input ).valid()) {
        $("#tb_contactos").append('<tr><td>' + $tipoContacto + '</td><td>' + contacto + '</td> <td>    <input  type="button" class="btn btn-danger borrar" value="quitar"></td></tr>');
        resetCamposContactos();
    }
}


$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

