    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>CREAR TRABAJADOR</h2>
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
                <td>
                    <input type="text" name="rut" size="21" value="<?=$rut?>" maxlength="8" readonly/> -
                    <input type="text" name="digito" size="2" maxlength="1"  value="<?=$digito?>" readonly/>
                </td>
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
                <td></td>
                <td>
                    <div id="Afc" style="display:none">
                        <label style="color:orange">AFC:<br></label>
                        <label style="color:orange">SI</label>
                        <input name ="afc" type="radio" value="SI"/>
                        <label style="color:orange">NO</label>
                        <input name ="afc" type="radio" value="NO"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA INICIO CONTRATO</td>
                <td><div id="fecha_inicio" style="display:none">
                    <input readonly type="text" name="fecha2" size="30"/>
                    <script language="JavaScript">
                    new tcal ({
                        'formname': 'ingreso',
                        'controlname': 'fecha2'
                    });
                    </script></div>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA TÉRMINO CONTRATO</td>
                <td><div id="fecha_termino" style="display:none">
                        <input readonly type="text" name="fecha3" size="30" onclick="Dias(fecha2.value,this.value,1);"/>
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
                        <option selected="selected">...</option>
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
                    <label>FONASA</label>
                    <input name="tipo_salud" type="radio" value="fonasa" onclick="showTextBox_salud()"/>
                    <label>ISAPRE</label>
                    <input name="tipo_salud" type="radio" value="isapre" onclick="hiddenTextBox_salud();"/>
                    <div id="isapre" style="display:none">
                        <select name="nombre_isapre">
                            <option selected="selected">...</option>
                            <option>Banmedica</option>
                            <option>Consalud</option>
                            <option>Colmena</option>
                            <option>Consalud</option>
                            <option>Cruz del norte</option>
                            <option>Cruz blanca</option>
                            <option>Mas Vida</option>
                            <option>Rio Blanco</option>
                            <option>Vida Tres</option>
                        </select>
                        <input name="monto_isapre" type="text"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="150">APV</td>
                <td>
                    <table width="150" border="0">
                        <tr>
                            <td>
                                <input type="text" name="uf" />
                            </td>
                            <td><label>U.F.</label>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><label>Ingrese la cantidad de cargas familiares:</label></td>
                <td>
                    <input class="LV_valid_field" id="cantrespuestas" name="cantrespuestas" type="text" size="3" maxLength="2"/>
                </td>
            </tr>
            <tr>
            <td> </td>
            <td><div id="cargasFamiliares"></div></td></tr>
            </table>
            <div id="form" align="center">
                <input class="btn" type="submit" value="Crear" name="crear" />
                <input class="btn" type="reset" value="Limpiar" name="limpiar" />
            </div>
        </form> 
    </div>
<script type="text/javascript">
    var nrespuestas = new LiveValidation('cantrespuestas', {validMessage: validMsj, onValid : function(){ this.insertMessage( this.createMessageSpan() ); this.addFieldClass(); addAlternativa();} });
    nrespuestas.add(Validate.Numericality, {minimum: 1, onlyInteger: true, notAnIntegerMessage : notAnIntMsj , tooLowMessage : tooLowMsj } );
    nrespuestas.add(Validate.Presence, {failureMessage: notSupplyValue });
</script>