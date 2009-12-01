<?php
class varios_model extends Model
{
    function  varios_model()
    {
        parent::Model();
    }

    function getDatos()
    {
        $this->db->select('*');
        return $this->db->get('usuarios');
    }
    function getDatosName($nombre)
    {
        $this->db->select('*');
        $this->db->where('Nombre',$nombre);
        return $this->db->get('usuarios');
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
    function DatosEmpresa($rsocial,$rut,$direccion,$caja,$cajasi,$apatronal,$monto)
    {
        $datos=array();
        $datos['Rut']=$rut;
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
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $this->db->delete('usuarios');

        if($query->num_rows() > 0 )
            return $query->result();
        else
            show_error('La Base de Datos está Vacia');
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

      function Actualiza_trabajador($NOMBRES,$RUT,$DIRECCION,$TELEFONOS,$CARGO)
    {
        $datos=array();
        $datos['Nombre']=$NOMBRES;
        $datos['Rut']=$RUT;
       // $datos['FechaNacimiento']=$FECHANAC;
        $datos['Direccion']=$DIRECCION;
        $datos['Telefono']=$TELEFONOS;
        $datos['Cargo']=$CARGO;
        //$datos['TipoContrato']=$TIPO_CON;
        //$datos['FechaInicioContrato']=$FECHAINICON;
       // $datos['FechaTerminoContrato']=$FECHATERMINOCON;
       // $datos['Salario']=$REMUNERACION;
        
     //   $datos['Acaja']=$ACAJA;
        //$datos['Amovilizacion']=$AMOVILIZACION;
        //$datos['Acolacion']=$ACOLACION;
        
     //   $datos['NombreAfp']=$AFP;
     //   $datos['PorcentajeAfp']=$MONTO_AFP;
       
      //  $datos['Cargas']=$CARGAS;
        //$NOMBRESCARGAS,$TIPOCARGA,$FECHAVENCIMIENTO,$TIPO_SALUD,$ANTICIPO,$DTRABAJADOS,$BONOS,$MONTO,$HEXTRAS,$HMONTO, );

        $this->db->where('Rut',$RUT);
        $this->db->update('trabajadores',$datos);

        $this->db->select('*');
        $this->db->where('Rut',$RUT);
        $query = $this->db->get('trabajadores');
        return $query->result();
    }
    function UFactual($UF)
    {
        /*Se debe Actualizar la UF ya sea en la BD o hacer los cálculos
         * nuevos que se requieran con este nuevo valor en la BD
         */
    }
    function Crear_Trabajador1($nombres,$rut,$fecha1,$direccion,$telefono,$cargo,$tipo_con,$fecha2,$fecha3,$remuneracion,$acaja,$amovilizacion,$acolacion,$afp,$monto_afp,$afc,$tipo_salud,$monto_fonasa,$nombre_isapre,$monto_isapre,$apv_uf,$apv_pesos)
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
        /*$datos['']=$tipo_salud;
        $datos['']=$monto_fonasa;
        $datos['']=$nombre_isapre;
        $datos['']=$monto_isapre;*/
        $datos['apvUf']=$apv_uf;
        $datos['apvPesos']=$apv_pesos;
        
        $this->db->insert('Trabajadores',$datos);
        
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


   function cambia_meses($mes){
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

}