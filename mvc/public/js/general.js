function limpiarJson(res){
    var bool = true, insert = false;
    var i = 0;
    var result = '';
    while(i < res.length && bool){
        if(res.charAt(i) === '{'){
            insert = true;
        }else if(res.charAt(i) === '}'){
            insert = false;
            result += res.charAt(i);
        }

        if(insert){
            result += res.charAt(i);
        }

        i ++;
    }

    return result;
}

function alertas(result) {
    if(result.status === 1){
        alertify.success(result.msm);
    }else if(result.status === 0){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: result.msm
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: result.msm
        })
    }
}

function estudiantesXGrados($grado) {
    
}