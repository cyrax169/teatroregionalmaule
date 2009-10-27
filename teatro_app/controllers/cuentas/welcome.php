<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');
                $this->load->model('varios_model');
	}
	
	function index()
	{
            $data['datos']= $this->varios_model->getDatos();
            $this->load->view('welcome_message',$data);
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