var $form;

$(document).ready(function () {

    prepararPagina();
});

function prepararPagina() {
    // validate
    initValidate();
    $form = $("#form_edit_personal");
    $form.validate();
    
    var id=  getParameterByName('personal'); // id persona pasado por url get
    cargagrdatos(id);
}

async  function cargagrdatos(id) {

        await cargarRoles();

    
    cargarContactosPersonal(id);
    cargarDatosPersonal(id);  
}



/*  -- -- -- -- ACTUALIZAR DATOS -- -- -- -- */
function guardarPersonal() {
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
                $data = $('#form_edit_personal').serializeArray();
                $data.push({ name: 'id_personal', value: getParameterByName('personal')});
                $data.push({ name: 'accion', value: 'update' });
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
                        
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result)); // error con este parse
                    }
                    
                });
   
            }
        });





    } else {
        console.log('no valido');
    }
}


/*  -- -- -- -- CARGAR DATOS -- -- -- -- */
async function cargarRoles() {
   return cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getRoles' })
    .then(response => response.json())
    .then(response => gregarOpcionesSelect('in_select_rol', response, 'rol', 'id_rol'))
    .catch(error => { console.error(error) });  
}


function cargarContactosPersonal(id) {
    cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getContactosPersonal' , 'id_persona': id }) 
    .then(response => response.json())
    .then(response =>  llenarContactos(response))
    .catch(error => { console.error(error) });
}

function cargarDatosPersonal(id) {
    cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getDatosPersonal', 'id_persona': id}) 
    .then(response => response.json())
    .then(response =>  llenarCamposPersonal(response))
    .catch(error => { console.error(error) });
}

/*  -- -- -- -- LLENAR INFORMACION -- -- -- -- */

function llenarCamposPersonal(personal) {
    $('#in_nombre_completo').val((personal[0])['nombre']);
    $('#in_select_rol').val( (personal[0])['id_rol'] );
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
                
                $data.push({ name: 'id_personal', value: getParameterByName('personal') });
                $data.push({ name: 'contacto',value: $contacto});
                $data.push({ name: 'tipo_contacto',value: $tipoContacto});
                $data.push({ name: 'accion', value: 'insertContacto' });
                console.log($data);
                $.ajax({
                    url: '../../controller/personal/personal_switch.php',
                    type: 'POST',
                    data: $.param($data),
                    success: function (res) {
                        console.log(res);
                        var result = limpiarJson(res);
                        alertas(JSON.parse(result)); 
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
    event.preventDefault();// aqui hay que borrar lo pero de la base de datos
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
            url: '../../controller/personal/personal_switch.php',
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

