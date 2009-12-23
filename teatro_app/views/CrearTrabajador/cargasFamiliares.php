<form id="cargas_familiares" action="" method="">
<?php if($nAlternativas != 0):?>
<table id="tabla_simple">
            <tr>
                <th>NOMBRES</th>
                <th>TIPO</th>
                <th>FECHA VENC. </th>
                <th>RUT</th>
            </tr>
            <?php for($i=0; $i<$nAlternativas; $i++) :?>
            <tr>
                <td><input type="text"  name="nombre_<?php echo $i;?>" /></td>
                <td><input type="text" name="tipo_<?php echo $i;?>"/></td>
                <td><input type="text" name="fechaven_<?php echo $i;?>" /></td>
                <td><input type="text" name="rut_<?php echo $i;?>"/></td>
            </tr>
            <?php endfor;?>
    </table>
<?php endif;?>
</form>