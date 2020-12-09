$.validator.addMethod('nombre_completo', function (value) { 
    var wom = value.match(/\S+/g);
    return ( ( 2 < ( wom ? wom.length : 0) )? true : false );
});

$.validator.addMethod('letras_espacios', function (value) { 
    return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/g.test(value);
});
$.validator.addMethod('cedula_cr', function (value) { 
    return /^[1-9]-?\d{4}-?\d{4}$/.test(value);
});

 $.validator.addMethod("select_option", function(value){
    return 'default' !== value;
   });
  

function initValidate(){
    jQuery.validator.setDefaults({
        debug: true,        
        success: "valid",
        rules: {
            in_nombre_completo: {
              required: true,
              nombre_completo: true,
              letras_espacios:true
            },
            in_cedula:{
                required: true,
                cedula_cr: true
            },
            in_fecha_nacimiento:{
                required: true, 
            },
            in_contacto_correo: {
                email: true
              },
              in_contacto_telefono: {
			    number: true,
			    maxlength: 8,
			    minlength: 8
            }, 
            in_select_ano:{ 
                select_option:true
            }         
          },   
          messages: {
            in_nombre_completo: {
              required: "Debe ingresar un nombre",
              nombre_completo: "Debe ingresar el nombre completo",
              letras_espacios: "No se permiten caracteres especiales o números"
           
            },
            in_cedula: {
                required: "Debe de ingresar la cédula",
                cedula_cr : "Formato de cédula incorrecto"
            },
              in_fecha_nacimiento:{
                required: 'Debe de ingresar la fecha de nacimiento', 
            },
            in_contacto_correo: {
                email: "Email incorrecto"
              },
              in_contacto_telefono:{
                number: "Solo se permiten numeros",
			    maxlength: "Deben de ser 8 caracteres",
			    minlength: "Deben de ser 8 caracteres"
              },
              in_select_ano:{ 
                select_option: "Debe de seleccionar un grado para el estudiante"
            }  
          },
        
      });

     
}


