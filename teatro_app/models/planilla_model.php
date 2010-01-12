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
    function Cargar_Trabajadores($Ruttrab)
    {
        $this->db->select('*');
        $this->db->where('Rut',$Ruttrab);
        $query = $this->db->get('Trabajadores');

        return $query->result();
    }
    function Cargar_Anticipos($Ruttrab,$mes,$anio)
    {
        $this->db->select('Monto');
        $this->db->where('RutTrabajador',$Ruttrab);
        $this->db->where('MONTH(Fecha)',$mes);
        $this->db->where('YEAR(Fecha)',$anio);
        $query = $this->db->get('anticipo');
        
        return $query->result();
    }
    function Cargar_Permisos($Ruttrab,$mes,$anio)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$Ruttrab);
        //$this->db->where('MONTH(FechaInicio)',$mes);
        //$this->db->where('YEAR(FechaInicio)',$anio);
        $query = $this->db->get('Permisos');
        return $query->result();
    }
    function Cargar_Licencias($Ruttrab,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$Ruttrab);
        $query = $this->db->get('Licencias');

        return $query->result();
    }
    function Cargar_Prestaciones($Ruttrab,$fecha)
    {
        $this->db->select('*');
        $this->db->where('RutTrabajador',$Ruttrab);
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

    function guardaplanilla($digito,$montoisapre,$nombreisapre,$mes,$anio,$nombre,$rut,$remuneracion,$dias,$horas,$var3,$TotalImponible,$var4,$Cargas,$MontoCargas,$Haberes,$nombreafp,$var7,$Afc,$isapreadicional,$fonasa,$losandes,$apv,$descuentos,$baseimpuesto,$ipmuni,$prestaciones,$anticipos,$totaladicional,$Liquido,$AfcEmp,$AfcEmp1,$TopeAfc,$aporte)
    {
        $datos=array();
        $datos['Mes']=$mes;
        $datos['anio']=$anio;
        $datos['Nombre']=$nombre;
        $datos['Rut']=$rut;
        $datos['Digito']=$digito;
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
        $datos['MontoAfp']=$var7;
        $datos['Afc']=$Afc;
        $datos['IsapreAdicional']=$isapreadicional;
        $datos['NombreIsapre']=$nombreisapre;
      // echo $TAfcEmp1;
        $datos['MontoIsapre']=$montoisapre;
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
    function Cargar_totales($mes,$anio,$montohabitat,$montoprovida,$montocuprum,$montoplanvital,$montocapital,$Tmontoisapre,$Tnombreisapre,$Tremuneracion,$Tdias,$Thoras,$Tvar3,$TTotalImponible,$Tvar4,$TCargas,$TMontoCargas,$THaberes,$Tnombreafp,$Tvar7,$TAfc,$Tisapreadicional,$Tfonasa,$Tlosandes,$Tapv,$Tdescuentos,$Tbaseimpuesto,$Tipmuni,$Tprestaciones,$Tanticipos,$Ttotaladicional,$TLiquido,$TAfcEmp,$TAfcEmp1,$Taporte)
    {
        $datos=array();
        $datos['Mes']=$mes;
        $datos['anio']=$anio;
        $datos['TRentaBruta']=$Tremuneracion;
        $datos['TDiasTrabajados']=$Tdias;
        $datos['THorasExtras']=$Thoras;
        $datos['TOtrosBonos']=$Tvar3;
        $datos['TRentaImponible']=$TTotalImponible;
        $datos['TAcajaOtro']=$Tvar4;
        $datos['TNumCargas']=$TCargas;
        $datos['TAsignacionFamiliar']=$TMontoCargas;
        $datos['TTotalHaberes']=$THaberes;
        $datos['TNombreAfp']=$Tnombreafp;
        $datos['TMontoAfp']=$Tvar7;
        $datos['TAfc']=$TAfc;
        $datos['TIsapreAdicional']=$Tisapreadicional;
        $datos['TNombreIsapre']=$Tnombreisapre;
        $datos['TMontoIsapre']=$Tmontoisapre;
        $datos['TFonasa']=$Tfonasa;
        $datos['TLosAndes']=$Tlosandes;
        $datos['TApv']=$Tapv;
        $datos['TTotalDescuentosLegales']=$Tdescuentos;
        $datos['TBaseImpuesto']=$Tbaseimpuesto;
        $datos['TIpmUni']=$Tipmuni;
        $datos['TPrestamos']=$Tprestaciones;
        $datos['TAnticiposOtros']=$Tanticipos;
        $datos['TTotalDescuentosAdicionaes']=$Ttotaladicional;
        $datos['TTotalLiquido']=$TLiquido;
        $datos['TAfctrabajador']=$TAfcEmp;
        $datos['TAfctrabajador1']=$TAfcEmp1;
        $datos['TAporte']=$Taporte;
        $datos['MontoCuprum']=$montocuprum;
        $datos['MontoCapital']=$montocapital;
        $datos['MontoPlanVital']=$montoplanvital;
        $datos['MontoHabitat']=$montohabitat;
        $datos['MontoProvida']=$montoprovida;
        $this->db->insert('totales',$datos);
}
function Cargar_planilla($mes,$anio){

        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        $this->db->order_by("Nombre","asc");
        $query = $this->db->get('planilla');

        return $query->result();

    }
    function totalesplan($mes,$anio){

        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        $query = $this->db->get('totales');

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
    function existePlanilla($mes,$anio){

        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $query = $this->db->get('planilla');

        if ($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }
    function existeTotales($mes,$anio){

        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('Anio',$anio);
        $query = $this->db->get('totales');

        if ($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }
 function updateplanilla($digito,$montoisapre,$nombreisapre,$mes,$anio,$nombre,$rut,$remuneracion,$dias,$horas,$var3,$TotalImponible,$var4,$Cargas,$MontoCargas,$Haberes,$nombreafp,$var7,$Afc,$isapreadicional,$fonasa,$losandes,$apv,$descuentos,$baseimpuesto,$ipmuni,$prestaciones,$anticipos,$totaladicional,$Liquido,$AfcEmp,$AfcEmp1,$TopeAfc,$aporte)
    {
        $datos=array();
        $datos['Mes']=$mes;
        $datos['anio']=$anio;
        $datos['Nombre']=$nombre;
        $datos['Rut']=$rut;
        $datos['Digito']=$digito;
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
        $datos['MontoAfp']=$var7;
        $datos['Afc']=$Afc;
        $datos['IsapreAdicional']=$isapreadicional;
        $datos['NombreIsapre']=$nombreisapre;
      // echo $TAfcEmp1;
        $datos['MontoIsapre']=$montoisapre;
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
        $this->db->where('Rut',$rut);
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        $this->db->update('planilla',$datos);

    }
     function updatetotales($mes,$anio,$montohabitat,$montoprovida,$montocuprum,$montoplanvital,$montocapital,$Tmontoisapre,$Tnombreisapre,$Tremuneracion,$Tdias,$Thoras,$Tvar3,$TTotalImponible,$Tvar4,$TCargas,$TMontoCargas,$THaberes,$Tnombreafp,$Tvar7,$TAfc,$Tisapreadicional,$Tfonasa,$Tlosandes,$Tapv,$Tdescuentos,$Tbaseimpuesto,$Tipmuni,$Tprestaciones,$Tanticipos,$Ttotaladicional,$TLiquido,$TAfcEmp,$TAfcEmp1,$Taporte)
    {
        $datos=array();
        $datos['Mes']=$mes;
        $datos['anio']=$anio;
        $datos['TRentaBruta']=$Tremuneracion;
        $datos['TDiasTrabajados']=$Tdias;
        $datos['THorasExtras']=$Thoras;
        $datos['TOtrosBonos']=$Tvar3;
        $datos['TRentaImponible']=$TTotalImponible;
        $datos['TAcajaOtro']=$Tvar4;
        $datos['TNumCargas']=$TCargas;
        $datos['TAsignacionFamiliar']=$TMontoCargas;
        $datos['TTotalHaberes']=$THaberes;
        $datos['TNombreAfp']=$Tnombreafp;
        $datos['TMontoAfp']=$Tvar7;
        $datos['TAfc']=$TAfc;
        $datos['TIsapreAdicional']=$Tisapreadicional;
        $datos['TNombreIsapre']=$Tnombreisapre;
        $datos['TMontoIsapre']=$Tmontoisapre;
        $datos['TFonasa']=$Tfonasa;
        $datos['TLosAndes']=$Tlosandes;
        $datos['TApv']=$Tapv;
        $datos['TTotalDescuentosLegales']=$Tdescuentos;
        $datos['TBaseImpuesto']=$Tbaseimpuesto;
        $datos['TIpmUni']=$Tipmuni;
        $datos['TPrestamos']=$Tprestaciones;
        $datos['TAnticiposOtros']=$Tanticipos;
        $datos['TTotalDescuentosAdicionaes']=$Ttotaladicional;
        $datos['TTotalLiquido']=$TLiquido;
        $datos['TAfctrabajador']=$TAfcEmp;
        $datos['TAfctrabajador1']=$TAfcEmp1;
        $datos['TAporte']=$Taporte;
        $datos['MontoCuprum']=$montocuprum;
        $datos['MontoCapital']=$montocapital;
        $datos['MontoPlanVital']=$montoplanvital;
        $datos['MontoHabitat']=$montohabitat;
        $datos['MontoProvida']=$montoprovida;
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        $this->db->update('totales',$datos);
    }
    function SacaPlanillas($mes,$anio)
    {
        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        $this->db->order_by("Nombre","asc");
        return $this->db->get('planilla')->result();
    }
    function SacaResultados($mes,$anio)
    {
        $this->db->select('*');
        $this->db->where('Mes',$mes);
        $this->db->where('anio',$anio);
        return $this->db->get('totales')->result();
    }
}

?>
