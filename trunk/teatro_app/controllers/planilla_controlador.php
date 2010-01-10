<?php
    class planilla_controlador extends Controller
    {
    function planilla_controlador()
    {
            parent::Controller();
            
            $this->load->model('planilla_model');
            $this->load->model('varios_model');
            $this->load->library('cezpdf');
            $this->load->helper('pdf_helper');
            $this->load->library('Numbers_Words');
    }
    function BuscaRutPlanilla()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {
            if( $this->session->userdata('permiso') == 0 )
                $this->load->view('Inicio/header');
            else
                $this->load->view('Inicio/headersup');
            $num = $this->varios_model->NumTrabajadores();
            /*for($i=0;$i<$num;$i++):
                $imprime=$this->input->post('imprime');
            endfor;*/
           
            $data['num'] = $num;
             $data12['result12'] = $this->varios_model->RutTrabajadoresplanilla();

           // $mes1=date('m');
            //$anio=date('Y');
            $mes = $this->input->post('mes');
            $anio = $this->input->post('anio');
            $data['mes'] = $mes;
            $data['anio'] = $anio;
            $mes1 = $this->varios_model->cambia_meses($mes);
            
            $fecha = "$anio-$mes-1";
           // if($mes == date('m') && $anio == date('Y'))
           // {
               // $data0 = $this->liquidacion_model->BuscaRut($rut);
                $data['username'] = $this->session->userdata('username');
               // if($data0->num_rows() > 0)
               // {
               $Tmontoisapre=0;
            $Tnombreisapre=0;
            $Tremuneracion=0;
            $Tdias=0;
            $Tvar1=0;
            $Tvar3=0;
            $TTotalImponible=0;
            $Tvar4=0;
            $TCargas=0;
            $TMontoCargas=0;
            $THaberes=0;
            $Tnombreafp=0;
            $Tvar7=0;
            $TAfc=0;
            $Tisapreadicional=0;
            $Tfonasa1=0;
            $Tlosandes=0;
            $Tapv=0;
            $Tdescuentos=0;
            $Tbaseimpuesto=0;
            $Tipmuni=0;
            $Tprestaciones=0;
            $Tanticipos=0;
            $Ttotaladicional=0;
            $TLiquido=0;
            $TAfcEmp=0;
            $TAfcEmp1=0;
            $TTopeAfc=0;
            $Taporte=0;
            $montocuprum=0;
            $montohabitat=0;
            $montoplanvital=0;
            $montocapital=0;
            $montoprovida=0;
            $anticipos = 0;
            $prestaciones = 0;
            $Iut = 0;
            $diasV = 0;
            $diasP = 0;
            $var2 = 0;
            $UF = 0;
            $Id=1;
            $diasL=0;
            $aux=$this->planilla_model->ExistePlanilla($mes,$anio); 
                    //$aux = $this->liquidacion_model->existeliquidacion($rut,$mes,$anio);
                  //  if ($aux == 0){
                  foreach( $data12['result12'] as $row12):
                 // for($i=0;$i<$num;$i++){
                 $Ruttrab=$row12->Rut;
                  //echo $Ruttrab;
                        //$mes1 = numero
                        //$mes = letras
                        $data['result']= $this->varios_model->Muestrarutamini2($Ruttrab);
                        $data1['result1'] = $this->planilla_model->Cargar_Anticipos($Ruttrab,$mes1,$anio);
                        $data2['result2'] = $this->planilla_model->Cargar_Permisos($Ruttrab,$mes1,$anio);
                        $data3['result3'] = $this->planilla_model->Cargar_Prestaciones($Ruttrab,$fecha);
                        $data4['result4'] = $this->planilla_model->Cargar_Licencias($Ruttrab,$fecha);
                        $data6['result6'] = $this->planilla_model->Cargar_Trabajadores($Ruttrab);
                        $data7['result7'] = $this->planilla_model->Cargar_IUT();
                        $data8['result8'] = $this->planilla_model->Cargar_UF($mes1,$anio);
                        $data9['result9'] = $this->planilla_model->Cargar_Afp();
                        $data10['result10'] = $this->planilla_model->Cargar_Tramos();
                        foreach($data['result'] as $row):
                        $rut=$row->Rut;
                        $digito=$row->Digito;
                        $nombre=$row->Nombre;
                        endforeach;
                        $MontoCargas = 0;
                        foreach($data1['result1'] as $row1):
                            $anticipos = $anticipos + $row1->Monto;
                        endforeach;
                        foreach($data3['result3'] as $row3):
                            if ($row3->CuotasPendientes != $row3->CuotasPagadas){
                            $prestaciones = $prestaciones + $row3->Monto;
                            //$this->varios_model->DescuentaCuotas($rut,$Id,$CuotasPagadas);
                            }
                        $Id++;
                        endforeach;
                        foreach($data8['result8'] as $row8):
                            $UF = $row8->Monto;
                        endforeach;
                       
                        if($data4['result4'] != null){
                            foreach($data4['result4'] as $row4):
                                $FInicioL = $row4->FechaInicio;
                                $FTerminoL = $row4->FechaTermino;
                                $MFechaTL = date("m", strtotime($FTerminoL));
                                $YFechaTL = date("Y", strtotime($FTerminoL));
                                $DFechaTL = date("d", strtotime($FTerminoL));
                                $YFechaIL = date("Y", strtotime($FInicioL));
                                $MFechaIL = date("m", strtotime($FInicioL));
                                $DFechaIL = date("d", strtotime($FInicioL));
                                if ($row4->TotalDias < 4)
                                    $diasL = $diasL;
                                if ($row4->TotalDias > 3 && $row4->TotalDias < 11){
                                    if($MFechaTL == $mes && $MFechaIL == $mes && $YFechaIL == $anio){
                                        $diasL = $diasL + ($row4->TotalDias - 3);
                                    }
                                    /*else if($MFechaIL == $mes && $MFechaTL != $mes && $YFechaIL == $anio){
                                        $diasL = $diasL - ((30 - $DFechaIL ) +1 );
                                    }
                                    else if ($MFechaTL == $mes && $MFechaIL != $mes && $YFechaIL == $anio){
                                        $diasL = $diasL - ($DFechaTL);
                                    }*/
                                }
                                if ($row4->TotalDias > 10){
                                    $diasL = $row4->TotalDias;
                                }
                            endforeach;
                        }
                         if($data2['result2'] != null){
                            foreach($data2['result2'] as $row2):
                                $FInicio = $row2->FechaInicio;
                                $FTermino = $row2->FechaTermino;
                                $MFechaT = date("m", strtotime($FTermino));
                                $YFechaT = date("Y", strtotime($FTermino));
                                $DFechaT = date("d", strtotime($FTermino));
                                $YFechaI = date("Y", strtotime($FInicio));
                                $MFechaI = date("m", strtotime($FInicio));
                                $DFechaI = date("d", strtotime($FInicio));
                                if($row2->GoceSueldo == 'no'){
                                    if($MFechaT == $mes1 && $MFechaI == $mes1 && $YFechaI == $anio){

                                        $diasP = $diasP + $row2->TotalDias;
                                    }
                                    else if($MFechaI == $mes1 && $MFechaT != $mes1 && $YFechaI == $anio){
                                        $diasP = $diasP + ((30 - $DFechaI ) +1 );
                                    }
                                    else if ($MFechaT == $mes1 && $MFechaI != $mes1 && $YFechaI == $anio){
                                        $diasP = $diasP + ($DFechaT);
                                    }
                                }
                            endforeach;
                        }
                        $dias = $diasP + $diasL;
                        foreach($data6['result6'] as $row6):
                            $dias  = $row6->DiasTrabajados - $dias;
                         //   echo $dias;
                            $var2 = $dias * ($row6->Salario)/30;
                            $var1 = $row6->HorasExtras*(1/30)*(7/45)*(1.5)*$row6->Salario;
                            $var3 = $row6->Bonos;
                            $TotalImponible = $var1+$var2+$var3;

                            $TopeSalud = 90*$UF;
                            $fonasa=$row6->Fonasa;
                            $fonasa1=$TotalImponible*($fonasa/100);// tope 60 uf
                            $nombreisapre=$row6->NombreIsapre;
                          if($nombreisapre==null)
                                $nombreisapre=0;
                            $montoisapre=$row6->MontoIsapre;
                             if($montoisapre==null)
                                $montoisapre=0;

                             if($nombreisapre!=null){
                             $isapreadicional= $montoisapre*$UF-$TotalImponible*7/100;
                             if ($isapreadicional < 0)
                                $isapreadicional = 0;
                             $isap=$TotalImponible*7/100;
                            // echo $isap;
                             }
                             else{
                             $isapreadicional=0;
                             $isap=0;
                             }
                             if($nombreisapre==null)
                            $losandes=$TotalImponible*0.95/100;// tope 60 uf
                            else
                            $losandes=0;

                            $AfcEmp1=0;
                            $AfcEmp=0;
                            
                            $apv=$row6->apvPesos;
                            $nombreafp=$row6->NombreAfp;

                            // calcular
                            $horas=$row6->HorasExtras;
                                    $TipoContrato=$row6->TipoContrato;
                            if($TipoContrato=='Fijo'){
                                $AfcEmp1=$TotalImponible*3/100;
                            }
                            else
                                $AfcEmp=$TotalImponible*2.4/100;

                            $aporte=$TotalImponible*0.95/100;
                            $remuneracion=$row6->Salario;
                            $var4 = $row6->Acaja;
                            $var5 = $row6->Amovilizacion;
                            $var6 = $row6->Acolacion;
                            $Cargas = $row6->Cargas;
                            if($Cargas > 0){
                                for($i=1;$i<=$Cargas;$i++){
                                    foreach($data10['result10'] as $row10):
                                        if ($row6->Salario > $row10->Inicio && $row6->Salario < $row10->Termino)
                                            $MontoCargas = $MontoCargas + $row10->Monto;
                                    endforeach;
                                }
                            }
                            $NoImponible = $var4+$var5+$var6+$MontoCargas;
                            $noimponible2=$var4+$var5+$var6;
                             if ($row6->Fonasa != 0)
                                $salud = $TotalImponible * (($row6->Fonasa)/100);
                            else if ($row6->MontoIsapre != 0)
                                $salud = (($row6->MontoIsapre)*$UF);
                            if ($salud > $TopeSalud)
                                $salud = $TopeSalud;
                            foreach($data9['result9'] as $row9):
                                if ( $row6->NombreAfp == $row9->NombreAfp)
                                    $var7 = $TotalImponible * ($row9->PorcentajeAfp/100);
                                    
                            endforeach;

                            if($var7 > $TopeSalud)
                                $var7 = $TopeSalud;
                            if($nombreafp=='Cuprum')
                                $montocuprum=$montocuprum+$var7;
                            if($nombreafp=='Capital')
                                $montocapital=$montocapital+$var7;
                            if($nombreafp=='Provida')
                                $montoprovida=$montoprovida+$var7;
                            if($nombreafp=='Plan Vital')
                                    $montoplanvital=$montoplanvital+$var7;
                            if($nombreafp=='Habitat')
                                    $montohabitat=$montohabitat+$var7;

                            $var8 = $row6->apvPesos;
                            $TopeAfc = 90*$UF;
                            //echo $TopeAfc;
                            if($row6->Afc == 'SI'){
                                $Afc = $TotalImponible * (0.6/100);
                                    if($Afc > $TopeAfc)
                                        $Afc = $TopeAfc;
                            }
                            else
                             $Afc = 0;
                            if($nombreisapre!=null)
                            $descuentol=$Afc+$apv+$var7+$isap;
                            else
                            $descuentol=$Afc+$apv+$var7+$fonasa1;

                            $descuentos = $Iut+$var7+$var8+$Afc+$salud+$prestaciones+$anticipos;
                            $Haberes = $TotalImponible + $NoImponible;
                             $Iut = $Haberes - ($salud + $var7 + $Afc + $var8);
                            foreach($data7['result7'] as $row7):
                                if ($Iut > $row7->Desde && $Iut < $row7->Hasta)
                                    $Iut = ($Iut*$row7->Factor) - $row7->cantidad;
                            endforeach;
                          //  $baseimpuesto=$Haberes-$descuentos-$MontoCargas;
                            $baseimpuesto=$Haberes-$descuentos-$MontoCargas;
                            foreach($data7['result7'] as $row7):
                                if ($baseimpuesto > $row7->Desde && $baseimpuesto < $row7->Hasta)
                                    $ipmuni = ($baseimpuesto*$row7->Factor) - $row7->cantidad;
                            endforeach;
                          //  $ipmuni=$baseimpuesto-$Iut;
                            $totaladicional=$isapreadicional+$ipmuni+$anticipos+$prestaciones;
                            $Liquido =  $Haberes - $descuentos;
                            $Tmontoisapre=$Tmontoisapre + $isap;
                            $Tnombreisapre=$Tnombreisapre+$nombreisapre;
                            $Tremuneracion=$Tremuneracion+$remuneracion;
                            $Tdias=$Tdias+$dias;
                            $Tvar1=$Tvar1+$var1;
                            $Tvar3=$Tvar3+$var3;
                            $TTotalImponible=$TTotalImponible+$TotalImponible;
                            //echo $TTotalImponible;
                            $Tvar4=$Tvar4+$noimponible2;
                            $TCargas=$TCargas+$Cargas;
                            $TMontoCargas=$TMontoCargas+$MontoCargas;
                            $THaberes=$THaberes+$Haberes;
                            $Tnombreafp=0;
                            $Tvar7=$Tvar7+$var7;
                            $TAfc=$TAfc+$Afc;
                            $Tisapreadicional=$Tisapreadicional+$isapreadicional;
                            $Tfonasa1=$Tfonasa1+$fonasa1;
                            $Tlosandes=$Tlosandes+$losandes;
                            $Tapv=$Tapv+$apv;
                            $Tdescuentos=$Tdescuentos+$descuentos;
                            $Tbaseimpuesto=$Tbaseimpuesto+$baseimpuesto;
                            $Tipmuni=$Tipmuni+$ipmuni;
                            $Tprestaciones=$Tprestaciones+$prestaciones;
                            $Tanticipos=$Tanticipos+$anticipos;
                            $Ttotaladicional=$Ttotaladicional+$totaladicional;
                            $TLiquido=$TLiquido+$Liquido;
                            $TAfcEmp=$TAfcEmp+$AfcEmp;
                            $TAfcEmp1=$TAfcEmp1+$AfcEmp1;
                            
                            $TTopeAfc=$TTopeAfc+$TopeAfc;
                            $Taporte=$Taporte+$aporte;
                    endforeach;
                            
                            if($aux==0)
                            $this->planilla_model->Guardaplanilla($digito,$isap,$nombreisapre,$mes,$anio,$nombre,$rut,$remuneracion,$dias,$var1,$var3,$TotalImponible,$noimponible2,$Cargas,$MontoCargas,$Haberes,$nombreafp,$var7,$Afc,$isapreadicional,$fonasa1,$losandes,$apv,$descuentol,$baseimpuesto,$ipmuni,$prestaciones,$anticipos,$totaladicional,$Liquido,$AfcEmp,$AfcEmp1,$TopeAfc,$aporte);
                 // }  $Afc = 0;
                            else
                            $this->planilla_model->updateplanilla($digito,$isap,$nombreisapre,$mes,$anio,$nombre,$rut,$remuneracion,$dias,$var1,$var3,$TotalImponible,$noimponible2,$Cargas,$MontoCargas,$Haberes,$nombreafp,$var7,$Afc,$isapreadicional,$fonasa1,$losandes,$apv,$descuentol,$baseimpuesto,$ipmuni,$prestaciones,$anticipos,$totaladicional,$Liquido,$AfcEmp,$AfcEmp1,$TopeAfc,$aporte);
                        /*    $descuentos = 0;
                            $Haberes = 0;
                            $baseimpuesto=0;
                            $ipmuni=0;
                            $totaladicional=0;
                            $Liquido =  0;
                            $nombre=0;
                            $rut=0;*/
                    $nombreisapre=0;

                 endforeach;
                        if($aux==0)
                        $this->planilla_model->Cargar_totales($mes,$anio,$montohabitat,$montoprovida,$montocuprum,$montoplanvital,$montocapital,$Tmontoisapre,$Tnombreisapre,$Tremuneracion,$Tdias,$Tvar1,$Tvar3,$TTotalImponible,$Tvar4,$TCargas,$TMontoCargas,$THaberes,$Tnombreafp,$Tvar7,$TAfc,$Tisapreadicional,$Tfonasa1,$Tlosandes,$Tapv,$Tdescuentos,$Tbaseimpuesto,$Tipmuni,$Tprestaciones,$Tanticipos,$Ttotaladicional,$TLiquido,$TAfcEmp,$TAfcEmp1,$Taporte);
                 // }  $Afc = 0;
                        else
                        $this->planilla_model->updatetotales($mes,$anio,$montohabitat,$montoprovida,$montocuprum,$montoplanvital,$montocapital,$Tmontoisapre,$Tnombreisapre,$Tremuneracion,$Tdias,$Tvar1,$Tvar3,$TTotalImponible,$Tvar4,$TCargas,$TMontoCargas,$THaberes,$Tnombreafp,$Tvar7,$TAfc,$Tisapreadicional,$Tfonasa1,$Tlosandes,$Tapv,$Tdescuentos,$Tbaseimpuesto,$Tipmuni,$Tprestaciones,$Tanticipos,$Ttotaladicional,$TLiquido,$TAfcEmp,$TAfcEmp1,$Taporte);

                        $data['result111'] = $this->planilla_model->Cargar_planilla($mes,$anio);
                        $data['result222'] = $this->planilla_model->totalesplan($mes,$anio);
                     /*   foreach($data['result111'] as $row13):
                            echo $row13->NombreIsapre;
                            echo '<br>';
                        endforeach;*/
                        $this->load->view('planilla/content',$data);
               
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }

    function Imprimir()
    {
        prep_pdf2();
        //$this->cezpdf->Cezpdf('LEGAL','landscape');
        $mes = $this->input->post('MesP');
        $anio = $this->input->post('AnioP');

        $trm="<b>PLANILLA DE REMUNERACIONES MES DE ".$mes." ".$anio."\nCORPORACIÓN DE AMIGOS DEL TEATRO REGIONAL DEL MAULE</b>";
        $this->cezpdf->ezText($trm,10,array('justification'=> 'left'));
        $data['result'] = $this->planilla_model->SacaPlanillas($mes,$anio);
        $data['resultados'] = $this->planilla_model->SacaResultados($mes,$anio);

        $i=0;
        $this->cezpdf->ezText("\n");
        $this->cezpdf->ezText("\n");
        foreach($data['result'] as $row):
            $provida = 0;
            $habitat =0;
            $capital=0;
            $cuprum = 0;
            $plan = 0;
            if($row->NombreAfp == "Provida")
                $provida = $row->MontoAfp;
            if($row->NombreAfp == 'Habitat')
                $habitat = $row->MontoAfp;
            if($row->NombreAfp == 'Capital')
                $capital = $row->MontoAfp;
            if($row->NombreAfp == 'Cuprum')
                $cuprum = $row->MontoAfp;
            if($row->NombreAfp == 'Plan Vital')
                $plan = $row->MontoAfp;
            $datos = array(array('                 NOMBRES         '=>$row->Nombre,
                                 'RUT'=>$row->Rut." - ".$row->Digito,
                                 'RENTA BRUTA'=>$row->RentaBruta,
                                 'DIAS '."\n".'TRABAJADOS'=>$row->DiasTrabajados,
                                 'HORAS'."\n".'HEXTRAS' => $row->HorasExtras,
                                 'OTROS BONO'."\n".'AGUINALDO' =>$row->OtrosBonos,
                                 'RENTA'."\n".'IMPONIBLE'=>$row->RentaImponible,
                                 'TOTAL'."\n".'NO IMPONIBLE' =>$row->AcajaOtro,
                                 'Nº CARGAS' => $row->NumCargas,
                                 'ASIGNACIÓN'."\n".'FAMILIAR' =>$row->AsignacionFamiliar,
                                 'TOTAL '."\n".' HABERES  ' => $row->TotalHaberes,
                                 'PROVIDA'=> $provida,
                                 'HABITAT' => $habitat
                             )
                     );
            if($i==0):
                $this->cezpdf->ezTable($datos,'','',array('showHeadings'=>1,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','fontSize' => 9));
            else:
                $this->cezpdf->ezTable($datos,'','',array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','fontSize' => 9));
            endif;
            $i++;
        endforeach;
        foreach($data['resultados'] as $row1):
            $datos1 = array(array('                 NOMBRES         '=>'TOTALES : ' ,
                                 'RUT'=>'            ',
                                 'RENTA BRUTA'=>$row1->TRentaBruta,
                                 'DIAS '."\n".'TRABAJADOS'=>$row1->TDiasTrabajados,
                                 'HORAS'."\n".'HEXTRAS' => $row1->THorasExtras,
                                 'OTROS BONO'."\n".'AGUINALDO' =>$row1->TOtrosBonos,
                                 'RENTA'."\n".'IMPONIBLE'=>$row1->TRentaImponible,
                                 'TOTAL'."\n".'NO IMPONIBLE' =>$row1->TAcajaOtro,
                                 'Nº CARGAS' => $row1->TNumCargas,
                                 'ASIGNACIÓN'."\n".'FAMILIAR' =>$row1->TAsignacionFamiliar,
                                 'TOTAL '."\n".' HABERES  ' => $row1->TTotalHaberes,
                                 'PROVIDA' => $row1->MontoProvida,
                                 'HABITAT' => $row1->MontoHabitat
                            )
                 );
           $this->cezpdf->ezTable($datos1,'','',array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','fontSize' => 9));
        endforeach;
        $this->cezpdf->line(20,30,1000,30);
        $this->cezpdf->addText(25,20,8,'Impreso '.date('d/m/Y h:m:s'));
        $this->cezpdf->ezNewPage();
        $this->cezpdf->ezText($trm,10,array('justification'=> 'left'));

        $i=0;
        $this->cezpdf->ezText("\n");
        $this->cezpdf->ezText("\n");
        foreach($data['result'] as $row):
            $provida = 0;
            $habitat =0;
            $capital=0;
            $cuprum = 0;
            $plan = 0;
            if($row->NombreAfp == "Provida")
                $provida = $row->MontoAfp;
            if($row->NombreAfp == 'Habitat')
                $habitat = $row->MontoAfp;
            if($row->NombreAfp == 'Capital')
                $capital = $row->MontoAfp;
            if($row->NombreAfp == 'Cuprum')
                $cuprum = $row->MontoAfp;
            if($row->NombreAfp == 'Plan Vital')
                $plan = $row->MontoAfp;
            $datos = array(array('CAPITAL' => $capital,
                                 'CUPRUM ' => $cuprum,
                                 'PLAN VITAL '=>$plan,
                                 'AFC   ' => $row->Afc,
                                 ' ISAPRE ' =>$row->MontoIsapre,
                                 'ISAPRE '."\n".'ADICIONAL' => $row->IsapreAdicional,
                                 'NOMBRE '."\n".'ISAPRE  ' =>$row->NombreIsapre,
                                 'FONASA 6.4' => $row->Fonasa,
                                 '  CAJA  ' => $row->LosAndes,
                                 '  APV  ' => $row->Apv,
                                 'TOTAL DESCUENTOS '."\n".'LEGALES' =>$row->TotalDescuentosLegales,
                                 'BASE IMPUESTO' => $row->BaseImpuesto,
                                 ' IPM. UNI ' => $row->IpmUni,
                                 'SEGUROS/'."\n".'CREDITOS ' => $row->Prestamos,
                                 'ANTICIPO' => $row->AnticiposOtros
                                 
                                 )
                     );
            if($i==0):
                $this->cezpdf->ezTable($datos,'','',array('showHeadings'=>1,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','fontSize' => 9));
            else:
                $this->cezpdf->ezTable($datos,'','',array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','fontSize' => 9));
            endif;
            $i++;
        endforeach;
        foreach($data['resultados'] as $row1):
            $datos2 = array(array('CAPITAL'=>$row1->MontoCapital ,
                                 'CUPRUM '=>$row1->MontoCuprum,
                                 'PLAN VITAL '=>$row1->MontoPlanVital,
                                 'AFC   '=>$row1->TAfc,
                                 ' ISAPRE ' => $row1->TMontoIsapre,
                                 'ISAPRE '."\n".'ADICIONAL' => $row1->TIsapreAdicional,
                                 'NOMBRE '."\n".'ISAPRE  ' =>'',
                                 'FONASA 6.4' => $row1->TFonasa,
                                 '  CAJA  ' => $row1->TLosAndes,
                                 '  APV  ' => $row1->TApv,
                                 'TOTAL DESCUENTOS '."\n".'LEGALES' =>$row1->TTotalDescuentosLegales,
                                 'BASE IMPUESTO' => $row1->TBaseImpuesto,
                                 ' IPM. UNI ' => $row1->TIpmUni,
                                 'SEGUROS/'."\n".'CREDITOS ' => $row1->TPrestamos,
                                 'ANTICIPO' => $row1->TAnticiposOtros
                            )
                 );
           $this->cezpdf->ezTable($datos2,'','',array('showHeadings'=>0,'shaded'=>2,'showLines'=>2,'xOrientation'=>'centre','fontSize' => 9));
        endforeach;
        $this->cezpdf->line(20,30,1000,30);
        $this->cezpdf->addText(25,20,8,'Impreso '.date('d/m/Y h:m:s'));
        $this->cezpdf->ezNewPage();
        $this->cezpdf->ezText($trm,10,array('justification'=> 'left'));

        $i=0;
        $this->cezpdf->ezText("\n");
        $this->cezpdf->ezText("\n");
        foreach($data['result'] as $row):
            $provida = 0;
            $habitat =0;
            $capital=0;
            $cuprum = 0;
            $plan = 0;
            if($row->NombreAfp == "Provida")
                $provida = $row->MontoAfp;
            if($row->NombreAfp == 'Habitat')
                $habitat = $row->MontoAfp;
            if($row->NombreAfp == 'Capital')
                $capital = $row->MontoAfp;
            if($row->NombreAfp == 'Cuprum')
                $cuprum = $row->MontoAfp;
            if($row->NombreAfp == 'Plan Vital')
                $plan = $row->MontoAfp;
            $datos = array(array('TOTAL DESCUENTO '."\n".'ADICIONAL' => $row->TotalDescuentosAdicionaes,
                                 'TOTAL LIQUIDO ' => $row->TotalLiquido,
                                 ' AFC 2.4% ' => $row->Afctrabajador,
                                 ' AFC 3.0% ' => $row->Afctrabajador1,
                                 ' APORTE 0.95% '=> $row->Aporte
                                 
                                 )
                     );
            if($i==0):
                $this->cezpdf->ezTable($datos,'','',array('showHeadings'=>1,'shaded'=>0,'showLines'=>2,'xOrientation'=>'left','fontSize' => 9));
            else:
                $this->cezpdf->ezTable($datos,'','',array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'left','fontSize' => 9));
            endif;
            $i++;
        endforeach;
        foreach($data['resultados'] as $row1):
            $datos3 = array(array('TOTAL DESCUENTO '."\n".'ADICIONAL' => $row1->TTotalDescuentosAdicionaes,
                                 'TOTAL LIQUIDO ' => $row1->TTotalLiquido,
                                 ' AFC 2.4% ' => $row1->TAfctrabajador,
                                 ' AFC 3.0% ' => $row1->TAfctrabajador1,
                                 ' APORTE 0.95% '=> $row1->TAporte
                            )
                 );
           $this->cezpdf->ezTable($datos3,'','',array('showHeadings'=>0,'shaded'=>2,'showLines'=>2,'xOrientation'=>'left','fontSize' => 9));
        endforeach;
        $this->cezpdf->line(20,30,1000,30);
        $this->cezpdf->addText(25,20,8,'Impreso '.date('d/m/Y h:m:s'));
        $this->cezpdf->ezStream();        
    }
}
?>
