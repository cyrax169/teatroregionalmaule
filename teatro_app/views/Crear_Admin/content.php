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
            <li><a href="../../index.php/welcome/Vida" accesskey="2" title="">Crear Trabajador</a></li>
            <li><a href="../../index.php/welcome/Buscar" accesskey="3" title="">Eliminar Trabajador</a></li>
            <li><a href="../../index.php/welcome/Buscar" accesskey="4" title="">Buscar Trabajador</a></li>
        </blockquote>
            <li>Impresiones</li>
        <blockquote>
            <li><a href="../../index.php/welcome/planilla" accesskey="6" title="">Planilla de Remuneraciones</a></li>
            <li><a href="../../index.php/welcome/Liquidacion" accesskey="7" title="">Liquidación de Sueldo</a></li>
        </blockquote>
            <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="../../index.php/welcome/Crear_Admin" accesskey="9" title="">Crear Administrador</a></li>
            <li><a href="../../index.php/welcome/Buscar_Admin" accesskey="10" title="">Modificar Administrador</a></li>
            <li><a href="../../index.php/welcome/Buscar_Admin" accesskey="11" title="">Eliminar Administrador</a></li>
        </blockquote>
             <li>Tablas</li>
        <blockquote>
            <li><a href="../../index.php/welcome/tablaIUT" accesskey="12" title="">Impuesto Único Tributario</a></li>
            <li><a href="#" accesskey="12" title="">Tramos Fonasa</a></li>
        </blockquote>
    </div>
    <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/IngresoUsuario">
        <div id="principal">
            <div class="post" align="center">
                <h2>CREAR ADMINISTRADOR</h2>
                <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
            </div>
            <br><br><br><br><br>
            <table align="center">
                <thead>
                    <tr>
                        <td>NOMBRE</td>
                        <td><input type="text" name="nombre" value="" size="29"/></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RUT</td>
                        <td>
                            <input type="text" name="rut" value="" maxlength="8" /> -
                            <input type="text" name="digito" size="2" maxlength="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>LOGIN</td>
                        <td><input type="text" name="login" value="" size="29"/></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td><input type="password" name="password" value="" size="29" /></td>
                    </tr>
                </tbody>
            </table><br><br>
             <div align="center"><input type="submit" name="button" id="button" value="Aceptar"></div>
             <br><br><br><br><br><br><br><br><br><br>
        </div>
    </form>
</div>
