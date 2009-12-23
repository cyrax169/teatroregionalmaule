
    <div id="principal">
        <div class="post" align="center">
            <h2>LIQUIDACIÓN DE SUELDO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
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
                    <td width="90">MES</td>
                    <td><input type="text" name="MES" value="<?=$query['Mes']?>" size="38"/></td>
                    <td width="100">TIPO CONTRATO</td>
                    <td><input type="text" name="TIPOCONTRATO" value="<?=$query['TipoContrato']?>"size="38" /></td>
                    <!--?php endforeach;?-->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="90">NOMBRE</td>
                    <td><input type="text" name="NOMBRE" value="<?=$query['Nombre']?>"size="38" /></td>
                    <td width="100">CARGO</td>
                    <td><input type="text" name="CARGO" value="<?=$query['Cargo']?>"size="38" /></td>
                </tr>
                <tr>
                    <td width="90">RUT</td>
                    <td><input type="text" name="RUT" value="<?=$query['Rut']?> - <?=$query['Digito']?>" size="38"/></td>
                    <td width="100">FECHA DE PAGO</td>
                    <td><input type="text" name="FECHAPAGO" value=""size="38" /></td>
                </tr>
             </tbody>
         </table>
        <br><br>
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
                        <td><input type="text" name="AFPP" value="<?=$query['PorcentajeAfp']?>" /></td>
                    </tr>
                    <tr>
                        <td>APV</td>
                        <td><input type="text" name="APVP" value="<?=$query['ApvPesos']?>" /></td>
                    </tr>
                    <tr>
                        <td>AFC</td>
                        <td><input type="text" name="AFCP" value="<?=$query['Afc']?>" /></td>
                    </tr>
                    <tr>
                        <td>SALUD</td>
                        <td><input type="text" name="Salud" value="<?=$query['Salud']?>"/></td>
                    </tr>
                    <tr>
                        <td>IUT</td>
                        <td><input type="text" name="Iut" value="<?=$query['Iut']?>"/></td>
                    </tr>
                    <tr>
                        <td>CREDITOS</td>
                        <td><input type="text" name="creditos" value="<?=$query['Creditos']?>" /></td>
                    </tr>
                    <tr>
                        <td>AHORROS</td>
                        <td><input type="text" name="ahorros" value="<?=$query['Ahorros']?>"/></td>
                    </tr>
                    <tr>
                        <td>ANTICIPOS</td>
                        <td><input type="text" name="anticipos" value="<?=$query['Anticipos']?>" /></td>
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
                        <td width="100" scope="col"><input type="text" name="diastrabajados" value="<?=$query['DiasTrabajados']?>" /></td>
                    </tr>
                    <tr>
                        <td>HORAS EXTRAS</td>
                        <td width="100" scope="col"><input type="text" name="horasextras" value="<?=$query['HorasExtras']?>" /></td>
                    </tr>
                    <tr>
                        <td>BONO PRODUCTIVIDAD</td>
                        <td width="100" scope="col"><input type="text" name="bono" value="<?=$query['Bonos']?>" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL IMPONIBLE</td>
                        <td width="100" scope="col"><input type="text" name="imponible" value="<?=$query['TotalImponible']?>" /></td>
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
                        <td>ASIGNACIÓN MOVILIZACIÓN</td>
                        <td><input type="text" name="MOVILIZACION" value="<?=$query['Amovilizacion']?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN DE COLACIÓN</td>
                        <td><input type="text" name="COLACION" value="<?=$query['Acolacion']?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN DE CAJA</td>
                        <td><input type="text" name="CAJA" value="<?=$query['Acaja']?>" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL NO IMPONIBLE</td>
                        <td><input type="text" name="NOIMPONIBLE" value="<?=$query['NoImponible']?>" /></td>
                    </tr>
                </tbody>
            </table>
        </dl>
        <ul>
            <table width="250" border="1"  align="right" cellpadding="0" cellspacing="0">
                <tr>
                        <th width="200">TOTAL DESCUENTOS</th>
                        <td width="40"><input type="text" name="DESCUENTOS" value="<?=$query['Descuentos']?>"/></td>
                    </tr>
            </table>
        </ul>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL HABERES</th>
                        <th><input type="text" name="HABERES" value="<?=$query['Haberes']?>" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL LIQUIDO A PAGAR</th>
                        <th><input type="text" name="LIQUIDO" value="<?=$query['Liquido']?>" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <div align="center">Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción</div>
        <div align="center">el total líquido a pagar, indicado en la presente Liquidación de Remuneraciones y no tengo cargo ni cobro alguno</div>
        <div align="center">posterior que hacer,  por ninguno de los conceptos comprendidos en ella.</div>
        <br><br><br><br><br><br>

        <table border="0">
            <thead>
                <tr>
                    <td width="500" scope="col" align="center">p.p. Corp. De Amigos</td>
                    <td width="500" scope="col" align="center">recibí conforme</td>
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
                  <form name="frm">
                    <input class="btn" type="submit" name="imprimir" value="Imprimir"/>
                  </form>
            </div>
        </form>
            <br><br><br>
    </div>
</div>