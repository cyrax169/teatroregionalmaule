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
                                        $Iut = $this->liquidacion_model->IUT($row6->Salario);
                                        $datos = array(
                                            'Rut' =>$row6->Rut,
                                            'Digito' =>$row6->Digito,
                                            'Nombre' => $row6->Nombre,
                                            'TipoContrato' => $row6->TipoContrato,
                                            'Cargo' => $row6->Cargo,
                                            //fecha de pago
                                            'Salario' => $row6->Salario,
                                            'DiasTrabajados' => $var2,
                                            'HorasExtras' => $var1,
                                            'Bonos' => $var3,
                                            'TotalImponible' => $TotalImponible,
                                            'Amovilizacion' => $row6->Amovilizacion,
                                            'Acolacion' => $row6->Acolacion,
                                            'Acaja' => $row6->Acaja,
                                            //TotalNoImponible =
                                            //Total Haberes =
                                            'PorcentajeAfp' => $row6->PorcentajeAfp,
                                            'NombreAfp' => $row6->NombreAfp,
                                            'ApvPesos' => $row6->apvPesos,
                                            'Afc' => $row6->Afc,
                                            'Salud' => $row6->MontoIsapre + $row6->Fonasa,
                                            'Mes' => $mes1
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
}

?>
