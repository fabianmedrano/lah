
    function validarCkeditor($texto, $msg, $idError) {
        min = ($texto.length < 20) ? pintarError($msg[0], $idError) : borrarError($msg[0], $idError);
        max = ($texto.length > 3500) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
        return (min && max);
    }
    
    function validarTitle($texto, $msg, $idError) {
        min = ($texto.length < 1) ? pintarError($msg[0], $idError) : borrarError($msg[0], $idError);
        max = ($texto.length > 150) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
        return (min && max);
    }
    function validarAutor($texto, $msg, $idError) {
        min = ($texto.length < 1) ? pintarError($msg[0], $idError) : borrarError($msg[0], $idError);
        max = ($texto.length > 200) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
        especiales =  (!/^[ a-záéíóúüñ]*$/i.test($texto)) ? pintarError($msg[2], $idError) : borrarError($msg[2], $idError);
        return (min && max && especiales);
    }

    function validarURL($texto, $msg, $idError) {
        return (!isUrlValid($texto)) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
    }

    function validarEmail($texto, $msg, $idError) {
        return (isEmail($texto)) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
    }
    function validarTelefono($texto, $msg, $idError) {
        return (!($texto.length === 9)) ? pintarError($msg[0], $idError) : borrarError($msg[0], $idError);
    }
    
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return (!regex.test(email));
      }
    function isUrlValid(url) {
        return /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(url);
    }
    function validarFileInput($FileInput, $msg, $idError) {
        return   (  !($FileInput)[0]  ) ? pintarError($msg[2], $idError) : borrarError($msg[2], $idError);
    }

    
    function pintarError($msg, $idError) {
        if (!$("#" + $msg['error'])[0]) {
            $idError.append('<div id="' + $msg['error'] + '"  class="alert alert-warning   " role="alert" > ' + $msg['msg'] + '</div>');
        }
        return false;
    }
    function borrarError($msg, $idError) {
        if ($("#" + $msg['error'])[0]) {
            $("#" + $msg['error']).remove();
        }
        return true;
    }

    function limpiarError() {
            $(".alert-warning").remove();
    
    }

