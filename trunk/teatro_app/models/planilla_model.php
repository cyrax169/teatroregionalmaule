<?php
class planilla_model extends Model
{
    function  planilla_model()
    {
 
        parent::Model();
    }
    function BuscaRut($rut)
    {
        $this->db->select('Rut');
        $this->db->where('Rut',$rut);
        return $this->db->get('Trabajadores');
    }
    function Cargar_Trabajadores()
    {
        $this->db->select('*');
        $query = $this->db->get('Trabajadores');

        return $query->result();
    }
    function Cargar_Anticipos($mes,$anio)
    {
        $this->db->select('Monto');
        $this->db->where('MONTH(Fecha)',$mes);
        $this->db->where('YEAR(Fecha)',$anio);
        $query = $this->db->get('Anticipo');

        return $query->result();
    }
    function Cargar_Permisos($mes,$anio)
    {
        $this->db->select('*');
        //$this->db->where('MONTH(FechaInicio)',$mes);
        //$this->db->where('YEAR(FechaInicio)',$anio);
        $query = $this->db->get('Permisos');
        return $query->result();
    }
    function Cargar_Licencias($fecha)
    {
        $this->db->select('*');
        $query = $this->db->get('Licencias');

        return $query->result();
    }
    function Cargar_Vacaciones($fecha)
    {
        $this->db->select('*');
        $query = $this->db->get('Vacaciones');

        return $query->result();
    }
    function Cargar_Prestaciones($fecha)
    {
        $this->db->select('*');
        $query = $this->db->get('Prestaciones');

        return $query->result();
    }
    function Cargar_IUT()
    {
        $this->db->select('*');
        $query = $this->db->get('IUT');

        return $query->result();
    }
    function Cargar_Tramos()
    {
        $this->db->select('*');
        $query = $this->db->get('Tramos');

        return $query->result();
    }
    function DescuentaCuotas($rut,$Id,$CuotasPagadas)
    {
        $datos=array();
        $datos['CuotasPagadas ']=$CuotasPagadas+1;
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('Id',$Id);
        $this->db->update('Prestaciones',$datos);
        
    }
    function Cargar_UF($mes,$anio)
    {
        $this->db->select('Monto');
        $this->db->where('MONTH(Fecha)',$mes);
        $this->db->where('YEAR(Fecha)',$anio);
        $query = $this->db->get('UF');

        return $query->result();
    }
    function Cargar_Afp()
    {
        $this->db->select('*');
        $query = $this->db->get('Afp');

        return $query->result();
    }


    function getMonthDays($Month, $Year)
    {
       if( is_callable("cal_days_in_month"))
       return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
       else
          return date("d",mktime(0,0,0,$Month+1,0,$Year));
    }

    function guardaplanilla($mes,$anio,$nombre,$rut,$remuneracion,$dias,$horas,$var3,$TotalImponible,$var4,$Cargas,$MontoCargas,$Haberes,$nombreafp,$montoafp,$Afc,$isapreadicional,$fonasa,$losandes,$apv,$descuentos,$baseimpuesto,$ipmuni,$prestaciones,$anticipos,$totaladicional,$Liquido,$AfcEmp,$AfcEmp1,$TopeAfc,$aporte)
    {
        $datos=array();
        $datos['Mes']=$mes;
        $datos['anio']=$anio;
        $datos['Nombre']=$nombre;
        $datos['Rut']=$rut;
        $datos['Digito']=0;
        $datos['RentaBruta']=$remuneracion;
        $datos['DiasTrabajados']=$dias;
        $datos['HorasExtras']=$horas;
        $datos['OtrosBonos']=$var3;
        $datos['RentaImponible']=$TotalImponible;
        $datos['AcajaOtro']=$var4;
        $datos['NumCargas']=$Cargas;
        $datos['AsignacionFamiliar']=$MontoCargas;
        $datos['TotalHaberes']=$Haberes;
        $datos['NombreAfp']=$nombreafp;
        $datos['MontoAfp']=$montoafp;
        $datos['Afc']=$Afc;
        $datos['IsapreAdicional']=$isapreadicional;
        $datos['Fonasa']=$fonasa;
        $datos['LosAndes']=$losandes;
        $datos['Apv']=$apv;
        $datos['TotalDescuentosLegales']=$descuentos;
        $datos['BaseImpuesto']=$baseimpuesto;
        $datos['IpmUni']=$ipmuni;
        $datos['RentaImponible']=$TotalImponible;
        $datos['Prestamos']=$prestaciones;
        $datos['AnticiposOtros']=$anticipos;
        $datos['TotalDescuentosAdicionaes']=$totaladicional;
        $datos['TotalLiquido']=$Liquido;
       $datos['Afctrabajador']=$AfcEmp;
        $datos['Afctrabajador1']=$AfcEmp1;
        $datos['Aporte']=$aporte;
        $this->db->insert('planilla',$datos);
    }

function Cargar_planilla($mes,$anio){

        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        $query = $this->db->get('planilla');

        return $query->result();

    }
    function SacaLiquidacion($rut,$mes, $anio){

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $query = $this->db->get('Liquidacion');
        
        return $query->result();
        
    }
    function existeliquidacion($rut,$mes,$anio){

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $query = $this->db->get('Liquidacion');

        if ($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }















}

?>
