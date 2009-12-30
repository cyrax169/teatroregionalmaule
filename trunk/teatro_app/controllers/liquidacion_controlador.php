<?php
    class liquidacion_controlador extends Controller
    {
    function liquidacion_controlador()
    {
            parent::Controller();
            
            $this->load->model('liquidacion_model');
            $this->load->model('varios_model');
            $this->load->library('cezpdf');
            $this->load->helper('pdf_helper');
    }
    function BuscaRut()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if( $this->session->userdata('permiso') == 0 )
                $this->load->view('Inicio/header');
            else
                $this->load->view('Inicio/headersup');
            $num = $this->varios_model->NumTrabajadores();
            for($i=0;$i<$num;$i++):
                $imprime=$this->input->post('imprime');
            endfor;
            $mes1 = $this->input->post('mes');
            $anio = $this->input->post('anio');
            $rut = $this->input->post('rut'.$imprime);
            $mes = $this->varios_model->cambia_meses($mes1);
            if($mes == date('m'))
            {
                $fecha = "$anio-$mes-1";
                $data0 = $this->liquidacion_model->BuscaRut($rut);
                $data['username'] = $this->session->userdata('username');
                if($data0->num_rows() >0)
                {
                    $data1['result1'] = $this->liquidacion_model->Cargar_Anticipos($rut,$mes,$anio);
                    $data2['result2'] = $this->liquidacion_model->Cargar_Permisos($rut,$mes,$anio);
                    $data3['result3'] = $this->liquidacion_model->Cargar_Prestaciones($rut,$fecha);
                    $data4['result4'] = $this->liquidacion_model->Cargar_Licencias($rut,$fecha);
                    $data5['result5'] = $this->liquidacion_model->Cargar_Vacaciones($rut,$fecha);
                    $data6['result6'] = $this->liquidacion_model->Cargar_Trabajadores($rut);
                    $data7['result7'] = $this->liquidacion_model->Cargar_IUT();
                    $data8['result8'] = $this->liquidacion_model->Cargar_UF($mes,$anio);
                    $data9['result9'] = $this->liquidacion_model->Cargar_Afp();
                    $anticipos = 0;
                    $prestaciones = 0;
                    $Iut = 0;
                    $diasV = 0;
                    $diasP = 0;
                    $var2 = 0;
                    $UF = 0;
                    foreach($data1['result1'] as $row1):
                        $anticipos = $anticipos + $row1->Monto;
                    endforeach;
                    foreach($data3['result3'] as $row3):
                        if ($row3->Cuotas > 0){
                            $prestaciones = $prestaciones + $row3->Monto;
                        }
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
                        $var4 = $row6->Acaja;
                        $var5 = $row6->Amovilizacion;
                        $var6 = $row6->Acolacion;
                        $NoImponible = $var4+$var5+$var6;
                        $salud = $TotalImponible * (($row6->MontoIsapre + $row6->Fonasa)/100);
                        foreach($data9['result9'] as $row9):
                            if ( $row6->NombreAfp == $row9->NombreAfp)
                                $var7 = $TotalImponible * ($row9->PorcentajeAfp/100);
                        endforeach;
                        $var8 = $row6->apvPesos;
                        $TopeAfc = 90*$UF;
                        if($row6->Afc == 3){
                            $Afc = $TotalImponible * (3/100);
                                if($Afc > $TopeAfc)
                                    $Afc = $TopeAfc;
                        }
                        else if($row6->Afc == 2.4){
                            $Afc = $TotalImponible * (2.4/100);
                                if($Afc > $TopeAfc)
                                    $Afc = $TopeAfc;
                        }
                        $descuentos = $Iut+$var7+$var8+$Afc+$salud+$prestaciones+$anticipos;
                        $Haberes = $TotalImponible - $NoImponible;
                        $Liquido =  $Haberes - $descuentos;
                        $FechaPago = '30 de '.$mes1;
                        $datos = array(
                            'Rut' =>$row6->Rut,
                            'Digito' =>$row6->Digito,
                            'Nombre' => $row6->Nombre,
                            'TipoContrato' => $row6->TipoContrato,
                            'Cargo' => $row6->Cargo,
                            'FechaPago' => $FechaPago,
                            //'Salario' => $row6->Salario,
                            'Dias' => $dias,
                            'Extras' => $row6->HorasExtras,
                            'DiasTrabajados' => $var2,
                            'HorasExtras' => $var1,
                            'Bonos' => $var3,
                            'TotalImponible' => $TotalImponible,
                            'Amovilizacion' => $row6->Amovilizacion,
                            'Acolacion' => $row6->Acolacion,
                            'Acaja' => $row6->Acaja,
                            'Anticipos' => $anticipos,
                            'NoImponible' =>  $NoImponible,
                            'PorcentajeAfp' => $var7,
                            //'NombreAfp' => $row6->NombreAfp,
                            'ApvPesos' => $row6->apvPesos,
                            'Afc' => $Afc,
                            'Salud' => $salud,
                            'Mes' => $mes1,
                            'Iut' => $Iut,
                            'Creditos' => $prestaciones,
                            'Ahorros' => 0,
                            'Haberes' => $Haberes,
                            'Descuentos' => $descuentos,
                            'Liquido' => $Liquido
                        );
                endforeach;
                    $data['query']=$datos;
                    
                    $this->load->view('Liquidacion/impresion',$data);
                }
                else
                    $this->load->view('Errores/error1',$data);
            }
            else
            {
                echo "Debe buscarse en la BD ";
            }
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function Imprimir()
    {
        prep_pdf();
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
        $this->cezpdf->addText(25,445,8,'Impreso '.date('d/m/Y'));
        $this->cezpdf->ezStream();
    }
}
?>
