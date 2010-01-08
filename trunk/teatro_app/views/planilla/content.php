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
                                   <!-- <th align="left">Mes <?php echo $mes;?></th>-->
                                    <th align="left">Enero</th>
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
                                    <td>BASE IMPUESTO</td>
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
                                     <?php foreach($result111 as $row):?>
                               
                                    <?php if($i<$num): $i++;?>

                                    <td><input type="text" name="NOMBRE<?php echo $i;?>" value="<?=$row->Nombre?>" /></td>
                                    <td><input type="text" name="RUT<?php echo $i;?>" value="<?=$row->Rut?>-<?=$row->Digito?>" /></td>
                                    <td><input type="text" name="RENTABRUTA<?php echo $i;?>" value="<?=$row->RentaBruta?>" /></td>
                                    <td><input type="text" name="DIASTRABAJADOS<?php echo $i;?>" value="<?=$row->DiasTrabajados?>" /></td>
                                    <td><input type="text" name="HORASEXTRAS<?php echo $i;?>" value="<?=$row->HorasExtras?>" /></td>
                                    <td><input type="text" name="AGUINALDO<?php echo $i;?>" value="<?=$row->OtrosBonos?>" /></td>
                                    <td><input type="text" name="RENTAIMPONIBLE<?php echo $i;?>" value="<?=$row->RentaImponible?>" /></td>
                                    <td><input type="text" name="ACAJAOTROS<?php echo $i;?>" value="<?=$row->AcajaOtro?>" /></td>
                                    <td><input type="text" name="NUMCARGA<?php echo $i;?>" value="<?=$row->NumCargas?>" /></td>
                                    <td><input type="text" name="ASIGNACIONFAMILIAR<?php echo $i;?>" value="<?=$row->AsignacionFamiliar?>" /></td>
                                    <td><input type="text" name="TOTALHABERES<?php echo $i;?>" value="<?=$row->TotalHaberes?>" /></td>
                                   <?php $Nombreafp=$row->NombreAfp;?>
                                    <?php if($Nombreafp=='Capital'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> 
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="<?=$row->MontoAfp?>" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                     <?php if($Nombreafp=='Habitat'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="<?=$row->MontoAfp?>"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                     <?php if($Nombreafp=='Cuprum'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="<?=$row->MontoAfp?>" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                     <?php if($Nombreafp=='Plan Vital'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="<?=$row->MontoAfp?>" /></td>
                                    <?php endif;?>
                                    <?php if($Nombreafp=='Provida'):?>
                                    <td><input type="text" name="PROVIDA<?php echo $i;?>" value="<?=$row->MontoAfp?>" /></td>
                                    <td><input type="text" name="HABITAT<?php echo $i;?>"value="0"</td> <!--Nosé si va-->
                                    <td><input type="text" name="CAPITAL<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="CUPRUM<?php echo $i;?>" value="0" /></td>
                                    <td><input type="text" name="PLAN VITAL<?php echo $i;?>" value="0" /></td>
                                    <?php endif;?>
                                    <td><input type="text" name="AFC<?php echo $i;?>" value="<?=$row->Afc?>" /></td>
                                  
                                    <td><input type="text" name="ISAPREVARIOS<?php echo $i;?>" value="<?=$row->MontoIsapre?>" /></td>
                                  
                                    <td><input type="text" name="ISAPREADICIONAL<?php echo $i;?>" value="<?=$row->IsapreAdicional?>" /></td>
                                 
                                    <td><input type="text" name="NOMBREISAPRE<?php echo $i;?>" value="<?=$row->NombreIsapre?>"
                               
                                    <td><input type="text" name="FONASA<?php echo $i;?>" value="<?=$row->Fonasa?>" /></td>
                                    <td><input type="text" name="LOSANDES<?php echo $i;?>" value="<?=$row->LosAndes?>" /></td>
                                    <td><input type="text" name="APV<?php echo $i;?>" value="<?=$row->Apv?>" /></td>
                                    <td><input type="text" name="TOTALDESCUENTOSLEGALES<?php echo $i;?>" value="<?=$row->TotalDescuentosLegales?>" /></td>
                                    <td><input type="text" name="BaseImpueto<?php echo $i;?>" value="<?=$row->BaseImpuesto?>" /></td>
                                    <td><input type="text" name="IPM.UNI<?php echo $i;?>" value="<?=$row->IpmUni?>" /></td>
                                    <td><input type="text" name="CREDITOS<?php echo $i;?>" value="<?=$row->Prestamos?>" /></td>
                                    <td><input type="text" name="ANTICIPOS<?php echo $i;?>" value="<?=$row->AnticiposOtros?>" /></td>
                                    <td><input type="text" name="TOTALDESCUENTOSADICIONALES<?php echo $i;?>" value="<?=$row->TotalDescuentosAdicionaes?>" /></td>
                                    <td><input type="text" name="TOTALLIQUIDO<?php echo $i;?>" value="<?=$row->TotalLiquido?>" /></td>
                                    <td><input type="text" name="AFC2<?php echo $i;?>" value="<?=$row->Afctrabajador?>" /></td>
                                    <td><input type="text" name="AFC3<?php echo $i;?>" value="<?=$row->Afctrabajador1?>" /></td>
                                    <td><input type="text" name="APORTE<?php echo $i;?>" value="<?=$row->Aporte?>" /></td>
                                   
                                </tr>
                              

                            </tbody>
                        
                                <?php endif;?>
                                <?php endforeach;?>
                                            
                        </table>
                         <table border="1" width="100%" align="center" cellpadding="0" cellspacing="0">
                               <tr>
                                    <td><input type="text" readonly="readonly" name="tnada" value=" " /></td>
                                    <td><input type="text" readonly="readonly" name="Total" value=" Total" /></td>
                                    <td><input type="text" readonly="readonly" name="Trentabruta" value="<?=$row->TRentaBruta?> " /></td>
                                    <td><input type="text" readonly="readonly" name="Tdiastrabajados" value="<?=$row->TDiasTrabajados?>" /></td>
                                    <td><input type="text"readonly="readonly" name="Thorasextras" value="<?=$row->THorasExtras?>" /></td>
                                    <td><input type="text" readonly="readonly"name="tOtrosbonosa" value="<?=$row->TOtrosBonos?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TRentaimponible" value="<?=$row->TRentaImponible?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tacaja" value="<?=$row->TAcajaOtro?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tnumcarga" value="<?=$row->TNumCargas?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tasignacinfami" value="<?=$row->TAsignacionFamiliar?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TTotal haberes" value="<?=$row->TTotalHaberes?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tprovida" value=" 0" /></td>
                                    <td><input type="text" readonly="readonly"name="Thabitat" value="0 " /></td>
                                    <td><input type="text" readonly="readonly"name="Tcapital" value="0 " /></td>
                                    <td><input type="text" readonly="readonly"name="Tcuprum" value=" 0" /></td>
                                    <td><input type="text" readonly="readonly"name="Tplanvital" value=" 0" /></td>
                                    <td><input type="text" readonly="readonly"name="TAfc" value="<?=$row->TAfc?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tisaprevarios" value="<?=$row->TMontoIsapre?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tispreadicional" value="<?=$row->IsapreAdicional?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TNOMBREISAPRE" value="<?=$row->TNombreIsapre?>"
                                    <td><input type="text" readonly="readonly"name="Tfonas" value="<?=$row->TFonasa?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tlosandes" value="<?=$row->TLosAndes?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tapv" value="<?=$row->Apv?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Ttotdescuentoslegaeles" value="<?=$row->TTotalDescuentosLegales?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tbaseimpuesto" value="<?=$row->TBaseImpuesto?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tipmuni" value="<?=$row->TIpmUni?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tcreditos" value="<?=$row->TPrestamos?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tanticiposi" value="<?=$row->TAnticiposOtros?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Ttotaldescuentosadic" value="<?=$row->TTotalDescuentosAdicionaes?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Ttotalliquido" value="<?=$row->TTotalLiquido?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tafc1" value="<?=$row->TAfctrabajador?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tafc2" value="<?=$row->TAfctrabajador1?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Taporte" value="<?=$row->TAporte?>" /></td>
                                     </tr>
                                </table>
                    </div>
                </td>
            </tr>
        </table>
        <br><br>
    </div>
</div>
