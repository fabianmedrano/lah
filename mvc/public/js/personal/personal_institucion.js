
$(document).ready(function () {

    prepararPagina();
});

function prepararPagina() {
    cargarRoles();
    cargarFuncionarios();
}





function cargarRoles(id) {
    cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getRoles'  }) 
    .then(response => response.json())
    .then(response =>  llenarRoles(response))
    .catch(error => { console.error(error) });
}


function cargarFuncionarios() {
    cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getPersonal'}) 
    .then(response => response.json())
    .then(response =>  llenarFuncionarios(response))
    .catch(error => { console.error(error) });
}

function getFuncionariosRol(id) {

    // borrar contenido de un div jquery
    cargarDatos('../../controller/personal/personal_switch.php', { 'accion': 'getPersonalRol', 'id_rol': id}) 
    .then(response => response.json())
    .then(response =>  llenarFuncionarios(response))
    .catch(error => { console.error(error) });
}

function llenarFuncionarios($funcionarios) {
    $('#contenido_personal').empty();
    for (value in $funcionarios) {
        

   $funcionario = '<div class="card">'
        +'<img src="../../public/img/1293388.svg" width="85"  alt="Italian Trulli">'
            +' <h2>'+($funcionarios[value])['nombre']+'</h2>'
            +' <p>'+($funcionarios[value])['rol']+'</p> '
            +' <p>'+($funcionarios[value])['contacto']+'</p> '
        + '</div>';



    $('#contenido_personal').append($funcionario);



    }
}


function llenarRoles($roles) {
    for (value in $roles) {
        (value == 1) ?
        $('#breadcrumb').append('<li class="breadcrumb-item active"><a href="#" onclick="getFuncionariosRol('+($roles[value])['id_rol']+' ) " >'+($roles[value])['rol']+'</a></li>') : 
        $('#breadcrumb').append('<li class="breadcrumb-item"><a href="#" onclick="getFuncionariosRol('+($roles[value])['id_rol']+') " >'+($roles[value])['rol']+'</a></li>'); 
    }
}