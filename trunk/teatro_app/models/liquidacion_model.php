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
    function Cargar_Anticipos($rut,$mes,$anio)
    {
        $this->db->select('Monto');
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('MONTH(Fecha)',$mes);
        $this->db->where('YEAR(Fecha)',$anio);
        $query = $this->db->get('Anticipo');

        return $query->result();
    }
    function Cargar_Permisos($rut,$mes,$anio)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        //$this->db->where('MONTH(FechaInicio)',$mes);
        //$this->db->where('YEAR(FechaInicio)',$anio);
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
    function Cargar_IUT()
    {
        $this->db->select('*');
        $query = $this->db->get('IUT');

        return $query->result();
    }
    function getMonthDays($Month, $Year)
    {
       if( is_callable("cal_days_in_month"))
       return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
       else
          return date("d",mktime(0,0,0,$Month+1,0,$Year));
    }
}

?>
