<?php

class Test extends Controller {

	function Test()
	{
		parent::Controller();
                $this->load->library('database');
	}

	function index()
	{
            echo 'nachomansinbrillo.com';
	}
}
?>