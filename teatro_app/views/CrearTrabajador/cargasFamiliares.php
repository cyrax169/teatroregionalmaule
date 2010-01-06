<!--form id="cargas_familiares" action="" method=""-->
<?php if($nAlternativas != 0):?>
    <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="left">
        <tr>
            <th align="center">NOMBRES</th>
            <th align="center">TIPO</th>
            <th align="center">FECHA VENC.</th>
            <th align="center">RUT</th>
        </tr>
        <?php for($i=0; $i<$nAlternativas; $i++) :?>
        <tr>
            <td><input type="text"  name="nombre_<?php echo $i;?>" size="35" /></td>
            <td><select name="tipo_<?php echo $i;?>">
                    <option selected="selected">...</option>
                    <option>Hijo/a</option>
                    <option>Conyuge</option>
                    <option>Padre</option>
                    <option>Madre</option>
                </select>
            </td>
            <td><input type="text" name="fechaven_<?php echo $i;?>"size="14"/>
                
            </td>
            <td><input type="text" name="rut_<?php echo $i;?>" maxLength="8" size="8"/>
                -
                <input type="text" name="digito_<?php echo $i;?>" maxLength="1" size="3"/>
            </td>
            
        </tr>
        <?php endfor;?>
    </table>
<?php endif;?>
<!--/form-->
