$(document).ready(function (){
    $.ajax({
        url: '../../controller/nosotros/nosotros_switch.php',
        type: 'POST',
        data: { accion: 'get'},
        success: function (res) {
            console.log(res);
            var result = limpiarJson(res);
            //alertas(JSON.parse(result));
        }
    });
});