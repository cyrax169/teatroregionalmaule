<!-- CREO QUE ESTA VISTA HAY QUE EDITARLA, YA QUE NO COINCIDE CON LOS DATOS QUE SE ESTAN PIDIENDO EN LA BD!!!!
     De todos modos se creo el controlador que solo verifica que los datos se lean correctamente.
-->
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
        <table width="764" border="0" align="center">
            <?php foreach($result as $row):?>
            <tr>
                <td width="194" height="27">RAZÓN SOCIAL</td>
                <td width="560"><input type="text" name="rsocial" value="<?=$row->RazonSocial?>" readonly/></td>
            </tr>
            <tr>
                <td>RUT</td>
                <td><input type="text" name="rut" value="<?=$row->Rut?>" readonly/></td>
            </tr>
            <tr>
                <td>DIRECCIÓN</td>
                <td><input type="text" name="direccion" value="<?=$row->Direccion?>" readonly/></td>
            </tr>
            <tr>
                <td>CAJA DE COMPENSACIÓN </td>
                <td>
                        <input type="text" name="cajasi" value="<?=$row->CajaCompensacion?>" readonly/>
                            (si es si sale este cuadrado para poder colocar el nombre de la caja)
                </td>
            </tr>
            <tr>
                <td valign="top">APORTE PATRONAL</td>
                <td>
                     <input name="apatronal" type="text" value="<?=$row->AportePatronal?>" readonly>
                     <input name="monto" type="text" value="<?=$row->MontoAporte?>" readonly/>
                        
                    </td>
            </tr>
            <?php endforeach;?>
        </table>
        <br><br>
        <br><br><br><br>
    </div>

</div>