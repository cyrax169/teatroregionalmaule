<!-- CREO QUE ESTA VISTA HAY QUE EDITARLA, YA QUE NO COINCIDE CON LOS DATOS QUE SE ESTAN PIDIENDO EN LA BD!!!! 
     De todos modos se creo el controlador que solo verifica que los datos se lean correctamente.
-->
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
    <div id="principal">
        <div class="post" align="center">
            <h2>EMPRESA</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <form name="Empresa" method="post" action="<?=base_url()?>index.php/welcome/DatosEmpresa">
            <table width="764" border="0" align="center">
                <tr>
                    <td width="194" height="27">RAZÓN SOCIAL</td>
                    <td width="560"><input type="text" name="rsocial" /></td>
                </tr>
                <tr>
                    <td>RUT</td>
                    <td><input type="text" name="rut" /></td>
                </tr>
                <tr>
                    <td>DIRECCIÓN</td>
                    <td><input type="text" name="direccion" /></td>
                </tr>
                <tr>
                    <td>CAJA DE COMPENSACIÓN </td>
                    <td><p>  <!--Los radioButton deben tener el mismo nombre y un checked (seleccionado) -->
                            <input name="caja" type="radio" value="SI" checked/>
                                SI
                            <input name="caja" type="radio" value="NO" />
                                NO
                                (SI = 6.4 % fonasa ; NO = 7% )
                        </p>
                        <p>
                            <input type="text" name="cajasi" />
                                (si es si sale este cuadrado para poder colocar el nombre de la caja)
                        </p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">APORTE PATRONAL</td>
                    <td>
                        <table width="200" border="0">
                            <tr> <!-- Hay que hacer que la palabra Monto% desaparezca al momento de seleccionar la casila-->
                                <td> MUTUAL</td>
                                <th><input name="mutual" type="text" value="Monto (%)" onchange="" /></th>
                            </tr>
                            <tr>
                                <td>IST</td>
                                <td><input name="ist" type="text" value="Monto (%)" /></td>
                            </tr>
                        </table>
                        <p>(actualizar una vez al año) </p>
                    </td>
                </tr>
            </table>
            <br><br>
            <div align="center" id="form">
                    <input class="btn" type="submit" name="Salir" value="Guardar"/>
            </div>
        </form>
        <br><br><br><br>
    </div>
    
</div>