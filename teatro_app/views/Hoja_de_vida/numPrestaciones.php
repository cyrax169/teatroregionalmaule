<?php if ($numPrestaciones!=0):?>
    <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="left">
        <tr>
            <th align="center">INSTITUCIÓN</th>
            <th align="center">TIPO DE PRESTAMO</th>
            <th align="center">MONTO</th>
            <th align="center">CUOTAS</th>
        </tr>
        <?php for($i=0;$i<$numPrestaciones;$i++):?>
            <tr>
                <td align="center">
                    <input name="institucion<?php echo $i;?>" type="text" size="15"/>
                </td>
                <td align="center">
                    <input name="tipoprestacion<?php echo $i;?>" type="text" size="15"/>
                </td>
                <td align="center">
                    <input name="montoprestacion<?php echo $i;?>" type="text" size="15"/>
                </td>
                <td align="center">
                    <input name="cuotas<?php echo $i;?>" type="text" size="15"/>
                </td>

            </tr>
        <?php endfor;?>
    </table>
<?php endif;?>
