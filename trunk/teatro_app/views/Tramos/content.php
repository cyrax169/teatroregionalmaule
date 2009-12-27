<div id="principal">
   <div class="post" align="center">
        <h2>TRAMOS DE ASIGNACIONES FAMILIARES</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Tramos1">
        <table border="1" align="center" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th align="center">Desde</th>
                    <th align="center">Hasta</th>
                    <th align="center">Monto</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><input type="text" name="inicio1" value="<?=$query['Inicio1']?>" /></td>
                    <td><input type="text" name="termino1" value="<?=$query['Termino1']?>" /></td>
                    <td><input type="text" name="monto1" value="<?=$query['Monto1']?>" /></td>
                </tr>
                
                <tr>
                    <td><input type="text" name="inicio2" value="<?=$query['Inicio2']?>" /></td>
                    <td><input type="text" name="termino2" value="<?=$query['Termino2']?>"/></td>
                    <td><input type="text" name="monto2" value="<?=$query['Monto2']?>" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="inicio3" value="<?=$query['Inicio3']?>" /></td>
                    <td><input type="text" name="termino3" value="<?=$query['Termino3']?>"/></td>
                    <td><input type="text" name="monto3" value="<?=$query['Monto3']?>" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="inicio4" value="<?=$query['Inicio4']?>" /></td>
                    <td><input type="text" name="termino4" value="<?=$query['Termino4']?>"/></td>
                    <td><input type="text" name="monto4" value="<?=$query['Monto4']?>" /></td>
                </tr>
            </tbody>
        </table>
        <br><br><br><br>
        <div id="form" align="center">
            <input class="btn" type="submit" value="Guardar" name="guardar" onclick="tramos1();"/>
        </div>
        </form>

        <br><br><br><br><br><br><br><br>
    </div>
</div>