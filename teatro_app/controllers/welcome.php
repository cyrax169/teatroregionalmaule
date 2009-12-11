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
                if($this->session->userdata('permiso')==1){
                    $this->load->view('Inicio/headersup');
                    $this->load->view('Modificar_Admin/content');
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

                $digito2 = $this->varios_model->DigitoVerificador($rut);
                if ($digito == $digito2)
                {
                    $var = $this->varios_model->BuscaRutTrabajador($rut);
                    if ($var == 0)
                    {
                        $data['result']= $this->varios_model->Modificar_Trabajador($rut,$digito);
                        foreach($data['result'] as $row):
                            $Cargas = $row->Cargas;
                        endforeach;
                        if($Cargas == 'si')
                        {
                            $data1['result1']= $this->varios_model->Modificar_cargas($rut,$digito);
                            foreach($data['result'] as $row):
                                foreach($data1['result1'] as $row1):
                                    $datos = array(
                                        'Rut' =>$row->Rut,
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
                                        'Nombres' => $row1->Nombres,
                                        'Tipo' => $row1->Tipo,
                                        'FechaVencimiento' => $row1->FechaVencimiento,
                                        'Digito' => $digito
                                    );
                                 endforeach;
                            endforeach;
                        }
                        else
                        {
                            foreach($data['result'] as $row):
                                $datos = array(
                                    'Rut' =>$row->Rut,
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
                                    'Carga' => $row->Carga,
                                    'RutTrabajador' => "",
                                    'Nombres' => "",
                                    'Tipo' => "",
                                    'FechaVencimiento' => ""
                                );
                            endforeach;
                        }
                        $data['query']=$datos;
                        $this->load->view('Hoja_de_Vida/content',$data); //debo enviar los datos, pero no sé como recibirlos
                    }
                    else
                        $this->load->view('Errores/error5');
                    
                }
                else
                    $this->load->view('Errores/error2');
                $this->load->view('Inicio/footer');
            }
            else
            {
                redirect(base_url());
            }
        }
        function Modificacion_Trabajador()
        {
            echo "Se debe crear la función que Guarde todo los datos que aquí se ingresen!!!";
            echo "<a href= http://localhost/TRM/index.php/welcome/Modificar_Trabajador> TRM</a>";
        }
        function Actualiza_Trabajador()
        {
            $NOMBRES = $this->input->post('nombres');
            $RUT = $this->input->post('rut');
            $FECHANAC = $this->input->post('fechanacimiento');
            $DIRECCION = $this->input->post('direccion');
            $TELEFONOS = $this->input->post('telefonos');
            $CARGO = $this->input->post('cargo');
            $TIPO_CON = $this->input->post('tipo_con');

             if ($TIPO_CON == 'fijo')
                $AFC = 'no';
            else
                $AFC = 'si';
             $FECHAINICON=$this->input->post('fechainiciocontrato');
             $FECHATERMINOCON=$this->input->post('fechaterminocontrato');
           
            $DIASTRABAJADOS = $this->input->post('diastrabajados');
             $REMUNERACION = $this->input->post('remuneracion');
            $BONOS = $this->input->post('bonos');
            //$MONTO = $this->input->post('monto');
            //$HEXTRAS = $this->input->post('hextras');
            //$HMONTO = $this->input->post('hmonto');
            $ACAJA = $this->input->post('acaja');
            $AMOVILIZACION = $this->input->post('amovilizacion');
            $ACOLACION = $this->input->post('acolacion');
            //$ANTICIPO = $this->input->post('anticipo');
            $AFP = $this->input->post('afp');
            $MONTO_AFP = $this->input->post('monto_afp');
          //  $TIPO_SALUD = $this->input->post('tipo_salud');
           // if ($TIPOSALUD == 'fonasa'){
               $MONTO_FONASA = $this->input->post('montofonasa');
               $NOMBRE_ISAPRE = $this->input->post('nombre_isapre');
               $MONTO_ISAPRE = $this->input->post('monto_isapre');
          //  }
   
           /*  if ($TIPO_SALUD== 'isapre'){
                $MONTO_FONASA = $this->input->post('no');
                $NOMBRE_ISAPRE = $this->input->post('nombre_isapre');
                $MONTO_ISAPRE = $this->input->post('monto_isapre');
            }*/
            $RUTCARGAS = $this->input->post('rutcarga');
            $NOMBRESCARGAS = $this->input->post('nombrescargas');
            $TIPOCARGA = $this->input->post('tipocarga');
            $FECHAVENCIMIENTO=$this->input->post('fechavencimiento');
            //$dia4 = $this->input->post('dia4');
            //$mes4 = $this->input->post('mes4');
            //$ano4 = $this->input->post('ano4');
           
          //  $FECHAINICON= "$ANO2-$MES2-$DIA2";
            //$FECHATERMINOCON = "$ANO3-$MES3-$DIA3";
           // $FECHAVENCIMIENTO = "$ano4-$mes4-$dia4";
            $data['result']= $this->varios_model->Actualiza_trabajador($BONOS,$DIASTRABAJADOS,$MONTO_ISAPRE,$NOMBRE_ISAPRE,$MONTO_FONASA,$NOMBRES,$RUT,$FECHANAC,$DIRECCION,$TELEFONOS,$CARGO,$TIPO_CON,$AFC,$FECHAINICON,$FECHATERMINOCON,$REMUNERACION,$ACOLACION,$AMOVILIZACION,$ACAJA,$AFP,$MONTO_AFP);
            $data['result']= $this->varios_model->Actualiza_cargas($RUT,$RUTCARGAS,$NOMBRESCARGAS,$TIPOCARGA,$FECHAVENCIMIENTO);
          if($this->session->userdata('logged_in') == TRUE)
            {
                if($this->session->userdata('permiso')==0)
                    $this->load->view('Inicio/header');
                if($this->session->userdata('permiso')==1)
                    $this->load->view('Inicio/headersup');
                $this->load->view('Modificar_Trabajador/modificado',$data);
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

                $nombres = $this->input->post('nombres');
                $rut = $this->input->post('rut');
                $digito = $this->input->post('digito');
                $digito2 = $this->varios_model->DigitoVerificador($rut);
                if ($digito == $digito2){
                    $var = $this->varios_model->BuscaRutTrabajador($rut);
                    if ($var == 1){
                        $fecha1 = $this->input->post('fecha1');
                        $direccion = $this->input->post('direccion');
                        $telefono = $this->input->post('telefono');
                        $cargo = $this->input->post('cargo');
                        $tipo_con = $this->input->post('tipo_con');
                        $fecha2 = $this->input->post('fecha2');
                        $fecha3 = $this->input->post('fecha3');
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
                        $cargas = $this->input->post('cargas');
                        if ($cargas == 'si'){
                            $nombreCarga = $this->input->post('nombrecarga');
                            $tipoCarga = $this->input->post('tipocarga');
                            $fecha4 = $this->input->post('fecha4');
                            $rutCarga = $this->input->post('rutcarga');
                            $digitoCarga = $this->input->post('digitocarga');
                        }
                        if($nombres == NULL || $fecha1 == NULL || $direccion == NULL || $telefono == NULL || $cargo == NULL || $tipo_con == NULL || $fecha2 == NULL || $fecha3 == NULL || $remuneracion == NULL || $acaja == NULL || $amovilizacion == NULL || $acolacion == NULL || $afp == NULL || $monto_afp == NULL || $tipo_salud == NULL || $apv_uf == NULL || $apv_pesos == NULL || $cargas == NULL || $nombreCarga == NULL || $tipoCarga == NULL || $fecha4 == NULL)
                            $this->load->view('Errores/error6');
                        else{
                        $this->varios_model->CrearCargas($rut,$nombreCarga,$tipoCarga,$fecha4,$rutCarga);
                        $this->varios_model->Crear_Trabajador1($nombres,$rut,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$monto_afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos,$cargas);
                        $this->load->view('CrearTrabajador/creado');
                        }
                    }
                    else
                        $this->load->view('Errores/error5');
                    }
            	else
                    $this->load->view('Errores/error2');
                $this->load->view('Inicio/footer');
       		}

            else
                redirect(base_url());
        }

        
}
