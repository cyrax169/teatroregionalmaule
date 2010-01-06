<?php

class Welcome extends Controller {

    function Welcome()
    {
        parent::Controller();
        $this->load->model('varios_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
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
    function EliminaTrabajador()
    {
        $num = $this->varios_model->NumTrabajadores();
        for($i=0;$i<$num;$i++):
             $imprime=$this->input->post('imprime');
        endfor;
        $rut = $this->input->post('rut'.$imprime);
       // $digito = $this->input->post('digito');
        $data['result']= $this->varios_model->EliminarTrabajador($rut);
        $data['username'] = $this->session->userdata('username');
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
    function BuscaTrabajador()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data['username'] = $this->session->userdata('username');
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $this->load->view('buscar/content',$data);
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function Buscar_Trabajador()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data['username'] = $this->session->userdata('username');
            $rut = $this->input->post('RUT');
            $digito = $this->input->post('DIGITO');
            $digito1 = $this->varios_model->DigitoVerificador($rut);
            if($digito == $digito1)
            {
                $var = $this->varios_model->BuscaRutTrabajador($rut,$digito);
                if($var==1)
                {
                    $this->CrearTrabajador($rut,$digito);
                }
                else
                {
                    $var1=$this->varios_model->BuscaestadoTrabajador($rut);
                    if($this->session->userdata('permiso')==1)
                        $this->load->view('Inicio/headersup');
                    else
                        $this->load->view('Inicio/header');
                    if($var1 == 1)
                        $this->load->view('Errores/error8',$data);
                    
                    else
                        $this->load->view('Errores/error13',$data);
                    $this->load->view('Inicio/footer');
                }
            }
            else
            {
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                else
                    $this->load->view('Inicio/header');
                $this->load->view('Errores/error13',$data);
                $this->load->view('Inicio/footer');
            }
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
                $fecha = date("Y")."-".$mes."-".date("d");
                $data = array(
                        'Fecha' =>  $fecha,
                        'MontoUTM'  =>  $utm
                   );
                $this->varios_model->insertUTM($data);

                   echo json_encode(array("resultado" => "true"));

        }
    }
    function Eliminar_Admin()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data['username'] = $this->session->userdata('username');
            if($this->session->userdata('permiso')==1){
                $this->load->view('Inicio/headersup');
                $this->load->view('Eliminar_Admin/content',$data);
            }
            else{
                $this->load->view('Inicio/header');
                $this->load->view('Eliminar_Admin/error',$data);
            }
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function Elimina_Admin()
    {
      /*  $num = $this->varios_model->NumTrabajadores();
        for($i=0;$i<$num;$i++):
             $imprime=$this->input->post('imprime');
        endfor;*/
        $rut = $this->input->post('RUT');
        $var= $this->varios_model->Eliminar_Admin($rut);
        if($var!=1){
        $data['result']= $this->varios_model->Eliminar_Admin($rut);
        $data['username'] = $this->session->userdata('username');
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
        else{
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $data['username']=$this->session->userdata('username');
            $this->load->view('Eliminar_Admin/error2',$data);
            $this->load->view('Inicio/footer');
        }

        }
    function EliminarAdmin()
    {
        $rut = $this->input->post('rut');
        $this->varios_model->EliminarAdmin($rut);
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $this->load->view('Eliminar_Admin/content',$data);
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
            $data['username'] = $this->session->userdata('username');
            if($this->session->userdata('permiso')==1){
                $this->load->view('Inicio/headersup');
                $this->load->view('Crear_Admin/content',$data);
            }
            else{
                $this->load->view('Inicio/header');
                $this->load->view('Eliminar_Admin/error',$data);
            }
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    /*function Liquidacion()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $data['username'] = $this->session->userdata('username');
            $this->load->view('Liquidacion/content',$data);
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }*/
    function Planilla()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $data['username'] = $this->session->userdata('username');
            $this->load->view('planilla/content',$data);
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

            $data['username']=$this->session->userdata('username');
            $this->load->view('tablaIUT/content',$data);
            $this->load->view('Inicio/footer');
            }

            else{
                 $data['username'] = $this->session->userdata('username');
                 $this->load->view('Errores/error10',$data);
                 $this->load->view('Inicio/footer');
            }
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
            $data['username'] = $this->session->userdata('username');
            if ($digito == $digito2){
                $var = $this->varios_model->BuscaRut($rut);
                if ($var == 1){
                    $login =$this->input->post('login');
                    $password =$this->input->post('password');
                    $data['result'] =  $this->varios_model->IngresoAdmin($nombre,$rut,$login,$password);
                    $this->load->view('Crear_Admin/creado',$data);
                }
                else{
                        $this->load->view('Errores/error4',$data);
                }
            }
            else
                $this->load->view('Errores/error3',$data);
                
            $this->load->view('Inicio/footer');
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
            echo json_encode(array("resultado" => "letras"));// solo numeros

        }
        else
        {
            $UF = $this->input->post('uf');
            $fecha = date("Ymd");
            $this->varios_model->UFactual($UF,$fecha);
            echo json_encode(array("resultado" => "true"));//actualizado
         
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
    function Modificar_Admini()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $this->load->view('Inicio/headersup');
            $data['username'] = $this->session->userdata('username');
            $this->load->view('Modificar_Admin/content',$data);
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function Modifica_Admin()
    {
        $rut = $this->input->post('RUT');
        $digito = $this->input->post('DIGITO');
        $data['result']= $this->varios_model->Modificar_Admin($rut,$digito);
        $data['username'] = $this->session->userdata('username');
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
    function Modificar_Trabajador($rut = null, $digito= null) // le puse la variable $rut en el caso que el trabajador ya exista y llamemos a la función desde el "Crear_Trabajador" y este tenga estado INACTIVO
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $num = $this->varios_model->NumTrabajadores();
            $imprime=$this->input->post('imprime');
        
            if($rut==null)  //Si es nulo entonces la función es llamada desde el MENU!
            {
                $rut = $this->input->post('rut'.$imprime);
     
                if($this->session->userdata('permiso') == 1)
                    $this->load->view('Inicio/headersup');
                else
                    $this->load->view('Inicio/header');
            }

            $var = $this->varios_model->BuscaRutTrabajador($rut);
            $data['username']= $this->session->userdata('username');
            if ($var == 0)
            {
                /*foreach($data1['result'] as $row1):
                    //foreach($data1['result1'] as $row1):
                        foreach($data2['result2'] as $row2):
                            //foreach($data3['result3'] as $row3):
                                //foreach($data4['result4'] as $row4):
                                   // foreach($data5['result5'] as $row5):
                                        foreach($data6['result6'] as $row6):
                                            $datos = array(
                                                'Rut' =>$row1->Rut,
                                                'Digito' =>$row1->Digito,
                                                'Nombre' => $row1->Nombre,
                                                'Telefono' =>$row1->Telefono,
                                                'FechaNacimiento' => $row1->FechaNacimiento,
                                                'Direccion' => $row1->Direccion,
                                                'TipoContrato' => $row1->TipoContrato,
                                                'Estado' => $row1->Estado,
                                                'Cargo' => $row1->Cargo,
                                                'FechaInicioContrato' => $row1->FechaInicioContrato,
                                                'FechaTerminoContrato'  => $row1->FechaTerminoContrato,
                                                'Salario' => $row1->Salario,
                                                'NombreAfp' => $row1->NombreAfp,
                                                'Acaja' => $row1->Acaja,
                                                'Amovilizacion' => $row1->Amovilizacion,
                                                'Acolacion' => $row1->Acolacion,
                                                'Afc' => $row1->Afc, //cambie la forma del AFC entre indefinido y fijo, hacer la diferencia al mostrarlos luego!!
                                                'Fonasa' => $row1->Fonasa,
                                                'NombreIsapre' => $row1->NombreIsapre,
                                                'MontoIsapre' => $row1->MontoIsapre,
                                                'apvUf' => $row1->apvUf,
                                                'apvPesos' => $row1->apvPesos,
                                                'DiasTrabajados' => $row1->DiasTrabajados,
                                                'HorasExtras' => $row1->HorasExtras,
                                                'Bonos' => $row1->Bonos,
                                                'Carga' => $row1->Cargas,
                                                'Anticipo' =>$row2->Monto,
                                                'FechaAnticipo' =>$row2->Fecha,
                                                'Institucion' =>$row6->Institucion,
                                                'TipoPrestacion' =>$row6->TipoPrestacion,
                                                'MontoPrestacion' =>$row6->Monto,
                                                'Cuotas' => $row6->Cuotas
                                            );
                                        endforeach;
                                    endforeach;
                                //endforeach;
                            //endforeach;
                        //endforeach;
                    //endforeach;
                endforeach;*/
                $data['nAlternativas']=$this->varios_model->Contar_cargas($rut);
                $data['nVacaciones']=$this->varios_model->NumVacaciones($rut);
                $data['nLicencias']=$this->varios_model->NumLicencias($rut);
                $data['nPermisos']=$this->varios_model->NumPermisos($rut);
                $data['nPrestaciones']=$this->varios_model->NumPrestaciones($rut);
                $data['nAnticipo'] = $this->varios_model->NumAnticipo($rut);

                $data['vacaciones'] = $this->varios_model->Cargar_Vacaciones($rut);
                $data['licencias'] = $this->varios_model->Cargar_Licencias($rut);
                $data['permisos'] = $this->varios_model->Cargar_Permisos($rut);
                $data['anticipo'] = $this->varios_model->Cargar_Anticipo($rut);
                $data['prestaciones'] = $this->varios_model->Cargar_Prestaciones($rut);
                $data['cargas' ]= $this->varios_model->Modificar_cargas($rut);
                $data['trabajador'] = $this->varios_model->Cargar_Trabajador($rut);
                $data['uf'] = $this->varios_model->uf();
                
                
                $this->load->view('Hoja_de_Vida/content',$data); //debo enviar los datos, pero no sé como recibirlos
                //$this->load->view('Hoja_de_Vida/cargasFamiliares',$data);
            }
            else
                $this->load->view('Errores/error5',$data);
            $this->load->view('Inicio/footer');
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
            $data['username']= $this->session->userdata('username');
            $nombre = $this->input->post('nombres');
            $rut = $this->input->post('rut');
            $digito = $this->input->post('digito');
            $fecha1 = $this->input->post('fecha1');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $cargo = $this->input->post('cargo');
            $tipocontrato = $this->input->post('tipo_con');
            $fecha2 = $this->input->post('fecha2');
            if($tipocontrato=='Fijo'):
                $fecha3 = $this->input->post('fecha3');
            else:
                $fecha3 = '9999-12-31';
            endif;
            $dtrabajados = $this->input->post('dtrabajados');
            $remuneracion = $this->input->post('remuneracion');
            $bonos = $this->input->post('total_bonos');
            $hextra = $this->input->post('hextra');
            $acaja = $this->input->post('acaja');
            $amovil = $this->input->post('amovil');
            $acolacion = $this->input->post('acolacion');
            $anticipo = $this->input->post('anticipo');
            $fechaAnticipo = $this->input->post('fechaAnticipo');
            $this->varios_model->AlmacenaAnticipo($rut,$anticipo,$fechaAnticipo);
            $afp = $this->input->post('afp');
            $salud = $this->input->post('salud');
            if($salud == 'fonasa'):
                $fonasa = 6.4;
                $isapre = '';
                $montoisapre=0;
            else:
                $fonasa = 0;
                $isapre = $this->input->post('isapre');
                $montoisapre = $this->input->post('montoisapre');
            endif;
            $apvpesos = $this->input->post('apvpesos');
            $apvuf = $this->input->post('apvuf');
            $ncargas = $this->input->post('ncargas');
            if($ncargas>0):
                for($i=1;$i<=$ncargas;$i++):
                    $rutC = $this->input->post('Crut_'.$i);
                    $digitoC = $this->input->post('Cdigito_'.$i);
                    $nombreC = $this->input->post('Cnombre_'.$i);
                    $fechavenC = $this->input->post('Cfechaven_'.$i);
                    $tipoC = $this->input->post('Ctipo_'.$i);
                    $this->varios_model->Actualiza_cargas($rut,$rutC,$digitoC,$nombreC,$tipoC,$fechavenC);
                endfor;
            endif;
            $cantcargas = $this->input->post('cantrespuestas');
            if($cantcargas>0):
                for($i=0;$i<$cantcargas;$i++):
                    $rutC = $this->input->post('rut_'.$i);
                    if($rutC==$rut):
                        $this->load->view('Errores/error11',$data);
                        $i= $cantcargas;
                    else:
                        $digitoC = $this->input->post('digito_'.$i);
                        $digito1 = $this->varios_model->DigitoVerificador($rutC);
                        if ($digitoC == $digito1):
                            $nombreC = $this->input->post('nombre_'.$i);
                            $tipoC = $this->input->post('tipo_'.$i);
                            $fechavenC = $this->input->post('fechaven_'.$i);
                            $ban= $this->varios_model->buscarutcarga($rutC,$digitoC);
                            if($ban==1):
                                $this->varios_model->CrearCargas($rut,$nombreC,$tipoC,$fechavenC,$rutC,$digitoC);
                            else:
                                $this->load->view('Errores/error9',$data);
                                $i=$cantcargas;
                            endif;
                        else:
                            $this->load->view('Errores/error2',$data);
                            $i = $cantcargas;
                        endif;
                    endif;
                endfor;
            endif;
            $vacaciones = $this->input->post('vacaciones');
            if($vacaciones == 'SI'):
                $fechaIV = $this->input->post('fechaIV');
                $fechaTV = $this->input->post('fechaTV');
                $totaldiasV = $this->input->post('totaldiasV');
                $this->varios_model->IngresaVacaciones($rut,$fechaIV,$fechaTV,$totaldiasV);
            endif;
            $licencias = $this->input->post('licencias');
            if($licencias == 'SI'):
                $fechaIL = $this->input->post('fechaIL');
                $fechaTL = $this->input->post('fechaTL');
                $totaldiasL = $this->input->post('totaldiasL');
                $this->varios_model->IngresaLicencias($rut,$fechaIL,$fechaTL,$totaldiasL);
            endif;
            $permisos = $this->input->post('permisos');
            if($permisos=='SI'):
                $fechaIP = $this->input->post('fechaIP');
                $fechaTP = $this->input->post('fechaTP');
                $diasPermiso = $this->input->post('totaldiasP');
                $gocesueldo =  $this->input->post('gocesueldo');
                $this->varios_model->IngresaPermisos($rut,$fechaIP,$fechaTP,$diasPermiso,$gocesueldo);
            endif;
            
            //$this->varios_model->Actualizar_Trabajador($nombre,$rut,$digito,$fecha1,$direccion,$telefono, $cargo, $tipocontrato,$fecha2,$fecha3,$dtrabajados,$remuneracion,$bonos,$monto,$hextra,$acaja,$amovil,$acolacion,$anticipo,$afp,$afc,$salud,$montofonasa,$isapre,$montoisapre,$apvuf,$apvpesos,$cargas,$nombrecarga,$tipocarga,$fecha4,$rutcarga,$digitocarga,$fecha5,$fecha6, $totaldias,$dias1,$fecha7,$fecha8,$dias2,$fecha9,$fecha10,$gocesueldo,$institucion,$tipoprestacion,$montoprestacion,$cuotas);
            $this->load->view('Hoja_de_Vida/modificado',$data);
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
        $data['username'] = $this->session->userdata('username');
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
    function CrearTrabajador($rut = null, $digito =null)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $data['username'] = $this->session->userdata('username');
            if($rut ==  null )
            {
                $data['rut'] = '';
                $data['digito'] = '';
            }
            else
            {
                $data['rut'] = $rut;
                $data['digito'] = $digito;
            }
            $this->load->view('CrearTrabajador/content',$data);
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
            $data['username'] = $this->session->userdata('username');
            $nombres = $this->input->post('nombres');
            $rut = $this->input->post('rut');
            $digito = $this->input->post('digito');
            $digito2 = $this->varios_model->DigitoVerificador($rut);
            if ($digito == $digito2)
            {
                $var = $this->varios_model->BuscaRutTrabajador($rut,$digito);
                if ($var == 1)
                {
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
                    $afc = $this->input->post('afc');
                    if ($tipo_con == 'Fijo'){
                        $fecha2 = $this->input->post('fecha2');
                        $fecha3 = $this->input->post('fecha3');
                        $afc ='SI';
                    }
                    else{
                        $fecha2 = $this->input->post('fecha2');
                        $fecha3 = '9999-12-31';
                    }
                    $tipo_salud = $this->input->post('tipo_salud');
                    if ($tipo_salud == 'fonasa'){
                        $monto_fonasa = 6.4;
                        $nombre_isapre = ' ';
                        $monto_isapre = 0;
                    }
                    if ($tipo_salud == 'isapre'){
                        $monto_fonasa = 0;
                        $nombre_isapre = $this->input->post('nombre_isapre');
                        $monto_isapre = $this->input->post('monto_isapre');
                    }
                    $apv_uf = $this->input->post('uf');
                    $apv_pesos = 0;
                    $Cargas = $this->input->post('cantrespuestas');
                    if ($Cargas != null)
                    {
                        for($i=0;$i<$Cargas;$i++)
                        {
                            $nombreCarga = $this->input->post('nombre_'.$i);
                            $tipoCarga = $this->input->post('tipo_'.$i);
                            $fecha4 = $this->input->post('fechaven_'.$i);
                            $rutCarga = $this->input->post('rut_'.$i);
                            $digitoCarga = $this->input->post('digito_'.$i);
                            $digito3 = $this->varios_model->DigitoVerificador($rutCarga);
                            if ($digitoCarga == $digito3)
                            {
                                if($nombres == NULL || $fecha1 == NULL || $direccion == NULL || $telefono == NULL || $cargo == NULL || $tipo_con == NULL || $fecha2 == NULL || $remuneracion == NULL || $afp == NULL  || $tipo_salud == NULL || $apv_uf == NULL)
                                {
                                    $this->load->view('Errores/error6',$data);
                                    $i = $Cargas;
                                }
                                else
                                {
                                    $ban= $this->varios_model->buscarutcarga($rutCarga,$digitoCarga);
                                    if($ban==1)
                                    {
                                        $this->varios_model->CrearCargas($rut,$nombreCarga,$tipoCarga,$fecha4,$rutCarga,$digitoCarga);
                                        if($i==0)
                                        {
                                            $this->varios_model->Crear_Trabajador1($nombres,$rut,$digito2,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos,$Cargas);
                                            $this->load->view('CrearTrabajador/creado',$data);
                                        }
                                    }
                                    else
                                    {
                                        $this->load->view('Errores/error9',$data);
                                        $i=$Cargas;
                                    }
                                }
                            }
                            else
                            {
                                $this->load->view('Errores/error2',$data);
                                $i = $Cargas;
                            }
                        }
                    }
                    else
                    {
                        /*
                         * No hay necesidad de crear una CARGA VACIA si no existen cargas
                         *
                        $nombreCarga='0';
                        $tipoCarga='0';
                        $fecha4=date('Ymd');
                        $rutCarga=0;
                        $digitoCarga=0;
                        $this->varios_model->CrearCargas($rut,$nombreCarga,$tipoCarga,$fecha4,$rutCarga,$digitoCarga);
                         *
                         */
                        $Cargas=0;
                        $this->varios_model->Crear_Trabajador1($nombres,$rut,$digito2,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos,$Cargas);
                        $this->load->view('CrearTrabajador/creado',$data);
                    }
                }
                else
                {
                    $var2=$this->varios_model->BuscaestadoTrabajador($rut);
                    if($var2==0) //Si el trabajador está INACTIVO entonces...
                    {
                        $this->Modificar_Trabajador($rut); //Mostramos los Datos y los podrá Editar
                    }
                    else
                    {
                        $this->load->view('Errores/error8',$data);
                    }
                }
            }
            else
                $this->load->view('Errores/error2',$data);
            $this->load->view('Inicio/footer');
        }
        else
            redirect(base_url());
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
            $data['username'] = $this->session->userdata('username');
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
            $data['username'] = $this->session->userdata('username');
            $this->load->view('Tramos/content',$data);
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
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
            $data['username'] = $this->session->userdata('username');
            if($this->session->userdata('permiso')==1){
                $this->load->view('Inicio/headersup');
                $this->load->view('supervisor/content',$data);
            }
            else{
                $this->load->view('Inicio/header');
                $this->load->view('Eliminar_Admin/error',$data);
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
            $password = $this->input->post('password');
            $password2=md5($password);
            $var = $this->varios_model->BuscaRutsup($rut,$digito,$password2);
            $data['username'] = $this->session->userdata('username');
            if ($var == 0)
            {
                $data['result']= $this->varios_model->Modificar_supervisor($rut,$digito);
                $this->load->view('Inicio/headersup');
                $this->load->view('supervisor/modificar',$data);
                $this->load->view('Inicio/footer');
            }
            else
            {
                $this->load->view('Inicio/headersup');
                $this->load->view('Errores/error7',$data);
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
            $data['username'] = $this->session->userdata('username');
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
    function Muestrarutliquidacion()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $num = $this->varios_model->NumTrabajadores();
            $data['num'] = $num;
            $data['result']= $this->varios_model->Muestrarutliquidacion();
            $data['username']=$this->session->userdata('username');
            $data['mes'] = $this->varios_model->cambia_meses2(date('m'));
            $data['anio'] = date('Y');
            $this->load->view('Liquidacion/content1',$data);
            $this->load->view('Inicio/footer');
        }
    }
    function MuestrarutEliminar()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $num = $this->varios_model->NumTrabajadores();
            $data['num'] = $num;
            $data['result']= $this->varios_model->Muestrarutliquidacion();
            $data['username']=$this->session->userdata('username');
            $this->load->view('EliminarTrabajador/content',$data);
            $this->load->view('Inicio/footer');
        }
    }
    function MuestrarutModificar()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $num = $this->varios_model->NumTrabajadores();
            $data['num'] = $num;
            $data['result']= $this->varios_model->Muestrarutliquidacion();
            $data['username']=$this->session->userdata('username');
            $this->load->view('Modificar_Trabajador/content',$data);
            $this->load->view('Inicio/footer');
        }
    }
    function Muestrarutplanilla()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');
            $num = $this->varios_model->NumTrabajadores();
            $data['num'] = $num;
            $mes=date('m');
            $ano=date('Y');
            echo $ano;
            $data['result']= $this->varios_model->Muestrarutamini($mes,$ano);
            $data['result2']= $this->varios_model->Muestrarutamini2();
            $data['username']=$this->session->userdata('username');
            $this->load->view('planilla/content',$data);
            $this->load->view('Inicio/footer');
        }
    }
