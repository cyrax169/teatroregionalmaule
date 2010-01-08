  <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>PLANILLA DE REMUNACIONES</h2>
        </div>
        <form name="frm" method="post" action="<?=base_url()?>index.php/liquidacion_controlador/Imprimir">
        <div align="center"><B> CORPORACIÓN DE AMIGOS</B> </div>
        <div align="center"><B>DEL TEATRO REGIONAL DEL MAULE</B></div>
        <div align="center">RUT:65,560,740-4</div>
        <div align="center">Uno Oriente #1484, Talca.</div>
        <br><br>
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
                                   <?php $i=0?>
                                <?php foreach($result222 as $row1):?>
                                   <?php if($i<1): $i++;?>
                                    <td><input type="text" readonly="readonly" name="tnada" value=" " /></td>
                                    <td><input type="text" readonly="readonly" name="Total" value=" Total" /></td>
                                    <td><input type="text" readonly="readonly" name="Trentabruta" value="<?=$row1->TRentaBruta?> " /></td>
                                    <td><input type="text" readonly="readonly" name="Tdiastrabajados" value="<?=$row1->TDiasTrabajados?>" /></td>
                                    <td><input type="text"readonly="readonly" name="Thorasextras" value="<?=$row1->THorasExtras?>" /></td>
                                    <td><input type="text" readonly="readonly"name="tOtrosbonosa" value="<?=$row1->TOtrosBonos?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TRentaimponible" value="<?=$row1->TRentaImponible?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tacaja" value="<?=$row1->TAcajaOtro?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tnumcarga" value="<?=$row1->TNumCargas?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tasignacinfami" value="<?=$row1->TAsignacionFamiliar?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TTotal haberes" value="<?=$row1->TTotalHaberes?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tprovida" value="<?=$row1->MontoProvida?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Thabitat" value="<?=$row1->MontoHabitat?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tcapital" value="<?=$row1->MontoCapital?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tcuprum" value="<?=$row1->MontoCuprum?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tplanvital" value="<?=$row1->MontoPlanVital?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TAfc" value="<?=$row1->TAfc?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tisaprevarios" value="<?=$row1->TMontoIsapre?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tispreadicional" value="<?=$row1->TIsapreAdicional?>" /></td>
                                    <td><input type="text" readonly="readonly"name="TNOMBREISAPRE" value="<?=$row1->TNombreIsapre?>"
                                    <td><input type="text" readonly="readonly"name="Tfonas" value="<?=$row1->TFonasa?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tlosandes" value="<?=$row1->TLosAndes?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tapv" value="<?=$row1->TApv?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Ttotdescuentoslegaeles" value="<?=$row1->TTotalDescuentosLegales?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tbaseimpuesto" value="<?=$row1->TBaseImpuesto?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tipmuni" value="<?=$row1->TIpmUni?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tcreditos" value="<?=$row1->TPrestamos?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tanticiposi" value="<?=$row1->TAnticiposOtros?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Ttotaldescuentosadic" value="<?=$row1->TTotalDescuentosAdicionaes?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Ttotalliquido" value="<?=$row1->TTotalLiquido?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tafc1" value="<?=$row1->TAfctrabajador?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Tafc2" value="<?=$row1->TAfctrabajador1?>" /></td>
                                    <td><input type="text" readonly="readonly"name="Taporte" value="<?=$row1->TAporte?>" /></td>
                                     </tr>

                                <?php endif;?>
                                    <?php endforeach;?>
                                </table>

                    </div>
                </td>
            </tr>
        </table>
        <br><br>
        <div align="center" id="form">
            <form name="frm" action="">
                <input class="btn" type="submit" name="imprimir" value="Imprimir"/>
            </form>
        </div>
         </form>
    </div>
</div>
