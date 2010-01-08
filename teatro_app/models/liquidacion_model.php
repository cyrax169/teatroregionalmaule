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
    function CantTrabajadores()
    {
        $this->db->select('*');
        $this->db->where('Estado',1);
        $query = $this->db->get('Trabajadores');
        return $query->num_rows();
    }
    function RutTrabajador()
    {
        $this->db->select('Rut');
        $this->db->where('Estado',1);
        //$query = $this->db->get('Trabajadores');
        $query = $this->db->get('Trabajadores');

        return $query->result();
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
    function Cargar_Aux($rut,$mes,$anio)
    {
        $this->db->select('Aux');
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $query = $this->db->get('Liquidacion');

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
    function Cargar_Tramos()
    {
        $this->db->select('*');
        $query = $this->db->get('Tramos');

        return $query->result();
    }
    function DescuentaCuotas($rut,$Id,$CuotasPagadas)
    {
        $datos=array();
        $CuotasPagadas = $CuotasPagadas+1;
        $datos['CuotasPagadas ']=$CuotasPagadas;
        $this->db->where('RutTrabajador',$rut);
        //$this->db->where('Id',$Id);
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

    function GuardaLiquidacion($rut,$Digito,$mes1,$mes,$anio,$Nombre,$dias,$var2,$HorasExtras,
        $var1,$var3,$Cargas,$MontoCargas,$Amovilizacion,
        $Acolacion,$Acaja,$TipoContrato,$Cargo,$FechaPago,$var7,$NombreAfp,$apvPesos,$Afc,$Salud,
        $NombreSalud,$Iut,$prestaciones,$ahorro,$anticipos,$TotalImponible,$NoImponible,$Haberes,
        $Liquido,$descuentos,$LiquidoPalabras){
        $datos=array();
        $datos['RutTrabajador']=$rut;
        $datos['Digito']=$Digito;
        $datos['MesPalabras']=$mes1;
        $datos['Mes']=$mes;
        $datos['Anio']=$anio;
        $datos['Nombre']=$Nombre;
        $datos['NombreAfp']=$NombreAfp;
        $datos['CantDias']=$dias;
        $datos['DiasTrabajados']=$var2;
        $datos['CantHoras']=$HorasExtras;
        $datos['HorasExtras']=$var1;
        $datos['Bono']=$var3;
        $datos['Cargas']=$Cargas;
        $datos['MontoCargas']=$MontoCargas;
        $datos['AMovilizacion']=$Amovilizacion;
        $datos['Acolacion']=$Acolacion;
        $datos['Acaja']=$Acaja;
        $datos['TipoContrato']=$TipoContrato;
        $datos['Cargo']=$Cargo;
        $datos['FechaPago']=$FechaPago;
        $datos['AFP']=$var7;
        $datos['NombreSalud']=$NombreSalud;
        $datos['APV']=$apvPesos;
        $datos['AFC']=$Afc;
        $datos['Salud']=$Salud;
        $datos['IUT']=$Iut;
        $datos['Creditos']=$prestaciones;
        $datos['Ahorro']=$ahorro;
        $datos['Anticipo']=$anticipos;
        $datos['TotalImponible']=$TotalImponible;
        $datos['TotalNoImponible']=$NoImponible;
        $datos['TotalHaberes']=$Haberes;
        $datos['TotalLiquido']=$Liquido;
        $datos['TotalDescuentos']=$descuentos;
        $datos['LiquidoPalabras']=$LiquidoPalabras;
        $datos['Aux']=1;

        $this->db->insert('Liquidacion',$datos);
    }
    function ActualizaLiquidacion($rut,$Digito,$mes1,$mes,$anio,$Nombre,$dias,$var2,$HorasExtras,
        $var1,$var3,$Cargas,$MontoCargas,$Amovilizacion,
        $Acolacion,$Acaja,$TipoContrato,$Cargo,$FechaPago,$var7,$NombreAfp,$apvPesos,$Afc,$Salud,
        $NombreSalud,$Iut,$prestaciones,$ahorro,$anticipos,$TotalImponible,$NoImponible,$Haberes,
        $Liquido,$descuentos,$LiquidoPalabras){
        $datos=array();
        //$datos['RutTrabajador']=$rut;
        $datos['Digito']=$Digito;
        $datos['MesPalabras']=$mes1;
        //$datos['Mes']=$mes;
        //$datos['Anio']=$anio;
        $datos['Nombre']=$Nombre;
        $datos['NombreAfp']=$NombreAfp;
        $datos['CantDias']=$dias;
        $datos['DiasTrabajados']=$var2;
        $datos['CantHoras']=$HorasExtras;
        $datos['HorasExtras']=$var1;
        $datos['Bono']=$var3;
        $datos['Cargas']=$Cargas;
        $datos['MontoCargas']=$MontoCargas;
        $datos['AMovilizacion']=$Amovilizacion;
        $datos['Acolacion']=$Acolacion;
        $datos['Acaja']=$Acaja;
        $datos['TipoContrato']=$TipoContrato;
        $datos['Cargo']=$Cargo;
        $datos['FechaPago']=$FechaPago;
        $datos['AFP']=$var7;
        $datos['NombreSalud']=$NombreSalud;
        $datos['APV']=$apvPesos;
        $datos['AFC']=$Afc;
        $datos['Salud']=$Salud;
        $datos['IUT']=$Iut;
        $datos['Creditos']=$prestaciones;
        $datos['Ahorro']=$ahorro;
        $datos['Anticipo']=$anticipos;
        $datos['TotalImponible']=$TotalImponible;
        $datos['TotalNoImponible']=$NoImponible;
        $datos['TotalHaberes']=$Haberes;
        $datos['TotalLiquido']=$Liquido;
        $datos['TotalDescuentos']=$descuentos;
        $datos['LiquidoPalabras']=$LiquidoPalabras;
        
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $this->db->update('Liquidacion',$datos);
    }
    function SacaLiquidacion($rut,$mes, $anio){

        $this->db->select('*');
        $this->db->where('RutTrabajador',$rut);
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $query = $this->db->get('Liquidacion');
        
        return $query->result();  
    }
    function SacaTodasLiquidacion($mes,$anio)
    {
        $this->db->select('*');
        $this->db->where('anio',$anio);
        $this->db->where('mes',$mes);
        return $this->db->get('Liquidacion')->result();
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
