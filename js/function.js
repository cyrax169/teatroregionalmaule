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
function storeUTM()
{
    $.post(base_url+"welcome/UTM", {
           mes: $("#combo_meses").val(),
           utm: $("#utm").val()},
  function(data){
    	switch(data.resultado)
        {
          case 'true':
                $('#msj_response1').html("<p>U.T.M actualizada correctamente</p>");
                break;

          case 'false':
                $('#msj_response1').html("<p>Ya almacenó U.T.M para el mes y año solicitado</p>");
                break;
          case 'letras':
                $('#msj_response1').html("<p>Campo Requerido - Solo números</p>");
                break;
          default:
                $('#msj_response1').html("<p>Verifique el valor ingresado</p>");
                break;
        }
  }, "json");

}

function showTextBox()
{
    $("#fonasa_caja").show();
}
function hiddenTextBox()
{
    $("#fonasa_caja").hide();
}

function menuBar(opt){
	switch(opt){
	case 1:
		var url = base_url +'welcome/Empresa';
                break;
        default:
                var url = base_url +'index.php/inicio/';
                break;
        }
	$.ajax({
		cache: false,
	   type: "POST",
	   url: url,
	   success: function(htmlresponse){
	   		$("#principal").html(htmlresponse);
	   }
	 });
}
function datosEmpresa()
{
    $.post(base_url+"welcome/DatosEmpresa", {
           rsocial: $("#rsocial").val(),
           rut: $("#rut").val(),
           digito:$("#digito").val(),
           direccion: $("#direccion").val(),
           caja: $("#caja").val(),
           casasi: $("#cajasi").val(),
           apatronal: $("#apatronal").val(),
           monto: $("#monto").val()},
    function(data){
    	switch(data.resultado)
        {
          case 'true':
                $('#error_empresa').html("<div align='center' style='color:red'><p>Empresa almacenada correctamente.</p></div>");
                break;

          case 'false':
                $('#error_empresa').html("<div align='center' style='color:red'><p>Empresa existente en el sistema.</p></div>");
                break;
          case 'update':
                $('#error_empresa').html("<div align='center' style='color:red'><p>Empresa actualizada correctamente en el sistema.</p></div>");
                break;
          case 'letras':
                $('#error_empresa').html("<div align='center' style='color:red'><p>Campo Requerido - Solo números</p></div>");
                break;
          case 'campos_faltantes':
                alert('Complete todos los campos solicitados.');
                break;
          default:
                $('#error_empresa').html("<div align='center' style='color:red'><p>Verifique el valor ingresado</p></div>");
                break;
        }
  }, "json");

}
