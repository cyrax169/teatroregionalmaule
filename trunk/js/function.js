/*function muestraRut()
{
    var nombre = $('#nombre').val();
      $('#rut').load(base_url+"index.php/cuentas/welcome/buscaRut/"+nombre);
}*/

function muestraRut()
{
    $.ajax({
        cache:false,
        type:"POST",
        data:$('#userForm').serialize(),
        url:base_url+"index.php/welcome/buscaRut1",
        success: function(htmlresponse,data)
        {
            $('#permiso').html(htmlresponse);
        }
    });
}

function muestra(form){
   alert("Datos Borrados"+form.ciudad.value);
}

function valida(form){
   var msg = "";
   for(i = 0 ; i < form.length ; i++ )
      if(form.elements[ i ].value == "")
    	msg += "\n -" + form.elements[ i ].name ;
   if( msg == "" ){
   		form.submit();
  }
   else{
      alert("Faltan los siguientes datos: \n" + msg)
       
   }
}


function actualizaUF()
{
    $.post(base_url+"welcome/actualizaUF", {
           uf: $("#uf").val()},
  function(data){
    	switch(data.resultado)
        {
          case 'true':
                $('#msj_response').html("<p>U.F actualizada correctamente</p>");
                break;

          case 'false':
                $('#msj_response').html("<p>Ya almacenó UF en el día de hoy</p>");
                break;
          case 'letras':
                $('#msj_response').html("<p>Campo Requerido - Solo letras</p>");
                break;
          default:
                $('#msj_response').html("<p>Verifique el valor ingresado</p>");
                break;
        }
  }, "json");

}
