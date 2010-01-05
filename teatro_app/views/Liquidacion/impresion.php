    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>LIQUIDACIÓN DE SUELDO</h2>
        </div>
        <br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/liquidacion_controlador/Imprimir">
        <div align="center"><B> CORPORACIÓN DE AMIGOS</B> </div>
        <div align="center"><B>DEL TEATRO REGIONAL DEL MAULE</B></div>
        <div align="center">RUT:65,560,740-4</div>
        <div align="center">Uno Oriente #1484, Talca.</div>
        <br><br>
        <table width="700" border="1" cellpadding="0" cellspacing="0" align="center">
            <thead>
                <tr>
                    <!--?php foreach($result1 as $row):?-->
                    <td width="90">ES</td>
                    <td><input type="text" name="MES" readonly value="<?=$query['Mes']?>" size="38"/></td>
                    <td width="100">TIPO CONTRATO</td>
                    <td><input type="text" name="TIPOCONTRATO" readonly value="<?=$query['TipoContrato']?>"size="38" /></td>
                    <!--?php endforeach;?-->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="90">NOMBRE</td>
                    <td><input type="text" name="NOMBRE" readonly value="<?=$query['Nombre']?>"size="38" /></td>
                    <td width="100">CARGO</td>
                    <td><input type="text" name="CARGO" readonly value="<?=$query['Cargo']?>"size="38" /></td>
                </tr>
                <tr>
                    <td width="90">RUT</td>
                    <td><input type="text" name="RUT" readonly value="<?=$query['Rut']?> - <?=$query['Digito']?>" size="38"/></td>
                    <td width="100">FECHA DE PAGO</td>
                    <td><input type="text" name="FECHAPAGO" readonly value="<?=$query['FechaPago']?>"size="38" /></td>
                </tr>
             </tbody>
         </table>
        <ul>
            <table width=250" border="1" align="right" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="200" ></th>
                        <th width="40">DESCUENTOS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>AFP</td>
                        <td><input type="text" name="AFPP" readonly value="<?=$query['PorcentajeAfp']?>" /></td>
                    </tr>
                    <tr>
                        <td>APV</td>
                        <td><input type="text" name="APVP" readonly value="<?=$query['ApvPesos']?>" /></td>
                    </tr>
                    <tr>
                        <td>AFC</td>
                        <td><input type="text" name="AFC" readonly value="<?=$query['Afc']?>" /></td>
                    </tr>
                    <tr>
                        <td>SALUD</td>
                        <td><input type="text" name="Salud" readonly value="<?=$query['Salud']?>"/></td>
                    </tr>
                    <tr>
                        <td>IUT</td>
                        <td><input type="text" name="Iut"readonly readonly  value="<?=$query['Iut']?>"/></td>
                    </tr>
                    <tr>
                        <td>CREDITOS</td>
                        <td><input type="text" name="creditos" readonly value="<?=$query['Creditos']?>" /></td>
                    </tr>
                    <tr>
                        <td>AHORROS</td>
                        <td><input type="text" name="ahorros" readonly value="<?=$query['Ahorros']?>"/></td>
                    </tr>
                    <tr>
                        <td>ANTICIPOS</td>
                        <td><input type="text" name="anticipos" readonly value="<?=$query['Anticipos']?>" /></td>
                    </tr>
                </tbody>
             </table>
        </ul>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center">IMPONIBLE</th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>DIAS TRABAJADOS EN EL MES</td>
                        <td width="100" scope="col"><input type="text" readonly name="cantdias" size="5" value="<?=$query['Dias']?>" /> <input type="text" size="10" name="diastrabajados" readonly value="<?=$query['DiasTrabajados']?>" /></td>
                    </tr>
                    <tr>
                        <td>HORAS EXTRAS</td>
                        <td width="100" scope="col"><input type="text" readonly name="canthoras" size="5" value="<?=$query['Extras']?>" /> <input type="text" size="10" name="horasextras" readonly value="<?=$query['HorasExtras']?>" /></td>
                    </tr>
                    <tr>
                        <td>BONO PRODUCTIVIDAD</td>
                        <td width="100" scope="col"><input type="text" readonly name="bono" value="<?=$query['Bonos']?>" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL IMPONIBLE</td>
                        <td width="100" scope="col"><input type="text" readonly name="imponible" value="<?=$query['TotalImponible']?>" /></td>
                    </tr>
                </tbody>
            </table>
        </dl>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="200" align="center">NO IMPONIBLE</th>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ASIGNACIÓN FAMILIAR</td>
                        <td><input type="text" name="CARGAS" readonly size="5" value="<?=$query['Cargas']?>" /> <input type="text" name="FAMILIAR" readonly size="10" value="<?=$query['MontoCargas']?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN MOVILIZACIÓN</td>
                        <td><input type="text" name="MOVILIZACION" readonly value="<?=$query['Amovilizacion']?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN DE COLACIÓN</td>
                        <td><input type="text" name="COLACION" readonly value="<?=$query['Acolacion']?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN DE CAJA</td>
                        <td><input type="text" name="CAJA" readonly value="<?=$query['Acaja']?>" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL NO IMPONIBLE</td>
                        <td><input type="text" name="NOIMPONIBLE" readonly value="<?=$query['NoImponible']?>" /></td>
                    </tr>
                </tbody>
            </table>
        </dl>
        <ul>
            <table width="250" border="1"  align="right" cellpadding="0" cellspacing="0">
                <tr>
                        <th width="200">TOTAL DESCUENTOS</th>
                        <td width="40"><input type="text" name="DESCUENTOS" readonly value="<?=$query['Descuentos']?>"/></td>
                    </tr>
            </table>
        </ul>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL HABERES</th>
                        <th><input type="text" name="HABERES" readonly value="<?=$query['Haberes']?>" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL LIQUIDO A PAGAR</th>
                        <th><input type="text" name="LIQUIDO" readonly value="<?=$query['Liquido']?>" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <div align="center">Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción</div>
        <div align="center">el total líquido a pagar, indicado en la presente Liquidación de Remuneraciones y no tengo cargo ni cobro alguno</div>
        <div align="center">posterior que hacer,  por ninguno de los conceptos comprendidos en ella.</div>
        <br><br><br><br>

        <table border="0">
            <thead>
                <tr>
                    <td width="500" scope="col" align="center">p.p. Corp. De Amigos</td>
                    <td width="500" scope="col" align="center">Recibí Conforme</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">del Teatro Regional del Maule</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
            <br><br>
              <div align="center" id="form">
                  <form name="frm" action="">
                    <input class="btn" type="submit" name="imprimir" value="Imprimir"/>
                  </form>
            </div>
        </form>
            <br><br><br>
    </div>
</div>