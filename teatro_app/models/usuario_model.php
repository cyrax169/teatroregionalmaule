<?php
class usuario_model extends Model
{
    function  usuario_model()
    {
        parent::Model();
    }
    function loginUser($nombre,$pass)
    {
        $this->db->select('*');
        $this->db->where('Nombre',$nombre);
        $this->db->where('password',md5($pass));
        return $this->db->get('usuarios');
    }
}

?>
