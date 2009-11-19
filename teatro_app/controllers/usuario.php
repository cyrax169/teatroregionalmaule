<?php
class Usuario extends Controller {

	function Usuario()
	{
            parent::Controller();
            $this->load->model('usuario_model');
	}

        function index()
        {
            $this->load->view('Login/header');
            $this->load->view('Login/content');
            $this->load->view('Login/footer');
        }
        
        function login()
        {
            $nombre = $this->input->post('nombre');
            $password = $this->input->post('password');
            $permiso = $this->usuario_model->loginUser($nombre,$password);
            
            if($permiso -> num_rows() !=0)
            {
                $data = array(
                   'username'  => $nombre,
                   'logged_in' => TRUE
                );
                $this->session->set_userdata($data);

                $this->load->view('Inicio/content');
            }
            else
            {
                echo "datos no validos";
            }
        }
        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }
}
?>
