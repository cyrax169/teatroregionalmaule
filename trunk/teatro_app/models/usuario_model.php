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
    function UFactual($UF)
    {
        /*Se debe Actualizar la UF ya sea en la BD o hacer los cálculos
         * nuevos que se requieran con este nuevo valor en la BD
         */
    }
}

?>
