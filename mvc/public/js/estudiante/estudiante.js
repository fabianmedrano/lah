async function cargarDatos($url ,$datos) {
    $data =new FormData();

    $.each( $datos, function( key, value ) {
        $data.append(key,  value);
    });
    
    return fetch($url,
    { 
        method: 'POST',
        body: $data
    }
    );
}


async function iniciarDatePicker() {
    $('[data-toggle="datepicker"]').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es-ES'
    });    
}


function gregarOpcionesSelect(domElement, array,indice,valor) {
    var select = document.getElementsByName(domElement)[0];
    for (value in array) {
        var option = document.createElement("option");
        option.text = (array[value])[indice];
        option.value= (array[value])[valor];
        select.add(option);
    }
}
   

function contactosToJson(){
    var  contactos=[];
    var $th = ['tipo','contacto'];
    $('table tbody tr').each(function(i, tr){
           var obj = {}; 
           var $tds = $(tr).find('td');
           $th.forEach(function( th,index){
               obj[th] = $tds.eq(index).text();
           });
         contactos.push(obj);
    });
  return  JSON.stringify(contactos);
 }


   
 function resetCamposContactos() {
    $("#in_contacto_telefono").val(""); // telefono y correo
    $("#in_contacto_correo").val("");
}



function getParameterByName( name ){
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( window.location.href );
    if( results == null )
      return "";
    else
      return decodeURIComponent(results[1].replace(/\+/g, " "));
  }