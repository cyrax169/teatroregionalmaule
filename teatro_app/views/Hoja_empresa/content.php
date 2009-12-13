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
    <!--    <form name="Empresa" method="post" action="<?=base_url()?>index.php/welcome/DatosEmpresa">!-->
           
    <form onsubmit=valida(Datos) name="Datos" action="<?=base_url()?>index.php/welcome/DatosEmpresa" method="">

            <table width="764" border="0" align="center">
                <tr>
                    <td width="194" height="27">RAZÓN SOCIAL</td>
                    <td width="560"><input type="text" name="rsocial" size="29"/></td>
                     <script language="JavaScript">
                        new valida ({
                                'formname': 'Datos',
                                'controlname': 'rsocial'
                        });
                    </script>
                </tr>
                <tr>
                    <td width="150">RUT</td>
                    <td><input type="text" name="rut" size="20" value="" maxlength="8" /> -
                    <input type="text" name="digito" size="2" maxlength="1" /></td>
                </tr>
                <tr>
                    <td>DIRECCIÓN</td>
                    <td><input type="text" name="direccion" size="29"/></td>
                </tr>
                <tr>
                    <td>CAJA DE COMPENSACIÓN </td>
                    <td><p>
                            <input name="caja" type="radio" value="SI" checked/>
                                SI
                            <input name="caja" type="radio" value="NO" />
                                NO
                                (SI = 6.4 % fonasa ; NO = 7% )
                        </p>
                        <p>
                            <input type="text" name="cajasi" size="29" />
                                (si es si sale este cuadrado para poder colocar el nombre de la caja)
                        </p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">APORTE PATRONAL</td>
                    <td>
                        <table width="200" border="0" size="29" >
                            <tr> <!-- Hay que hacer que la palabra Monto% desaparezca al momento de seleccionar la casila-->
                                <td>
                                    <select name="apatronal">
                                        <option selected="selected"> </option>
                                        <option>Mutual</option>
                                        <option>IST</option>
                                    </select>
                                </td>
                                <th><input name="monto" type="text" value="" size="17" /></th>
                            </tr>
                        </table>
                        <p>(actualizar una vez al año) </p>
                   

                </tr>
            </table>
            <br><br>
             <input class="btn" type="submit" name="Salir" value="Guardar"/>
            
        </form>
        <br><br><br><br>
    </div>
    
</div>