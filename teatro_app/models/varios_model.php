<?php
class varios_model extends Model
{
    function  varios_model()
    {
        parent::Model();
    }
    function IngresoAdmin($nombre,$rut,$login,$password)
    {
        $datos=array();
        $datos['Permiso']=0;
        $datos['Nombre']=$nombre;
        $datos['Rut']=$rut;
        $datos['login']=$login;
        $datos['password']=md5($password);

        $this->db->insert('usuarios',$datos);

        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('usuarios');
        return $query->result();
    }
    function IUT ()
    {
        $this->db->select('MontoUTM');
        $this->db->where('MONTH(Fecha)',date('m'));
        $query = $this->db->get('utm');
        return $query->result();
    }
    function GuardaIUT($data)
    {
        
        $datos=array();
        $datos['Id']=1;
        $datos['Desde']=$data['a'];
        $datos['hasta']=$data['b'];
        $datos['cantidad']=$data['c'];
        $this->db->where('Id',1);
        $this->db->update('IUT',$datos);
        $datos['Id']=2;
        $datos['Desde']=$data['b'];
        $datos['hasta']=$data['d'];
        $datos['cantidad']=$data['e'];
        $this->db->where('Id',2);
        $this->db->update('IUT',$datos);
        $datos['Id']=3;
        $datos['Desde']=$data['d'];
        $datos['hasta']=$data['f'];
        $datos['cantidad']=$data['g'];
        $this->db->where('Id',3);
        $this->db->update('IUT',$datos);
        $datos['Id']=4;
        $datos['Desde']=$data['f'];
        $datos['hasta']=$data['h'];
        $datos['cantidad']=$data['i'];
        $this->db->where('Id',4);
        $this->db->update('IUT',$datos);
        $datos['Id']=5;
        $datos['Desde']=$data['h'];
        $datos['hasta']=$data['k'];
        $datos['cantidad']=$data['l'];
        $this->db->where('Id',5);
        $this->db->update('IUT',$datos);
        $datos['Id']=6;
        $datos['Desde']=$data['l'];
        $datos['hasta']=$data['n'];
        $datos['cantidad']=$data['o'];
        $this->db->where('Id',6);
        $this->db->update('IUT',$datos);
        $datos['Id']=7;
        $datos['Desde']=$data['n'];
        $datos['hasta']=$data['o'];
        $datos['cantidad']=$data['c'];
        $this->db->where('Id',7);
        $this->db->update('IUT',$datos);
    }

    function GuardaTramos($i,$inicio,$termino,$monto)
    {
        $datos=array();
        $datos['Id']=$i;
        $datos['Inicio']=$inicio;
        $datos['Termino']=$termino;
        $datos['Monto']=$monto;
        $this->db->where('Id',$i);
        $this->db->update('Tramos',$datos);
    }
    
