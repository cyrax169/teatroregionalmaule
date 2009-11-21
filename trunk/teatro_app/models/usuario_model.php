<?php
class usuario_model extends Model
{
    function  usuario_model()
    {
        parent::Model();
    }
    function loginUser($login,$pass)
    {
        $this->db->select('Permiso');
        $this->db->where('login',$login);
        $this->db->where('password',md5($pass));
        return $this->db->get('usuarios');
    }
}

?>