/*
   function Modificar2_Trabajador($rut)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {

           $var = $this->varios_model->BuscaRutTrabajador($rut);
           if ($var == 0)
           {
                $data1['result']= $this->varios_model->Modificar2_Trabajador($rut);
                $data1['result']= $this->varios_model->Modificar_Trabajador($rut);
                $data2['result2']= $this->varios_model->Cargar_Anticipo($rut);
                $data3['result3']= $this->varios_model->Cargar_Vacaciones($rut);
                $data4['result4']= $this->varios_model->Cargar_Licencias($rut);
                $data5['result5']= $this->varios_model->Cargar_Permisos($rut);
                $data6['result6']= $this->varios_model->Cargar_Prestaciones($rut);
                $Cargas = $this->varios_model->Contar_cargas(rut);
                $data['result']= $this->varios_model->Modificar_cargas($rut);
                foreach($data1['result'] as $row1):
                    //foreach($data1['result1'] as $row1):
                        foreach($data2['result2'] as $row2):
                            foreach($data3['result3'] as $row3):
                                foreach($data4['result4'] as $row4):
                                    foreach($data5['result5'] as $row5):
                                        foreach($data6['result6'] as $row6):
                                            $datos = array(
                                                'Rut' =>$row1->Rut,
                                                'Digito' =>$row1->Digito,
                                                'Nombre' => $row1->Nombre,
                                                'Telefono' =>$row1->Telefono,
                                                'FechaNacimiento' => $row1->FechaNacimiento,
                                                'Direccion' => $row1->Direccion,
                                                'TipoContrato' => $row1->TipoContrato,
                                                'Estado' => $row1->Estado,
                                                'Cargo' => $row1->Cargo,
                                                'FechaInicioContrato' => $row1->FechaInicioContrato,
                                                'FechaTerminoContrato'  => $row1->FechaTerminoContrato,
                                                'Salario' => $row1->Salario,
                                                'NombreAfp' => $row1->NombreAfp,
                                                'Acaja' => $row1->Acaja,
                                                'Amovilizacion' => $row1->Amovilizacion,
                                                'Acolacion' => $row1->Acolacion,
                                                'Afc' => $row1->Afc,
                                                'Fonasa' => $row1->Fonasa,
                                                'NombreIsapre' => $row1->NombreIsapre,
                                                'MontoIsapre' => $row1->MontoIsapre,
                                                'apvUf' => $row1->apvUf,
                                                'apvPesos' => $row1->apvPesos,
                                                'DiasTrabajados' => $row1->DiasTrabajados,
                                                'HorasExtras' => $row1->HorasExtras,
                                                'Bonos' => $row1->Bonos,
                                                'Carga' => $row1->Cargas,
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
                                                'MontoPrestacion' =>$row6->Monto,
                                                'Cuotas' => $row6->Cuotas
                                            );
                                        endforeach;
                                    endforeach;
                                endforeach;
                            endforeach;
                        endforeach;
                    //endforeach;
                endforeach;

                $data['nAlternativas']=$Cargas;
                $data['query']=$datos;
                $data['username']= $this->session->userdata('username');
                $this->load->view('Hoja_de_Vida/contentmod',$data);
               // $this->load->view('Hoja_de_Vida/content',$data); //debo enviar los datos, pero no sé como recibirlos
                //$this->load->view('Hoja_de_Vida/cargasFamiliares',$data);
              //  $this->load->view('Inicio/footer');

            }
            else
                $this->load->view('Errores/error5',$data);
        }
        else
        {
            redirect(base_url());
        }
    }
*/
     function Afp()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');

            $data['username'] = $this->session->userdata('username');
  //          $data['query'] = $datos;
            $data ['result']=$this->varios_model->RecibeAfp();
            $this->load->view('Afp/content',$data);
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function Afp1()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            for($i=1;$i<=5;$i++){
                $afp = $this->input->post('afp'.$i);
                $monto = $this->input->post('monto'.$i);
                $this->varios_model->GuardaAfp($afp,$monto);
            }
            if($this->session->userdata('permiso')==0)
                $this->load->view('Inicio/header');
            if($this->session->userdata('permiso')==1)
                $this->load->view('Inicio/headersup');

            $data['username'] = $this->session->userdata('username');
  //          $data['query'] = $datos;
            $data ['result']=$this->varios_model->RecibeAfp();
            $this->load->view('Afp/content',$data);
            $this->load->view('Inicio/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    function NumeroPrestaciones($numPrestaciones)
    {
        $data['numPrestaciones'] = $numPrestaciones;
        $this->load->view('Hoja_de_Vida/numPrestaciones',$data);
    }
}
