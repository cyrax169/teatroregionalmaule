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
                $this->load->library('Numbers_Words');
        }
        function num_palabras($numero)
        {
            $nw = new Numbers_Words();

            $pal = $nw->toWords($numero)." pesos";
            return $pal;
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
                $fecha = "$anio-$mes-1";
                if($mes == date('m') && $anio == date('Y'))
                {
                    $data0 = $this->liquidacion_model->BuscaRut($rut);
                    $data['username'] = $this->session->userdata('username');
                    if($data0->num_rows() > 0)
                    {
                        $data1['result1'] = $this->liquidacion_model->Cargar_Anticipos($rut,$mes,$anio);
                        $data2['result2'] = $this->liquidacion_model->Cargar_Permisos($rut,$mes,$anio);
                        $data3['result3'] = $this->liquidacion_model->Cargar_Prestaciones($rut,$fecha);
                        $data4['result4'] = $this->liquidacion_model->Cargar_Licencias($rut,$fecha);
                        $data6['result6'] = $this->liquidacion_model->Cargar_Trabajadores($rut);
                        $data7['result7'] = $this->liquidacion_model->Cargar_IUT();
                        $data8['result8'] = $this->liquidacion_model->Cargar_UF($mes,$anio);
                        $data9['result9'] = $this->liquidacion_model->Cargar_Afp();
                        $data10['result10'] = $this->liquidacion_model->Cargar_Tramos();
                        $data11['result11'] = $this->liquidacion_model->Cargar_Aux($rut,$mes,$anio);
                        $anticipos = 0;
                        $prestaciones = 0;
                        $Iut = 0;
                        $diasV = 0;
                        $diasP = 0;
                        $diasL = 0;
                        $var2 = 0;
                        $UF = 0;
                        $Id=1;
                        $MontoCargas = 0;
                        $BonoNoImponible = 0;
                        foreach($data1['result1'] as $row1):
                            $anticipos = $anticipos + $row1->Monto;
                        endforeach;
                        if($data11['result11'] == null){
                            foreach($data3['result3'] as $row3):
                                if ($row3->CuotasPendientes != $row3->CuotasPagadas){
                                $prestaciones = $prestaciones + $row3->Monto;
                                $this->liquidacion_model->DescuentaCuotas($rut,$Id,$row3->CuotasPagadas);
                                $Id++;
                                }
                            endforeach;
                        }
                        else{
                            foreach($data3['result3'] as $row3):
                                if ($row3->CuotasPendientes != $row3->CuotasPagadas){
                                $prestaciones = $prestaciones + $row3->Monto;
                                }
                            $Id++;
                            endforeach;
                        }
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
                        $dias = $diasP + $diasL;
                        foreach($data6['result6'] as $row6):
                            $dias  = $row6->DiasTrabajados - $dias;
                            $var2 = $dias * ($row6->Salario)/30;
                            $var1 = $row6->HorasExtras*(1/30)*(7/45)*(1.5)*$row6->Salario;
                            $var3 = $row6->Bonos;
                            $TotalImponible = $var1+$var2+$var3;
                            $TopeSalud = 90*$UF;
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
                            $TopeImponible = 60*$UF;
                            if ($TotalImponible > $TopeImponible){
                                $BonoNoImponible = ($TotalImponible - $TopeImponible);
                                $TotalImponible = $TopeImponible;
                            }
                            $NoImponible = $var4+$var5+$var6+$MontoCargas+$BonoNoImponible;
                            $TopeInfIsapre = $TotalImponible * (7/100);
                            if ($row6->Fonasa != 0){
                                $salud = $TotalImponible * ((7)/100);
                                $NombreSalud = 'Fonasa';
                            }
                            else if ($row6->MontoIsapre != 0){
                                $salud = (($row6->MontoIsapre)*$UF);
                                $NombreSalud = $row6->NombreIsapre;
                                if ($salud < $TopeInfIsapre)
                                    $salud = $TopeInfIsapre;
                            }
                            if ($salud > $TopeSalud)
                                $salud = $TopeSalud;
                            foreach($data9['result9'] as $row9):
                                if ( $row6->NombreAfp == $row9->NombreAfp)
                                    $var7 = $TotalImponible * ($row9->PorcentajeAfp/100);
                            endforeach;
                            if($var7 > $TopeSalud)
                                $var7 = $TopeSalud;
                            $var8 = ($row6->apvUf * $UF);
                            $TopeAfc = 90*$UF;
                            if($row6->Afc == 'SI'){
                                $Afc = $TotalImponible * (0.6/100);
                                if($Afc > $TopeAfc)
                                    $Afc = $TopeAfc;
                            }
                            else
                                $Afc = 0;
                            $descuentos = $Iut+$var7+$var8+$Afc+$salud+$prestaciones+$anticipos;
                            $Haberes = $TotalImponible + $NoImponible;
                            $Liquido =  $Haberes - $descuentos;
                            $LiquidoPalabras = $this->num_palabras($Liquido+0.4);
                            $FechaPago = '30 de '.$mes1.' del '.$anio;
                            $NombreAfp = $row6->NombreAfp;
                            $Iut = $Haberes - ($salud + $var7 + $Afc + $var8);
                            foreach($data7['result7'] as $row7):
                                if ($Iut > $row7->Desde && $Iut < $row7->Hasta)
                                    $Iut = ($Iut*$row7->Factor) - $row7->cantidad;
                            endforeach;
                            $datos = array(
                                'Rut' =>$row6->Rut,
                                'Anio' => $anio,
                                'Digito' =>$row6->Digito,
                                'Nombre' => $row6->Nombre,
                                'TipoContrato' => $row6->TipoContrato,
                                'Cargo' => $row6->Cargo,
                                'FechaPago' => $FechaPago,
                                'Dias' => $dias,
                                'Extras' => $row6->HorasExtras,
                                'DiasTrabajados' => $var2,
                                'HorasExtras' => $var1,
                                'Bonos' => $var3,
                                'TotalImponible' => $TotalImponible,
                                'Cargas' => $Cargas,
                                'MontoCargas' => $MontoCargas,
                                'Amovilizacion' => $row6->Amovilizacion,
                                'Acolacion' => $row6->Acolacion,
                                'Acaja' => $row6->Acaja,
                                'BonoNoImponible' => $BonoNoImponible,
                                'Anticipos' => $anticipos,
                                'NoImponible' =>  $NoImponible,
                                'PorcentajeAfp' => $var7,
                                'NombreAfp' => $row6->NombreAfp,
                                'ApvPesos' => $var8,
                                'Afc' => $Afc,
                                'Salud' => $salud,
                                'NombreSalud' => $NombreSalud,
                                'Mes' => $mes1,
                                'Iut' => $Iut,
                                'Creditos' => $prestaciones,
                                'Ahorros' => 0,
                                'Haberes' => $Haberes,
                                'Descuentos' => $descuentos,
                                'Liquido' => $Liquido,
                                'LiquidoPalabras' => $LiquidoPalabras
                            );
                            if($data11['result11'] == null){
                                $this->liquidacion_model->GuardaLiquidacion($rut,$row6->Digito,$mes1,$mes,$anio,
                                        $row6->Nombre,$dias,$var2,$row6->HorasExtras,$var1,$var3,$Cargas,$MontoCargas,
                                        $row6->Amovilizacion,$row6->Acolacion,$row6->Acaja,$BonoNoImponible,$row6->TipoContrato,
                                        $row6->Cargo,$FechaPago,$var7,$row6->NombreAfp,$var8,$Afc,$salud,$NombreSalud,
                                        $Iut,$prestaciones,0,$anticipos,$TotalImponible,$NoImponible,$Haberes,
                                        $Liquido,$descuentos,$LiquidoPalabras);
                            }
                            else{
                                $this->liquidacion_model->ActualizaLiquidacion($rut,$row6->Digito,$mes1,$mes,$anio,
                                    $row6->Nombre,$dias,$var2,$row6->HorasExtras,$var1,$var3,$Cargas,$MontoCargas,
                                    $row6->Amovilizacion,$row6->Acolacion,$row6->Acaja,$BonoNoImponible,$row6->TipoContrato,
                                    $row6->Cargo,$FechaPago,$var7,$row6->NombreAfp,$var8,$Afc,$salud,$NombreSalud,
                                    $Iut,$prestaciones,0,$anticipos,$TotalImponible,$NoImponible,$Haberes,
                                    $Liquido,$descuentos,$LiquidoPalabras);
                            }
                    endforeach;
                        //$data['query']=$datos;
                        //$this->load->view('Liquidacion/impresion',$data);
                        $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                        $this->load->view('Liquidacion/impresionBD',$data);
                    }
                    else{
                        $data['username'] = $this->session->userdata('username');
                        $this->load->view('Errores/error1',$data);
                    }
                }
                else if ($mes >= date('m'))
                {
                    if($anio >= date("Y")){
                        $data['username'] = $this->session->userdata('username');
                        $this->load->view('Errores/error11',$data);
                    }
                    else if ($anio < date("Y"))
                        if($anio <= date("Y")){
                            $data['username'] = $this->session->userdata('username');
                            $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                            if($data['resultado'] != null)
                                $this->load->view('Liquidacion/impresionBD',$data);
                            else{
                                $data['username'] = $this->session->userdata('username');
                                $this->load->view('Errores/error12',$data);
                            }
                        }
                }
                else if ($mes < date('m'))
                {
                    if($anio > date("Y")){
                        $data['username'] = $this->session->userdata('username');
                        $this->load->view('Errores/error11',$data);
                    }
                    if($anio <= date("Y")){
                        $data['username'] = $this->session->userdata('username');
                        $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                        if($data['resultado'] != null)
                            $this->load->view('Liquidacion/impresionBD',$data);
                        else{
                            $data['username'] = $this->session->userdata('username');
                            $this->load->view('Errores/error12',$data);
                        }
                    }
                }
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }







































































        function GeneraTodas()
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
                $numtrabajador = $this->liquidacion_model->CantTrabajadores();
                $data100['result100'] = $this->liquidacion_model->RutTrabajador();
                foreach($data100['result100'] as $row100):
                    $rut = $row100->Rut;
                    $mes = $this->varios_model->cambia_meses($mes1);
                    $fecha = "$anio-$mes-1";
                    if($mes == date('m') && $anio == date('Y'))
                    {
                        $data1['result1'] = $this->liquidacion_model->Cargar_Anticipos($rut,$mes,$anio);
                        $data2['result2'] = $this->liquidacion_model->Cargar_Permisos($rut,$mes,$anio);
                        $data3['result3'] = $this->liquidacion_model->Cargar_Prestaciones($rut,$fecha);
                        $data4['result4'] = $this->liquidacion_model->Cargar_Licencias($rut,$fecha);
                        $data6['result6'] = $this->liquidacion_model->Cargar_Trabajadores($rut);
                        $data7['result7'] = $this->liquidacion_model->Cargar_IUT();
                        $data8['result8'] = $this->liquidacion_model->Cargar_UF($mes,$anio);
                        $data9['result9'] = $this->liquidacion_model->Cargar_Afp();
                        $data10['result10'] = $this->liquidacion_model->Cargar_Tramos();
                        $data11['result11'] = $this->liquidacion_model->Cargar_Aux($rut,$mes,$anio);
                        $anticipos = 0;
                        $prestaciones = 0;
                        $Iut = 0;
                        $diasV = 0;
                        $diasP = 0;
                        $diasL = 0;
                        $var2 = 0;
                        $UF = 0;
                        $Id=1;
                        $MontoCargas = 0;
                        $BonoNoImponible = 0;
                        foreach($data1['result1'] as $row1):
                            $anticipos = $anticipos + $row1->Monto;
                        endforeach;
                        if($data11['result11'] == null){
                            foreach($data3['result3'] as $row3):
                                if ($row3->CuotasPendientes != $row3->CuotasPagadas){
                                $prestaciones = $prestaciones + $row3->Monto;
                                $this->liquidacion_model->DescuentaCuotas($rut,$Id,$row3->CuotasPagadas);
                                $Id++;
                                }
                            endforeach;
                        }
                        else{
                            foreach($data3['result3'] as $row3):
                                if ($row3->CuotasPendientes != $row3->CuotasPagadas){
                                $prestaciones = $prestaciones + $row3->Monto;
                                }
                            $Id++;
                            endforeach;
                        }
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
                        $dias = $diasP + $diasL;
                        foreach($data6['result6'] as $row6):
                            $dias  = $row6->DiasTrabajados - $dias;
                            $var2 = $dias * ($row6->Salario)/30;
                            $var1 = $row6->HorasExtras*(1/30)*(7/45)*(1.5)*$row6->Salario;
                            $var3 = $row6->Bonos;
                            $TotalImponible = $var1+$var2+$var3;
                            $TopeSalud = 90*$UF;
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
                            $TopeImponible = 60*$UF;
                            if ($TotalImponible > $TopeImponible){
                                $BonoNoImponible = ($TotalImponible - $TopeImponible);
                                $TotalImponible = $TopeImponible;
                            }
                            $NoImponible = $var4+$var5+$var6+$MontoCargas+$BonoNoImponible;
                            $TopeInfIsapre = $TotalImponible * (7/100);
                            if ($row6->Fonasa != 0){
                                $salud = $TotalImponible * ((7)/100);
                                $NombreSalud = 'Fonasa';
                            }
                            else if ($row6->MontoIsapre != 0){
                                $salud = (($row6->MontoIsapre)*$UF);
                                $NombreSalud = $row6->NombreIsapre;
                                if ($salud < $TopeInfIsapre)
                                    $salud = $TopeInfIsapre;
                            }
                            if ($salud > $TopeSalud)
                                $salud = $TopeSalud;
                            foreach($data9['result9'] as $row9):
                                if ( $row6->NombreAfp == $row9->NombreAfp)
                                    $var7 = $TotalImponible * ($row9->PorcentajeAfp/100);
                            endforeach;
                            if($var7 > $TopeSalud)
                                $var7 = $TopeSalud;
                            $var8 = ($row6->apvUf * $UF);
                            $TopeAfc = 90*$UF;
                            if($row6->Afc == 'SI'){
                                $Afc = $TotalImponible * (0.6/100);
                                if($Afc > $TopeAfc)
                                    $Afc = $TopeAfc;
                            }
                            else
                                $Afc = 0;
                            $descuentos = $Iut+$var7+$var8+$Afc+$salud+$prestaciones+$anticipos;
                            $Haberes = $TotalImponible + $NoImponible;
                            $Liquido =  $Haberes - $descuentos;
                            $LiquidoPalabras = $this->num_palabras($Liquido+0.4);
                            $FechaPago = '30 de '.$mes1.' del '.$anio;
                            $NombreAfp = $row6->NombreAfp;
                            $Iut = $Haberes - ($salud + $var7 + $Afc + $var8);
                            foreach($data7['result7'] as $row7):
                                if ($Iut > $row7->Desde && $Iut < $row7->Hasta)
                                    $Iut = ($Iut*$row7->Factor) - $row7->cantidad;
                            endforeach;
                            $datos = array(
                                'Rut' =>$row6->Rut,
                                'Anio' => $anio,
                                'Digito' =>$row6->Digito,
                                'Nombre' => $row6->Nombre,
                                'TipoContrato' => $row6->TipoContrato,
                                'Cargo' => $row6->Cargo,
                                'FechaPago' => $FechaPago,
                                'Dias' => $dias,
                                'Extras' => $row6->HorasExtras,
                                'DiasTrabajados' => $var2,
                                'HorasExtras' => $var1,
                                'Bonos' => $var3,
                                'TotalImponible' => $TotalImponible,
                                'Cargas' => $Cargas,
                                'MontoCargas' => $MontoCargas,
                                'Amovilizacion' => $row6->Amovilizacion,
                                'Acolacion' => $row6->Acolacion,
                                'Acaja' => $row6->Acaja,
                                'BonoNoImponible' => $BonoNoImponible,
                                'Anticipos' => $anticipos,
                                'NoImponible' =>  $NoImponible,
                                'PorcentajeAfp' => $var7,
                                'NombreAfp' => $row6->NombreAfp,
                                'ApvPesos' => $var8,
                                'Afc' => $Afc,
                                'Salud' => $salud,
                                'NombreSalud' => $NombreSalud,
                                'Mes' => $mes1,
                                'Iut' => $Iut,
                                'Creditos' => $prestaciones,
                                'Ahorros' => 0,
                                'Haberes' => $Haberes,
                                'Descuentos' => $descuentos,
                                'Liquido' => $Liquido,
                                'LiquidoPalabras' => $LiquidoPalabras
                            );
                            if($data11['result11'] == null){
                                $this->liquidacion_model->GuardaLiquidacion($rut,$row6->Digito,$mes1,$mes,$anio,
                                        $row6->Nombre,$dias,$var2,$row6->HorasExtras,$var1,$var3,$Cargas,$MontoCargas,
                                        $row6->Amovilizacion,$row6->Acolacion,$row6->Acaja,$BonoNoImponible,$row6->TipoContrato,
                                        $row6->Cargo,$FechaPago,$var7,$row6->NombreAfp,$var8,$Afc,$salud,$NombreSalud,
                                        $Iut,$prestaciones,0,$anticipos,$TotalImponible,$NoImponible,$Haberes,
                                        $Liquido,$descuentos,$LiquidoPalabras);
                            }
                            else{
                                $this->liquidacion_model->ActualizaLiquidacion($rut,$row6->Digito,$mes1,$mes,$anio,
                                    $row6->Nombre,$dias,$var2,$row6->HorasExtras,$var1,$var3,$Cargas,$MontoCargas,
                                    $row6->Amovilizacion,$row6->Acolacion,$row6->Acaja,$BonoNoImponible,$row6->TipoContrato,
                                    $row6->Cargo,$FechaPago,$var7,$row6->NombreAfp,$var8,$Afc,$salud,$NombreSalud,
                                    $Iut,$prestaciones,0,$anticipos,$TotalImponible,$NoImponible,$Haberes,
                                    $Liquido,$descuentos,$LiquidoPalabras);
                            }
                        endforeach;
                            //$data['query']=$datos;
                            //$this->load->view('Liquidacion/impresion',$data);
                            //$data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                            //$this->load->view('Liquidacion/impresionBD',$data);
                             $this->ImprimirTodas($mes,$anio);
                    }
                    else if ($mes >= date('m'))
                    {
                        if($anio >= date("Y")){
                            $data['username'] = $this->session->userdata('username');
                            $this->load->view('Errores/error11',$data);
                            break;
                        }
                        else if ($anio < date("Y")){
                            $data['username'] = $this->session->userdata('username');
                            $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                            if($data['resultado'] != null)
                                $this->load->view('Liquidacion/impresionBD',$data);
                            else{
                                $data['username'] = $this->session->userdata('username');
                                $this->load->view('Errores/error12',$data);
                                break;
                            }
                        }
                    }
                    else if ($mes < date('m'))
                    {
                        if($anio > date("Y")){
                            $data['username'] = $this->session->userdata('username');
                            $this->load->view('Errores/error11',$data);
                            break;
                        }
                        if($anio <= date("Y")){
                            $data['username'] = $this->session->userdata('username');
                            $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                            if($data['resultado'] != null)
                                $this->load->view('Liquidacion/impresionBD',$data);
                            else{
                                $data['username'] = $this->session->userdata('username');
                                $this->load->view('Errores/error12',$data);
                                break;
                            }
                        }
                    }
            endforeach;

                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }

        function Imprimir()
        {
            prep_pdf('LEGAL');
            $mes = $this->input->post('mes0');
            $anio = $this->input->post('anio0');
            $rut = $this->input->post('rut0');
            $datos['result'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
            foreach($datos['result'] as $row):
                $datos1  = array(array('nombre1'=>'<b>MES:</b>'
                                    ,'valor1'=>$row->MesPalabras." ".$row->Anio
                                    ,'nombre2'=>'<b>TIPO CONTRATO:</b>'
                                    ,'valor2'=> $row->TipoContrato)
                                ,array('nombre1'=>'<b>NOMBRE:</b>'
                                    ,'valor1'=>$row->Nombre
                                    ,'nombre2'=>'<b>CARGO:</b>'
                                    ,'valor2'=> $row->Cargo)
                                ,array('nombre1'=>'<b>RUT:</b>'
                                    ,'valor1'=>$row->RutTrabajador." - ".$row->Digito
                                    ,'nombre2'=>'<b>FECHA DE PAGO:</b>'
                                    ,'valor2'=> $row->FechaPago)
                );
                $datos2 = array(array('nombre1'=>'<b>IMPONIBLE</b>'
                                    ,'valor1'=>null
                                    ,'nombre2'=>'<b>DESCUENTOS</b>'
                                    ,'valor2'=> null)
                                ,array('nombre1'=>'DIAS TRABAJADOS EN EL MES:'
                                    ,'valor1'=>$row->DiasTrabajados
                                    ,'nombre2'=>'AFP:'
                                    ,'valor2'=> $row->AFP)
                                ,array('nombre1'=>'HORAS EXTRAS:'
                                    ,'valor1'=>$row->HorasExtras
                                    ,'nombre2'=>'APV:'
                                    ,'valor2'=> $row->APV)
                                ,array('nombre1'=>'BONO PRODUCTIVIDAD:'
                                    ,'valor1'=>$row->Bono
                                    ,'nombre2'=>'AFC:'
                                    ,'valor2'=> $row->AFC)
                                ,array('nombre1'=>'<u><b>TOTAL IMPONIBLE:</b></u>'
                                    ,'valor1'=>$row->TotalImponible
                                    ,'nombre2'=>'SALUD:'
                                    ,'valor2'=> $row->Salud)
                                ,array('nombre1'=>'<b>NO IMPONIBLE</b>'
                                    ,'valor1'=>null
                                    ,'nombre2'=>'IUT:'
                                    ,'valor2'=> $row->IUT)
                                ,array('nombre1'=>'ASIGNACIÓN FAMILIAR:'
                                    ,'valor1'=>$row->MontoCargas
                                    ,'nombre2'=>''
                                    ,'valor2'=> null)
                                ,array('nombre1'=>'ASIGNACIÓN MOVILIZACIÓN:'
                                    ,'valor1'=>$row->AMovilizacion
                                    ,'nombre2'=>'CREDITOS:'
                                    ,'valor2'=> $row->Creditos)
                                ,array('nombre1'=>'ASIGNACIÓN COLACIÓN:'
                                    ,'valor1'=>$row->Acolacion
                                    ,'nombre2'=>'AHORROS:'
                                    ,'valor2'=> $row->Ahorro)
                                ,array('nombre1'=>'ASIGNACIÓN DE CAJA:'
                                    ,'valor1'=>$row->Acaja
                                    ,'nombre2'=>'ANTICIPOS:'
                                    ,'valor2'=> $row->Anticipo)
                                ,array('nombre1'=>'BONO NO IMPONIBLE:'
                                    ,'valor1'=>$row->BonoNoImponible
                                    ,'nombre2'=>''
                                    ,'valor2'=> null)
                                ,array('nombre1'=>'<u><b>TOTAL NO IMPONIBLE:</b></u>'
                                    ,'valor1'=>$row->TotalNoImponible
                                    ,'nombre2'=>''
                                    ,'valor2'=> null)
                                ,array('nombre1'=>'<b>TOTAL HABERES</b>'
                                    ,'valor1'=>$row->TotalHaberes
                                    ,'nombre2'=>'<b>TOTAL DESCUENTOS</b>'
                                    ,'valor2'=> $row->TotalDescuentos)
                                ,array('nombre1'=>'<b>TOTAL LÍQUIDO A PAGAR</b>'
                                    ,'valor1'=>$row->TotalLiquido
                                    ,'nombre2'=>''
                                    ,'valor2'=> null)
                );
                $trm1="<b>CORPORACIÓN DE AMIGOS\nDEL TEATRO REGIONAL DEL MAULE</b>\nRUT:65,560,740-4\nUno Oriente #1484, Talca.";
                $trm2="Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción";
                $trm3="el total líquido a pagar, indicado en la presente iquidación de Remuneraciones y no tengo cargo ni cobro";
                $trm4="alguno posterior que hacer, por ninguno de los conceptos comprendidos en ella.";
                $sueldopalabras = $row->LiquidoPalabras;
                for($i=0;$i<2;$i++):
                    $this->cezpdf->ezText($trm1,8,array('justification'=> 'centre'));
                    $this->cezpdf->ezText("\n");
                    $this->cezpdf->ezTable($datos1
                        ,array('nombre1'=>'','valor1'=>'','nombre2'=>'','valor2'=>''),'LIQUIDACIÓN DE REMUNERACIONES'
                        ,array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','width'=>400,'fontSize' => 8,'titleFontSize' => 8)
                    );
                    $this->cezpdf->ezText("\n");
                    $this->cezpdf->ezText('IMPONIBLE                                   DESCUENTOS',10,array('justification'=> 'centre'));
                    $this->cezpdf->ezTable($datos2
                        ,array('nombre1'=>'','valor1'=>'','nombre2'=>'','valor2'=>''),''
                        ,array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','width'=>400,'fontSize' => 8)
                    );
                    $this->cezpdf->ezText($sueldopalabras,8,array('justification'=> 'center'));
                    $this->cezpdf->ezText("\n");
                    $this->cezpdf->ezText($trm2,6,array('justification'=> 'centre'));
                    $this->cezpdf->ezText($trm3,6,array('justification'=> 'centre'));
                    $this->cezpdf->ezText($trm4,6,array('justification'=> 'centre'));
                    $this->cezpdf->ezText("\n");
                    $this->cezpdf->ezText("p.p. Corp. De Amigos                                 Recibí Conforme\ndel Teatro Regional del Maule                                                  ",8,array('justification'=> 'centre'));
                    $this->cezpdf->ezText("\n\n");
                endfor;
                $this->cezpdf->line(20,440,578,440);
                $this->cezpdf->line(230,668,230,644); //lineas de los campos de las horas y dias
                $this->cezpdf->line(230,279,230,254);
                $this->cezpdf->line(360,669,360,656); //lineas de AFP
                $this->cezpdf->line(360,279,360,266);
                $this->cezpdf->line(360,631,360,619); //lineas de Salud
                $this->cezpdf->line(360,242,360,229);
                $this->cezpdf->line(230,606,230,594); //lineas de Cargas
                $this->cezpdf->line(230,217,230,204);
                $this->cezpdf->addText(25,432,8,'Impreso '.date('d/m/Y'));
                $this->cezpdf->addText(240,660,8,$row->CantDias);
                $this->cezpdf->addText(240,271,8,$row->CantDias);
                $this->cezpdf->addText(240,646,8,$row->CantHoras);
                $this->cezpdf->addText(240,258,8,$row->CantHoras);
                $this->cezpdf->addText(362,660,8,$row->NombreAfp);
                $this->cezpdf->addText(362,270,8,$row->NombreAfp);
                $this->cezpdf->addText(362,623,8,$row->NombreSalud);
                $this->cezpdf->addText(362,233,8,$row->NombreSalud);
                $this->cezpdf->addText(240,598,8,$row->Cargas);
                $this->cezpdf->addText(240,208,8,$row->Cargas);
            endforeach;
            $this->cezpdf->ezStream();
        }
        function ImprimirTodas($mes,$anio)
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                prep_pdf('LEGAL');
                $mes = $this->input->post('mes');
                $mes = $this->varios_model->cambia_meses($mes);
                $anio = $this->input->post('anio');
                $datos['result'] = $this->liquidacion_model->SacaTodasLiquidacion($mes,$anio);
                foreach($datos['result'] as $row):
                    $datos1  = array(array('nombre1'=>'<b>MES:</b>'
                                        ,'valor1'=>$row->MesPalabras." ".$row->Anio
                                        ,'nombre2'=>'<b>TIPO CONTRATO:</b>'
                                        ,'valor2'=> $row->TipoContrato)
                                    ,array('nombre1'=>'<b>NOMBRE:</b>'
                                        ,'valor1'=>$row->Nombre
                                        ,'nombre2'=>'<b>CARGO:</b>'
                                        ,'valor2'=> $row->Cargo)
                                    ,array('nombre1'=>'<b>RUT:</b>'
                                        ,'valor1'=>$row->RutTrabajador." - ".$row->Digito
                                        ,'nombre2'=>'<b>FECHA DE PAGO:</b>'
                                        ,'valor2'=> $row->FechaPago)
                    );
                    $datos2 = array(array('nombre1'=>'<b>IMPONIBLE</b>'
                                        ,'valor1'=>null
                                        ,'nombre2'=>'<b>DESCUENTOS</b>'
                                        ,'valor2'=> null)
                                    ,array('nombre1'=>'DIAS TRABAJADOS EN EL MES:'
                                        ,'valor1'=>$row->DiasTrabajados
                                        ,'nombre2'=>'AFP:'
                                        ,'valor2'=> $row->AFP)
                                    ,array('nombre1'=>'HORAS EXTRAS:'
                                        ,'valor1'=>$row->HorasExtras
                                        ,'nombre2'=>'APV:'
                                        ,'valor2'=> $row->APV)
                                    ,array('nombre1'=>'BONO PRODUCTIVIDAD:'
                                        ,'valor1'=>$row->Bono
                                        ,'nombre2'=>'AFC:'
                                        ,'valor2'=> $row->AFC)
                                    ,array('nombre1'=>'<u><b>TOTAL IMPONIBLE:</b></u>'
                                        ,'valor1'=>$row->TotalImponible
                                        ,'nombre2'=>'SALUD:'
                                        ,'valor2'=> $row->Salud)
                                    ,array('nombre1'=>'<b>NO IMPONIBLE</b>'
                                        ,'valor1'=>null
                                        ,'nombre2'=>'IUT:'
                                        ,'valor2'=> $row->IUT)
                                    ,array('nombre1'=>'ASIGNACIÓN FAMILIAR:'
                                        ,'valor1'=>$row->MontoCargas
                                        ,'nombre2'=>''
                                        ,'valor2'=> null)
                                    ,array('nombre1'=>'ASIGNACIÓN MOVILIZACIÓN:'
                                        ,'valor1'=>$row->AMovilizacion
                                        ,'nombre2'=>'CREDITOS:'
                                        ,'valor2'=> $row->Creditos)
                                    ,array('nombre1'=>'ASIGNACIÓN COLACIÓN:'
                                        ,'valor1'=>$row->Acolacion
                                        ,'nombre2'=>'AHORROS:'
                                        ,'valor2'=> $row->Ahorro)
                                    ,array('nombre1'=>'ASIGNACIÓN DE CAJA:'
                                        ,'valor1'=>$row->Acaja
                                        ,'nombre2'=>'ANTICIPOS:'
                                        ,'valor2'=> $row->Anticipo)
                                    ,array('nombre1'=>'<u><b>TOTAL NO IMPONIBLE:</b></u>'
                                        ,'valor1'=>$row->TotalNoImponible
                                        ,'nombre2'=>''
                                        ,'valor2'=> null)
                                    ,array('nombre1'=>'<b>TOTAL HABERES</b>'
                                        ,'valor1'=>$row->TotalHaberes
                                        ,'nombre2'=>'<b>TOTAL DESCUENTOS</b>'
                                        ,'valor2'=> $row->TotalDescuentos)
                                    ,array('nombre1'=>'<b>TOTAL LÍQUIDO A PAGAR</b>'
                                        ,'valor1'=>$row->TotalLiquido
                                        ,'nombre2'=>''
                                        ,'valor2'=> null)
                    );
                    $trm1="<b>CORPORACIÓN DE AMIGOS\nDEL TEATRO REGIONAL DEL MAULE</b>\nRUT:65,560,740-4\nUno Oriente #1484, Talca.";
                    $trm2="Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción";
                    $trm3="el total líquido a pagar, indicado en la presente iquidación de Remuneraciones y no tengo cargo ni cobro";
                    $trm4="alguno posterior que hacer, por ninguno de los conceptos comprendidos en ella.";
                    $sueldopalabras = $row->LiquidoPalabras;
                    for($i=0;$i<2;$i++):
                        $this->cezpdf->ezText($trm1,8,array('justification'=> 'centre'));
                        $this->cezpdf->ezText("\n");
                        $this->cezpdf->ezTable($datos1
                            ,array('nombre1'=>'','valor1'=>'','nombre2'=>'','valor2'=>''),'LIQUIDACIÓN DE REMUNERACIONES'
                            ,array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','width'=>400,'fontSize' => 8,'titleFontSize' => 8)
                        );
                        $this->cezpdf->ezText("\n");
                        $this->cezpdf->ezText('IMPONIBLE                                   DESCUENTOS',10,array('justification'=> 'centre'));
                        $this->cezpdf->ezTable($datos2
                            ,array('nombre1'=>'','valor1'=>'','nombre2'=>'','valor2'=>''),''
                            ,array('showHeadings'=>0,'shaded'=>0,'showLines'=>2,'xOrientation'=>'centre','width'=>400,'fontSize' => 8)
                        );
                        $this->cezpdf->ezText($sueldopalabras,8,array('justification'=> 'center'));
                        $this->cezpdf->ezText("\n");
                        $this->cezpdf->ezText($trm2,6,array('justification'=> 'centre'));
                        $this->cezpdf->ezText($trm3,6,array('justification'=> 'centre'));
                        $this->cezpdf->ezText($trm4,6,array('justification'=> 'centre'));
                        $this->cezpdf->ezText("\n");
                        $this->cezpdf->ezText("p.p. Corp. De Amigos                                 Recibí Conforme\ndel Teatro Regional del Maule                                                  ",8,array('justification'=> 'centre'));
                        $this->cezpdf->ezText("\n\n");
                    endfor;
                    $this->cezpdf->line(20,440,578,440);
                    $this->cezpdf->line(230,668,230,644); //lineas de los campos de las horas y dias
                    $this->cezpdf->line(230,279,230,254);
                    $this->cezpdf->line(360,669,360,656); //lineas de AFP
                    $this->cezpdf->line(360,279,360,266);
                    $this->cezpdf->line(360,631,360,619); //lineas de Salud
                    $this->cezpdf->line(360,242,360,229);
                    $this->cezpdf->line(230,606,230,594); //lineas de Cargas
                    $this->cezpdf->line(230,217,230,204);
                    $this->cezpdf->addText(25,432,8,'Impreso '.date('d/m/Y'));
                    $this->cezpdf->addText(240,660,8,$row->CantDias);
                    $this->cezpdf->addText(240,271,8,$row->CantDias);
                    $this->cezpdf->addText(240,646,8,$row->CantHoras);
                    $this->cezpdf->addText(240,258,8,$row->CantHoras);
                    $this->cezpdf->addText(362,660,8,$row->NombreAfp);
                    $this->cezpdf->addText(362,270,8,$row->NombreAfp);
                    $this->cezpdf->addText(362,623,8,$row->NombreSalud);
                    $this->cezpdf->addText(362,233,8,$row->NombreSalud);
                    $this->cezpdf->addText(240,598,8,$row->Cargas);
                    $this->cezpdf->addText(240,208,8,$row->Cargas);
                    $this->cezpdf->ezNewPage();
                endforeach;
                if($datos['result']!=null):
                    $this->cezpdf->ezStream();
                else:
                    if($this->session->userdata('permiso')==0)
                        $this->load->view('Inicio/header');
                    if($this->session->userdata('permiso')==1)
                        $this->load->view('Inicio/headersup');
                    $data['username']=$this->session->userdata('username');
                    $this->load->view('Errores/error16',$data);
                    $this->load->view('Inicio/footer');
                endif;
            }
            else
            {
                redirect(base_url());
            }
        }
    }
?>