<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
                $this->load->model('varios_model');
	}
        function Prueba()  /*Solo está disñado para la aplicación de Ajax*/
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('prueba/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
	function Vida()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Hoja_de_vida/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Empresa()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Hoja_empresa/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Buscar()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('buscar/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function UF()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('UF/header');
                $this->load->view('UF/content');
                $this->load->view('UF/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Buscar_Admin()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Buscar_Admin/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Crear_Admin()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Crear_Admin/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Liquidacion()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Liquidacion/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Planilla()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('planilla/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function tablaIUT()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('tablaIUT/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
       /* function buscaRut() //Funciones que solo se ocupan en la página de prueba (vista/prueba)
        {                     // por lo que las he comentado
            $nombre = $this->uri->segment(4);
            $datos = $this->varios_model->getDatosName($nombre);
            foreach($datos ->result() as $row):
                echo $row->rut;
            endforeach;
        }
        function buscaRut1()
        {
            $nombre = $this->input->post('nombre');
            $datos = $this->varios_model->getDatosName($nombre);
            foreach($datos ->result() as $row):
                   echo $row->login;
            endforeach;
        }*/
        function IngresoUsuario()
        {
            $nombre = $this->input->post('nombre');
            $rut = $this->input->post('rut');
            $login =$this->input->post('login');
            $password =$this->input->post('password');
            $this->varios_model->IngresoAdmin($nombre,$rut,$login,$password);
        }
        function ActualizaUF()
        {
            $UF = $this->input->post('uf');
            $this->varios_model->UFactual($UF);
        }
        function DatosEmpresa() //Modificar, ya que cambio la hoja de la empresa (vista)
        {
            $rsocial = $this->input->post('rsocial');
            $rut = $this->input->post('rut');
            $direccion = $this->input->post('direccion');
            $caja = $this->input->post('caja');
            $cajasi = $this->input->post('cajasi');
            $apatronal = $this->input->post('apatronal');
            $monto = $this->input->post('monto');
            $this->varios_model->DatosEmpresa($rsocial,$rut,$direccion,$caja,$cajasi,$apatronal,$monto);
            
            echo "Los datos recibidos son :
                    <table width=500px border=1 align='center'>
                        <tr>
                            <td>rsocial</td> <td>$rsocial</td>
                        </tr>
                        <tr>
                            <td>rut</td> <td>$rut</td>
                        </tr>
                        <tr>
                            <td>direccion</td> <td>$direccion</td>
                        </tr>
                        <tr>
                            <td>caja</td> <td>$caja</td>
                        </tr>
                        <tr>
                            <td>cajasi</td> <td>$cajasi</td>
                        </tr>
                        <tr>
                            <td>mutual</td> <td>$apatronal</td>
                        </tr>
                        <tr>
                            <td>ist</td> <td>$monto</td>
                        </tr>
                    </table>";
        }
        function BuscaAdmin()
        {
            $rut = $this->input->post('RUT');
            $digito = $this->input->post('DIGITO');
            $data['result']= $this->varios_model->BuscaAdmin($rut,$digito);
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Buscar_Admin/modificar',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
           
        }

     
}