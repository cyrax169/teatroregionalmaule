    <div id="principal">
        <div class="post" align="center">
            <h2>IMPUESTO ÚNICO TRIBUTARIO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br>
        <table border="1" align="center" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th align="center">DESDE </th>
                    <th align="center">HASTA</th>
                    <th align="center">FACTOR </th>
                    <th align="center">CANTIDAD A REBAJAR</th>
                    <th align="center">TASA IMPUESTO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="" value="0.0" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $a + 0.00;?>" readonly /></td>
                    <td><input type="text" name="" value="Exento" readonly /></td>
                    <td><input type="text" name="" value="-.-" readonly /></td>
                    <td><input type="text" name="" value="Exento" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $a + 0.01;?>" readonly  /></td>
                    <td><input type="text" name="" value="<?php echo $b;?>" readonly /></td>
                    <td><input type="text" name="" value="0.05" readonly/></td>
                    <td><input type="text" name="" value="<?php echo $c;?>" readonly/></td>
                    <td><input type="text" name="" value="3%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $b + 0.01;?>" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $d;?>" readonly /></td>
                    <td><input type="text" name="" value="0.10" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $e;?>" readonly /></td>
                    <td><input type="text" name="" value="6%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $d + 0.01;?>" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $f;?>" readonly /></td>
                    <td><input type="text" name="" value="0.15" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $g;?>" readonly /></td>
                    <td><input type="text" name="" value="8%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $f + 0.01;?>" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $h;?>" readonly/></td>
                    <td><input type="text" name="" value="0.25" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $j;?>" readonly /></td>
                    <td><input type="text" name="" value="12%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $h + 0.01;?>" readonly/></td>
                    <td><input type="text" name="" value="<?php echo $i;?>" readonly/></td>
                    <td><input type="text" name="" value="0.32" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $l;?>" readonly /></td>
                    <td><input type="text" name="" value="17%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $k + 0.01;?>" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $m;?>" readonly /></td>
                    <td><input type="text" name="" value="0.37" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $n;?>" readonly /></td>
                    <td><input type="text" name="" value="21%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="" value="<?php echo $m + 0.01;?>" readonly /></td>
                    <td><input type="text" name="" value="Más" readonly /></td>
                    <td><input type="text" name="" value="0.4" readonly /></td>
                    <td><input type="text" name="" value="<?php echo $o;?>" readonly /></td>
                    <td><input type="text" name="" value="Más de 21%" readonly /></td>
                </tr>
            </tbody>
        </table>
        <br><br><br><br><br><br><br><br>
    </div>
</div>