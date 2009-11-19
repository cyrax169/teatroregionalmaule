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
}