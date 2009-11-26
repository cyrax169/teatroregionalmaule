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
	function Vida()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
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
                $query = $this->varios_model->VerificaEmpresa(); //verificamos que la BD no tenga Datos
                if($this->session->userdata('permiso')==0)
                {
                    $this->load->view('Inicio/header'); //cambiar link del header, Hoja de empresa debe apuntar a otra parte
                    if( $query->num_rows() > 0)
                    {
                        $data['result']=$query->result();
                        $this->load->view('Hoja_empresa/contentdatos',$data); //content especial, solo debe mostrar los datos de la Empresa
                    }
                    else
                        $this->load->view('Hoja_empresa/contenterror'); //Usuario Admin y tabla sin datos
                }
                if($this->session->userdata('permiso')==1)
                {
                    $this->load->view('Inicio/headersup');
                    if( $query->num_rows() > 0)
                    {
                        $data['result']=$query->result();
                        $this->load->view('Hoja_empresa/contentdatos',$data); //content especial, solo debe mostrar los datos de la Empresa
                    }
                    else
                        $this->load->view('Hoja_empresa/content'); //Usuario Super y tabla sin datos (podrá llenarlos)
                }
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
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
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
        function Modificar_Admin()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Modificar_Admin/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
	}
         function Eliminar_Admin()
	{
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Eliminar_Admin/content');
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
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
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
                $this->load->view('tablaIUT/content');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
       /* function buscaRut() //Funciones que solo se ocupan en la página de prueba (vista/prueba)
        {                     // por lo que las he comentado
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
        }*/
        function IngresoUsuario()
        {
            $nombre = $this->input->post('nombre');
            $rut = $this->input->post('rut');
            $login =$this->input->post('login');
            $password =$this->input->post('password');
            $data['result'] =  $this->varios_model->IngresoAdmin($nombre,$rut,$login,$password);

            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Crear_Admin/creado',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }

        }
        function ActualizaUF()
        {
            $UF = $this->input->post('uf');
            $this->varios_model->UFactual($UF);
        }
        function DatosEmpresa() //Modificar, ya que cambio la hoja de la empresa (vista)
        {
            $rsocial = $this->input->post('rsocial');
            $rut = $this->input->post('rut');
            $direccion = $this->input->post('direccion');
            $caja = $this->input->post('caja');
            $cajasi = $this->input->post('cajasi');
            $apatronal = $this->input->post('apatronal');
            $monto = $this->input->post('monto');
            $this->varios_model->DatosEmpresa($rsocial,$rut,$direccion,$caja,$cajasi,$apatronal,$monto);
            
            echo "Los datos recibidos son :
                    <table width=500px border=1 align='center'>
                        <tr>
                            <td>rsocial</td> <td>$rsocial</td>
                        </tr>
                        <tr>
                            <td>rut</td> <td>$rut</td>
                        </tr>
                        <tr>
                            <td>direccion</td> <td>$direccion</td>
                        </tr>
                        <tr>
                            <td>caja</td> <td>$caja</td>
                        </tr>
                        <tr>
                            <td>cajasi</td> <td>$cajasi</td>
                        </tr>
                        <tr>
                            <td>mutual</td> <td>$apatronal</td>
                        </tr>
                        <tr>
                            <td>ist</td> <td>$monto</td>
                        </tr>
                    </table>";
        }
        function Modifica_Admin()
        {
            $rut = $this->input->post('RUT');
            $digito = $this->input->post('DIGITO');
            $data['result']= $this->varios_model->Modificar_Admin($rut,$digito);
            if($this->session->userdata('logged_in') == TRUE)
            {
                $this->load->view('Inicio/header');
                $this->load->view('Modificar_Admin/modificar',$data);
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
        function Crear_Trabajador()
        {
            if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('CrearTrabajador/creado');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
            $nombres = $this->input->post('nombres');
            $rut = $this->input->post('rut');
            $dia1 = $this->input->post('dia1');
            $mes1 = $this->input->post('mes1');
            $mes1 = $this->varios_model->cambia_meses($mes1);
            $ano1 = $this->input->post('ano1');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $cargo = $this->input->post('cargo');
            $tipo_con = $this->input->post('tipo_con');
            $dia2 = $this->input->post('dia2');
            $mes2 = $this->input->post('mes2');
            $mes2 = $this->varios_model->cambia_meses($mes2);
            $ano2 = $this->input->post('ano2');
            $dia3 = $this->input->post('dia3');
            $mes3 = $this->input->post('mes3');
            $mes3 = $this->varios_model->cambia_meses($mes3);
            $ano3 = $this->input->post('ano3');
            $remuneracion = $this->input->post('remuneracion');
            $acaja = $this->input->post('acaja');
            $amovilizacion = $this->input->post('amovilizacion');
            $acolacion = $this->input->post('acolacion');
            $afp = $this->input->post('afp');
            $monto_afp = $this->input->post('monto_afp');
            if ($tipo_con == 'fijo')
                $afc = 'no';
            else
                $afc = 'si';
            $tipo_salud = $this->input->post('tipo_salud');
            if ($tipo_salud == 'fonasa'){
                $monto_fonasa = $this->input->post('monto_fonasa');
                $nombre_isapre = $this->input->post('no');
                $monto_isapre = $this->input->post('0');
            }
            if ($tipo_salud == 'isapre'){
                $monto_fonasa = $this->input->post('no');
                $nombre_isapre = $this->input->post('nombre_isapre');
                $monto_isapre = $this->input->post('monto_isapre');
            }
            $apv_uf = $this->input->post('uf');
            $apv_pesos = $this->input->post('pesos');

            $fecha1 = "$ano1-$mes1-$dia1";
            $fecha2 = "$ano2-$mes2-$dia2";
            $fecha3 = "$ano3-$mes3-$dia3";

            /*echo "Los datos recibidos son :
                    <table width=500px border=1 align='center'>
                        <tr>
                            <td>nombres</td> <td>$nombres</td>
                        </tr>
                        <tr>
                            <td>rut</td> <td>$rut</td>
                        </tr>
                        <tr>
                            <td>fecha1</td> <td>$fecha1</td>
                        </tr>
                        <tr>
                            <td>direccion</td> <td>$direccion</td>
                        </tr>
                        <tr>
                            <td>telefono</td> <td>$telefono</td>
                        </tr><tr>
                            <td>cargo</td> <td>$cargo</td>
                        </tr><tr>
                            <td>tipo_con</td> <td>$tipo_con</td>
                        </tr><tr>
                            <td>fecha2</td> <td>$fecha2</td>
                        </tr><tr>
                            <td>fecha3</td> <td>$fecha3</td>
                        </tr><tr>
                            <td>remuneracion</td> <td>$remuneracion</td>
                        </tr><tr>
                            <td>acaja</td> <td>$acaja</td>
                        </tr><tr>
                            <td>amovilizacion</td> <td>$amovilizacion</td>
                        </tr><tr>
                            <td>acolacion</td> <td>$acolacion</td>
                        </tr><tr>
                            <td>afp</td> <td>$afp</td>
                        </tr><tr>
                            <td>afc</td> <td>$afc</td>
                        </tr><tr>
                            <td>tipo_salud</td> <td>$tipo_salud</td>
                        </tr><tr>
                            <td>nombre_isapre</td> <td>$nombre_isapre</td>
                        </tr><tr>
                            <td>monto_isapre</td> <td>$monto_isapre</td>
                        </tr><tr>
                            <td>apv_uf</td> <td>$apv_uf</td>
                        </tr><tr>
                            <td>apv_pesos</td> <td>$apv_pesos</td>
                        </tr>

                    </table>";*/
            $this->varios_model->Crear_Trabajador1($nombres,$rut,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$monto_afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos);
        }
}

     