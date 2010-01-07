    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>IMPUESTO ÚNICO TRIBUTARIO</h2>
        </div>
        <br><br><br>
        <form name="form" method="post" action="<?=base_url()?>index.php/welcome/tablaIUT">
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
                    <td><input type="text" name="desde1" value="0.0" readonly /></td>
                    <td><input type="text" name="hasta1" value="<?php echo $a + 0.00;?>" readonly /></td>
                    <td><input type="text" name="" value="Exento" readonly /></td>
                    <td><input type="text" name="cantidad1" value="0" readonly /></td>
                    <td><input type="text" name="" value="Exento" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde2" value="<?php echo $a + 0.01;?>" readonly  /></td>
                    <td><input type="text" name="hasta2" value="<?php echo $b;?>" readonly /></td>
                    <td><input type="text" name="" value="0.05" readonly/></td>
                    <td><input type="text" name="cantidad2" value="<?php echo $c;?>" readonly/></td>
                    <td><input type="text" name="" value="3%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde3" value="<?php echo $b + 0.01;?>" readonly /></td>
                    <td><input type="text" name="hasta3" value="<?php echo $d;?>" readonly /></td>
                    <td><input type="text" name="" value="0.10" readonly /></td>
                    <td><input type="text" name="cantidad3" value="<?php echo $e;?>" readonly /></td>
                    <td><input type="text" name="" value="6%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde4" value="<?php echo $d + 0.01;?>" readonly /></td>
                    <td><input type="text" name="hasta4" value="<?php echo $f;?>" readonly /></td>
                    <td><input type="text" name="" value="0.15" readonly /></td>
                    <td><input type="text" name="cantidad4" value="<?php echo $g;?>" readonly /></td>
                    <td><input type="text" name="" value="8%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde5" value="<?php echo $f + 0.01;?>" readonly /></td>
                    <td><input type="text" name="hasta5" value="<?php echo $h;?>" readonly/></td>
                    <td><input type="text" name="" value="0.25" readonly /></td>
                    <td><input type="text" name="cantidad5" value="<?php echo $j;?>" readonly /></td>
                    <td><input type="text" name="" value="12%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde6" value="<?php echo $h + 0.01;?>" readonly/></td>
                    <td><input type="text" name="hasta6" value="<?php echo $i;?>" readonly/></td>
                    <td><input type="text" name="" value="0.32" readonly /></td>
                    <td><input type="text" name="cantidad6" value="<?php echo $l;?>" readonly /></td>
                    <td><input type="text" name="" value="17%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde7" value="<?php echo $k + 0.01;?>" readonly /></td>
                    <td><input type="text" name="hasta7" value="<?php echo $m;?>" readonly /></td>
                    <td><input type="text" name="" value="0.37" readonly /></td>
                    <td><input type="text" name="cantidad7" value="<?php echo $n;?>" readonly /></td>
                    <td><input type="text" name="" value="21%" readonly /></td>
                </tr>
                <tr>
                    <td><input type="text" name="desde8" value="<?php echo $m + 0.01;?>" readonly /></td>
                    <td><input type="text" name="hasta8" value="999999999" readonly /></td>
                    <td><input type="text" name="" value="0.4" readonly /></td>
                    <td><input type="text" name="cantidad8" value="<?php echo $o;?>" readonly /></td>
                    <td><input type="text" name="" value="Más de 21%" readonly /></td>
                </tr>
            </tbody>
        </table>
            <br><br>
             <h2 align="center">ingrese el valor:  UTM</h2>
       <div align="center" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/tablaIUT">
            <form name="frm" method="post" action="">
                <table style="margin-left:50px;" cellspacing="30px">
                    <tr>
                      <td>
                        <p>Seleccione el mes e ingrese el valor de la U.T.M.<br/>Nota:Se ingresaran para el año actual <?php echo date('Y');?></p>
                        <select id="combo_meses">
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                       </select>
                        <input type="text" name="utm" id="utm"/>
                        <input type="button" name="submit" class="btn" value="Enviar" onclick="storeUTM();"/>
                        <div  id="msj_response1" style="color:red;text-align:center;"></div>
                        </td>
                    </tr>
                </table>
            </form>
        <br><br><br><br><br><br>
    </div>
</div>