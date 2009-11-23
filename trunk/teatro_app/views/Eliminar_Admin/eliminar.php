<div id="content">
    <div id="lateral">
        <ul>
        <br><br><br>
            <li>Hoja de Empresa</li>
        <blockquote>
            <li><a href="../../index.php/welcome/Empresa" accesskey="12" title="">Datos Empresa</a></li>
        </blockquote>
        <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="../../index.php/welcome/CrearTrabajador" accesskey="2" title="">Crear Trabajador</a></li>
            <li><a href="../../index.php/welcome/Buscar" accesskey="4" title="">Modificar Trabajador</a></li>
            <li><a href="../../index.php/welcome/Buscar" accesskey="3" title="">Eliminar Trabajador</a></li>
        </blockquote>
            <li>Impresiones</li>
        <blockquote>
            <li><a href="../../index.php/welcome/planilla" accesskey="6" title="">Planilla de Remuneraciones</a></li>
            <li><a href="../../index.php/welcome/Liquidacion" accesskey="7" title="">Liquidación de Sueldo</a></li>
        </blockquote>
            <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="../../index.php/welcome/Crear_Admin" accesskey="9" title="">Crear Administrador</a></li>
            <li><a href="../../index.php/welcome/Modificar_Admin" accesskey="10" title="">Modificar Administrador</a></li>
            <li><a href="../../index.php/welcome/Eliminar_Admin" accesskey="11" title="">Eliminar Administrador</a></li>
        </blockquote>
             <li>Tablas</li>
        <blockquote>
            <li><a href="../../index.php/welcome/tablaIUT" accesskey="12" title="">Impuesto Único Tributario</a></li>
            <li><a href="#" accesskey="12" title="">Tramos Fonasa</a></li>
        </blockquote>
    </div>
    <div id="principal">
        <div class="post" align="center">
            <h2>ADMINISTRADOR ELIMINADO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br>
        <table align="center" border="0" cellpadding="0" cellspacing="0">
            <?php foreach($result as $row):?>
            <tr>
                <td width="100" align="left">NOMBRE:</td>
                <td width="100" align="left"><?=$row->Nombre?></td>
                 </tr>
            <tr>
                <td width="100" align="left">RUT:</td>
                <td width="100" align="left"><?=$row->Rut?></td>
                </tr>
            <tr>
                <td width="100" align="left">LOGIN:</td>
                <td width="100" align="left"><?=$row->login?></td>
                <?php endforeach;?>
            </tr>
        </table>
        <br><br><br><br><br><br>
        <div id="form" align="center">
            <form name="frm" method="post" action="../welcome/Eliminar_Admin">
                <input class="btn" type="submit" name="Continuar" value="Continuar"/>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
</div>
