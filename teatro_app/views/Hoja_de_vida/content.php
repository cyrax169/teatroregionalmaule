    <div id="principal">
        <div class="post" align="center">
            <h2>HOJA DE VIDA</h2>
            <div align="right" id="form">
                <form name="frm1" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Modificacion_Trabajador">
            <table border="0" align="left" cellspacing="0">
                <tr>
                    <td width="150" height="27">NOMBRES</td>
                    <td width="652"><input type="text" name="nombres" value="<?=$query['Nombre']?>" size="30" /></td>
                </tr>
                <tr>
                    <td width="150">RUT</td>
                    <td><input type="text" name="rut" size="21" value="<?=$query['Rut']?>" maxlength="8" readonly/> -
                        <input type="text" name="digito" size="2" value="<?=$query['Digito']?>" maxlength="1" readonly/></td>
                </tr>
                <tr>
                    <td width="150">FECHA DE NACIMIENTO</td>
                    <td>
                        <input readonly type="text" name="fecha1" value="<?=$query['FechaNacimiento']?>" size="30"/>
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
                    <td><input type="text" name="direccion" value="<?=$query['Direccion']?>" size="30"/></td>
                </tr>
                <tr>
                    <td width="150">TELEFONO</td>
                    <td><input type="text" name="telefono"value="<?=$query['Telefono']?>" size="30"/></td>
                </tr>
                <tr>
                    <td width="150">CARGO/FUNCIÓN</td>
                    <td><input type="text" name="cargo" value="<?=$query['Cargo']?>" size="30"/></td>
                </tr>
                <tr>
                    <td width="150">TIPO DE CONTRATO</td>
                    <td><input name="tipocontrato" type="text" value="<?=$query['TipoContrato']?>" size="30"/></td>
                </tr>
                <tr>
                    <td width="150">FECHA INICIO CONTRATO</td>
                    <td>
                        <input readonly type="text" name="fecha2"  value="<?=$query['FechaInicioContrato']?>" size="30"/>
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
                    <td>
                        <input readonly type="text" name="fecha3" value="<?=$query['FechaTerminoContrato']?>" size="30"/>
                        <script language="JavaScript">
                            new tcal ({
                                    'formname': 'ingreso',
                                    'controlname': 'fecha3'
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="150">DÍAS TRABAJADOS </td>
                    <td><input type="text" name="dtrabajados"  value="<?=$query['DiasTrabajados']?>" size="30"/></td>
                </tr>
                <tr>
                    <td width="150">REMUNERACIÓN</td>
                    <td><input type="text" name="remuneracion" value="<?=$query['Salario']?>" size="30"/></td>
                </tr>
                <tr>
                    <td width="150">BONOS</td>
                    <td>
                        <input name="bonos" type="text" value=""  size="12"/> -
                        <input name="monto" type="text" value="<?=$query['Bonos']?>" size="11"/>
                        ( puede ser mas de uno FALTAN LOS NOMBRESSS EN LA BD!)
                    </td>
                </tr>
                <tr>
                    <td width="150">HORAS EXTRAS</td>
                    <td>
                        <input name="hextra" type="text" value="<?=$query['HorasExtras']?>" size="30" />
                    </td>
                </tr>
                <tr>
                    <td width="150">ASIGNACIONES</td>
                    <td>
                        <table width="150" border="1" cellpadding="0">
                            <tr>
                                <td align="center">DE CAJA</td>
                                <td scope="col"><input name="acaja" type="text" value="<?=$query['Acaja']?>" /></td>
                            </tr>
                            <tr>
                                <td align="center">DE MOVILIAZACIÓN </td>
                                <td>
                                    <input name="amovil" type="text" value ="<?=$query['Amovilizacion']?>" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">DE COLACIÓN</td>
                                <td>
                                    <input name="acolacion" type="text"  value="<?=$query['Acolacion']?>"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150">ANTICIPO</td>
                    <td>
                        <input type="text" name="anticipo" value="no está en la BD!"/>
                        (puede ser mas de uno)
                    </td>
                </tr>
                <tr>
                    <td width="150">AFP</td>
                    <td>
                        <select name="afp">
                            <option>PROVIDA</option>
                            <option>CUPRUM</option>
                            <option selected="selected"><?=$query['NombreAfp']?></option>
                        </select>
                        <input name="porcentajeafp" type="text" value="<?=$query['PorcentajeAfp']?>" />
                        (actualizar una vez al año)
                    </td>
                </tr>
                <tr>
                    <td width="150">AFC</td>
                    <td>
                        <input name="afc" type="radio" value="si" checked/>
                            SI
                        <input name="afc" type="radio" value="no" />
                            NO    (automatica dependiendo del tipo de contrato)
                    </td>
                </tr>
                <tr>
                    <td valign="middle">SALUD</td>
                    <td>
                        <p>
                            <input name="salud" type="radio" value="fonasa" />
                                FONASA
                            <input name="montofonasa" type="text" value="<?=$query['Fonasa']?>" />
                                ( 7 &oacute; 6.4, depende de caja de compensaci&oacute;n)
                        </p>
                        <p>
                            <input name="salud" type="radio" value="isapre" />
                                ISAPRE
                            <select name="isapre">
                                <option>BANMÉDICA</option>
                                <option>CONSALUD</option>
                                <option selected="selected"><?=$query['NombreIsapre']?></option>
                            </select>
                            <input name="montoisapre" type="text" value="<?=$query['MontoIsapre']?>" />
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
                                    <input type="text" name="apvuf" value="<?=$query['apvUf']?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>PESOS</td>
                                <td>
                                    <input type="text" name="apvpesos" value="<?=$query['apvPesos']?>" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">CARGAS FAMILIARES</td>
                    <td>
                        <p>
                            <input name="cargas" type="radio" value="si" />
                                SI
                            <input name="cargas" type="radio" value="no" />
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
                                    <input type="text" name="nombrecarga" size="20" value="<?=$query['Nombres']?>"/>
                                </td>
                                <td>
                                    <select name="tipocarga">
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
                                                'formname': 'ingreso',
                                                'controlname': 'fecha4'
                                        });
                                    </script>
                                </td>
                                <td>
                                    <div align="center">
                                        <input name="rutcarga" type="text" size="10" maxlength="8" value="<?=$query['RutCarga']?>"/> -
                                        <input name="digitocarga" type="text" size="1" maxlength="1" value="<?=$query['DigitoCarga']?>"/>
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
                                                'formname': 'ingreso',
                                                'controlname': 'fecha5'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha6" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha6'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input name="totaldias" type="text" value="CALCULAR" size="20" />
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
                                    <input name="dias1" type="text" size="20" />
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha7" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha7'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha8" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
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
                                    <input name="dias2" type="text" size="20" />
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha9" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha9'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha10" size="10"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha10'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                        <input name="gocesueldo" type="radio" value="si" />
                            SI
                        <input name="gocesueldo" type="radio" value="no" />
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
                                <td align="center"><input name="institucion" type="text" size="15" /></td>
                                <td align="center"><input name="tipoprestacion" type="text" size="15" /></td>
                                <td align="center"><input name="montoprestacion" type="text" size="15" /></td>
                            </tr>
                        </table>
                       <p>(botón que de la opción de agregar)</p>
                    </td>
                </tr>
                <!--?php endforeach;?-->
            </table>

            <br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" value="Guardar" name="Guardar" />
                <input class="btn" type="reset" value="Limpiar" name="limpiar" />
            </div>
        </form>
        <br><br>
    </div>
</div>