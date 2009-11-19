<div id="content">
    <!--div id="lateral">
        <ul>
        <br><br><br>
        <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="index.php/welcome/Vida" accesskey="2" title="">Crear Trabajador</a></li>
            <li><a href="index.php/welcome/Buscar" accesskey="3" title="">Eliminar Trabajador</a></li>
            <li><a href="index.php/welcome/Buscar" accesskey="4" title="">Buscar Trabajador</a></li>
        </blockquote>
            <li>Impresiones</li>
        <blockquote>
            <li><a href="#" accesskey="6" title="">Planilla de Remuneraciones</a></li>
            <li><a href="index.php/welcome/Liquidacion" accesskey="7" title="">Liquidación de Sueldo</a></li>
        </blockquote>
            <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="index.php/welcome/Crear_Admin" accesskey="9" title="">Crear Administrador</a></li>
            <li><a href="index.php/welcome/Buscar_Admin" accesskey="10" title="">Modificar Administrador</a></li>
            <li><a href="index.php/welcome/Buscar_Admin" accesskey="11" title="">Eliminar Administrador</a></li>
            <li><a href="index.php/welcome/Empresa" accesskey="12" title="">Datos Empresa</a></li>
        </blockquote>
    </div-->
    <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/login">
        <fieldset id="form">
            <legend>Sistema de Remuneraciones</legend>
            <ol>
                <li><label>Usuario    : </label><input type="text" name="nombre" id="nombre" size="25" /></li>
                <li><label>Contraseña : </label><input type="password" name="password" id="password" size="25" /></li>
            </ol>
                <p align="center"><input type="submit" name="submit" class="btn" value="Enviar" /></p>
        </fieldset>
    </form>
</div>
<!--Fin Header-->