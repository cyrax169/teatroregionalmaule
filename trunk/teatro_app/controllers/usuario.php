<?php
class Usuario extends Controller {

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
        function tablaIUT1()
    {
       $utm1['result'] = $this->varios_model->iut();
        foreach ($utm1['result'] as $row ):
        $utm = $row->MontoUTM;
        endforeach;
        if($utm!= 0) {
        $data['a'] = 13.5*$utm;
        $data['b'] = 30*$utm;
        $data['c'] = 0.675*$utm;
        $data['d'] = 50*$utm;
        $data['e'] = 2.175*$utm;
        $data['f'] = 70*$utm;
        $data['g'] = 4.675*$utm;
        $data['h'] = 90*$utm;
        $data['i'] = 120*$utm;
        $data['j'] = 11.675*$utm;
        $data['k'] = 120*$utm;
        $data['l'] = 17.975*$utm;
        $data['m'] = 150*$utm;
        $data['n'] = 23.975*$utm;
        $data['o'] = 28.475*$utm;
        $this->varios_model->GuardaIUT($data);
        }
    }


    
}
?>
