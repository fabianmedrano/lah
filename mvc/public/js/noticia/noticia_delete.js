$(document).ready(function () {


    $("#form-noticia-delete").submit(function (ev) {
        ev.preventDefault();

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

                var $form = $("#form-noticia-delete");
                var $accion = "&btn_accion=Eliminar";
                $.ajax({
                    method: $form.attr("method"),
                    url: $form.attr("action"),
                    data: $form.serialize() + $accion,
                    async: false,
                    dataType: "json",
                    success: function () {

                        Swal.fire(
                            'Eliminada!',
                            'Noticia ha sido eliminada',
                            'success'
                        )

                    },
                    error: function () {
                        Swal.fire(
                            'Ha ocurrido un error',
                            'intente refrescar la pagina',
                            'error'
                        )

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


    });









});