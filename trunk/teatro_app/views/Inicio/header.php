<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head
    <script type="text/javascript">
//<![CDATA[
base_url = 'http://localhost/TRM/index.php/';
//]]>
</script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sistema de Remuneraciones TRM</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>css/calendar.css" rel="stylesheet" />
<script language="JavaScript" src="<?=base_url();?>js/jquery-1.3.2.js"></script>
<script language="JavaScript" src="<?=base_url();?>js/calendar_db.js"></script>
<script language="JavaScript" src="<?=base_url();?>js/function.js"></script>
<script src="<?=base_url();?>js/livevalidation_standalone.compressed.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
    <h1> </h1>
</div>
    <div id="content">
    <div id="lateral">
        <ul>
        <br><br><br>
            <li>Hoja de Empresa</li>
        <blockquote>
            <li><a href="#" onclick="menuBar(1);" title="">Datos Empresa</a></li>
        </blockquote>
        <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="<?=base_url();?>index.php/welcome/BuscaTrabajador" accesskey="2" title="">Crear Trabajador</a></li>
            <li><a href="<?=base_url();?>index.php/welcome/MuestrarutModificar" accesskey="4" title="">Modificar Trabajador</a></li>
            <li><a href="<?=base_url();?>index.php/welcome/MuestrarutEliminar" accesskey="3" title="">Eliminar Trabajador</a></li>
        </blockquote>
            <li>Impresiones</li>
        <blockquote>
            <li><a href="<?=base_url();?>index.php/welcome/Muestrarutliquidacion" accesskey="7" title="">Liquidación de Sueldo</a></li>
            <li><a href="<?=base_url();?>index.php/welcome/Planilla" accesskey="6" title="">Planilla de Remuneraciones</a></li>
        </blockquote>
             <li>Tablas</li>
        <blockquote>
            <li><a href="<?=base_url();?>index.php/welcome/ufyutm" accesskey="12" title="">UF y UTM</a></li>
            <li><a href="<?=base_url();?>index.php/welcome/tablaIUT" accesskey="12" title="">Impuesto Único Tributario</a></li>
            <li><a href="<?=base_url();?>index.php/welcome/Tramos" accesskey="12" title="">Tramos de asignaciones Familiares</a></li>
            <li><a href="<?=base_url();?>index.php/welcome/Afp" accesskey="12" title="">Cotizaciones Afp</a></li>
        </blockquote>
    </div>
