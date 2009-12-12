<div id="principal">
        <div class="post" align="center">
            <h2>EMPRESA</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <form name="Empresa" method="post" action="<?=base_url()?>index.php/welcome/DatosEmpresa1">
            <table width="764" border="0" align="center">
                <?php foreach($result as $row):?>
                <tr>
                    <td width="194" height="27">RAZÓN SOCIAL</td>
                    <td width="560"><input type="text" name="rsocial" size="29" value="<?=$row->RazonSocial?>"/></td>
                </tr>
                <tr>
                    <td width="150">RUT</td>
                    <td><input type="text" name="rut" size="20" maxlength="8" value="<?=$row->Rut?>"/> -
                    <input type="text" name="digito" size="2" maxlength="1" value="<?=$row->Digito?>"/></td>
                </tr>
                <tr>
                    <td>DIRECCIÓN</td>
                    <td><input type="text" name="direccion" size="29" value="<?=$row->Direccion?>"/></td>
                </tr>
                <tr>
                    <td>CAJA DE COMPENSACIÓN </td>
                <td>
                        <input type="text" name="cajasi" size="29" value="<?=$row->CajaCompensacion?>"/>
                </td>
                </tr>
                <tr>
                <td>APORTE PATRONAL</td>
                <td>
                     <input name="apatronal" type="text" size="12" value=" <?=$row->AportePatronal?>">
                     <input name="monto" type="text" size="12" value="<?=$row->MontoAporte?>"/>
                    </td>
            </tr>
            <?php endforeach;?>
       
            </table>
            <br><br>
            <div align="center" id="form">
                    <input class="btn" type="submit" name="Salir" value="Guardar"/>
            </div>
        </form>
        <br><br><br><br>
    </div>

</div>