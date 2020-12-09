
$.validator.addMethod('cedula_cr', function (value) { 
  return /^[1-9]-?\d{4}-?\d{4}$/.test(value);
});

function initValidate(){
    jQuery.validator.setDefaults({
        debug: true,        
        success: "valid",
        rules: {

          input_solicitud_constancia:{
            required: true,
            cedula_cr: true
        },
      
          },   
          messages: {
            input_solicitud_constancia: {
              required: "Debe su cedula",
              cedula_cr:"Formato de cedula incorrecto"
           
            }, 
            
          },
        
      });

     
}


