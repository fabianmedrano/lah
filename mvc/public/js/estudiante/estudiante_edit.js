var $form;

$(document).ready(function () {

    prepararPagina();
});

async function prepararPagina() {
    // validate
    initValidate();
    $form = $("#form_edit_estudiante");
    $form.validate();
    
    var id=  getParameterByName('estudiante'); // id persona pasado por url get
    
    await iniciarDatePicker();
    await  cargarGrados(id);

    cargarContactosEstutiante(id);
    cargarDatosEstudiante(id);
}



/*  -- -- -- -- ACTUALIZAR DATOS -- -- -- -- */
function guardarEstudiante() {
    if ($form.valid()) {





        Swal.fire({
            title: 'Esta seguro?',
            text: "Se guardara este contacto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Guardar!'
        }).then((result) => {
            if (result.value) {
                $data = $('#form_edit_estudiante').serializeArray();
                $data.push({ name: 'id_estudiante', value: getParameterByName('estudiante')});
                $data.push({ name: 'accion', value: 'update' });
                console.log($data);

                $.ajax({
                    url: '../../controller/estudiante/estudiante_switch.php',
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


/*  -- -- -- -- CARGAR DATOS -- -- -- -- */
async function cargarGrados() {
 return cargarDatos('../../controller/estudiante/estudiante_switch.php', { 'accion': 'getGrados' })
    .then(response => response.json())
    .then(response =>  gregarOpcionesSelect('in_select_ano', response, 'grado', 'id_seccion'))
    .then(response => console.log(response))
    .catch(error => { console.error(error) });        
}


function cargarContactosEstutiante(id) {
    cargarDatos('../../controller/estudiante/estudiante_switch.php', { 'accion': 'getContactosEstudiante' , 'id_persona': id }) // falta el id del estudiante
    .then(response => response.json())
    .then(response =>  llenarContactos(response))
    .then(response => console.log(response))
    .catch(error => { console.error(error) });
}

function cargarDatosEstudiante(id) {
    cargarDatos('../../controller/estudiante/estudiante_switch.php', { 'accion': 'getDatosEstudiante', 'id_persona': id}) // falta el id del estudiante
    .then(response => response.json())
    .then(response =>  llenarCamposEstudiante(response))
    .then(response => console.log(response))
    .catch(error => { console.error(error) });
}

/*  -- -- -- -- LLENAR INFORMACION -- -- -- -- */

function llenarCamposEstudiante(estudiante) {
    $('#in_nombre_completo').val((estudiante[0])['nombre']);
    $('#in_cedula').val((estudiante[0])['cedula']);
    $('#in_select_ano').val((estudiante[0])['id_seccion']);// este es select
    $('#in_fecha_nacimiento').val((estudiante[0])['nacimiento']);
}

function llenarContactos(contactos) {
    for (value in contactos) {
        var tipo =((contactos[value])['tipo'] == 1)?'TELEFÓNO':'CORREO';
        $("#tb_contactos").append('<tr id="'+ (contactos[value])['id_contacto']+'"><td>' + tipo + '</td><td>' + (contactos[value])['contacto'] + '</td> <td>    <input  type="button" class="btn btn-danger borrar_contacto" value="quitar"></td></tr>');
    }
}


/*  -- -- -- --   AGREGAR Y ELIMINAR CONTACTOS-- -- -- -- */
function agregarContacto($tipoContacto, $input) { //metodo para agregar contacto a la tabla aqui debe di insertar directamente a la base de datos
    var $contacto = $("#" + $input).val(); // poner aqui valid(); recordar ignorar estos campos para el submit
    if ($contacto != ""&& + $( "#"+$input ).valid() ) {

        Swal.fire({
            title: 'Esta seguro?',
            text: "Se guardara este contacto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Guardar!'
        }).then((result) => {
            if (result.value) {
                $data=[];
                
                $data.push({ name: 'id_estudiante', value: getParameterByName('estudiante') });
                $data.push({ name: 'contacto',value: $contacto});
                $data.push({ name: 'tipo_contacto',value: $tipoContacto});
                $data.push({ name: 'accion', value: 'insertContacto' });
                console.log($data);
                $.ajax({
                    url: '../../controller/estudiante/estudiante_switch.php',
                    type: 'POST',
                    data: $.param($data),
                    success: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result)); // error con este parse
                        $("#tb_contactos").append('<tr><td>' + $tipoContacto + '</td><td>' + $contacto + '</td> <td>    <input  type="button" class="btn btn-danger borrar_contacto" value="quitar"></td></tr>');
                        resetCamposContactos()
                  
                    },
                    error: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result));
                    }
                    
                });
   
            }
        });
    
    }
}


$(document).on('click', '.borrar_contacto', function (event) {
    event.preventDefault();
   Swal.fire({
    title: '¿Esta seguro?',
    text: "¡Se eliminar este contacto¡",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar!'
}).then((result) => {
    if (result.value) {
        $data=[];
        $fila =$(this).closest('tr');
        $data.push({ name: 'id_contacto', value:$fila.attr('id') /*$(this).closest('tr').attr('id')*/ });
        $data.push({ name: 'accion', value: 'deleteContacto' });
        $.ajax({
            url: '../../controller/estudiante/estudiante_switch.php',
            type: 'POST',
            data: $.param($data),
            success: function (res) {
               $fila.remove();

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











});

