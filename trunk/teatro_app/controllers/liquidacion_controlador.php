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
        return $nw->toWords($numero)." pesos";
    }
    function Todas(){
        echo "ejale !!! ahora calculalas todas xD";
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
                    $aux = $this->liquidacion_model->existeliquidacion($rut,$mes,$anio);
                    if ($aux == 0){
                        $data1['result1'] = $this->liquidacion_model->Cargar_Anticipos($rut,$mes,$anio);
                        $data2['result2'] = $this->liquidacion_model->Cargar_Permisos($rut,$mes,$anio);
                        $data3['result3'] = $this->liquidacion_model->Cargar_Prestaciones($rut,$fecha);
                        $data4['result4'] = $this->liquidacion_model->Cargar_Licencias($rut,$fecha);
                        $data5['result5'] = $this->liquidacion_model->Cargar_Vacaciones($rut,$fecha);
                        $data6['result6'] = $this->liquidacion_model->Cargar_Trabajadores($rut);
                        $data7['result7'] = $this->liquidacion_model->Cargar_IUT();
                        $data8['result8'] = $this->liquidacion_model->Cargar_UF($mes,$anio);
                        $data9['result9'] = $this->liquidacion_model->Cargar_Afp();
                        $data10['result10'] = $this->liquidacion_model->Cargar_Tramos();
                        $anticipos = 0;
                        $prestaciones = 0;
                        $Iut = 0;
                        $diasV = 0;
                        $diasP = 0;
                        $var2 = 0;
                        $UF = 0;
                        $Id=1;
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
                            $var4 = $row6->Acaja;
                            $var5 = $row6->Amovilizacion;
                            $var6 = $row6->Acolacion;
                            $Cargas = $row6->Cargas;
                            foreach($data10['result10'] as $row10):
                                if ($row6->Salario > $row10->Inicio && $row6->Salario < $row10->Termino)
                                    $MontoCargas = $MontoCargas + $row10->Monto;
                            endforeach;
                            $NoImponible = $var4+$var5+$var6+$MontoCargas;
                            $salud = $TotalImponible * (($row6->MontoIsapre + $row6->Fonasa)/100);
                            if ($salud > $TopeSalud)
                                $salud = $TopeSalud;
                            foreach($data9['result9'] as $row9):
                                if ( $row6->NombreAfp == $row9->NombreAfp)
                                    $var7 = $TotalImponible * ($row9->PorcentajeAfp/100);
                            endforeach;
                            if($var7 > $TopeSalud)
                                $var7 = $TopeSalud;
                            $var8 = $row6->apvPesos;
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
                            $LiquidoPalabras = $this->num_palabras($Liquido);
                            $FechaPago = '30 de '.$mes1.' del '.$anio;
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
                                'Anticipos' => $anticipos,
                                'NoImponible' =>  $NoImponible,
                                'PorcentajeAfp' => $var7,
                                'ApvPesos' => $row6->apvPesos,
                                'Afc' => $Afc,
                                'Salud' => $salud,
                                'Mes' => $mes1,
                                'Iut' => $Iut,
                                'Creditos' => $prestaciones,
                                'Ahorros' => 0,
                                'Haberes' => $Haberes,
                                'Descuentos' => $descuentos,
                                'Liquido' => $Liquido,
                                'LiquidoPalabras' => $LiquidoPalabras
                            );
                            /*$this->liquidacion_model->GuardaLiquidacion($rut,$row6->Digito,$mes,$anio,
                                $row6->Nombre,$dias,$var2,$row6->HorasExtras,$var1,$var3,$row6->Amovilizacion,
                                $row6->Acolacion,$row6->Acaja,$row6->TipoContrato,$row6->Cargo,$FechaPago,
                                $var7,$row6->apvPesos,$Afc,$salud,$Iut,$prestaciones,0,$anticipos,
                                $TotalImponible,$NoImponible,$Haberes,$Liquido,$descuentos);*/
                    endforeach;
                        $data['query']=$datos;
                        //$this->liquidacion_model->GuardaLiquidacion($rut,);
                        $this->load->view('Liquidacion/impresion',$data);
                    }
                    else{
                        $data['username'] = $this->session->userdata('username');
                        $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                        $this->load->view('Liquidacion/impresionBD',$data);
                    }
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
                    $data['username'] = $this->session->userdata('username');
                    $aux = $this->liquidacion_model->existeliquidacion($rut,$mes,$anio);
                    if ($aux == 0){  // 1 = existe // 0 = no existe
                        $data1['result1'] = $this->liquidacion_model->Cargar_Anticipos($rut,$mes,$anio);
                        $data2['result2'] = $this->liquidacion_model->Cargar_Permisos($rut,$mes,$anio);
                        $data3['result3'] = $this->liquidacion_model->Cargar_Prestaciones($rut,$fecha);
                        $data4['result4'] = $this->liquidacion_model->Cargar_Licencias($rut,$fecha);
                        $data5['result5'] = $this->liquidacion_model->Cargar_Vacaciones($rut,$fecha);
                        $data6['result6'] = $this->liquidacion_model->Cargar_Trabajadores($rut);
                        $data7['result7'] = $this->liquidacion_model->Cargar_IUT();
                        $data8['result8'] = $this->liquidacion_model->Cargar_UF($mes,$anio);
                        $data9['result9'] = $this->liquidacion_model->Cargar_Afp();
                        $data10['result10'] = $this->liquidacion_model->Cargar_Tramos();
                        $anticipos = 0;
                        $prestaciones = 0;
                        $Iut = 0;
                        $diasV = 0;
                        $diasP = 0;
                        $var2 = 0;
                        $UF = 0;
                        $Id=1;
                        $MontoCargas = 0;
                        foreach($data8['result8'] as $row8):
                            $UF = $row8->Monto;
                        endforeach;
                        foreach($data1['result1'] as $row1):
                            $anticipos = $anticipos + $row1->Monto;
                        endforeach;
                        foreach($data3['result3'] as $row3):
                            if ($row3->CuotasPendientes != $row3->CuotasPagadas){
                            $prestaciones = $prestaciones + $row3->Monto;
                            $this->liquidacion_model->DescuentaCuotas($rut,$Id,$row3->CuotasPagadas);
                            }
                        $Id++;
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
                            $var4 = $row6->Acaja;
                            $var5 = $row6->Amovilizacion;
                            $var6 = $row6->Acolacion;
                            $Cargas = $row6->Cargas;
                            if ($Cargas > 0){
                            foreach($data10['result10'] as $row10):
                                if ($row6->Salario > $row10->Inicio && $row6->Salario < $row10->Termino)
                                    $MontoCargas = $MontoCargas + $row10->Monto;
                            endforeach;
                            }
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
                            $var8 = $row6->apvPesos;
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
                            $FechaPago = '30 de '.$mes1.' del '.$anio;
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
                                'Anticipos' => $anticipos,
                                'NoImponible' =>  $NoImponible,
                                'PorcentajeAfp' => $var7,
                                'ApvPesos' => $row6->apvPesos,
                                'Afc' => $Afc,
                                'Salud' => $salud,
                                'Mes' => $mes1,
                                'Iut' => $Iut,
                                'Creditos' => $prestaciones,
                                'Ahorros' => 0,
                                'Haberes' => $Haberes,
                                'Descuentos' => $descuentos,
                                'Liquido' => $Liquido,
                            );
                            /*$this->liquidacion_model->GuardaLiquidacion($rut,$row6->Digito,$mes1,$mes,$anio,$row6->Nombre,
                                $dias,$var2,$row6->HorasExtras,$var1,$var3,$Cargas,$MontoCargas,
                                $row6->Amovilizacion,$row6->Acolacion,$row6->Acaja,$row6->TipoContrato,
                                $row6->Cargo,$FechaPago,$var7,$row6->apvPesos,$Afc,$salud,$Iut,$prestaciones,
                                0,$anticipos,$TotalImponible,$NoImponible,$Haberes,$Liquido,$descuentos);*/
                    endforeach;
                        $data['query']=$datos;
                        //$this->liquidacion_model->GuardaLiquidacion($rut,);
                        $this->load->view('Liquidacion/impresion',$data);
                    }
                    else{
                        $data['username'] = $this->session->userdata('username');
                        $data['resultado'] = $this->liquidacion_model->SacaLiquidacion($rut,$mes,$anio);
                        $this->load->view('Liquidacion/impresionBD',$data);
                    }
                }
                else if ($mes >= date('m'))
                {
                    if($anio >= date("Y")){
                        $data['username'] = $this->session->userdata('username');
                        $this->load->view('Errores/error11',$data);
                    }
                    else if ($anio < date("Y")){
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
                        ,array('nombre1'=>'<b>TOTAL L�?QUIDO A PAGAR</b>'
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
