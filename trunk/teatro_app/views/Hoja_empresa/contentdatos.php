        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h1>Bienvenidos al Sistema TRM</h1>
        </div>
        <br/><br/>
        <form name="Datos" action="" method="POST">
       
            <table width="764" border="0" align="center">
                <?php foreach($result as $row):?>
                <tr>
                    <td width="194" height="27">RAZÓN SOCIAL</td>
                    <td width="560"><input type="text" id="rsocial" name="rsocial" size="29" value="<?=$row->RazonSocial?>"/></td>
          
                </tr>
                
                <tr>
                    <td width="150">RUT</td>
                    <td><input type="text" name="rut" id="rut"  maxlength="8" value="<?=$row->Rut?>"/> -
                    <input type="text" name="digito" id="digito" size="2" maxlength="1" value="<?=$row->Digito?>"/></td>
                </tr>
                <tr>
                    <td>DIRECCIÓN</td>
                    <td><input type="text" id="direccion" name="direccion" size="29" value="<?=$row->Direccion?>"/></td>
                </tr>
                <tr>
                    <td>CAJA DE COMPENSACIÓN </td>
                <td>
                        <input type="text" id="cajasi" name="cajasi" size="29" value="<?=$row->CajaCompensacion?>"/>
                </td>
                </tr>
                <tr>
                    <td>APORTE PATRONAL</td>
                    <td>
                        <select id="apatronal" name="apatronal">
                                        <option selected="selected"><?=$row->AportePatronal?></option>
                                        <option>Mutual</option>
                                        <option>IST</option>
                                    </select>
                        <input id="monto" name="monto" type="text" size="12" value="<?=$row->MontoAporte?>"/>
                    </td>
                </tr>
            <?php endforeach;?>
            </table>
            <br><br>
            <div align="center" id="form">
                <input class="btn" type="button" name="Salir" value="Guardar" onclick="datosEmpresa();"/>
            </div>
        </form>
        <div id="error_empresa"></div>
