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

        $this->db->insert('trm',$datos);
    }
    function DatosEmpresa1($rsocial,$rut,$digito,$direccion,$cajasi,$apatronal,$monto)
    {
        $datos=array();
        $datos['Rut']=$rut;
        $datos['Digito']=$digito;
        $datos['RazonSocial']=$rsocial;
        $datos['Direccion']=$direccion;
        $datos['CajaCompensacion']=$cajasi;
        $datos['MontoAporte']=$monto;
        $datos['AportePatronal']=$apatronal;
        $this->db->select('*');
        $this->db->update('trm', $datos);
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
            show_error('La Base de Datos está Vacia');
    }

    function EliminarTrabajador($rut, $digito)
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
        $this->db->insert('UF',$datos);
        /* Se debe Actualizar la UF ya sea en la BD o hacer los cálculos
         * nuevos que se requieran con este nuevo valor en la BD
         */
    }
    function Crear_Trabajador1($nombres,$rut,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$monto_afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos,$cargas)
    {
     /* faltan $tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre por que aun no se llenan las tablas de fonasa e isapres*/
        $datos=array();
        
        $datos['Rut']=$rut;
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
        $datos['PorcentajeAfp']=$monto_afp;
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
        
        $this->db->insert('Trabajadores',$datos);
        
    }
    function Actualizar_Trabajador($nombre,$rut,$digito,$fecha1,$direccion,$telefono, $cargo, $tipocontrato,$fecha2,$fecha3,$dtrabajados,$remuneracion,$bonos,$montobono,$hextra,$hmonto,$acaja,$amovil,$acolacion,$anticipo,$afp,$salud,$montofonasa,$isapre,$montoisapre,$apvuf,$apvpesos,$cargas,$nombrecarga,$tipocarga,$fecha4,$rutcarga,$digitocarga,$fecha5,$fecha6, $totaldias,$dias1,$fecha7,$fecha8,$dias2,$fecha9,$fecha10,$gocesueldo,$institucion,$tipoprestacion,$montoprestacion)
    {
        echo "Falta Implementar <a href=http://www.terra.cl> Terra</a>";
        /*$datos =  array();

        $datos['Rut']=$rut;
        $datos['Nombre']=$nombre;
        $datos['Telefono']=$telefono;
        $datos['FechaNacimiento']=$fecha1;
        $datos['Direccion']=$direccion;
        $datos['TipoContrato']=$tipocontrato;
        $datos['Estado']=1;   // 1 = trabajando ; 0 = despedido
        $datos['Cargo']=$cargo;
        $datos['FechaInicioContrato']=$fecha2;
        $datos['FechaTerminoContrato']=$fecha3;
        $datos['Salario']=$remuneracion;
        $datos['NombreAfp']=$afp;
        $datos['PorcentajeAfp']=$monto_afp;
        $datos['Acaja']=$acaja;
        $datos['Amovilizacion']=$amovil;
        $datos['Acolacion']=$acolacion;
        $datos['Afc']=$afc;
        $datos['Fonasa']=$montofonasa;
        $datos['NombreIsapre']=$isapre;
        $datos['MontoIsapre']=$montoisapre;
        $datos['apvUf']=$apvuf;
        $datos['apvPesos']=$apvpesos;
        $datos['DiasTrabajados']=$dtrabajados;
        $datos['HorasExtras']= $hextra;
        $datos['Bonos']= $montobono;
        $datos['Cargas'] = $cargas;*/
    }
    function CrearCargas($rut,$nombreCarga,$tipoCarga,$fecha4,$rutCarga){
       $datos=array();
       
       $datos['RutTrabajador']=$rut;
       $datos['Nombres']=$nombreCarga;
       $datos['Tipo']=$tipoCarga;
       $datos['FechaVencimiento']=$fecha4;
       $datos['Rut']=$rutCarga;

       $this->db->insert('cargas',$datos);
    }
    function Modificar_Trabajador($rut, $digito)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('trabajadores');

        if($query->num_rows() > 0 )
            return $query->result();
        else
            show_error('La Base de Datos está Vacia');
    }

      function Modificar_cargas($rut, $digito)
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

    function BuscaRutTrabajador($rut)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('Trabajadores');
        if($query->num_rows() > 0 )
            return 0; // si existe el rut en la base de datos
        else
            return 1; //no existe el rut en la base de datos
    }



}
