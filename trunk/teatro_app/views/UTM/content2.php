<div id="principal">
   <div class="post" align="center">
        <h2>UTM</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br>
        <form action="<?=base_url()?>index.php/welcome/UTM1">
        <table border="1" align="center" cellpadding="0" cellspacing="0">
            <?php foreach($result as $row):?>
            <thead>
                <tr>
                    <th align="center">Mes</th>
                    <th align="center">Valor UTM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="enero" value="Enero" readonly /></td>
                    <td><input type="text" name="montoene" value="<?=$row->MontoUTM?>" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="febrero" value="Febrero" readonly /></td>
                    <td><input type="text" name="montofeb" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="marzo" value="Marzo" readonly /></td>
                    <td><input type="text" name="montomar" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="abril" value="Abril" readonly /></td>
                    <td><input type="text" name="montoabr" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="mayo" value="Mayo" readonly /></td>
                    <td><input type="text" name="montomay" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="junio" value="Junio" readonly /></td>
                    <td><input type="text" name="montojun" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="julio" value="Julio" readonly /></td>
                    <td><input type="text" name="montojul" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="agosto" value="Agosto" readonly /></td>
                    <td><input type="text" name="montoago" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="septiembre" value="Septiembre" readonly /></td>
                    <td><input type="text" name="montosep" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="octubre" value="Octubre" readonly /></td>
                    <td><input type="text" name="montooct" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="noviembre" value="Noviembre" readonly /></td>
                    <td><input type="text" name="montonov" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="diciembre" value="Diciembre" readonly /></td>
                    <td><input type="text" name="montodic" value="" /></td>
                </tr>
            </tbody>
            <?php endforeach;>
        </table>
        <br><br><br><br>
        <div id="form" align="center">
            <input class="btn" type="submit" value="Guardar" name="guardar" />
        </div>
        </form>
        <br><br><br><br><br><br><br><br>
    </div>
</div>