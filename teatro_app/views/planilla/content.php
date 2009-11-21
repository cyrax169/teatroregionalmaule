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
            <h2>PLANILLA DE REMUNACIÓN</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <table border="0" width="400" align="center">
            <thead>
                <tr>
                    <th align="left">INGRESOS</th>
                    <th> </th>
                </tr>
                <tr>
                    <th> <br> </th>
                    <th> <br> </th>
                </tr>
           </thead>
           <tbody>
                <tr>
                    <td>RUT</td>
                    <td><input type="text" name="RUT" value="" /></td>
                </tr>
                <tr>
                    <td>NOMBRE</td>
                    <td><input type="text" name="NOMBRE" value="" /></td>
                </tr>
                <tr>
                    <td>CARGO</td>
                    <td><input type="text" name="CARGO" value="" /></td>
                </tr>
                <tr>
                    <td>TIPO CONTRATO</td>
                    <td><input type="text" name="TIPOCONTRATO" value="" /></td>
                </tr>
                <tr>
                    <td>DIAS TRABAJADOS</td>
                    <td><input type="text" name="DIASTRABAJADOS" value="" /></td>
                </tr>
                <tr>
                    <td>RENTA BRUTA</td>
                    <td><input type="text" name="RENTABRUTA" value="" /></td>
                </tr>
                <tr>
                    <td>HORAS EXTRAS</td>
                    <td><input type="text" name="HORASEXTRAS" value="" /></td>
                </tr>
                <tr>
                    <td>OTROS BONOS Y AGUINALDOS</td>
                    <td><input type="text" name="BONOS" value="" /></td>
                </tr>
                <tr>
                    <td>RENTA IMPONIBLE</td>
                    <td><input type="text" name="RENTA" value="" /></td>
                </tr>
                <tr>
                    <td>ASIGNACIONES</td>
                    <td><input type="text" name="ASIGNACIONES" value="" /></td>
                </tr>
                <tr>
                    <td>TOTAL REMUNERACION NO IMPONIBLE</td>
                    <td><input type="text" name="TOTALREMUNERACION" value="0" /></td>
                </tr>
                <tr>
                    <td>TOTAL HABERES</td>
                    <td><input type="text" name="TOTALHABERES" value="0" /></td>
                </tr>
                <tr>
                    <td>ASIGNACION FAMILIAR</td>
                    <td><input type="text" name="ASIGNACION" value="" /></td>
                </tr>
                    <tr>
                    <td>TOTAL</td>
                    <td><input type="text" name="TOTAL" value="0" /></td>
                </tr>
                <tr>
                    <th>DESCUENTOS LEGALES</th>
                    <th></th>
                </tr>
                <tr>
                    <td width="230">AFP</td>
                    <td><input type="text" name="AFP" value="" /></td>
                </tr>
                <tr>
                    <td>AFC</td>
                    <td><input type="text" name="AFC" value="" /></td>
                </tr>
                <tr>
                    <td>ISAPRE</td>
                </tr>
                <tr>
                    <td><blockquote>OBLIGATORIO</blockquote></td>
                    <td><input type="text" name="ISAPREOBLIGATORIO" value="" /></td>
                </tr>
                <tr>
                    <td><blockquote>ADICIONAL</blockquote></td>
                    <td><input type="text" name="ISAPREADICIONAL" value="" /></td>
                </tr>
                <tr>
                    <td>FONASA</td>
                    <td><input type="text" name="FONASA" value="" /></td>
                </tr>
                <tr>
                    <td>CAJA</td>
                </tr>
                <tr>
                    <td><blockquote>OBLIGATORIO</blockquote></td>
                    <td><input type="text" name="CAJAOBLIGATORIO" value="" /></td>
                </tr>
                <tr>
                    <td><blockquote>APV</blockquote></td>
                    <td><input type="text" name="APV" value="" /></td>
                </tr>
                <tr>
                    <td>TOTAL DESCUENTOS LEGALES + APV</td>
                    <td><input type="text" name="TOTALDESCUENTOSLEGALES" value="0" /></td>
                </tr>
                <tr>
                    <td>IMPUESTO UNICO AL TRABAJADOR</td>
                    <td><input type="text" name="IUT" value="" /></td>
                </tr>
                <tr>
                    <td>TOTAL HABERES</td>
                    <td><input type="text" name="TOTALHABERES" value="0" /></td>
                </tr>
                <tr>
                    <td>PRESTACIONES</td>
                    <td><input type="text" name="PRESTACIONES" value="" /></td>
                </tr>
                <tr>
                    <td>ANTICIPO</td>
                    <td><input type="text" name="ANTICIPOS" value="" /></td>
                </tr>
                <tr>
                    <td>TOTAL DESCUENTO ADICIONAL</td>
                    <td><input type="text" name="TOTAL DESCUENTOS" value="0" /></td>
                </tr>
            </tbody>
        </table>
        <br><br>
    </div>
</div>
