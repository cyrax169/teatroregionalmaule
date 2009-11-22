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
    function UFactual($UF)
    {
        /*Se debe Actualizar la UF ya sea en la BD o hacer los cálculos
         * nuevos que se requieran con este nuevo valor en la BD
         */
    }
}