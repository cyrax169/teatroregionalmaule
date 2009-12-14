<?php
class liquidacion_model extends Model
{
    function  liquidacion_model()
    {
        parent::Model();
    }
    function BuscaRut($rut)
    {
        $this->db->select('Rut');
        $this->db->where('Rut',$rut);
        return $this->db->get('Trabajadores');
    }
    function Cargar_Trabajadores($rut)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        $query = $this->db->get('Trabajadores');

        return $query->result();
    }
    function Cargar_Anticipos($rut,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Anticipo');

        return $query->result();
    }
    /*function IUT($Suelo)
    {
        $this->db->select()
    }*/
    function Cargar_Permisos($rut,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Permisos');

        return $query->result();

    }
    function Cargar_Licencias($rut,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Licencias');

        return $query->result();
    }
    function Cargar_Vacaciones($rut,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Vacaciones');

        return $query->result();
    }
    function Cargar_Prestaciones($rut,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $query = $this->db->get('Prestaciones');

        return $query->result();
    }
}

?>
