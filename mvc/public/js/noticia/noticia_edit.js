$(document).ready(function () {


var $ruleti = [
    {
    error: "required_title",
    msg: "Debe ingresar un titulo"
},
{
    error: "max_title",
    msg: "Excedio el tamaño para el titulo"
},

];

    var $ruleck = [
        {
        error: "required_content",
        msg: "Debe ingresar más contenido para la pagina"
    },
    {
        error: "max_content",
        msg: "Excedio el tamaño de la para el contenido de la pagina"
    },
];

var $ruleau = [
    {
    error: "required_content",
    msg: "Debe ingresar un autor"
},
{
    error: "max_content",
    msg: "Excedio el tamaño para el autor"
},
{
    error: "letter_content",
    msg: "Solo se permiten letras"
},
];
    var $texto ="";

    var instance = CKEDITOR.instances.editor_noticia;
    instance.on('change', function (evt) {
       $texto = CKEDITOR.instances.editor_noticia.getData().replace(/<[^>]*>/gi, '').trim();
        $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");

        validado = validarCkeditor($texto,$ruleck, $('#error_noticia'));
    });


    $("#titulo_noticia").bind(" change click keyup input paste", function(event){
        $titulo =  $("#titulo_noticia").val().trim();
        validado = validarTitle($titulo,$ruleti, $('#error_titulo'));
    });
    
    $("#autor_noticia").bind(" change click keyup input paste", function(event){
        $autor =  $("#autor_noticia").val().trim();
        validado =     validarAutor($autor,$ruleau, $('#error_autor'));
    });

        $("#form-noticia-edit").submit(function (ev) {
            ev.preventDefault();
            $texto = CKEDITOR.instances.editor_noticia.getData().replace(/<[^>]*>/gi, '').trim();
            $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");
            $titulo =  $("#titulo_noticia").val().trim();
            $autor =  $("#autor_noticia").val().trim();
            
        if(validarCkeditor($texto,$ruleck, $('#error_noticia')) &&  validarTitle($titulo,$ruleti, $('#error_titulo')) &&  validarAutor($autor,$ruleau, $('#error_autor')) ){


            Swal.fire({
                title: '¿Está seguro?',
                text: "Se modificara esta noticia. Esta acción es irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Actualizar!',
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    $data = $('#form-noticia-edit').serializeArray();
                    
                    $data.push({ name: 'id_noticia', value: $("#form-noticia-edit").attr("name") });
                    $data.push({ name: 'accion', value: 'update' });


                    $.ajax({
                        url: '../../controller/noticia/noticia_switch.php',
                        type: 'POST',
                        data: $.param($data),
                        async: false,
                        dataType: "json",
                        success: function (res) {

                            console.log(res);
                            var result = limpiarJson(res);
                            alertas(res);
                        },
                        error: function (res) {
                            console.log(res);
                            var result = limpiarJson(res);
                            alertas(res);
                        }
                    });
                    } else {
                        Swal.fire(
                            'Cancelado',
                            'Se ha cancelado la acción de Actualizar',
                            'error'
                        )  }


                });
            }
       
    });

});
