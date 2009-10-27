<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
	
	function index()
	{
		//$this->load->view('welcome_message');
                $this->load->view('base/header');
		$this->load->view('base/content');
		$this->load->view('base/footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */