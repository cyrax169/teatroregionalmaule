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
        function buscaRut()
        {
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
        }
        function IngresoUsuario()
        {
            $nombre = $this->input->post('nombre');
            $rut = $this->input->post('rut');
            $login =$this->input->post('login');
            $password =$this->input->post('password');
            $this->varios_model->IngresoAdmin($nombre,$rut,$login,$password);
        }
}