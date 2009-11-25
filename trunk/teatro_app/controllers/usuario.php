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
            $login = $this->input->post('nombre');
            $password = $this->input->post('password');
            $permiso = $this->usuario_model->loginUser($login,$password);
            
            if($permiso -> num_rows() !=0)
            {
                $data = array(
                   'username'  => $login,
                   'logged_in' => TRUE
                );
                $this->session->set_userdata($data);
                $this->load->view('Inicio/header');
                $this->load->view('Inicio/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                $this->load->view('Usuarios_Invalidos/header');
                $this->load->view('Usuarios_Invalidos/content');
                $this->load->view('Usuarios_Invalidos/footer');

                
            }
        }
        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }
}
?>
