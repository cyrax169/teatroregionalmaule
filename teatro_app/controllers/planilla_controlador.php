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

            $mes1=date('m');
            $anio=date('Y');
            
            $mes = $this->varios_model->cambia_meses2($mes1);
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
                    //$aux = $this->liquidacion_model->existeliquidacion($rut,$mes,$anio);
                  //  if ($aux == 0){
                  foreach( $data12['result12'] as $row12):
                 // for($i=0;$i<$num;$i++){
                 $Ruttrab=$row12->Rut;
                  //echo $Ruttrab;
                        $data['result']= $this->varios_model->Muestrarutamini2($Ruttrab);
                        $data1['result1'] = $this->planilla_model->Cargar_Anticipos($Ruttrab,$mes,$anio);
                        $data2['result2'] = $this->planilla_model->Cargar_Permisos($Ruttrab,$mes,$anio);
                        $data3['result3'] = $this->planilla_model->Cargar_Prestaciones($Ruttrab,$fecha);
                        $data4['result4'] = $this->planilla_model->Cargar_Licencias($Ruttrab,$fecha);
                        $data5['result5'] = $this->planilla_model->Cargar_Vacaciones($Ruttrab,$fecha);
                        $data6['result6'] = $this->planilla_model->Cargar_Trabajadores($Ruttrab);
                        $data7['result7'] = $this->planilla_model->Cargar_IUT();
                        $data8['result8'] = $this->planilla_model->Cargar_UF($mes1,$anio);
                        $data9['result9'] = $this->planilla_model->Cargar_Afp();
                        $data10['result10'] = $this->planilla_model->Cargar_Tramos();
                        $anticipos = 0;
                        $prestaciones = 0;
                        $Iut = 0;
                        $diasV = 0;
                        $diasP = 0;
                        $var2 = 0;
                        $UF = 0;
                        $Id=1;

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
                       
                        foreach($data4['result4'] as $row4):
                        endforeach;
                        if($data5['result5'] != null){
                            foreach($data5['result5'] as $row5):
                                $FInicioV = $row5->FechaInicio;
                                $FTerminoV = $row5->FechaTermino;
                                $MFechaTV = date("m", strtotime($FTerminoV));
                                $YFechaTV = date("Y", strtotime($FTerminoV));
                                $DFechaTV = date("d", strtotime($FTerminoV));
                                $YFechaIV = date("Y", strtotime($FInicioV));
                                $MFechaIV = date("m", strtotime($FInicioV));
                                $DFechaIV = date("d", strtotime($FInicioV));
                                    if($MFechaTV == $mes && $MFechaIV == $mes && $YFechaIV == $anio){
                                        $diasV = $diasV + $row5->TotalDias;
                                    }
                                    else if($MFechaIV == $mes && $MFechaTV != $mes && $YFechaIV == $anio){
                                        $diasV = $diasV + ((30 - $DFechaIV ) +1 );
                                    }
                                    else if ($MFechaTV == $mes && $MFechaIV != $mes && $YFechaIV == $anio){
                                        $diasV = $diasV + ($DFechaTV);
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
                                if($row2->GoceSueldo == 'si'){
                                    if($MFechaT == $mes && $MFechaI == $mes && $YFechaI == $anio){
                                        $diasP = $diasP + $row2->TotalDias;
                                    }
                                    else if($MFechaI == $mes && $MFechaT != $mes && $YFechaI == $anio){
                                        $diasP = $diasP + ((30 - $DFechaI ) +1 );
                                    }
                                    else if ($MFechaT == $mes && $MFechaI != $mes && $YFechaI == $anio){
                                        $diasP = $diasP + ($DFechaT);
                                    }
                                }

                            endforeach;
                        }
                        $dias = $diasV + $diasP;
                        foreach($data6['result6'] as $row6):

                            $dias  = $dias + $row6->DiasTrabajados;
                            $var2 = $dias * ($row6->Salario)/30;
                            $var1 = $row6->HorasExtras*(1/30)*(7/45)*(1.5)*$row6->Salario;
                            $var3 = $row6->Bonos;
                            $TotalImponible = $var1+$var2+$var3;
                            foreach($data7['result7'] as $row7):
                                if ($TotalImponible > $row7->Desde && $TotalImponible < $row7->Hasta)
                                    $Iut = $row7->cantidad;
                            endforeach;
                            $TopeSalud = 90*$UF;
                            $fonasa=$row6->Fonasa;
                            $fonasa1=$TotalImponible*$fonasa/100;// tope 60 uf
                            $nombreisapre=$row6->NombreIsapre;
                          if($nombreisapre==null)
                                $nombreisapre=0;
                            $montoisapre=$row6->MontoIsapre;
                             if($montoisapre==null)
                                $montoisapre=0;
                            $isapreadicional=0;
                            $losandes=$TotalImponible*0.95/100;// tope 60 uf
                            
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
                            foreach($data10['result10'] as $row10):
                                if ($row6->Salario > $row10->Inicio && $row6->Salario < $row10->Termino)
                                    $MontoCargas = $MontoCargas + $row10->Monto;
                            endforeach;
                            $NoImponible = $var4+$var5+$var6+$MontoCargas;
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
                            $descuentos = $Iut+$var7+$var8+$Afc+$salud+$prestaciones+$anticipos;
                            $Haberes = $TotalImponible + $NoImponible;
                            $baseimpuesto=$Haberes-$descuentos-$MontoCargas;
                            $ipmuni=$baseimpuesto-$Iut;
                            $totaladicional=$isapreadicional+$ipmuni+$anticipos+$prestaciones;
                            $Liquido =  $Haberes - $descuentos;
                            $Tmontoisapre=$Tmontoisapre + $montoisapre;
                            $Tnombreisapre=$Tnombreisapre+$nombreisapre;
                            $Tremuneracion=$Tremuneracion+$remuneracion;
                            $Tdias=$Tdias+$dias;
                            $Tvar1=$Tvar1+$var1;
                            $Tvar3=$Tvar3+$var3;
                            $TTotalImponible=$TTotalImponible+$TotalImponible;
                            //echo $TTotalImponible;
                            $Tvar4=$Tvar4+$var4;
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
                       $this->planilla_model->Guardaplanilla($digito,$montoisapre,$nombreisapre,$mes,$anio,$nombre,$rut,$remuneracion,$dias,$var1,$var3,$TotalImponible,$var4,$Cargas,$MontoCargas,$Haberes,$nombreafp,$var7,$Afc,$isapreadicional,$fonasa1,$losandes,$apv,$descuentos,$baseimpuesto,$ipmuni,$prestaciones,$anticipos,$totaladicional,$Liquido,$AfcEmp,$AfcEmp1,$TopeAfc,$aporte);
                 // }  $Afc = 0;
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
                        $this->planilla_model->Cargar_totales($mes,$anio,$montohabitat,$montoprovida,$montocuprum,$montoplanvital,$montocapital,$Tmontoisapre,$Tnombreisapre,$Tremuneracion,$Tdias,$Tvar1,$Tvar3,$TTotalImponible,$Tvar4,$TCargas,$TMontoCargas,$THaberes,$Tnombreafp,$Tvar7,$TAfc,$Tisapreadicional,$Tfonasa1,$Tlosandes,$Tapv,$Tdescuentos,$Tbaseimpuesto,$Tipmuni,$Tprestaciones,$Tanticipos,$Ttotaladicional,$TLiquido,$TAfcEmp,$TAfcEmp1,$Taporte);
                 // }  $Afc = 0;
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
        prep_pdf('A4');
        $this->cezpdf->addText(400,400,10,$this->input->post('AFPP'));
        $this->cezpdf->ezStream();
        /*
        $datos1  = array(array('nombre1'=>'<b>MES:</b>'
                            ,'valor1'=>$this->input->post('MES')
                            ,'nombre2'=>'<b>TIPO CONTRATO:</b>'
                            ,'valor2'=> $this->input->post('TIPOCONTRATO'))
                        ,array('nombre1'=>'<b>NOMBRE:</b>'
                            ,'valor1'=>$this->input->post('NOMBRE')
                            ,'nombre2'=>'<b>CARGO:</b>'
                            ,'valor2'=> $this->input->post('CARGO'))
                        ,array('nombre1'=>'<b>RUT:</b>'
                            ,'valor1'=>$this->input->post('RUT')
                            ,'nombre2'=>'<b>FECHA DE PAGO:</b>'
                            ,'valor2'=> $this->input->post('FECHAPAGO'))
        );
        $datos2 = array(array('nombre1'=>'<b>IMPONIBLE</b>'
                            ,'valor1'=>null
                            ,'nombre2'=>'<b>DESCUENTOS</b>'
                            ,'valor2'=> null)
                        ,array('nombre1'=>'DIAS TRABAJADOS EN EL MES:'
                            ,'valor1'=>$this->input->post('diastrabajados')
                            ,'nombre2'=>'AFP:'
                            ,'valor2'=> $this->input->post('AFPP'))
                        ,array('nombre1'=>'HORAS EXTRAS:'
                            ,'valor1'=>$this->input->post('horasextras')
                            ,'nombre2'=>'APV:'
                            ,'valor2'=> $this->input->post('APVP'))
                        ,array('nombre1'=>'BONO PRODUCTIVIDAD:'
                            ,'valor1'=>$this->input->post('bono')
                            ,'nombre2'=>'AFC:'
                            ,'valor2'=> $this->input->post('AFCP'))
                        ,array('nombre1'=>'<u><b>TOTAL IMPONIBLE:</b></u>'
                            ,'valor1'=>$this->input->post('imponible')
                            ,'nombre2'=>'SALUD:'
                            ,'valor2'=> $this->input->post('Salud'))
                        ,array('nombre1'=>'<b>NO IMPONIBLE</b>'
                            ,'valor1'=>null
                            ,'nombre2'=>'IUT:'
                            ,'valor2'=> $this->input->post('Iut'))
                        ,array('nombre1'=>'ASIGNACIÓN MOVILIZACIÓN:'
                            ,'valor1'=>$this->input->post('MOVILIZACION')
                            ,'nombre2'=>'CREDITOS:'
                            ,'valor2'=> $this->input->post('creditos'))
                        ,array('nombre1'=>'ASIGNACIÓN COLACIÓN:'
                            ,'valor1'=>$this->input->post('COLACION')
                            ,'nombre2'=>'AHORROS:'
                            ,'valor2'=> $this->input->post('ahorros'))
                        ,array('nombre1'=>'ASIGNACIÓN DE CAJA:'
                            ,'valor1'=>$this->input->post('CAJA')
                            ,'nombre2'=>'ANTICIPOS:'
                            ,'valor2'=> $this->input->post('anticipos'))
                        ,array('nombre1'=>'<u><b>TOTAL NO IMPONIBLE:</b></u>'
                            ,'valor1'=>$this->input->post('NOIMPONIBLE')
                            ,'nombre2'=>''
                            ,'valor2'=> null)
                        ,array('nombre1'=>''
                            ,'valor1'=>null
                            ,'nombre2'=>''
                            ,'valor2'=> null)
                        ,array('nombre1'=>'<b>TOTAL HABERES</b>'
                            ,'valor1'=>$this->input->post('HABERES')
                            ,'nombre2'=>'<b>TOTAL DESCUENTOS</b>'
                            ,'valor2'=> $this->input->post('DESCUENTOS'))
                        ,array('nombre1'=>'<b>TOTAL LÍQUIDO A PAGAR</b>'
                            ,'valor1'=>$this->input->post('LIQUIDO')
                            ,'nombre2'=>''
                            ,'valor2'=> null)
        );
        $trm1="<b>CORPORACIÓN DE AMIGOS\nDEL TEATRO REGIONAL DEL MAULE</b>\nRUT:65,560,740-4\nUno Oriente #1484, Talca.";
        $trm2="Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción";
        $trm3="el total líquido a pagar, indicado en la presente iquidación de Remuneraciones y no tengo cargo ni cobro";
        $trm4="alguno posterior que hacer, por ninguno de los conceptos comprendidos en ella.";
        for($i=0;$i<2;$i++):
            $this->cezpdf->ezText($trm1,8,array('justification'=> 'centre'));
            $this->cezpdf->ezText("\n");
            $this->cezpdf->ezTable($datos1
                ,array('nombre1'=>'','valor1'=>'','nombre2'=>'','valor2'=>''),'LIQUIDACIÓN DE REMUNERACIONES'
                ,array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','width'=>400,'fontSize' => 8,'titleFontSize' => 8)
            );
            $this->cezpdf->ezText("\n");
            //$this->cezpdf->ezText('IMPONIBLE                                   DESCUENTOS',10,array('justification'=> 'centre'));
            $this->cezpdf->ezTable($datos2
                ,array('nombre1'=>'','valor1'=>'','nombre2'=>'','valor2'=>''),''
                ,array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','width'=>400,'fontSize' => 8)
            );
            $this->cezpdf->ezText("\n");
            $this->cezpdf->ezText($trm2,6,array('justification'=> 'centre'));
            $this->cezpdf->ezText($trm3,6,array('justification'=> 'centre'));
            $this->cezpdf->ezText($trm4,6,array('justification'=> 'centre'));
            $this->cezpdf->ezText("\n");
            $this->cezpdf->ezText("p.p. Corp. De Amigos                                 Recibí Conforme\ndel Teatro Regional del Maule                                                  ",8,array('justification'=> 'centre'));
            $this->cezpdf->ezText("\n\n");
        endfor;
        $this->cezpdf->line(20,455,578,455);
        $this->cezpdf->line(230,679,230,654); //lineas de los campos de las horas y dias
        $this->cezpdf->line(230,308,230,283);
        $this->cezpdf->addText(25,445,8,'Impreso '.date('d/m/Y'));
        $this->cezpdf->addText(240,671,8,$this->input->post('cantdias'));
        $this->cezpdf->addText(240,300,8,$this->input->post('cantdias'));
        $this->cezpdf->addText(240,659,8,$this->input->post('canthoras'));
        $this->cezpdf->addText(240,288,8,$this->input->post('canthoras'));
         *
         */
        
    }
}
?>
