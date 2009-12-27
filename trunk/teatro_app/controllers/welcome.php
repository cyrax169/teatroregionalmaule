<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
                $this->load->model('varios_model');
                $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
                $this->load->library('cezpdf');
                $this->load->helper('pdf_helper');
	}
        public function genera_pdf()
        {
            /*load library cezpdf*/
            /*prep_pdf('A4');
            $this->cezpdf->ezText('<b>Cliente Nº:</b> 1');
            $this->cezpdf->ezText('<b>Cliente:</b> Rodrigo Pavez Madariaga');
            $this->cezpdf->ezText('<b>Tienda:</b>  La Polar');
            $this->cezpdf->ezText('<b>Fecha y hora de impresión:</b> '.date('d/m/Y').', '.date('H:i').' hrs.');
            $this->cezpdf->ezText('');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm');
            $db_data[] = array('eye' => 'O.I.','ESF' => '+9.20','CIL' => '-1.00','EJE' => '3','ADD' => '+4.50','REF' => 'D.I. 3 mm');

            $col_names = array(
                'eye' => '',
                'ESF' => 'ESF.',
                'CIL' => 'CIL.',
                'EJE' => 'EJE',
                'ADD' => 'ADD',
                'REF' => ''
            );

            $this->cezpdf->ezTable($db_data, $col_names, 'Graduación registrada el '.date('d').' de Diciembre del '.date('Y'), array('width'=>550));
            $this->cezpdf->ezText('');
            $this->cezpdf->ezText('<b>OJO CON LA HORA QUE SALE!!</b> (a mi me sale con 1 hora de retraso)');
            $this->cezpdf->ezStream(array('Content-Disposition'=>'nama_file.pdf'));
        */
        }
        function Prueba()  /*Solo está disñado para la aplicación de Ajax*/
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('prueba/content');
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
                $queryEmpresa = $this->varios_model->VerificaEmpresa();
                $data['username'] = $this->session->userdata('username');
                $data['result']=$queryEmpresa->result();
                
                if($this->session->userdata('permiso') == 1):
                    if($queryEmpresa -> num_rows() == 0):
                        $this->load->view('Hoja_empresa/content',$data);
                    else:
                        $this->load->view('Hoja_empresa/contentdatos',$data);
                    endif;
                endif;

                if($this->session->userdata('permiso') == 0):
                    if($queryEmpresa ->num_rows() == 0):
                        $data['username'] = $this->session->userdata('username');
                        $this->load->view('Hoja_empresa/no_empresa',$data);
                    else:
                        $username = $this->session->userdata('username');
                        echo "<div align='right'>Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema')."</div>";
                        echo "<div align='center'><h3>Datos Empresa</h3></div>";
                        echo "<br/><br/><br/><br/>";
                        foreach($queryEmpresa ->result() as $data_empresa):
                            echo "<b>Rut</b>: ".$data_empresa->Rut."-".$data_empresa->Digito."<br/>";
                            echo "<b>Razon Social</b>: ".$data_empresa->RazonSocial."<br/>";
                            echo "<b>Dirección</b>: ".$data_empresa->Direccion."<br/>";
                        endforeach;
                        echo "<br/><br/><br/><br/>";
                        echo "<br/><br/><br/><br/>";
                        endif;
                endif;
            }
            else
            {
                redirect(base_url());
            }
	}
        function EliminarTrabajador()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('EliminarTrabajador/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function EliminaTrabajador()
        {
            $rut = $this->input->post('rut');
            $digito = $this->input->post('digito');
            $data['result']= $this->varios_model->EliminarTrabajador($rut,$digito);
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('EliminarTrabajador/eliminado',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function a()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                /*if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');*/
                $this->load->view('a/header');
                $this->load->view('a/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function UTM()
        {
            $mes = $this->input->post('mes');
            $utm = $this->input->post('utm');
            
            $config = array(
                    array(
                            'field' =>  'utm',
                            'label' =>  'U.T.M',
                            'rules' =>  'required|numeric'
                    ));

                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == FALSE){
                    echo json_encode(array("resultado" => "letras"));
                }
                else
                {
                   $mesExist = $this->varios_model->getFechaUtm($mes);
                   if($mesExist -> num_rows() == 0)
                     {
                    $fecha = date("Y")."-".$mes."-".date("d");
                    $data = array(
                            'Fecha' =>  $fecha,
                            'MontoUTM'  =>  $utm
                        );
                    if(!$this->varios_model->insertUTM($data))
                    {
                       echo json_encode(array("resultado" => "false"));

                    }
                    else
                    {
                       echo json_encode(array("resultado" => "true"));

                    }
                }
                else
                {
                       echo json_encode(array("resultado" => "false"));

                }
            }
        }
        function Eliminar_Admin()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==1){
                    $this->load->view('Inicio/headersup');
                    $this->load->view('Eliminar_Admin/content');
                }
                else{
                    $this->load->view('Inicio/header');
                    $this->load->view('Eliminar_Admin/error');
                }
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
                if($this->session->userdata('permiso')==1){
                    $this->load->view('Inicio/headersup');
                    $this->load->view('Crear_Admin/content');
                }
                else{
                    $this->load->view('Inicio/header');
                    $this->load->view('Eliminar_Admin/error');
                }
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
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
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
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
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
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $utm1['result'] = $this->varios_model->iut();
                foreach ($utm1['result'] as $row ):
                $utm = $row->MontoUTM;
                endforeach;
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
                $this->load->view('tablaIUT/content',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function IngresoUsuario()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $nombre = $this->input->post('nombre');
                $rut = $this->input->post('rut');
                $digito = $this->input->post('digito');
                $digito2 = $this->varios_model->DigitoVerificador($rut);
                if ($digito == $digito2){
                    $var = $this->varios_model->BuscaRut($rut);
                    if ($var == 1){
                        $login =$this->input->post('login');
                        $password =$this->input->post('password');
                        $data['result'] =  $this->varios_model->IngresoAdmin($nombre,$rut,$login,$password);
                        $this->load->view('Crear_Admin/creado',$data);
                    }
                    else{
                            $this->load->view('Errores/error4');
                    }
                $this->load->view('Inicio/footer');
                }
                else
                $this->load->view('Errores/error3');
            
            }
            else
            {
                redirect(base_url());
            }

        }
        function actualizaUF()
        {
            $config = array(
                array(
                    'field' =>  'uf',
                    'label' =>  'UF',
                    'rules' =>  'required|numeric'
                ));
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array("resultado" => "letras"));

            }
            else
            {
                $UF = $this->input->post('uf');
                $fecha = date("Ymd");
                $ifExist = $this->varios_model->getUF2($fecha);
                if($ifExist ->num_rows() == 0)
                {
                    $this->varios_model->UFactual($UF,$fecha);
                    echo json_encode(array("resultado" => "true"));
                }
                else
                {
                    echo json_encode(array("resultado" => "false"));

                }
            }
        }
        function DatosEmpresa()
        {
            if($this->session->userdata('logged_in') == TRUE):
            $queryEmpresa = $this->varios_model->VerificaEmpresa();
                $data['username'] = $this->session->userdata('username');
                $config = array(
                    array(
                            'field' =>  'rsocial',
                            'label' =>  'Razon Social',
                            'rules' =>  'required'
                    ),
                    array(
                            'field' =>  'rut',
                            'label' =>  'Rut',
                            'rules' =>  'required'
                    ),
                    array(
                            'field' =>  'direccion',
                            'label' =>  'Direccion',
                            'rules' =>  'required'
                    ),
                    array(
                            'field' =>  'apatronal',
                            'label' =>  'AportePatronal',
                            'rules' =>  'required'
                    ),
                    array(
                            'field' =>  'monto',
                            'label' =>  'MontoAporte',
                            'rules' =>  'required'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == FALSE):
                    echo json_encode(array("resultado" => "campos_faltantes"));
                else:
                    $rsocial = $this->input->post('rsocial');
                    $rut = $this->input->post('rut');
                    $digito = $this->input->post('digito');
                    $direccion = $this->input->post('direccion');
                    $caja = $this->input->post('caja');
                    $cajasi = $this->input->post('cajasi');
                    $apatronal = $this->input->post('apatronal');
                    $monto = $this->input->post('monto');

                    $existeEmpresa = $this->varios_model->existeEmpresa($rut);
                    if($existeEmpresa ->num_rows() == 0):
                        if(!$this->varios_model->DatosEmpresa($rsocial,$rut,$digito,$direccion,$caja,$cajasi,$apatronal,$monto)):
                            echo json_encode(array("resultado" => "false"));
                        else:
                            echo json_encode(array("resultado" => "true"));
                        endif;
                    else:
                        $this->varios_model->update_DatosEmpresa($rsocial,$rut,$digito,$direccion,$caja,$cajasi,$apatronal,$monto);
                        echo json_encode(array("resultado" => "update"));
                    endif;

                endif;
            else:
                redirect(base_url());
            endif;
        }
        function Modifica_Admin()
        {
            $rut = $this->input->post('RUT');
            $digito = $this->input->post('DIGITO');
            $data['result']= $this->varios_model->Modificar_Admin($rut,$digito);
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/headersup');
                $this->load->view('Modificar_Admin/modificar',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Modifica_Trabajador()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso') == 1)
                    $this->load->view('Inicio/headersup');
                else
                     $this->load->view('Inicio/header');
                $this->load->view('Modificar_Trabajador/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Modificar_Trabajador()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                $rut = $this->input->post('rut');
                $digito = $this->input->post('DIGITO');


                if($this->session->userdata('permiso') == 1)
                    $this->load->view('Inicio/headersup');
                else
                    $this->load->view('Inicio/header');

               $var = $this->varios_model->BuscaRutTrabajador($rut,$digito);
               if ($var == 0)
               {
                    $data['result']= $this->varios_model->Modificar_Trabajador($rut,$digito);
                    $data2['result2']= $this->varios_model->Cargar_Anticipo($rut);
                    $data3['result3']= $this->varios_model->Cargar_Vacaciones($rut);
                    $data4['result4']= $this->varios_model->Cargar_Licencias($rut);
                    $data5['result5']= $this->varios_model->Cargar_Permisos($rut);
                    $data6['result6']= $this->varios_model->Cargar_PRestaciones($rut);
                    foreach($data['result'] as $row):
                        $Cargas = $row->Cargas;
                    endforeach;
                    if($Cargas == 'si')
                    {
                        $data1['result1']= $this->varios_model->Modificar_cargas($rut,$digito);
                        
                        foreach($data['result'] as $row):
                            foreach($data1['result1'] as $row1):
                                foreach($data2['result2'] as $row2):
                                    foreach($data3['result3'] as $row3):
                                        foreach($data4['result4'] as $row4):
                                            foreach($data5['result5'] as $row5):
                                                foreach($data6['result6'] as $row6):
                                                    $datos = array(
                                                        'Rut' =>$row->Rut,
                                                        'Digito' =>$row->Digito,
                                                        'Nombre' => $row->Nombre,
                                                        'Telefono' =>$row->Telefono,
                                                        'FechaNacimiento' => $row->FechaNacimiento,
                                                        'Direccion' => $row->Direccion,
                                                        'TipoContrato' => $row->TipoContrato,
                                                        'Estado' => $row->Estado,
                                                        'Cargo' => $row->Cargo,
                                                        'FechaInicioContrato' => $row->FechaInicioContrato,
                                                        'FechaTerminoContrato'  => $row->FechaTerminoContrato,
                                                        'Salario' => $row->Salario,
                                                        'NombreAfp' => $row->NombreAfp,
                                                        'PorcentajeAfp' => $row->PorcentajeAfp,
                                                        'Acaja' => $row->Acaja,
                                                        'Amovilizacion' => $row->Amovilizacion,
                                                        'Acolacion' => $row->Acolacion,
                                                        'Afc' => $row->Afc,
                                                        'Fonasa' => $row->Fonasa,
                                                        'NombreIsapre' => $row->NombreIsapre,
                                                        'MontoIsapre' => $row->MontoIsapre,
                                                        'apvUf' => $row->apvUf,
                                                        'apvPesos' => $row->apvPesos,
                                                        'DiasTrabajados' => $row->DiasTrabajados,
                                                        'HorasExtras' => $row->HorasExtras,
                                                        'Bonos' => $row->Bonos,
                                                        'Carga' => $row->Cargas,
                                                        'RutCarga' => $row1->Rut, //RUT DE LA CARGA!!!
                                                        'DigitoCarga' => $row1->Digito,
                                                        'Nombres' => $row1->Nombres,
                                                        'Tipo' => $row1->Tipo,
                                                        'FechaVencimiento' => $row1->FechaVencimiento,
                                                        'Anticipo' =>$row2->Monto,
                                                        'FechaAnticipo' =>$row2->Fecha,
                                                        'TotalDiasV' =>$row3->TotalDias,
                                                        'FechaInicioV' =>$row3->FechaInicio,
                                                        'FechaTerminoV' =>$row3->FechaTermino,
                                                        'TotalDiasL' =>$row4->TotalDias,
                                                        'FechaInicioL' =>$row4->FechaInicio,
                                                        'FechaTerminoL'=>$row4->FechaTermino,
                                                        'TotalDiasP' =>$row5->TotalDias,
                                                        'FechaInicioP' =>$row5->FechaInicio,
                                                        'FechaTerminoP'=>$row5->FechaTermino,
                                                        'Institucion' =>$row6->Institucion,
                                                        'TipoPrestacion' =>$row6->TipoPrestacion,
                                                        'MontoPrestacion' =>$row6->Monto
                                                    );
                                                endforeach;
                                            endforeach;
                                        endforeach;
                                    endforeach;
                                endforeach;
                            endforeach;
                        endforeach;
                    }
                    else
                    {
                        foreach($data['result'] as $row):
                            foreach($data2['result2'] as $row2):
                                foreach($data3['result3'] as $row3):
                                    foreach($data4['result4'] as $row4):
                                        foreach($data5['result5'] as $row5):
                                            foreach($data6['result6'] as $row6):
                                                $datos = array(
                                                    'Rut' =>$row->Rut,
                                                    'Digito' =>$row->Digito,
                                                    'Nombre' => $row->Nombre,
                                                    'Telefono' =>$row->Telefono,
                                                    'FechaNacimiento' => $row->FechaNacimiento,
                                                    'Direccion' => $row->Direccion,
                                                    'TipoContrato' => $row->TipoContrato,
                                                    'Estado' => $row->Estado,
                                                    'Cargo' => $row->Cargo,
                                                    'FechaInicioContrato' => $row->FechaInicioContrato,
                                                    'FechaTerminoContrato'  => $row->FechaTerminoContrato,
                                                    'Salario' => $row->Salario,
                                                    'NombreAfp' => $row->NombreAfp,
                                                    'PorcentajeAfp' => $row->PorcentajeAfp,
                                                    'Acaja' => $row->Acaja,
                                                    'Amovilizacion' => $row->Amovilizacion,
                                                    'Acolacion' => $row->Acolacion,
                                                    'Afc' => $row->Afc,
                                                    'Fonasa' => $row->Fonasa,
                                                    'NombreIsapre' => $row->NombreIsapre,
                                                    'MontoIsapre' => $row->MontoIsapre,
                                                    'apvUf' => $row->apvUf,
                                                    'apvPesos' => $row->apvPesos,
                                                    'DiasTrabajados' => $row->DiasTrabajados,
                                                    'HorasExtras' => $row->HorasExtras,
                                                    'Bonos' => $row->Bonos,
                                                    'RutCarga' => "",
                                                    'DigitoCarga' =>"",
                                                    'Nombres' => "",
                                                    'Tipo' => "",
                                                    'FechaVencimiento' => "",
                                                    'Anticipo' =>$row2->Monto,
                                                    'FechaAnticipo' =>$row2->Fecha,
                                                    'TotalDiasV' =>$row3->TotalDias,
                                                    'FechaInicioV' =>$row3->FechaInicio,
                                                    'FechaTerminoV' =>$row3->FechaTermino,
                                                    'TotalDiasL' =>$row4->TotalDias,
                                                    'FechaInicioL' =>$row4->FechaInicio,
                                                    'FechaTerminoL'=>$row4->FechaTermino,
                                                    'TotalDiasP' =>$row5->TotalDias,
                                                    'FechaInicioP' =>$row5->FechaInicio,
                                                    'FechaTerminoP' =>$row5->FechaTermino,
                                                    'Institucion' =>$row6->Institucion,
                                                    'TipoPrestacion' =>$row6->TipoPrestacion,
                                                    'MontoPrestacion' =>$row6->Monto
                                                    );
                                            endforeach;
                                        endforeach;
                                    endforeach;
                                endforeach;
                            endforeach;
                        endforeach;
                    }
                    $data['query']=$datos;
                    $this->load->view('Hoja_de_Vida/content',$data); //debo enviar los datos, pero no sé como recibirlos
                    $this->load->view('Inicio/footer');

                }
                else
                    $this->load->view('Errores/error5');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Modificacion_Trabajador()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso') == 1)
                    $this->load->view('Inicio/headersup');
                else
                    $this->load->view('Inicio/header');

                $nombre = $this->input->post('nombres');
                $rut = $this->input->post('rut');
                $digito = $this->input->post('digito');
                $fecha1 = $this->input->post('fecha1');
                $direccion = $this->input->post('direccion');
                $telefono = $this->input->post('telefono');
                $cargo = $this->input->post('cargo');
                $tipocontrato = $this->input->post('tipocontrato');
                $fecha2 = $this->input->post('fecha2');
                $fecha3 = $this->input->post('fecha3');
                $dtrabajados = $this->input->post('dtrabajados');
                $remuneracion = $this->input->post('remuneracion');
                $bonos = $this->input->post('bonos');
                $monto = $this->input->post('monto');
                $hextra = $this->input->post('hextra');
                $acaja = $this->input->post('acaja');
                $amovil = $this->input->post('amovil');
                $acolacion = $this->input->post('acolacion');
                $anticipo = $this->input->post('anticipo');
                $afp = $this->input->post('afp');
                $porcentajeafp = $this->input->post('porcentajeafp');
                $afc = $this->input->post('afc');
                $salud = $this->input->post('salud');
                $montofonasa = $this->input->post('montofonasa');
                $isapre = $this->input->post('isapre');
                $montoisapre = $this->input->post('montoisapre');
                $apvuf = $this->input->post('apvuf');
                $apvpesos = $this->input->post('apvpesos');
                $cargas = $this->input->post('cargas');
                $nombrecarga = $this->input->post('nombrecarga');
                $tipocarga = $this->input->post('tipocarga');
                $fecha4 = $this->input->post('fecha4');
                $rutcarga = $this->input->post('rutcarga');
                $digitocarga = $this->input->post('digitocarga');
                $fecha5 = $this->input->post('fecha5');
                $fecha6 = $this->input->post('fecha6');
                $totaldias = $this->input->post('totaldias');
                $dias1 = $this->input->post('dias1');
                $fecha7 = $this->input->post('fecha7');
                $fecha8 = $this->input->post('fecha8');
                $dias2 = $this->input->post('dias2');
                $fecha9 = $this->input->post('fecha9');
                $fecha10 = $this->input->post('fecha10');
                $gocesueldo = $this->input->post('gocesueldo');
                $institucion = $this->input->post('institucion');
                $tipoprestacion = $this->input->post('tipoprestacion');
                $montoprestacion = $this->input->post('montoprestacion');

                $this->varios_model->Actualizar_Trabajador($nombre,$rut,$digito,$fecha1,$direccion,$telefono, $cargo, $tipocontrato,$fecha2,$fecha3,$dtrabajados,$remuneracion,$bonos,$monto,$hextra,$acaja,$amovil,$acolacion,$anticipo,$afp,$porcentajeafp,$afc,$salud,$montofonasa,$isapre,$montoisapre,$apvuf,$apvpesos,$cargas,$nombrecarga,$tipocarga,$fecha4,$rutcarga,$digitocarga,$fecha5,$fecha6, $totaldias,$dias1,$fecha7,$fecha8,$dias2,$fecha9,$fecha10,$gocesueldo,$institucion,$tipoprestacion,$montoprestacion);
                $this->load->view('Hoja_de_Vida/modificado');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Actualiza_Admin()
        {
            $nombre = $this->input->post('nombre');
            $rut = $this->input->post('rut');
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $data['result']= $this->varios_model->Actualiza_Admin($rut,$nombre,$login,$password);
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Modificar_Admin/modificado',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Elimina_Admin()
        {
            $rut = $this->input->post('RUT');
            $digito = $this->input->post('DIGITO');
            $data['result']= $this->varios_model->Eliminar_Admin($rut,$digito);
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Eliminar_Admin/eliminar',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function CrearTrabajador()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('CrearTrabajador/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Tramos()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $data1['result1']= $this->varios_model->recibetramo1();
                $data2['result2']= $this->varios_model->recibetramo2();
                $data3['result3']= $this->varios_model->recibetramo3();
                $data4['result4']= $this->varios_model->recibetramo4();

                foreach($data1['result1'] as $row1):
                    foreach($data2['result2'] as $row2):
                        foreach($data3['result3'] as $row3):
                            foreach($data4['result4'] as $row4):
                                $datos = array(
                                    'Inicio1' => $row1->Inicio,
                                    'Termino1' => $row1->Termino,
                                    'Monto1' => $row1->Monto,
                                    'Inicio2' => $row2->Inicio,
                                    'Termino2' => $row2->Termino,
                                    'Monto2' => $row2->Monto,
                                    'Inicio3' => $row3->Inicio,
                                    'Termino3' => $row3->Termino,
                                    'Monto3' => $row3->Monto,
                                    'Inicio4' => $row4->Inicio,
                                    'Termino4' => $row4->Termino,
                                    'Monto4' => $row4->Monto
                                );
                            endforeach;
                        endforeach;
                    endforeach;
                endforeach;

                $data['query'] = $datos;

                $this->load->view('Tramos/content',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Tramos1()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                for($i=1;$i<=4;$i++){
                    $inicio = $this->input->post('inicio'.$i);
                    $termino = $this->input->post('termino'.$i);
                    $monto = $this->input->post('monto'.$i);
                    $this->varios_model->GuardaTramos($i,$inicio,$termino,$monto);
                }
                $data1['result1']= $this->varios_model->recibetramo1();
                $data2['result2']= $this->varios_model->recibetramo2();
                $data3['result3']= $this->varios_model->recibetramo3();
                $data4['result4']= $this->varios_model->recibetramo4();

                foreach($data1['result1'] as $row1):
                    foreach($data2['result2'] as $row2):
                        foreach($data3['result3'] as $row3):
                            foreach($data4['result4'] as $row4):
                                $datos = array(
                                    'Inicio1' => $row1->Inicio,
                                    'Termino1' => $row1->Termino,
                                    'Monto1' => $row1->Monto,
                                    'Inicio2' => $row2->Inicio,
                                    'Termino2' => $row2->Termino,
                                    'Monto2' => $row2->Monto,
                                    'Inicio3' => $row3->Inicio,
                                    'Termino3' => $row3->Termino,
                                    'Monto3' => $row3->Monto,
                                    'Inicio4' => $row4->Inicio,
                                    'Termino4' => $row4->Termino,
                                    'Monto4' => $row4->Monto
                                );
                            endforeach;
                        endforeach;
                    endforeach;
                endforeach;

                $data['query'] = $datos;
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Tramos/content',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Crear_Trabajador()
        {
           if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                
                $nombres = $this->input->post('nombres');
                $rut = $this->input->post('rut');
                $digito = $this->input->post('digito');
                $digito2 = $this->varios_model->DigitoVerificador($rut);
                if ($digito == $digito2){
                    $var = $this->varios_model->BuscaRutTrabajador($rut,$digito);
                    if ($var == 1){
                        $fecha1 = $this->input->post('fecha1');
                        $direccion = $this->input->post('direccion');
                        $telefono = $this->input->post('telefono');
                        $cargo = $this->input->post('cargo');
                        $tipo_con = $this->input->post('tipo_con');
                        $remuneracion = $this->input->post('remuneracion');
                        $acaja = $this->input->post('acaja');
                        $amovilizacion = $this->input->post('amovilizacion');
                        $acolacion = $this->input->post('acolacion');
                        $afp = $this->input->post('afp');
                        $monto_afp = $this->input->post('monto_afp');
                        if ($tipo_con == 'fijo'){
                            $afc = '0';
                            $fecha2 = $this->input->post('fecha2');
                            $fecha3 = $this->input->post('fecha3');
                        }
                        else{
                            $afc = '0.6';
                            $fecha2 = $this->input->post('fecha2');
                            $fecha3 = '9999-12-31';
                        }
                        $tipo_salud = $this->input->post('tipo_salud');
                        if ($tipo_salud == 'fonasa'){
                            $monto_fonasa = $this->input->post('monto_fonasa');
                            $nombre_isapre = 'no';
                            $monto_isapre = 0;
                        }
                        if ($tipo_salud == 'isapre'){
                            $monto_fonasa = 0;
                            $nombre_isapre = $this->input->post('nombre_isapre');
                            $monto_isapre = $this->input->post('monto_isapre');
                        }
                        $apv_uf = $this->input->post('uf');
                        $apv_pesos = $this->input->post('pesos');
                        $Cargas = $this->input->post('cantrespuestas');
                        if ($Cargas != null){
                            for($i=0;$i<$Cargas;$i++){
                                $nombreCarga = $this->input->post('nombre_'.$i);
                                $tipoCarga = $this->input->post('tipo_'.$i);
                                $fecha4 = $this->input->post('fechaven_'.$i);
                                $rutCarga = $this->input->post('rut_'.$i);
                                $digitoCarga = $this->input->post('digito_'.$i);
                                $digito3 = $this->varios_model->DigitoVerificador($rutCarga);
                                if ($digitoCarga == $digito3)
                                {
                                    if($nombres == NULL || $fecha1 == NULL || $direccion == NULL || $telefono == NULL || $cargo == NULL || $tipo_con == NULL || $fecha2 == NULL || $remuneracion == NULL || $afp == NULL || $monto_afp == NULL || $tipo_salud == NULL || $apv_uf == NULL || $apv_pesos == NULL)
                                        $this->load->view('Errores/error6');
                                    else
                                    {
                                        $ban= $this->varios_model->buscarutcarga($rutCarga,$digitoCarga);
                                        if($ban==1)
                                        {
                                            $this->varios_model->CrearCargas($rut,$nombreCarga,$tipoCarga,$fecha4,$rutCarga,$digitoCarga);
                                            $this->varios_model->Crear_Trabajador1($nombres,$rut,$digito2,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$monto_afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos,$Cargas);
                                            $this->load->view('CrearTrabajador/creado');
                                        }
                                        else
                                        $this->load->view('Errores/error9');
                                    }
                                }
                                else
                                    $this->load->view('Errores/error2');
                            }
                        }
                    }
                    else
                        $this->load->view('Errores/error8');
                    }
                    else
                    $this->load->view('Errores/error2');
                $this->load->view('Inicio/footer');
                }

            else
                redirect(base_url());
        }
        function cargasFamiliares($nAlternativas)
        {
            $data['nAlternativas'] = $nAlternativas;
            $this->load->view('CrearTrabajador/cargasFamiliares',$data);
        }
        function Modificar_supervisor()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==1){
                    $this->load->view('Inicio/headersup');
                    $this->load->view('supervisor/content');
                }
                else{
                    $this->load->view('Inicio/header');
                    $this->load->view('Eliminar_Admin/error');
                }
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
        function Modifica_supervisor()
        {
             if($this->session->userdata('logged_in') == TRUE)
            {
            $rut = $this->input->post('RUT');
            $digito = $this->input->post('DIGITO');
             $var = $this->varios_model->BuscaRutsup($rut,$digito);
             if ($var == 0)
              {

            $data['result']= $this->varios_model->Modificar_supervisor($rut,$digito);
                $this->load->view('Inicio/headersup');
                $this->load->view('supervisor/modificar',$data);
                $this->load->view('Inicio/footer');

                }
            else{
                    $this->load->view('Inicio/headersup');
                   $this->load->view('Errores/error7');
                    $this->load->view('Inicio/footer');
            }
            }
            else
            {
                redirect(base_url());
            }
               
        }
        function Actualiza_supervisor()
        {
            
            if($this->session->userdata('logged_in') == TRUE)
            {
            $nombre = $this->input->post('nombre');
            $rut = $this->input->post('rut');
            $digito = $this->input->post('Digito');
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $this->varios_model->Actualiza_supervisor($rut,$nombre,$digito,$login,$password);
            $data['result']= $this->varios_model->modificar_supervisor($rut,$digito);
                if($this->session->userdata('Permiso')==0)
                    $this->load->view('Inicio/header');
                else
               // if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('supervisor/modificado',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
}
