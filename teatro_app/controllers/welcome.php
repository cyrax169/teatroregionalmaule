<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');
                $this->load->model('varios_model');
	}

        function inicio()
        {
            $this->load->view('base/header');
            $this->load->view('links/content');
            $this->load->view('base/footer');
        }

	function index()
	{
            $this->load->view('base/header');
            $this->load->view('base/content');
            $this->load->view('base/footer');
            //$data['datos']= $this->varios_model->getDatos();
            //$this->load->view('welcome_message',$data);
	}
        function Vida()
	{
            $this->load->view('base/header');
            $this->load->view('Hoja_de_vida/content');
            $this->load->view('base/footer');
	}
        function Empresa()
	{
            $this->load->view('base/header');
            $this->load->view('Hoja_empresa/content');
            $this->load->view('base/footer');
	}
        function Buscar()
	{
            $this->load->view('base/header');
            $this->load->view('buscar/content');
            $this->load->view('base/footer');
	}
        function Buscar_Admin()
	{
            $this->load->view('base/header');
            $this->load->view('Buscar_Admin/content');
            $this->load->view('base/footer');
	}
        function Crear_Admin()
	{
            $this->load->view('base/header');
            $this->load->view('Crear_Admin/content');
            $this->load->view('base/footer');
	}
        function Liquidacion()
	{
            $this->load->view('base/header');
            $this->load->view('Liquidacion/content');
            $this->load->view('base/footer');
	}
         function planilla()
	{
            $this->load->view('base/header');
            $this->load->view('planilla/content');
            $this->load->view('base/footer');
	}
        
          function tablaIUT()
	{
            $this->load->view('base/header');
            $this->load->view('tablaIUT/content');
            $this->load->view('base/footer');
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
                echo $row->rut;
            endforeach;
        }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */