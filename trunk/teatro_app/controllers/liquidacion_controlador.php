<?php
 

class liquidacion_controlador extends Controller {
    
    function liquidacion_controlador()
    {
            parent::Controller();
            
            $this->load->model('liquidacion_model');
            $this->load->model('varios_model');
    }

   function BuscaRut()
   {
        $rut = $this->input->post('rut');
        $digito = $this->input->post('digito');
        $mes1 = $this->input->post('mes');
        $anio = $this->input->post('anio');
        $mes = $this->varios_model->cambia_meses($mes1);
        $fecha = "$anio-$mes-1";
        $data0 = $this->liquidacion_model->BuscaRut($rut);
        if($this->session->userdata('logged_in') == TRUE)
        {
            if( $this->session->userdata('permiso') == 0 )
                $this->load->view('Inicio/header');
            else
                $this->load->view('Inicio/headersup');
            if($data0->num_rows() >0)
            {
                $data1['result1'] = $this->liquidacion_model->Cargar_Anticipos($rut,$fecha);
                $data2['result2'] = $this->liquidacion_model->Cargar_Permisos($rut,$fecha);
                $data3['result3'] = $this->liquidacion_model->Cargar_Prestaciones($rut,$fecha);
                $data4['result4'] = $this->liquidacion_model->Cargar_Licencias($rut,$fecha);
                $data5['result5'] = $this->liquidacion_model->Cargar_Vacaciones($rut,$fecha);
                $data6['result6'] = $this->liquidacion_model->Cargar_Trabajadores($rut);

                foreach($data1['result1'] as $row1):
                    foreach($data2['result2'] as $row2):
                        foreach($data3['result3'] as $row3):
                            foreach($data4['result4'] as $row4):
                                foreach($data5['result5'] as $row5):
                                    foreach($data6['result6'] as $row6):
                                        $var1 = $row6->HorasExtras*(1/30)*(7/45)*(1.5)*$row6->Salario;
                                        $var2 = $row6->DiasTrabajados * ($row6->Salario)/30;
                                        $var3 = $row6->Bonos;
                                        $TotalImponible = $var1+$var2+$var3;
                                        $Iut = 21783;
                                        $var4 = $row6->Acaja;
                                        $var5 = $row6->Amovilizacion;
                                        $var6 = $row6->Acolacion;
                                        $credito = $row3->Monto;
                                        $NoImponible = $var4+$var5+$var6;
                                        $salud = ($row6->MontoIsapre + $row6->Fonasa)*$row6->Salario/100;
                                        $descuentos = $Iut+$row6->PorcentajeAfp+$row6->apvPesos+2520+$salud+$credito+$row1->Monto;
                                        $Liquido =  $TotalImponible - $NoImponible -$descuentos;
                                        $datos = array(
                                            'Rut' =>$row6->Rut,
                                            'Digito' =>$row6->Digito,
                                            'Nombre' => $row6->Nombre,
                                            'TipoContrato' => $row6->TipoContrato,
                                            'Cargo' => $row6->Cargo,
                                            'Salario' => $row6->Salario,
                                            'DiasTrabajados' => $var2,
                                            'HorasExtras' => $var1,
                                            'Bonos' => $var3,
                                            'TotalImponible' => $TotalImponible,
                                            'Amovilizacion' => $row6->Amovilizacion,
                                            'Acolacion' => $row6->Acolacion,
                                            'Acaja' => $row6->Acaja,
                                            'Anticipos' => $row1->Monto,
                                            'NoImponible' =>  $NoImponible,
                                            'PorcentajeAfp' => $row6->PorcentajeAfp,
                                            'NombreAfp' => $row6->NombreAfp,
                                            'ApvPesos' => $row6->apvPesos,
                                            'Afc' => 2520,
                                            'Salud' => $salud,
                                            'Mes' => $mes1,
                                            'Iut' => $Iut,
                                            'Creditos' => $credito,
                                            'Ahorros' => 0,
                                            'Haberes' => $TotalImponible - $NoImponible,
                                            'Descuentos' => $descuentos,
                                            'Liquido' => $Liquido

                                        );
                                    endforeach;
                                endforeach;
                            endforeach;
                        endforeach;
                    endforeach;
                endforeach;
                $data['query']=$datos;
                $this->load->view('Liquidacion/impresion',$data);
            }
            else
                $this->load->view('Errores/error1');
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function Imprimir()
    {
        include(base_url()+'teatro_app/controllers/class.ezpdf.pdf');
        $pdf =& new Cezpdf('a4');

        $pdf->selectFont('fonts/curier.afm');
    }
}

?>
