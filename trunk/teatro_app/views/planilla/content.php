  <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>PLANILLA DE REMUNACIÓN</h2>
        </div>
        <table border=1 cellpadding=0 cellspacing=0 bgcolor="#00008F">
            <tr>
                <td height=100 bgcolor="#00008F">
                    <div id="1" style="overflow:auto;width:785px; height:400px">
                        <table border="1" width="100%" align="center" cellpadding="0" cellspacing="0">
                                                                   
                            <thead>
                                <tr>
                                    <th align="left">INGRESOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NOMBRE</td>
                                    <td>RUT</td>
                                    <td>RENTA BRUTA</td>
                                    <td>DIAS TRABAJADOS</td>
                                    <td>HORAS EXTRAS</td>
                                    <td>OTROS BONOS AGUINALDO</td>
                                    <td>RENTA IMPONIBLE</td>
                                    <td>ASIGNACION CAJA OTROS</td>
                                    <td>Nº</td>
                                    <td>ASIGNACION FAMILIAR</td>
                                    <td>TOTAL HABERES</td>
                                    <td>PROVIDA</td>
                                    <td>HABITAT</td>
                                    <th>CAPITAL</th>
                                    <td>CUPRUM</td>
                                    <td>PLAN VITAL</td>
                                    <td>AFC</td>
                                    <td>ISAPRE VARIOS</td>
                                    <td>ISAPRE ADICIONAL</td>
                                    <td>NOMBRE ISAPRE</td>
                                    <td>FONASA 6.4</td>
                                    <td>LOS ANDES</td>
                                    <td>AVP</td>
                                    <td>TOTAL DESCUENTOS LEGALES + APV</td>
                                    <td>IMPUESTO UNICO AL TRABAJADOR</td>
                                    <td>IPM. UNI</td>
                                    <td>SEGUROS/CREDITOS</td>
                                    <td>ANTICIPO</td>
                                    <td>TOTAL DESCUENTO ADICIONAL</td>
                                    <td>TOTAL LIQUIDO</td>
                                    <td>AFC 2.4%</td>
                                    <td>AFC 3%</td>
                                    <td>APORTE 0.95%</td>
                                </tr>
                                <tr>
                                    <?php $i=0?>
                                     <?php foreach($result as $row):?>
                                    <?php foreach($result2 as $row2):?>
                                    <?php if($i<$num): $i++;?>

                                    <td><input type="text" name="NOMBRE<?php echo $i;?>" value="<?=$row2->Nombre?>" /></td>
                                    <td><input type="text" name="RUT<?php echo $i;?>" value="<?=$row2->Rut?>-<?=$row2->Digito?>" /></td>
                                    <td><input type="text" name="RENTABRUTA<?php echo $i;?>" value="<?=$row->TotalImponible?>" /></td>
                                    <td><input type="text" name="DIASTRABAJADOS<?php echo $i;?>" value="<?=$row->DiasTrabajados?>" /></td>
                                    <td><input type="text" name="HORASEXTRAS<?php echo $i;?>" value="<?=$row->HorasExtras?>" /></td>
                                    <td><input type="text" name="AGUINALDO<?php echo $i;?>" value="<?=$row2->Bonos?>" /></td>
                                    <td><input type="text" name="RENTAIMPONIBLE<?php echo $i;?>" value="<?=$row->TotalImponible?>" /></td>
                                    <td><input type="text" name="ACAJAOTROS<?php echo $i;?>" value="<?=$row->Acaja?>" /></td>
                                    <td><input type="text" name="NUMCARGA<?php echo $i;?>" value="<?=$row2->Cargas?>" /></td>
                                    <td><input type="text" name="ASIGNACIONFAMILIAR<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="TOTALHABERES<?php echo $i;?>" value="<?=$row->TotalHaberes?>" /></td>
                                   <?php $Nombreafp=$row2->NombreAfp;?>
                                    <?php if($Nombreafp=='Capital'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="<?=$row->AFP?>" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                     <?php if($Nombreafp=='Habitat'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="<?=$row->AFP?>"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                     <?php if($Nombreafp=='Cuprum'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="<?=$row->AFP?>" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                     <?php if($Nombreafp=='Plan vital'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="<?=$row->AFP?>" /></td>
                                    <?php endif;?>
                                    <?php if($Nombreafp=='Provida'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="<?=$row->AFP?>" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                    <td><input type="text" name="AFC<?php echo $i;?>" value="<?=$row2->Afc?>" /></td>
                                    <td><input type="text" name="ISAPREVARIOS<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="ISAPREADICIONAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="NOMBREISAPRE<?php echo $i;?>" value="<?=$row2->NombreIsapre?>" /></td>
                                    <td><input type="text" name="FONASA<?php echo $i;?>" value="<?=$row->Salud?>" /></td>
                                    <td><input type="text" name="LOSANDES<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="APV<?php echo $i;?>" value="<?=$row->APV?>" /></td>
                                    <td><input type="text" name="TOTALDESCUENTOSLEGALES<?php echo $i;?>" value="<?=$row->TotalDescuentos?>" /></td>
                                    <td><input type="text" name="IUT<?php echo $i;?>" value="<?=$row->IUT?>" /></td>
                                    <td><input type="text" name="IPM.UNI<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CREDITOS<?php echo $i;?>" value="" /></td>
                                    <td><input type="text" name="ANTICIPOS<?php echo $i;?>" value="<?=$row->Anticipo?>" /></td>
                                    <td><input type="text" name="TOTALDESCUENTOSADICIONALES<?php echo $i;?>" value="<?=$row->TotalDescuentos?>" /></td>
                                    <td><input type="text" name="TOTALLIQUIDO<?php echo $i;?>" value="<?=$row->TotalLiquido?>" /></td>
                                    <td><input type="text" name="AFC2<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="AFC3<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="APORTE<?php echo $i;?>" value="0" /></td>
                                   
                                </tr>
                              

                            </tbody>
                             
                                <?php endif;?>
                                    <?php endforeach;?>
                                            <?php endforeach;?>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
	<br><br>
    </div>
</div>
