        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h1>Bienvenidos al Sistema TRM</h1>
        </div>
        
        <br/><br/>
        <form name="Empresa" method="post" action="">
            <table width="764" border="0" align="center">
                <tr>
                    <td width="194" height="27">RAZÓN SOCIAL</td>
                    <td width="560"><input type="text" id="rsocial" name="rsocial" size="29"/></td>
                     <script language="JavaScript">
                        new valida ({
                                'formname': 'Datos',
                                'controlname': 'rsocial'
                        });
                    </script>
                </tr>
                <tr>
                    <td width="150">RUT</td>
                    <td><input type="text" id="rut" name="rut" size="20" value="" maxlength="8" /> -
                    <input type="text" id="digito" name="digito" size="2" maxlength="1" /></td>
                </tr>
                <tr>
                    <td>DIRECCIÓN</td>
                    <td><input type="text" id="direccion" name="direccion" size="29"/></td>
                </tr>
                <tr>
                    <td>CAJA DE COMPENSACIÓN </td>
                    <td>
                            <label>SI</label>
                            <input id="caja1" name="caja1" type="radio" value="SI" onchange="showTextBox();"/>
                            <label>NO</label>
                            <input id="caja1" name="caja1" type="radio" value="NO" onchange="hiddenTextBox();"/>
                                (SI = 6.4 % fonasa ; NO = 7% )
                        
                        <div id="fonasa_caja" style="display:none">
                            <input type="text" id="cajasi" name="cajasi" size="29" />
                        </div>
                   </td>
                </tr>
                <tr>
                    <td valign="top">APORTE PATRONAL</td>
                    <td>
                        <table width="200" border="0" >
                            <tr> <!-- Hay que hacer que la palabra Monto% desaparezca al momento de seleccionar la casila-->
                                <td>
                                    <select id="apatronal" name="apatronal">
                                        <option selected="selected"> </option>
                                        <option>Mutual</option>
                                        <option>IST</option>
                                    </select>
                                </td>
                            <th><input id="monto" name="monto" type="text" value="" size="17" /></th>
                            </tr>
                        </table>
                        <p>(actualizar una vez al año) </p>
                   

                </tr>
            </table>
            <br><br>
            <div align="center" id="form">
                <input class="btn" type="button" name="Salir" value="Guardar" onclick="datosEmpresa();"/>
            </div>
        </form>
        <div id="error_empresa"></div>
        <br/><br/><br/><br/>