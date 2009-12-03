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
        $mes = $this->input->post('mes');
        $anio = $this->input->post('anio');
        $mes = $this->varios_model->cambia_meses($mes);
        $fecha = "$anio-$mes-1";
        $data = $this->liquidacion_model->BuscaRut($rut);
        if($this->session->userdata('logged_in') == TRUE)
        {
            if( $this->session->userdata('permiso') == 0 )
                $this->load->view('Inicio/header');
            else
                $this->load->view('Inicio/headersup');
            if($data->num_rows() >0){

                $data1 = $this->liquidacion_model->BuscaTra($rut);
                $this->load->view("Liquidacion/impresion");
                $this->liquidacion_model->GuardaLiqui($data1,$fecha);
                $data2['result2'] = $this->liquidacion_model->BuscaLiqui($rut,$fecha);
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
