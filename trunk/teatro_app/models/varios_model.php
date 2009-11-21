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
    }
    function DatosEmpresa($rsocial,$rut,$direccion,$caja,$cajasi,$apatronal,$monto)
    {
        $datos=array();
        $datos['Rut']=$rut;
        $datos['RazonSocial']=$rsocial;
        $datos['Direccion']=$direccion;
        if($caja=='SI')
        {
            $datos['CajaCompensacion']=$cajasi;
        }
        else
            $datos['CajaCompensacion']='NO';
        $datos['MontoAporte']=$monto;
        $datos['AportePatronal']=$apatronal;

        $this->db->insert('trm',$datos);
    }
}