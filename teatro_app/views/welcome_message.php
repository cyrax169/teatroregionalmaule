<script src="<?=base_url();?>js/function.js" type="text/javascript"></script>
<script src="<?=base_url();?>js/jquery-1.3.2.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
base_url = 'http://localhost/trm/trunk/';
//]]>
</script>

<table border="1">
<?php
    foreach($datos ->result() as $row):
        echo "<tr><td>".$row->nombres."</td>";
        echo "<td>".$row->rut."</td></tr>";
    endforeach;
?>
</table>
<br /><br /><br />
<label>Cargas:</label>
    <input type="text" name="cargas" id="cargas"/>
<input type="button" value="addField" onclick="addField();"/>

<!--form id="userForm" name="userForm" >
    <label>Nombre:</label>
    <input type="text" name="nombre" id="nombre"/>
    <input type="button" value="aceptar" onclick="muestraRut();"/>
</form-->
<div id="rut"></div>