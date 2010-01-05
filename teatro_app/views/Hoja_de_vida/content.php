    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>HOJA DE VIDA</h2>
        </div>
        <br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Modificacion_Trabajador">
            <table border="0" align="left" cellspacing="0">
                <?foreach($trabajador as $row):?>
                    <tr>
                        <td width="150" height="27">NOMBRES</td>
                        <td width="652"><input type="text" name="nombres" value="<?$row->Nombre?>" size="30" /></td>
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
                        <td>
                            <?if($query['TipoContrato']=='Fijo'):?>
                                <label>FIJO</label>
                                <input name="tipo_con" type="radio" value="Fijo" onclick="showTextBox_trabajador();" checked/>
                                <label>INDEFINIDO</label>
                                <input name="tipo_con" type="radio" value="Indefinido" onclick="hiddenTextBox_trabajador();"/>

                            <?else:?>
                                <label>FIJO</label>
                                <input name="tipo_con" type="radio" value="Fijo" onclick="showTextBox_trabajador();"/>
                                <label>INDEFINIDO</label>
                                <input name="tipo_con" type="radio" value="Indefinido" onclick="hiddenTextBox_trabajador();" checked/>
                            <?endif;?>
                        </td>
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
                            <div id="fecha_termino" style="display:block">
                                <?if($query['TipoContrato']=='Fijo'):?>
                                    <input readonly type="text" name="fecha3" value="<?=$query['FechaTerminoContrato']?>" size="30"/>
                                <?else:?>
                                    <input readonly type="text" name="fecha3" value="" size="30"/>
                                <?endif;?>
                            <script language="JavaScript">
                                new tcal ({
                                        'formname': 'ingreso',
                                        'controlname': 'fecha3'
                                });
                            </script></div>
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
                        <td width="150">TOTAL BONOS</td>
                        <td>
                            <input name="total_bonos" type="text" value="<?=$query['Bonos']?>" size="11"/>
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
                            <table width="150" border="1" cellpadding="0" cellspacing="0">
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
                            <input type="text" name="anticipo" value="<?=$query['Anticipo']?>" size="15"/> -
                            <input type="text" name="fechaAnticipo" value="<?=$query['FechaAnticipo']?>" size="14" readonly/>
                            <script language="JavaScript">
                                new tcal ({
                                        'formname': 'ingreso',
                                        'controlname': 'fechaAnticipo'
                                });
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">AFP</td>
                        <td>
                            <select name="afp">
                                <option selected="selected"><?=$query['NombreAfp']?></option>
                                <option>Capital</option>
                                <option>Cuprum</option>
                                <option>Habitat</option>
                                <option>Plan Vital</option>
                                <option>Provida</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle">SALUD</td>
                        <td>
                            <?if($query['Fonasa']!=0):?>
                                <input name="salud" type="radio" value="fonasa" checked onclick="showTextBox_salud()"/><label>FONASA</label>
                                <input name="salud" type="radio" value="isapre" onclick="hiddenTextBox_salud();"/><label>ISAPRE</label>
                                <div id="isapre">
                                    <select name="isapre">
                                        <option selected="selected"><?=$query['NombreIsapre']?></option>
                                        <option>BANMEDICA
                                        <option>CONSALUD
                                        <option>COLMENA
                                        <option>CRUZ DEL NORTE
                                        <option>CRUZ BLANCA
                                        <option>MAS VIDA
                                        <option>RIO BLANCO
                                        <option>VIDA TRES
                                    </select>
                                    <p>
                                        <input name="montoisapre" type="text" value="<?=$query['MontoIsapre']?>" />
                                    </p>
                                </div>
                            <?else:?>
                                <input name="salud" type="radio" value="fonasa" onclick="showTextBox_salud()"/><label>FONASA</label>
                                <input name="salud" type="radio" value="isapre" checked onclick="hiddenTextBox_salud();"/><label>ISAPRE</label>
                                <div id="isapre">
                                    <select name="isapre">
                                    <option>BANMEDICA
                                    <option>CONSALUD
                                    <option>COLMENA
                                    <option>CRUZ DEL NORTE
                                    <option>CRUZ BLANCA
                                    <option>MAS VIDA
                                    <option>RIO BLANCO
                                    <option>VIDA TRES
                                    <option selected="selected"><?=$query['NombreIsapre']?></option>
                                    </select>
                                    <p>
                                        <input name="montoisapre" type="text" value="<?=$query['MontoIsapre']?>" />
                                    </p>
                                </div>
                            <?endif;?>

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
                <?endforeach;?>
                <tr>
                        <td>CARGAS FAMILIARES<input name="ncargas" type="text" readonly value="<?echo $nAlternativas?>" size="1"></td>
                        <?if($nAlternativas>0):?>  <!--Solo se mostrar si es que tenemos Cargas familiares ya ingresadas-->

                        <td><br>
                            <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="left">
                                <tr>
                                    <th align="center">NOMBRES</th>
                                    <th align="center">TIPO</th>
                                    <th align="center">FECHA VENC.</th>
                                    <th align="center">RUT</th>
                                </tr>
                                <?$i=0?>
                                <?php foreach($result as $row):?>
                                    <?if($i<$nAlternativas): $i++;?>
                                        <tr>
                                            <td><input type="text"  name="Cnombre_<?php echo $i;?>" value="<?=$row->Nombres?>" size="35"/></td>
                                            <td><select name="Ctipo_<?php echo $i;?>">
                                                    <option>HIJO/A</option>
                                                    <option>CONYUGE</option>
                                                    <option>PADRE</option>
                                                    <option>MADRE</option>
                                                    <option selected="selected"><?=$row->Tipo?></option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="Cfechaven_<?php echo $i;?>" value="<?=$row->FechaVencimiento?>" size="10"/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaven_<?php echo $i;?>'
                                                    });
                                                </script>
                                            </td>
                                            <td><input type="text" name="Crut_<?php echo $i;?>" value="<?=$row->Rut?>" maxLength="8" size="8" readonly/>
                                                -
                                                <input type="text" name="Cdigito_<?php echo $i;?>" value="<?=$row->Digito?>" maxLength="1" size="3" readonly/>
                                            </td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </table>
                        </td><?endif;?>
                    </tr>
                <tr>
                        <td><label>Ingrese la cantidad de cargas familiares:</label></td>
                        <td>
                            <input class="LV_valid_field" id="cantrespuestas" name="cantrespuestas" type="text" size="3" maxLength="2"/>
                        </td>
                    </tr>
                <tr>
                        <td> </td>
                        <td><div id="cargasFamiliares"></div></td>
                    </tr>
                <?if($nVacaciones>0):?>
                    <tr>
                            <td width="150" valign="middle">VACACIONES</td>
                            <td><br>
                                <table border="1" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th align="center">DESDE</th>
                                        <th align="center">HASTA</th>
                                        <th align="center" >TOTAL DÍAS</th>
                                    </tr>
                                    <?php foreach($vacaciones as $row):?>
                                        <tr>
                                                <td align="center">
                                                    <input readonly type="text" name="fechaI" size="10" value="<?=$row->FechaInicio?>"/>
                                                </td>
                                                <td align="center">
                                                    <input readonly type="text" name="fechaT" size="10" value="<?=$row->FechaTermino?>"/>
                                                </td>
                                                <td align="center">
                                                    <input readonly type="text" name="totaldiasV" size="20" value="<?=$row->TotalDias?>"/>
                                                </td>
                                            </tr>
                                        <?endforeach;?>
                                </table>
                            </td>
                        </tr>
                    <tr>
                            <td><label>INGRESAR VACACIONES</label></td>
                            <td>
                                <label>SI</label>
                                <input name="vacaciones" type="radio" value="SI" onclick="showTextBox_Vacaciones();"/>
                                <label>NO</label>
                                <input name="vacaciones" type="radio" value="NO" onclick="hiddenTextBox_Vacaciones();"/>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td>
                                <div id="Vacaciones" style="display:none">
                                    <table border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th align="center">DESDE</th>
                                            <th align="center">HASTA</th>
                                            <th align="center" >TOTAL DÍAS</th>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaIV" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaIV'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaTV" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaTV'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input name="totaldiasV" type="text" size="13" value=""/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                <?else:?>
                    <tr>
                            <td><label>INGRESAR VACACIONES</label></td>
                            <td>
                                <label>SI</label>
                                <input name="vacaciones" type="radio" value="SI" onclick="showTextBox_Vacaciones();"/>
                                <label>NO</label>
                                <input name="vacaciones" type="radio" value="NO" onclick="hiddenTextBox_Vacaciones();"/>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td>
                                <div id="Vacaciones" style="display:none">
                                    <table border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th align="center">DESDE</th>
                                            <th align="center">HASTA</th>
                                            <th align="center" >TOTAL DÍAS</th>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaIV" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaIV'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaTV" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaTV'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input name="totaldiasV" type="text" size="13" value=""/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                <?endif;?>
                <?if($nLicencias>0):?>
                    <tr>
                            <td width="150" valign="middle">LICENCIAS MÉDICAS</td>
                            <td><br>
                                <table border="1" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th align="center">INICIO</th>
                                        <th align="center">TÉRMINO</th>
                                        <th align="center">TOTAL DÍAS</th>
                                    </tr>
                                    <?foreach($licencias as $row):?>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaLI" size="10" value="<?=$row->FechaInicio?>"/>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaLT" size="10" value="<?=$row->FechaTermino?>"/>
                                            </td>
                                            <td align="center">
                                                <input readonly name="dias1" type="text" size="20" value="<?=$row->TotalDias?>"/>
                                            </td>
                                        </tr>
                                    <?endforeach;?>
                                </table>
                            </td>
                        </tr>
                    <tr>
                            <td><label>IGRESAR LICENCIAS MÉDICAS</label></td>
                            <td>
                                <label>SI</label>
                                <input name="licencias" type="radio" value="SI" onclick="showTextBox_Licencias();"/>
                                <label>NO</label>
                                <input name="licencias" type="radio" value="NO" onclick="hiddenTextBox_Licencias();"/>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td>
                                <div id="Licencias" style="display:none">
                                    <table border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th align="center">INICIO</th>
                                            <th align="center">TÉRMINO</th>
                                            <th align="center">TOTAL DÍAS</th>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaIL" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaIL'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaTL" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaTL'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input name="totaldiasL" type="text" size="13" value=""/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                <?else:?>
                    <tr>
                            <td><label>IGRESAR LICENCIAS MÉDICAS</label></td>
                            <td>
                                <label>SI</label>
                                <input name="licencias" type="radio" value="SI" onclick="showTextBox_Licencias();"/>
                                <label>NO</label>
                                <input name="licencias" type="radio" value="NO" onclick="hiddenTextBox_Licencias();"/>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td>
                                <div id="Licencias" style="display:none">
                                    <table border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th align="center">INICIO</th>
                                            <th align="center">TÉRMINO</th>
                                            <th align="center">TOTAL DÍAS</th>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaIL" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaIL'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaTL" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaTL'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input name="totaldiasL" type="text" size="13" value=""/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                <?endif;?>
                <?if($nPermisos>0):?>
                    <tr>
                            <td width="150" valign="middle">PERMISOS</td>
                            <td>
                            <br>
                            <table border="1" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th align="center">INICIO</th>
                                    <th align="center">TÉRMINO</th>
                                    <th align="center">TOTAL DÍAS</th>
                                    <th align="center">GOCE DE SUELDO</th>
                                </tr>
                                <?foreach($permisos as $row):?>
                                    <tr>
                                        <td align="center">
                                            <input readonly type="text" name="fechaPI" size="10" value="<?=$row->FechaInicio?>"/>
                                        </td>
                                        <td align="center">
                                            <input readonly type="text" name="fechaPT" size="10" value="<?=$row->FechaTermino?>"/>
                                        </td>
                                        <td align="center">
                                            <input readonly name="totaldiasP" type="text" size="7" value="<?=$row->TotalDias?>"/>
                                        </td>
                                        <td>
                                            <input readonly name="GoceSueldo" type="text" size="12" value="<?=$row->GoceSueldo?>" />
                                        </td>
                                    </tr>
                                <?endforeach;?>
                            </table>
                        </td>
                        </tr>
                    <tr>
                            <td><label>INGRESAR PERMISOS</label></td>
                            <td>
                                <label>SI</label>
                                <input name="permisos" type="radio" value="SI" onclick="showTextBox_Permisos();"/>
                                <label>NO</label>
                                <input name="permisos" type="radio" value="NO" onclick="hiddenTextBox_Permisos();"/>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td>
                                <div id="Permisos" style="display:none">
                                    <table border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th align="center">INICIO</th>
                                            <th align="center">TÉRMINO</th>
                                            <th align="center">TOTAL DÍAS</th>

                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaIP" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaIP'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaTP" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaTP'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input name="totaldiasP" type="text" size="17" value=""/>
                                            </td>
                                        </tr>
                                    </table>
                                    <label>Goce de Sueldo</label>
                                    <input name="gocesueldo" type="radio" value="si" />
                                    <label>SI</label>
                                    <input name="gocesueldo" type="radio" value="no" />
                                    <label>NO</label>
                                </div>
                            </td>
                        </tr>
                <?else:?>
                    <tr>
                            <td><label>INGRESAR PERMISOS</label></td>
                            <td>
                                <label>SI</label>
                                <input name="permisos" type="radio" value="SI" onclick="showTextBox_Permisos();"/>
                                <label>NO</label>
                                <input name="permisos" type="radio" value="NO" onclick="hiddenTextBox_Permisos();"/>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td>
                                <div id="Permisos" style="display:none">
                                    <table border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th align="center">INICIO</th>
                                            <th align="center">TÉRMINO</th>
                                            <th align="center">TOTAL DÍAS</th>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input readonly type="text" name="fechaIP" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaIP'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input readonly type="text" name="fechaTP" size="10" value=""/>
                                                <script language="JavaScript">
                                                    new tcal ({
                                                            'formname': 'ingreso',
                                                            'controlname': 'fechaTP'
                                                    });
                                                </script>
                                            </td>
                                            <td align="center">
                                                <input name="totaldiasP" type="text" size="17" value=""/>
                                            </td>
                                        </tr>
                                    </table>
                                    <label>Goce de Sueldo</label>
                                    <input name="gocesueldo" type="radio" value="si" />
                                    <label>SI</label>
                                    <input name="gocesueldo" type="radio" value="no" />
                                    <label>NO</label>
                                </div>
                            </td>
                        </tr>
                <?endif;?>
                <?if($nPrestaciones>0):?>
                    <tr>
                            <td width="150" valign="middle">PRESTACIONES</td>
                            <td>
                                <br>
                                <table border="1" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th align="center">INSTITUCIÓN</th>
                                        <th align="center">TIPO DE PRESTAMO</th>
                                        <th align="center">MONTO</th>
                                        <th align="center">CUOTAS</th>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <input name="institucion" type="text" size="15" value="<?=$query['Institucion']?>"/>
                                        </td>
                                        <td align="center">
                                            <input name="tipoprestacion" type="text" size="15" value="<?=$query['TipoPrestacion']?>"/>
                                        </td>
                                        <td align="center">
                                            <input name="montoprestacion" type="text" size="15" value="<?=$query['MontoPrestacion']?>"/>
                                        </td>
                                        <td align="center">
                                            <input name="cuotas" type="text" size="15" value="<?=$query['Cuotas']?>"/>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                            </td>
                        </tr>
                <?else:?>
                    <tr>
                            <td><label>PRESTACIONES</label></td>
                            <td>
                                <label>SI</label>
                                <input name="prestaciones" type="radio" value="SI" onclick="showTextBox_Prestaciones();"/>
                                <label>NO</label>
                                <input name="prestaciones" type="radio" value="NO" onclick="hiddenTextBox_Prestaciones();"/>
                            </td>
                        </tr>
                    <tr>
                            <td></td>
                            <td>
                                <div id="Prestaciones" style="display:none">
                                    <label>Ingrese Número de Prestaciones : </label>
                                    <input class="LV_valid_field" id="Nprestaciones" name="Nprestaciones" type="text" size="3" maxLength="2"/>
                                </div>
                            </td>
                        </tr>
                    <tr>
                            <td> </td>
                            <td><div id="NumeroPrestaciones"></div></td>
                        </tr>
                 <?endif;?>
            </table>
            <div id="form" align="center">
                <input class="btn" type="submit" value="Guardar" name="Guardar" />
                <input class="btn" type="reset" value="Limpiar" name="limpiar" />
            </div>
        </form>
        <br><br>
    </div>
</div>
<script type="text/javascript">
    var nrespuestas = new LiveValidation('cantrespuestas', {validMessage: validMsj, onValid : function(){ this.insertMessage( this.createMessageSpan() ); this.addFieldClass(); addAlternativa();} });
    nrespuestas.add(Validate.Numericality, {minimum: 1, onlyInteger: true, notAnIntegerMessage : notAnIntMsj , tooLowMessage : tooLowMsj } );
    nrespuestas.add(Validate.Presence, {failureMessage: notSupplyValue });
</script>
 <script type="text/javascript">
    var nrespuestas = new LiveValidation('Nprestaciones', {validMessage: validMsj, onValid : function(){ this.insertMessage( this.createMessageSpan() ); this.addFieldClass(); addAlternativa2();} });
    nrespuestas.add(Validate.Numericality, {minimum: 1, onlyInteger: true, notAnIntegerMessage : notAnIntMsj , tooLowMessage : tooLowMsj } );
    nrespuestas.add(Validate.Presence, {failureMessage: notSupplyValue });
</script>