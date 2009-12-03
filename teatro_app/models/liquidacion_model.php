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
    function BuscaTra($rut)
    {
        $this->db->select('*');
        $this->db->where('Rut',$rut);
        return $this->db->get('Trabajadores');
    }
    function BuscaLiqui($rut,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('fecha',$fecha);
        $this->db->get('liquidacion');
    }
    function GuardaLiqui($datos,$fecha)
    {
        echo $datos->row('Rut');
        echo $datos->row('Nombre');
        //$imponible = $datos->row('DiasTrabajados') + //FAAAAAAAAAAALTA XDDDDDD!!!
        //$data = array(
            //aki van los cálculos xD!
      //  );
        
    }
}

?>
