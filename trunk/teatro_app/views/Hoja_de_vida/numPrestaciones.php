<?php if ($numPrestaciones!=0):?>
    <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="left">
        <tr>
            <th align="center">INSTITUCIÓN</th>
            <th align="center">TIPO DE PRESTAMO</th>
            <th align="center">MONTO</th>
            <th align="center">CUOTAS</th>
        </tr>
        <?for($i=0;$i<$numPrestaciones;$i++):?>
            <tr>
                <td align="center">
                    <input name="institucion<?echo $i?>" type="text" size="15"/>
                </td>
                <td align="center">
                    <input name="tipoprestacion<?echo $i?>" type="text" size="15"/>
                </td>
                <td align="center">
                    <input name="montoprestacion<?echo $i?>" type="text" size="15"/>
                </td>
                <td align="center">
                    <input name="cuotas<?echo $i?>" type="text" size="15" value=""/>
                </td>

            </tr>
        <?endfor;?>
    </table>
<?endif;?>