    function recibetramo1()
    {
        $this->db->select('*');
        $this->db->where('Id',1);
        $query = $this->db->get('Tramos');
        return $query->result();
    }
    function recibetramo2()
    {
        $this->db->select('*');
        $this->db->where('Id',2);
        $query = $this->db->get('Tramos');
        return $query->result();
    }
    function recibetramo3()
    {
        $this->db->select('*');
        $this->db->where('Id',3);
        $query = $this->db->get('Tramos');
        return $query->result();
    }
    function recibetramo4()
    {
        $this->db->select('*');
        $this->db->where('Id',4);
        $query = $this->db->get('Tramos');
        return $query->result();
    }
    function recibetramo()
    {
        for($i=1;$i<=4;$i++){
            $this->db->select('*');        
            //$this->db->where('Id',$i);
            $query = $this->db->get('Tramos');
            return $query->result();
        }
    }
    function DatosEmpresa($rsocial,$rut,$digito,$direccion,$caja,$cajasi,$apatronal,$monto)
    {
        $datos=array();
        $datos['Rut']=$rut;
        $datos['Digito']=$digito;
        $datos['RazonSocial']=$rsocial;
        $datos['Direccion']=$direccion;
        if($caja=='SI')
            $datos['CajaCompensacion']=$cajasi;
        else
            $datos['CajaCompensacion']='NO';
        $datos['MontoAporte']=$monto;
        $datos['AportePatronal']=$apatronal;

        return $this->db->insert('trm',$datos);
    }
    function existeEmpresa($rut)
    {
        $this->db->select('Rut');
        $this->db->where('Rut',$rut);
        return $this->db->get('trm');
    }
    function update_DatosEmpresa($rsocial,$rut,$digito,$direccion,$cajasi,$apatronal,$monto)
    {
        $datos=array();
        $datos['Rut']=$rut;
        $datos['Digito']=$digito;
        $datos['RazonSocial']=$rsocial;
        $datos['Direccion']=$direccion;
        $datos['CajaCompensacion']=$cajasi;
        $datos['AportePatronal']=$apatronal;
        $datos['MontoAporte']=$monto;
        $this->db->select('*');
        return $this->db->update('trm', $datos);
    }
    function VerificaEmpresa()
    {
        $this->db->select('*');
        return $this->db->get('trm');
    }
    function Eliminar_Admin($rut, $digito)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('usuarios');
        if($query->num_rows() > 0 )
            return $query->result();
        else
            return 1;
    }
    function EliminarAdmin($rut)
    {
      
        $this->db->where('Rut',$rut);
        $this->db->delete('usuarios');
    }
    function EliminarTrabajador($rut)
    {
        $data = array(
            'Estado' => 0
        );
        $this->db->where('Rut', $rut);
        $this->db->update('Trabajadores', $data);
    }
    function Modificar_Admin($rut, $digito)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('usuarios');
        
        if($query->num_rows() > 0 )
            return $query->result();
        else
            show_error('La Base de Datos está Vacia');
    }
    function Actualiza_Admin($rut,$nombre,$login,$password)
    {
        $datos=array();
        $datos['Permiso']=0;
        $datos['Nombre']=$nombre;
        $datos['login']=$login;
        $datos['password']=md5($password);
        $this->db->where('Rut',$rut);
        $this->db->update('usuarios',$datos);

        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('usuarios');
        return $query->result();
    }
    function Actualiza_cargas($RUT,$RUTCARGAS,$NOMBRESCARGAS,$TIPOCARGA,$FECHAVENCIMIENTO)
    {
        $datos=array();
        $datos['RutTrabajador']=$RUT;
        $datos['Rut']=$RUTCARGAS;
        $datos['Nombres']=$NOMBRESCARGAS;
        $datos['Tipo']=$TIPOCARGA;
        $datos['FechaVencimiento']=$FECHAVENCIMIENTO;

        $this->db->where('Rut',$RUT);
        $this->db->update('Cargas',$datos);

        $this->db->select('*');
        $this->db->where('RutTrabajador',$RUT);
        $query = $this->db->get('Cargas');
        return $query->result();

    }
    function Actualiza_trabajador($BONOS,$DIASTRABAJADOS,$MONTO_ISAPRE,$NOMBRE_ISAPRE,$MONTO_FONASA,$NOMBRES,$RUT,$FECHANAC,$DIRECCION,$TELEFONOS,$CARGO,$TIPO_CON,$AFC,$FECHAINICON,$FECHATERMINOCON,$REMUNERACION,$ACOLACION,$AMOVILIZACION,$ACAJA,$AFP,$MONTO_AFP)
    {
        $datos=array();
        $datos['Nombre']=$NOMBRES;
        $datos['Rut']=$RUT;
        $datos['FechaNacimiento']=$FECHANAC;
        $datos['Direccion']=$DIRECCION;
        $datos['Telefono']=$TELEFONOS;
        $datos['Cargo']=$CARGO;
       
        $datos['TipoContrato']=$TIPO_CON;
        $datos['FechaInicioContrato']=$FECHAINICON;
        $datos['FechaTerminoContrato']=$FECHATERMINOCON;
        $datos['Salario']=$REMUNERACION;
        $datos['Bonos']=$BONOS;
        
        $datos['Acaja']=$ACAJA;
        $datos['Amovilizacion']=$AMOVILIZACION;
        $datos['Acolacion']=$ACOLACION;
        
        $datos['NombreAfp']=$AFP;
        $datos['PorcentajeAfp']=$MONTO_AFP;
        $datos['Fonasa']=$MONTO_FONASA;
        $datos['NombreIsapre']=$NOMBRE_ISAPRE;
        $datos['MontoIsapre']=$MONTO_ISAPRE;
        $datos['DiasTrabajados']=$DIASTRABAJADOS;
      //  $datos['Cargas']=$CARGAS;
        //$NOMBRESCARGAS,$TIPOCARGA,$FECHAVENCIMIENTO,$TIPO_SALUD,$ANTICIPO,$DTRABAJADOS,$BONOS,$MONTO,$HEXTRAS,$HMONTO, );

        $this->db->where('Rut',$RUT);
        $this->db->update('trabajadores',$datos);

        $this->db->select('*');
        $this->db->where('Rut',$RUT);
        $query = $this->db->get('trabajadores');
        return $query->result();
    }
    function UFactual($UF,$fecha)
    {
        $datos=array();

        $datos['Fecha']=$fecha;
        $datos['Monto']=$UF;
        return $this->db->update('UF',$datos);
        /* Se debe Actualizar la UF ya sea en la BD o hacer los cálculos
         * nuevos que se requieran con este nuevo valor en la BD
         */
    }
    function Crear_Trabajador1($nombres,$rut,$digito,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos,$cargas)
    {
     /* faltan $tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre por que aun no se llenan las tablas de fonasa e isapres*/
        $datos=array();
        $datosA = array();
        $datosC = array();
        $datosV = array();
        $datosL = array();
        $datosP = array();
        $datosPR= array();
        
        $datos['Rut']=$rut;
        $datos['Digito']=$digito;
        $datos['Nombre']=$nombres;
        $datos['Telefono']=$telefono;
        $datos['FechaNacimiento']=$fecha1;
        $datos['Direccion']=$direccion;
        $datos['TipoContrato']=$tipo_con;
        $datos['Estado']=1;   // 1 = trabajando ; 0 = despedido
        $datos['Cargo']=$cargo;
        $datos['FechaInicioContrato']=$fecha2;
        $datos['FechaTerminoContrato']=$fecha3;
        $datos['Salario']=$remuneracion;
        $datos['NombreAfp']=$afp;
        $datos['Acaja']=$acaja;
        $datos['Amovilizacion']=$amovilizacion;
        $datos['Acolacion']=$acolacion;
        $datos['Afc']=$afc;
        $datos['Fonasa']=$monto_fonasa;
        $datos['NombreIsapre']=$nombre_isapre;
        $datos['MontoIsapre']=$monto_isapre;
        $datos['apvUf']=$apv_uf;
        $datos['apvPesos']=$apv_pesos;
        $datos['DiasTrabajados']=0;
        $datos['HorasExtras']= 0;
        $datos['Bonos']= 0;
        $datos['Cargas'] = $cargas;
        
        $datosPR['RutTrabajador'] = $rut;
        $datosPR['Institucion'] = '0';
        $datosPR['TipoPrestacion'] = '0';
        $datosPR['Monto'] = 0;
        $datosPR['Cuotas'] = 0;

        $datosP['RutTrabajador'] = $rut;
        $datosP['TotalDias'] = 0;
        $datosP['FechaInicio']= date("Ymd");
        $datosP['FechaTermino']= date("Ymd");
        $datosP['GoceSueldo']= '0';

        $datosL['RutTrabajador'] = $rut;
        $datosL['TotalDias'] = 0;
        $datosL['FechaInicio']= date("Ymd");
        $datosL['FechaTermino']= date("Ymd");

        $datosV['RutTrabajador'] = $rut;
        $datosV['FechaInicio'] = date("Ymd");
        $datosV['FechaTermino'] = date("Ymd");
        $datosV['TotalDias'] = 0;

        $datosA['RutTrabajador'] = $rut;
        $datosA['Fecha'] = date("Ymd");
        $datosA['Monto'] = 0;

        $this->db->insert('Anticipo',$datosA);
        $this->db->insert('Vacaciones',$datosV);
        $this->db->insert('Licencias',$datosV);
        $this->db->insert('Permisos',$datosP);
        $this->db->insert('Prestaciones',$datosPR);
        $this->db->insert('Trabajadores',$datos);
    }
    function Actualizar_Trabajador($nombre,$rut,$digito,$fecha1,$direccion,$telefono, $cargo, $tipocontrato,
        $fecha2,$fecha3,$dtrabajados,$remuneracion,$bonos,$monto,$hextra,$acaja,$amovil,$acolacion,
        $anticipo,$afp,$porcentajeafp,$afc,$salud,$montofonasa,$isapre,$montoisapre,$apvuf,$apvpesos,$cargas,
        $nombrecarga,$tipocarga,$fecha4,$rutcarga,$digitocarga,$fecha5,$fecha6, $totaldias,$dias1,$fecha7,
        $fecha8,$dias2,$fecha9,$fecha10,$gocesueldo,$institucion,$tipoprestacion,$montoprestacion,$cuotas)
    {
        $datosT = array();
        $datosA = array();
        $datosC = array();
        $datosV = array();
        $datosL = array();
        $datosP = array();
        $datosPR= array();

//Preguntar si es que el Rut en la tabla Prestaciones está vacio
        $datosPR['RutTrabajador'] = $rut;
        $datosPR['Institucion'] = $institucion;
        $datosPR['TipoPrestacion'] = $tipoprestacion;
        $datosPR['Monto'] = $montoprestacion;
        $datosPR['Cuotas'] = $cuotas;

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Prestaciones');
        if($query->num_rows() > 0 ){
            $this->db->where('RutTrabajador',$rut);
            $this->db->insert('Prestaciones',$datosPR);
        }
        else{
            $this->db->insert('Prestaciones',$datosPR);
        }
        
//Preguntar si es que el Rut en la tabla Permiso está vacio
        $datosP['RutTrabajador'] = $rut;
        $datosP['TotalDias'] = $dias2;
        $datosP['FechaInicio']= $fecha9;
        $datosP['FechaTermino']= $fecha10;
        $datosP['GoceSueldo']= $gocesueldo;

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Permisos');
        if($query->num_rows() > 0 ){
            $this->db->where('RutTrabajador',$rut);
            $this->db->update('Permisos',$datosP);
        }
        else{
            $this->db->insert('Permisos',$datosP);
        }
        
//Preguntar si es que el Rut en la tabla Licencias está vacio
        $datosL['RutTrabajador'] = $rut;
        $datosL['TotalDias'] = $dias1;
        $datosL['FechaInicio']= $fecha7;
        $datosL['FechaTermino']= $fecha8;

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Licencias');
        if($query->num_rows() > 0 ){
            $this->db->where('RutTrabajador',$rut);
            $this->db->update('Licencias',$datosL);
        }
        else{
            $this->db->insert('Licencias',$datosL);
        }
        
//Preguntar si es que el Rut en la tabla Vacaciones está vacio
        $datosV['RutTrabajador'] = $rut;
        $datosV['FechaInicio'] = $fecha5;
        $datosV['FechaTermino'] = $fecha6;
        $datosV['TotalDias'] = $totaldias;

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Vacaciones');
        if($query->num_rows() > 0 ){
            $this->db->where('RutTrabajador',$rut);
            $this->db->update('Vacaciones',$datosV);
        }
        else{
            $this->db->insert('Vacaciones',$datosV);
        }
        
//Preguntar si es que el Rut en la tabla Cargas está vacio
        $datosC['RutTrabajador']=$rut;
        $datosC['Nombres']= $nombrecarga;
        $datosC['Tipo'] = $tipocarga;
        $datosC['FechaVencimiento']=$fecha4;
        $datosC['Rut'] = $rutcarga;
        $datosC['Digito'] = $digitocarga;

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Cargas');
        if($query->num_rows() > 0 ){
            $this->db->where('RutTrabajador',$rut);
            $this->db->update('Cargas',$datosC);
        }
        else{
            $this->db->insert('Cargas',$datosC);
        }
       
//Preguntar si es que el Rut en la tabla Anticipo está vacio
        $datosA['RutTrabajador'] = $rut;
        $datosA['Fecha'] = date('Ymd');
        $datosA['Monto'] = $anticipo;

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Anticipo');
        if($query->num_rows() > 0 ){
            $this->db->where('RutTrabajador',$rut);
            $this->db->update('Anticipo',$datosA);
        }
        else{
            $this->db->insert('Anticipo',$datosA);
        }
        
        $datosT['Nombre']=$nombre;
        $datosT['Telefono']=$telefono;
        $datosT['FechaNacimiento']=$fecha1;
        $datosT['Direccion']=$direccion;
        $datosT['TipoContrato']=$tipocontrato;
        $datosT['Cargo']=$cargo;
        $datosT['FechaInicioContrato']=$fecha2;
        $datosT['FechaTerminoContrato']=$fecha3;
        $datosT['Salario']=$remuneracion;
        $datosT['NombreAfp']=$afp;
        $datosT['PorcentajeAfp']=$porcentajeafp;
        $datosT['Acaja']=$acaja;
        $datosT['Amovilizacion']=$amovil;
        $datosT['Acolacion']=$acolacion;
        $datosT['Afc']=$afc;
        $datosT['Fonasa']=$montofonasa;
        $datosT['NombreIsapre']=$isapre;
        $datosT['MontoIsapre']=$montoisapre;
        $datosT['apvUf']=$apvuf;
        $datosT['apvPesos']=$apvpesos;
        $datosT['DiasTrabajados']=$dtrabajados;
        $datosT['HorasExtras']=$hextra;
        $datosT['Bonos']=$monto;
        $datosT['Cargas']=$cargas;
        
        $this->db->where('Rut',$rut);
        $this->db->update('Trabajadores',$datosT);
    }
    function CrearCargas($rut,$nombreCarga,$tipoCarga,$fecha4,$rutCarga,$digitoCarga)
    {
       $datos=array();
       
       $datos['RutTrabajador']=$rut;
       $datos['Nombres']=$nombreCarga;
       $datos['Tipo']=$tipoCarga;
       $datos['FechaVencimiento']=$fecha4;
       $datos['Rut']=$rutCarga;
       $datos['Digito']=$digitoCarga;

       $this->db->insert('cargas',$datos);
    }
    function insertUTM($datos)
    {
       return $this->db->update('UTM',$datos);
    }
    function getFechaUtm($mes)
    {
        $this->db->select('Fecha');
        $this->db->where('MONTH(Fecha)',$mes);
        return $this->db->get('UTM');
    }
    function Modificar_Trabajador($rut)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('trabajadores');

        if($query->num_rows() > 0 )
            return $query->result();
        else
            show_error('La Base de Datos está Vacia');
    }
    function Modificar2_Trabajador($rut)
    {
       $datos=array();
        $datos['Estado']=1;
        $this->db->where('Rut',$rut);
        $this->db->update('trabajadores',$datos);
    }
    function Cargar_Anticipo($rut)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Anticipo');

        return $query->result();
    }
    function Cargar_Permisos($rut)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Permisos');

        return $query->result();

    }
    function Cargar_Licencias($rut)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Licencias');

        return $query->result();
    }
    function Cargar_Vacaciones($rut)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Vacaciones');

        return $query->result();
    }
    function Cargar_Prestaciones($rut)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Prestaciones');

        return $query->result();
    }
    function Modificar_cargas($rut)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Cargas');

        if($query->num_rows() > 0 )
            return $query->result();
        else
            show_error('La Base de Datos está Vacia');
    }
    function DigitoVerificador($r)
    {
            $s = 1;
            for($m=0;$r!=0;$r/=10)
                $s = ($s+$r%10*(9-$m++%6))%11;
        return chr($s?$s+47:75);
    }
    function BuscaRut($rut)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('Usuarios');
        if($query->num_rows() > 0 )
            return 0; // si existe el rut en la base de datos
        else
            return 1; //no existe el rut en la base de datos
    }
    function BuscaRutsup($rut,$digito,$password)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        echo $password;
        $this->db->where('Digito',$digito);
        $this->db->where('password',$password);
        $this->db->where('Permiso',1);
        $query = $this->db->get('Usuarios');
        if($query->num_rows() > 0 )
            return 0; // si existe el rut en la base de datos
        else
            return 1; //no existe el rut en la base de datos
    }
     function buscarutcarga($rut,$digito)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $this->db->where('Digito',$digito);
        $query = $this->db->get('Cargas');
        if($query->num_rows() > 0 )
            return 0; // si existe el rut en la base de datos
        else
            return 1; //no existe el rut en la base de datos
    }
    function BuscaRutTrabajador($rut)
    {
        $this->db->select('*');
      //  $this->db->where('Digito',$digito);
        $this->db->where('Rut',$rut);
        $query = $this->db->get('Trabajadores');
        if($query->num_rows() > 0 )
            return 0; // si existe el rut en la base de datos
        else
            return 1; //no existe el rut en la base de datos
    }
    function BuscaestadoTrabajador($rut)
    {
        $this->db->select('*');
      //  $this->db->where('Digito',$digito);
        $this->db->where('Estado',0);
        $query = $this->db->get('Trabajadores');
        if($query->num_rows() > 0 )
            return 0; // si existe estado en la base de datos
        else
            return 1; //no existe estado en la base de datos
    }
    function cambia_meses($mes)
    {
        switch ($mes){
            case 'Enero':
                return (01);
                break;
            case 'Febrero':
                return (02);
                break;
             case 'Marzo':
                return (03);
                break;
            case 'Abril':
                return (04);
                break;
             case 'Mayo':
                return (05);
                break;
            case 'Junio':
                return (06);
                break;
             case 'Julio':
                return (07);
                break;
            case 'Agosto':
                return (08);
                break;
             case 'Septiembre':
                return (09);
                break;
            case 'Octubre':
                return (10);
                break;
             case 'Noviembre':
                return (11);
                break;
            case 'Diciembre':
                return (12);
                break;
        }
    }
    function cambia_meses2($mes)
    {
        switch ($mes){
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
             case 3:
                return 'Marzo';
                break;
            case 4:
                return 'Abril';
                break;
             case 5:
                return 'Mayo';
                break;
            case 6:
                return 'Junio';
                break;
            case 7:
                return 'Julio';
                break;
            case 8:
                return 'Agosto';
                break;
             case 9:
                return 'Septiembre';
                break;
            case 10:
                return 'Octubre';
                break;
             case 11:
                return 'Noviembre';
                break;
            case 12:
                return 'Diciembre';
                break;
        }
    }
    function Modificar_supervisor($rut,$digito)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $this->db->where('Digito',$digito);
        $query = $this->db->get('usuarios');
        
        if($query->num_rows() > 0 )
            return $query->result();
        else
            show_error('La Base de Datos está Vacia');
    }
    function Actualiza_supervisor($rut,$nombre,$digito,$login,$password)
    {
        $datos=array();
        $datos['Permiso']=1;
        $datos['Digito']=$digito;
        $datos['Nombre']=$nombre;
        $datos['login']=$login;
        $datos['password']=md5($password);
        $this->db->where('Rut',$rut);
        $this->db->update('usuarios',$datos);
    }
    function getUF($mes)
    {
        $this->db->select('*');
        $this->db->where('YEAR(Fecha)',$mes);
        $this->db->order_by("Fecha", "desc");
        return $this->db->get('UF');

    }
    function getUF2($mes)
    {
        $this->db->select('*');
        $this->db->where('Fecha',$mes);
        $this->db->order_by("Fecha", "desc");
        return $this->db->get('UF');

    }
    function getUTM($ano)
    {
        $this->db->select('*');
        $this->db->where('YEAR(Fecha)',$ano);
        $this->db->order_by("Fecha", "desc");
        return $this->db->get('UTM');
     }
    function Muestrarutliquidacion()
    {
        $this->db->select('Rut');
        $this->db->select('Digito');
        $this->db->select('Nombre');
        $this->db->select('Estado');
        $query = $this->db->get('trabajadores');
        return $query->result();
    }
    function NumTrabajadores()
    {
        $this->db->select('*');
        $query = $this->db->get('trabajadores');
        return $query->num_rows();
    }
    function NumVacaciones($rut)
    {
        $num =0;
        $this->db->select('*');
        $where = "RutTrabajador = $rut AND TotalDias > $num";
        $this->db->where($where);
        $query = $this->db->get('Vacaciones');
        return $query->num_rows();
    }
    function NumLicencias($rut)
    {
        $num =0;
        $this->db->select('*');
        $where = "RutTrabajador = $rut AND TotalDias > $num";
        $this->db->where($where);
        $query = $this->db->get('Licencias');
        return $query->num_rows();
    }
    function NumPermisos($rut)
    {
        $num =0;
        $this->db->select('*');
        $where = "RutTrabajador = $rut AND TotalDias > $num";
        $this->db->where($where);
        $query = $this->db->get('Permisos');
        return $query->num_rows();
    }
    function NumPrestaciones($rut)
    {
        $num =0;
        $this->db->select('*');
        $where = "RutTrabajador = $rut AND Monto > $num";
        $this->db->where($where);
        $query = $this->db->get('Prestaciones');
        return $query->num_rows();
    }

        function recibeAfp()
    {
        $this->db->select('*');
        //$this->db->where('IdAfp',$i);
        $query = $this->db->get('Afp');
        return $query->result();
    }

         function GuardaAfp($afp,$monto)
    {
        $datos=array();
        $datos['PorcentajeAfp']=$monto;

        $this->db->where('NombreAfp',$afp);
        $this->db->update('Afp',$datos);
    }
}
