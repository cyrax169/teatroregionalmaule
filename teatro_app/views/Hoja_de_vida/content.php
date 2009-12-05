    <div id="principal">
        <div class="post" align="center">
            <h2>HOJA DE VIDA</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <form name="frm" method="post" action="">
            <table border="0" align="left" cellspacing="0">
                <tr>
                    <!--?php foreach($query as $row):?-->
                    <!--?php print_r ($query['Rut']); ?-->
                    <td width="150" height="27">NOMBRES</td>
                    <td width="652"><input type="text" name="NOMBRES" value="<?=$query['Nombre']?>" /></td>
                </tr>
                <tr>
                    <td width="150">RUT</td>
                    <td><input type="text" name="RUT" value="<?=$query['Rut']?>" /></td>
                </tr>
                <tr>
                    <td width="150">FFECHA DE NACIMIENTO</td>
                    <td>
                        <input readonly type="text" name="fecha1" value="<?=$query['FechaNacimiento']?>" size="20"/>
                        <script language="JavaScript">
                            new tcal ({
                                    'formname': 'frm',
                                    'controlname': 'fecha1'
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="150">DIRECCIÓN</td>
                    <td><input type="text" name="DIRECCION" value="<?=$query['Direccion']?>" /></td>
                </tr>
                <tr>
                    <td width="150">TELEFONOS</td>
                    <td><input type="text" name="TELEFONOS"value="<?=$query['Telefono']?>" /></td>
                </tr>
                <tr>
                    <td width="150">CARGO/FUNCIÓN<td><input type="text" name="CARGO" value="<?=$query['Cargo']?>" /></td>

                </tr>
                <tr>
                    <td width="150">TIPO DE CONTRATO</td>
                    <td>
                        <input name="TIPOCONTRATO" type="text" value="<?=$query['TipoContrato']?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="150">FECHA INICIO CONTRATO</td>
                    <td>
                        <input readonly type="text" name="fecha2" size="20" value="<?=$query['FechaInicioContrato']?>"/>
                        <script language="JavaScript">
                            new tcal ({
                                    'formname': 'frm',
                                    'controlname': 'fecha2'
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="150">FECHA TÉRMINO CONTRATO</td>
                    <td>
                        <input readonly type="text" name="fecha3" size="20" value="<?=$query['FechaTerminoContrato']?>"/>
                        <script language="JavaScript">
                            new tcal ({
                                    'formname': 'frm',
                                    'controlname': 'fecha3'
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="150">DÍAS TRABAJADOS </td>
                    <td><input type="text" name="DTRABAJADOS"  value="<?=$query['DiasTrabajados']?>"/></td>
                </tr>
                <tr>
                    <td width="150">REMUNERACIÓN</td>
                    <td><input type="text" name="REMUNERACION" value="<?=$query['Salario']?>"/></td>
                </tr>
                <tr>
                    <td width="150">BONOS</td>
                    <td>
                        <input name="BONOS" type="text" value="" />
                        <input name="MONTO" type="text" value="<?=$query['Bonos']?>" />
                        ( puede ser mas de uno FALTAN LOS NOMBRESSS EN LA BD!)
                    </td>
                </tr>
                <tr>
                    <td width="150">HORAS EXTRAS</td>
                    <td>
                        <input name="HEXTRA" type="text" value="<?=$query['HorasExtras']?>" />
                        <input name="HMONTO" type="text" value="" />
                    </td>
                </tr>
                <tr>
                    <td width="150">ASIGNACIONES</td>
                    <td>
                        <table width="150" border="1" cellpadding="0">
                            <tr>
                                <td align="center">DE CAJA</td>
                                <td scope="col"><input name="AMONTO1" type="text" value="<?=$query['Acaja']?>" /></td>
                            </tr>
                            <tr>
                                <td align="center">DE MOVILIAZACIÓN </td>
                                <td>
                                    <input name="AMONTO2" type="text" value ="<?=$query['Amovilizacion']?>" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">DE COLACIÓN</td>
                                <td>
                                    <input name="AMONTO3" type="text"  value="<?=$query['Acolacion']?>"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150">ANTICIPO</td>
                    <td>
                        <input type="text" name="ANTICIPO" value="no está en la BD!"/>
                        (puede ser mas de uno)
                    </td>
                </tr>
                <tr>
                    <td width="150">AFP</td>
                    <td>
                        <select name="AFP">
                            <option>PROVIDA</option>
                            <option>CUPRUM</option>
                            <option selected="selected"><?=$query['NombreAfp']?></option>
                        </select>
                        <input name="PORCENTAJEAFP" type="text" value="<?=$query['PorcentajeAfp']?>" />
                        (actualizar una vez al año)
                    </td>
                </tr>
                <tr>
                    <td width="150">AFC</td>
                    <td>
                        <input name="AFC" type="radio" value="radiobutton" checked/>
                            SI
                        <input name="AFC" type="radio" value="radiobutton" />
                            NO    (automatica dependiendo del tipo de contrato)
                    </td>
                </tr>
                <tr>
                    <td valign="middle">SALUD</td>
                    <td>
                        <p>
                            <input name="SALUD" type="radio" value="radiobutton" />
                                FONASA
                            <input name="MONTO_FONASA" type="text" value="<?=$query['Fonasa']?>" />
                                ( 7 &oacute; 6.4, depende de caja de compensaci&oacute;n)
                        </p>
                        <p>
                            <input name="SALUD" type="radio" value="radiobutton" />
                                ISAPRE
                            <select name="ISAPRE">
                                <option>BANMÉDICA</option>
                                <option>CONSALUD</option>
                                <option selected="selected"><?=$query['NombreIsapre']?></option>
                            </select>
                            <input name="MONTOISAPRE" type="text" value="<?=$query['MontoIsapre']?>" />
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
                                    <input type="text" name="UF" value="<?=$query['apvUf']?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>PESOS</td>
                                <td>
                                    <input type="text" name="PESOS" value="<?=$query['apvPesos']?>" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">CARGAS FAMILIARES</td>
                    <td>
                        <p>
                            <input name="CARGAS" type="radio" value="radiobutton" />
                                SI
                            <input name="CARGAS" type="radio" value="radiobutton" />
                                NO
                        </p>
                        <table width="500" border="1">
                            <tr>
                                <th>NOMBRES</th>
                                <th>TIPO</th>
                                <th>FECHA VENC. </th>
                                <th>RUT</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="NOMBRESCARGA" size="20" value="<?=$query['Nombres']?>"/>
                                </td>
                                <td>
                                    <select name="TIPOCARGA">
                                        <option selected="selected"><?=$query['Tipo']?> </option>
                                        <option>Conyuge</option>
                                        <option>Hijo/a</option>
                                        <option>Padre</option>
                                        <option>Madre</option>
                                    </select>
                                </td>
                                <td>
                                    <input readonly type="text" name="fecha4" size="10" value="<?=$query['FechaVencimiento']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha4'
                                        });
                                    </script>
                                </td>
                                <td>
                                    <div align="center">
                                        <input name="RUTCARGA" type="text" size="10" maxlength="8" value="<?=$query['RutCarga']?>"/> -
                                        <input name="DIGITO" type="text" size="1" maxlength="1"/>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150" height="120" valign="middle">VACACIONES</td>
                    <td>
                        <table width="500" border="1">
                            <tr>
                                <th align="center">DESDE</th>
                                <th align="center">HASTA</th>
                                <th align="center" >TOTAL DÍAS</th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input readonly type="text" name="fecha5" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha5'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha6" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha6'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input name="TOTALDIAS" type="text" value="CALCULAR" size="20" />
                                </td>
                            </tr>
                        </table>
                        <p>(Total Dias = 1.25 * (total meses trabajados )) ; meses trabajados: si entra antes del 15 se cuenta como mes // se agranda automaticamente todos los a&ntilde;os // se tienen que ver todas las vacaciones anteriores </p>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">LICENCIAS MÉDICAS</td>
                    <td>
                        <table width="500" border="1">
                            <tr>
                                <th align="center">DÍA</th>
                                <th align="center">INICIO</th>
                                <th align="center">TÉRMINO</th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input name="DIAS1" type="text" size="20" />
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha7" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha7'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha8" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha8'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                        <p>1-3 : no se descuentan de los dias trabajados ; 1 - 10 : se empiezan a descontar desde el 4 dia ; 1 - 11: se descuentan todos los dias </p>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">PERMISOS</td>
                    <td>
                        <table width="500" border="1">
                            <tr>
                                <th align="center">DÍA</th>
                                <th align="center">INICIO</th>
                                <th align="center">TÉRMINO</th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input name="DIAS2" type="text" size="20" />
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha9" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha9'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha10" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'frm',
                                                'controlname': 'fecha10'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                        <input name="GOCEDESUELDO" type="radio" value="radiobutton" />
                            SI
                        <input name="GOCEDESUELDO" type="radio" value="radiobutton" />
                            NO (Si es con goce de sueldo no se le descuentan).
                    </td>
                </tr>
                <tr>
                    <td width="150">PRESTACIONES</td>
                    <td>
                        <br><br>
                        <table width="500" border="1">
                            <tr>
                                <th align="center">INSTITUCIÓN</th>
                                <th align="center">TIPO DE PRESTAMO</th>
                                <th align="center">MONTO</th>
                            </tr>
                            <tr>
                                <td align="center"><input name="INSTITUCION" type="text" size="15" /></td>
                                <td align="center"><input name="TIPOPRESTACION" type="text" size="15" /></td>
                                <td align="center"><input name="MONTOPRESTACION" type="text" size="15" /></td>
                            </tr>
                        </table>
                       <p>(botón que de la opción de agregar)</p>
                    </td>
                </tr>
                <!--?php endforeach;?-->
            </table>

            <br><br>
            <table width="150" border="0" align="center">
                <tr>
                    <td align="center"><input type="submit" value="Guardar" name="Guardar" /></td>
                    <td align="center"><input type="reset" value="Limpiar" name="limpiar" /></td>
                </tr>
            </table>
        </form>
        <br><br>
    </div>
</div>