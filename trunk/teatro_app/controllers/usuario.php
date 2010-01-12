<?php
class Usuario extends Controller
{

	function Usuario()
	{
            parent::Controller();
            $permiso = null;
            $this->load->model('usuario_model');
            $this->load->model('varios_model');
            $this->load->helper('url');
            //$this->load->controller('welcome');
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
                   'logged_in' => TRUE,
                   'permiso' => $permiso->row('Permiso')
                );
                if($data['permiso']==1)
                    $this->load->view('Inicio/headersup');
                if($data['permiso']==0)
                    $this->load->view('Inicio/header');
                $this->session->set_userdata($data);
                $data['UF'] = $this->varios_model->getUF(date("Y"));
                $data['UTM'] = $this->varios_model->getUTM(date("Y"));
                $this->load->view('Inicio/content',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                $this->load->view('Login/header');
                $this->load->view('Usuarios_Invalidos/content');
                $this->load->view('Login/footer');
            }
        }
        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }
}
?>
