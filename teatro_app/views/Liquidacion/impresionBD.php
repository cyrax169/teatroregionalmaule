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
                <?php foreach($resultado as $row10):?>

                <tr>
                    <td width="90">MES</td>
                    <td><input type="text" name="MES" readonly value="<?=$row10->Mes?>" size="38"/></td>
                    <td width="100">TIPO CONTRATO</td>
                    <td><input type="text" name="TIPOCONTRATO" readonly value="<?=$row10->TipoContrato?>" size="38" /></td>
                    
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td width="90">NOMBRE</td>
                    <td><input type="text" name="NOMBRE" readonly value="<?=$row10->Nombre?>" size="38" /></td>
                    <td width="100">CARGO</td>
                    <td><input type="text" name="CARGO" readonly value="<?=$row10->Cargo?>" size="38" /></td>
                </tr>
                <tr>
                    <td width="90">RUT</td>
                    <td><input type="text" name="RUT" readonly value="<?=$row10->RutTrabajador?>" size="38"/></td>
                    <td width="100">FECHA DE PAGO</td>
                    <td><input type="text" name="FECHAPAGO" readonly value="<?=$row10->FechaPago?>" size="38" /></td>
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
                        <td><input type="text" name="AFP" readonly value="<?=$row10->AFP?>" /></td>
                    </tr>
                    <tr>
                        <td>APV</td>
                        <td><input type="text" name="APV" readonly value="<?=$row10->APV?>"/></td>
                    </tr>
                    <tr>
                        <td>AFC</td>
                        <td><input type="text" name="AFC" readonly value="<?=$row10->AFC?>" /></td>
                    </tr>
                    <tr>
                        <td>SALUD</td>
                        <td><input type="text" name="Salud" readonly value="<?=$row10->Salud?>"/></td>
                    </tr>
                    <tr>
                        <td>IUT</td>
                        <td><input type="text" name="Iut"readonly readonly  value="<?=$row10->IUT?>"/></td>
                    </tr>
                    <tr>
                        <td>CREDITOS</td>
                        <td><input type="text" name="creditos" readonly value="<?=$row10->Creditos?>" /></td>
                    </tr>
                    <tr>
                        <td>AHORROS</td>
                        <td><input type="text" name="ahorros" readonly value="<?=$row10->Ahorro?>"/></td>
                    </tr>
                    <tr>
                        <td>ANTICIPOS</td>
                        <td><input type="text" name="anticipos" readonly value="<?=$row10->Anticipo?>" /></td>
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
                        <td width="100" scope="col"><input type="text" readonly name="cantdias" size="5" value="<?=$row10->CantDias?>" /> <input type="text" size="10" name="diastrabajados" readonly value="<?=$row10->DiasTrabajados?>" /></td>
                    </tr>
                    <tr>
                        <td>HORAS EXTRAS</td>
                        <td width="100" scope="col"><input type="text" readonly name="canthoras" size="5" value="<?=$row10->CantHoras?>" /> <input type="text" size="10" name="horasextras" readonly value="<?=$row10->HorasExtras?>" /></td>
                    </tr>
                    <tr>
                        <td>BONO PRODUCTIVIDAD</td>
                        <td width="100" scope="col"><input type="text" readonly name="bono" value="<?=$row10->Bono?>" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL IMPONIBLE</td>
                        <td width="100" scope="col"><input type="text" readonly name="imponible" value="<?=$row10->TotalImponible?>" /></td>
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
                        <td><input type="text" name="MOVILIZACION" readonly value="<?=$row10->AMovilizacion?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN DE COLACIÓN</td>
                        <td><input type="text" name="COLACION" readonly value="<?=$row10->Acolacion?>" /></td>
                    </tr>
                    <tr>
                        <td>ASIGNACIÓN DE CAJA</td>
                        <td><input type="text" name="CAJA" readonly value="<?=$row10->Acaja?>" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL NO IMPONIBLE</td>
                        <td><input type="text" name="NOIMPONIBLE" readonly value="<?=$row10->TotalNoImponible?>" /></td>
                    </tr>
                </tbody>
            </table>
        </dl>
        <ul>
            <table width="250" border="1"  align="right" cellpadding="0" cellspacing="0">
                <tr>
                        <th width="200">TOTAL DESCUENTOS</th>
                        <td width="40"><input type="text" name="DESCUENTOS" readonly value="<?=$row10->TotalDescuentos?>"/></td>
                    </tr>
            </table>
        </ul>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL HABERES</th>
                        <th><input type="text" name="HABERES" readonly value="<?=$row10->TotalHaberes?>" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL LIQUIDO A PAGAR</th>
                        <th><input type="text" name="LIQUIDO" readonly value="<?=$row10->TotalLiquido?>" /></th>
                    </tr>
                </thead>
                <?php endforeach;?>
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