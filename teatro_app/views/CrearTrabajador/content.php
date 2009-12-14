    <div id="principal">
        <div class="post" align="center">
            <h2>CREAR TRABAJADOR</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Crear_Trabajador">
        <table border="0" align="left" cellspacing="0">
            <tr>
                <td width="150" height="27">NOMBRES</td>
                <td width="652"><input type="text" size="30" name="nombres" /></td>
            </tr>
            <tr>
                <td width="150">RUT</td>
                <td><input type="text" name="rut" size="21" value="" maxlength="8" /> -
                <input type="text" name="digito" size="2" maxlength="1" /></td>
            </tr>
            <tr>
                <td width="150">FECHA DE NACIMIENTO</td>
                <td>
                    <input readonly type="text" name="fecha1" size="30"/>
                    <script language="JavaScript">
                        new tcal ({
                                'formname': 'ingreso',
                                'controlname': 'fecha1'
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <td width="150">DIRECCIÓN</td>
                <td><input type="text" name="direccion" size="30" /></td>
            </tr>
            <tr>
                <td width="150">TELEFONO</td>
                <td><input type="text" name="telefono" size="30" /></td>
            </tr>
            <tr>
                <td width="150">CARGO/FUNCIÓN<td><input type="text" name="cargo" value="" size="30"/></td>

            </tr>
            <tr>
                <td width="150">TIPO DE CONTRATO</td>
                <td>
                     <label>FIJO</label>
                    <input name="tipo_con" type="radio" value="Fijo" onclick="showTextBox_trabajador();"/>
                    <label>INDEFINIDO</label>
                    <input name="tipo_con" type="radio" value="Indefinido" onclick="hiddenTextBox_trabajador();"/>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA INICIO CONTRATO</td>
                <td>
                    <input readonly type="text" name="fecha2" size="30"/>
                    <script language="JavaScript">
                    new tcal ({
                        'formname': 'ingreso',
                        'controlname': 'fecha2'
                    });
                    </script>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA TÉRMINO CONTRATO</td>
                <td><div id="fecha_termino" style="display:block"><input readonly type="text" name="fecha3" size="30"/>
                    <script language="JavaScript">
                    new tcal ({
                        'formname': 'ingreso',
                        'controlname': 'fecha3'
                    });
                    </script></div>
                </td>
            </tr>
            <tr>
                <td width="150">REMUNERACIÓN</td>
                <td><input type="text" name="remuneracion" /></td>
            </tr>
            <tr>
                <td width="150">ASIGNACIONES</td>
                <td>
                    <table width="150" border="1" cellpadding="0">
                        <tr>
                            <td align="center">DE CAJA</td>
                            <td scope="col"><input name="acaja" type="text" /></td>
                        </tr>
                        <tr>
                            <td align="center">DE MOVILIAZACIÓN </td>
                            <td>
                                <input name="amovilizacion" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">DE COLACIÓN</td>
                            <td>
                                <input name="acolacion" type="text" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150">AFP</td>
                <td>
                    <select name="afp">
                        <option>ALAMEDA</option>
                        <option>APORTA</option>
                        <option>BANNUESTRA</option>
                        <option>BANGUARDIA</option>
                        <option>BANSANDER</option>
                        <option>CUPRUM</option>
                        <option>CONCORDIA</option>
                        <option>EL LIBERTADOR</option>
                        <option>FOMENTA</option>
                        <option>FUTURO</option>
                        <option>FOMENTA</option>
                        <option>GENERA</option>
                        <option>HABITAT</option>
                        <option>INVIERTA</option>
                        <option>LABORAL</option>
                        <option>MAGISTER</option>
                        <option>PROVIDA</option>
                        <option>PLAN VITAL</option>
                        <option>PROTECCION</option>
                        <option>SANTA MARIA</option>
                        <option>PREVIPAN</option>
                        <option>SAN CRISTOBAL</option>
                        <option>SUMMA</option>              
                        <option>QUALITAS</option>
                        <option>VALORA</option>
                        <option selected="selected">...</option>
                    </select>
                    <input name="monto_afp" type="text" value="" />
                    (actualizar una vez al a&ntilde;o)
                </td>
            </tr>
            <tr>
                <td valign="middle">SALUD</td>
                <td>
                    <p>
                        <input name="tipo_salud" type="radio" value="fonasa" />
                            FONASA
                        <input name="monto_fonasa" type="text" value="" />
                            ( 7 &oacute; 6.4, depende de caja de compensaci&oacute;n)
                    </p>
                    <p>
                        <input name="tipo_salud" type="radio" value="isapre" />
                            ISAPRE
                        <select name="nombre_isapre">
                            <option>BANMEDICA</option>
                            <option>CONSALUD</option>
                            <option>COLMENA</option>
                            <option>CONSALUD</option>
                            <option>CRUZ DEL NORTE</option>
                            <option>CRUZ BLANCA</option>
                            <option>MAS VIDA</option>
                            <option>RIO BLANCO</option>
                            <option>VIDA TRES</option>
                            <option selected="selected"> </option>
                        </select>
                        <input name="monto_isapre" type="text" value="monto" />
                            Monto personalizado en UF ( dos decimales )
                    </p>
                </td>
            </tr>
            <tr>
                <td width="150">APV</td>
                <td>
                    <table width="150" border="0">
                        <tr>
                            <td>U.F.</td>
                            <td>
                                <input type="text" name="uf" />
                            </td>
                        </tr>
                        <tr>
                            <td>PESOS</td>
                            <td>
                                <input type="text" name="pesos" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150" valign="middle" >CARGAS FAMILIARES</td>
                <td>
                    <p>
                        <input name="cargas" type="radio" value="si" checked="checked" />
                            SI
                        <input name="cargas" type="radio" value="no" />
                            NO
                    </p>
                    <table width="500" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>NOMBRES</th>
                            <th>TIPO</th>
                            <th>FECHA VENC. </th>
                            <th>RUT</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="nombrecarga" size="20" />
                            </td>
                            <td>
                                <select name="tipocarga">
                                    <option selected="selected"> </option>
                                    <option>Conyuge</option>
                                    <option>Hijo /a</option>
                                    <option>Padre</option>
                                    <option>Madre</option>
                                </select>
                            </td>
                            <td>
                            <input readonly type="text" name="fecha4" size="10"/>
                            <script language="JavaScript">
                            new tcal ({
                                'formname': 'ingreso',
                                'controlname': 'fecha4'
                            });
                            </script>
                            </td>
                            <td>
                                <div align="center">
                                    <input name="rutcarga" type="text" size="10" maxlength="8"/> -
                                    <input name="digitocarga" type="text" size="1" maxlength="1" />
                                </div>
                            </td>
                        </tr>
                    </table>
                    <p>(se deben poder agregas muchas mas , si se elije la opcion no la tabla debe desaparecer) </p>
                </td>
            </tr>
            </table>
            <br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" value="Crear" name="crear" />
                <input class="btn" type="reset" value="Limpiar" name="limpiar" />
            </div>
        </form>
        </div>
        <br><br>
    </div>