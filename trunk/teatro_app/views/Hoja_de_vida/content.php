    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>HOJA DE VIDA</h2>
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
                            <option>CAPITAL</option>
                            <option>CUPRUM</option>
                            <option>HABITAT</option>
                            <option>ING</option>
                            <option>PLANVITAL</option>
                            <option>PROVIDA</option>
                            <option selected="selected"><?=$query['NombreAfp']?></option>
                        </select>
                        <input name="porcentajeafp" type="text" value="<?=$query['PorcentajeAfp']?>" />
                        
                    </td>
                </tr>
                <tr>
                    <td width="150">AFC</td>
                    <td>
                        <input name="afc" type="radio" value="si" checked/>
                            SI
                        <input name="afc" type="radio" value="no" />
                            NO   
                    </td>
                </tr>
                <tr>
                    <td valign="middle">SALUD</td>
                    <td>
                        <p>
                            <input name="salud" type="radio" value="fonasa" checked/>
                                FONASA
                            <input name="montofonasa" type="text" value="<?=$query['Fonasa']?>" />
                                
                        </p>
                        <p>
                            <input name="salud" type="radio" value="isapre" />
                                ISAPRE
                            <select name="isapre">
                                <option>BANMÉDICA
                                <option>CONSALUD
                                <option>COLMENA
                                <option>CRUZ DEL NORTE
                                <option>CRUZ BALNCA
                                <option>MAS VIDA
                                <option>RIO BLANCO
                                <option>VIDA TRES
                                <option selected="selected"><?=$query['NombreIsapre']?></option>
                            </select>
                            <input name="montoisapre" type="text" value="<?=$query['MontoIsapre']?>" />
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
                    <td>CARGAS FAMILIARES</td>
                    <td><br>
                        <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="left">
                            <tr>
                                <th align="center">NOMBRES</th>
                                <th align="center">TIPO</th>
                                <th align="center">FECHA VENC.</th>
                                <th align="center">RUT</th>
                            </tr>
                            <tr>
                                <?php for($i=0; $i<$nAlternativas; $i++) :?>
                                    <?php foreach($result as $row):?>

                                        <td><input type="text"  name="nombre_<?php echo $i;?>" value="<?=$row->Nombres?>" size="35"/></td>
                                        <td><select name="tipo_<?php echo $i;?>">
                                                <option>HIJO/A</option>
                                                <option>CONYUGE</option>
                                                <option>PADRE</option>
                                                <option>MADRE</option>
                                                <option selected="selected"><?=$row->Tipo?></option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="fechaven_<?php echo $i;?>" value="<?=$row->FechaVencimiento?>" size="10"/>
                                            <script language="JavaScript">
                                                new tcal ({
                                                        'formname': 'ingreso',
                                                        'controlname': 'fechaven_<?php echo $i;?>'
                                                });
                                            </script>
                                        </td>
                                        <td><input type="text" name="rut_<?php echo $i;?>" value="<?=$row->Rut?>" maxLength="8" size="8"/>
                                            -
                                            <input type="text" name="digito_<?php echo $i;?>" value="<?=$row->Digito?>" maxLength="1" size="3"/>
                                        </td>
                                    <?php endforeach;?>
                                <?php endfor;?>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">VACACIONES</td>
                    <td><br>
                        <table border="1" cellpadding="0" cellspacing="0">
                            <tr>
                                <th align="center">DESDE</th>
                                <th align="center">HASTA</th>
                                <th align="center" >TOTAL DÍAS</th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input readonly type="text" name="fecha5" size="10" value="<?=$query['FechaInicioV']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha5'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha6" size="10" value="<?=$query['FechaTerminoV']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha6'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input name="totaldias" type="text" size="20" value="<?=$query['TotalDiasV']?>"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">LICENCIAS MÉDICAS</td>
                    <td><br>
                        <table border="1" cellpadding="0" cellspacing="0">
                            <tr>
                                <th align="center">DÍA</th>
                                <th align="center">INICIO</th>
                                <th align="center">TÉRMINO</th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input name="dias1" type="text" size="20" value="<?=$query['TotalDiasL']?>"/>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha7" size="10" value="<?=$query['FechaInicioL']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha7'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha8" size="10" value="<?=$query['FechaTerminoL']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha8'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="150" valign="middle">PERMISOS</td>
                    <td>
                        <br>
                        <table border="1" cellpadding="0" cellspacing="0">
                            <tr>
                                <th align="center">DÍA</th>
                                <th align="center">INICIO</th>
                                <th align="center">TÉRMINO</th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input name="dias2" type="text" size="20" value="<?=$query['TotalDiasP']?>"/>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha9" size="10" value="<?=$query['FechaInicioP']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha9'
                                        });
                                    </script>
                                </td>
                                <td align="center">
                                    <input readonly type="text" name="fecha10" size="10" value="<?=$query['FechaTerminoP']?>"/>
                                    <script language="JavaScript">
                                        new tcal ({
                                                'formname': 'ingreso',
                                                'controlname': 'fecha10'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                        Goce de sueldo<input name="gocesueldo" type="radio" value="si" />
                            SI
                        <input name="gocesueldo" type="radio" value="no" />
                            NO
                    </td>
                </tr>
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
                <!--?php endforeach;?-->
            </table>
            
           <div id="form" align="center">
                <input class="btn" type="submit" value="Guardar" name="Guardar" />
                <input class="btn" type="reset" value="Limpiar" name="limpiar" />
            </div>
        </form>
        <br><br>
    </div>
</div>