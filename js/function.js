/* Mensaje para LiveValidation
 * Aquí iran los mensajes para las validaciones de datos, en la vista hay que solo llamar
 * a estas variables. La idea es lograr regularidad en los mensajes que se muestran
 */
//Si no es un entero
var notAnIntMsj = "Debe ser un entero!";
//si es 0 o menor
var tooLowMsj = "Debe ser mayor que 0!";
//mensaje para dato valido
var validMsj = "Correcto";
//campo que no puede ir vacio
//var notSupplyValue="Debe poner un valor"
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
                
          case 'letras':
                $('#msj_response').html("<p>Campo Requerido - Solo Números</p>");
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
          case 'letras':
                $('#msj_response1').html("<p>Campo Requerido - Solo Números</p>");
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
function showTextBox_trabajador()
{
    $("#fecha_inicio").show();
    $("#fecha_termino").show();
    $("#Afc").hide();
}
function hiddenTextBox_trabajador()
{
    $("#fecha_inicio").show();
    $("#fecha_termino").hide();
    $("#Afc").show();
}
function showTextBox_salud()
{
    $("#isapre").hide();
}
function hiddenTextBox_salud()
{
    $("#isapre").show();
}
function showTextBox_Vacaciones()
{
    $("#Vacaciones").show();
}
function hiddenTextBox_Vacaciones()
{
    $("#Vacaciones").hide();
}
function showTextBox_Licencias()
{
    $("#Licencias").show();
}
function hiddenTextBox_Licencias()
{
    $("#Licencias").hide();
}
function showTextBox_Permisos()
{
    $("#Permisos").show();
}
function hiddenTextBox_Permisos()
{
    $("#Permisos").hide();
}
function showTextBox_Prestaciones()
{
    $("#Prestaciones").show();
    $("#NumeroPrestaciones").show();
}
function hiddenTextBox_Prestaciones()
{
    $("#Prestaciones").hide();
    $("#NumeroPrestaciones").hide();
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
           caja: $("#caja1").val(),
           cajasi: $("#cajasi").val(),
           apatronal: $("#apatronal").val(),
           monto: $("#monto").val()
    },
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
function addAlternativa()
{
    datos = $('#cantrespuestas').val();
    $.ajax(
      {
        data:$('#cantrespuestas').val(),
        type: "POST",
        url: base_url +'welcome/cargasFamiliares/'+$('#cantrespuestas').val(),
        cache: false,
            success: function(htmlresponse,data) {
                    if(datos!='')
                        $("#cargasFamiliares").html(htmlresponse,data);

        }
      }); 
}
function addAlternativa2()
{
    datos = $('#Nprestaciones').val();
    $.ajax(
    {
        data:$('#Nprestaciones').val(),
        type:"POST",
        url: base_url +'welcome/NumeroPrestaciones/'+$('#Nprestaciones').val(),
        cache: false,
            success: function(htmlresponse,data) {
                    if(datos!=''){
                        $("#NumeroPrestaciones").html(htmlresponse,data);
                    }
                        
            }
    });
}
function Dias(fecha1,fecha2,num)
{
    //alert(fecha1+"---"+fecha2)
    fecha1 = fecha1.split("-");
    fecha2 = fecha2.split("-");
    //alert(fecha1+"---"+fecha2)
    //alert(fecha1+fecha2);
    var date1 = new Date(fecha1[0]+"/"+fecha1[1]+"/"+fecha1[2]);
    var date2 = new Date(fecha2[0]+"/"+fecha2[1]+"/"+fecha2[2]);
    //alert(date1+"---"+date2);
    //alert(date1.getYear());
    dif =  (Math.round((date2-date1)/86400000)) + 1;
    if( dif < 0 || num > dif || num < 0 || num == 0)
        alert("Fechas No Corresponden!!");
}
function MaxDias(dias)
{
    if(dias>30)
        alert("La cantidad de días no corresponde!!");
}
function VerificaCarga(fecha1)
{
    var fecha2 = new Date();
    fecha1 = fecha1.split("-");
    var date1 = new Date(fecha1[0]+"/"+fecha1[1]+"/"+fecha1[2]);
    dif =  (Math.round((date1-fecha2)/86400000)) + 1;
    if(dif<0)
        alert("Carga ingresada está vencida!");
}