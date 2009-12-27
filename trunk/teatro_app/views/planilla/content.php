    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>PLANILLA DE REMUNACIÓN</h2>
        </div>
        <table border=1 cellpadding=0 cellspacing=0 bgcolor="#00008F">
            <tr>
                <td height=100 bgcolor="#00008F">
                    <div id="1" style="overflow:auto;width:785px; height:400px">
                        <table border="1" width="100%" align="center" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th align="left">INGRESOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>RUT</td>
                                    <td>NOMBRE</td>
                                    <td>CARGO</td>
                                    <td>TIPO CONTRATO</td>
                                    <td>DIAS TRABAJADOS</td>
                                    <td>RENTA BRUTA</td>
                                    <td>HORAS EXTRAS</td>
                                    <td>OTROS BONOS Y AGUINALDOS</td>
                                    <td>RENTA IMPONIBLE</td>
                                    <td>ASIGNACIONES</td>
                                    <td>TOTAL REMUNERACION NO IMPONIBLE</td>
                                    <td>TOTAL HABERES</td>
                                    <td>ASIGNACION FAMILIAR</td>
                                    <td>TOTAL</td>
                                    <th>DESCUENTOS LEGALES</th> <!--Este campo debe tener entrada? (igual le puse)-->
                                    <td>AFP</td>
                                    <td>AFC</td>
                                    <td>ISAPRE</td>
                                    <td>OBLIGATORIO</td>
                                    <td>ADICIONAL</td>
                                    <td>FONASA</td>
                                    <td>CAJA</td>
                                    <td>OBLIGATORIO</td>
                                    <td>APV</td>
                                    <td>TOTAL DESCUENTOS LEGALES + APV</td>
                                    <td>IMPUESTO UNICO AL TRABAJADOR</td>
                                    <td>TOTAL HABERES</td>
                                    <td>PRESTACIONES</td>
                                    <td>ANTICIPO</td>
                                    <td>TOTAL DESCUENTO ADICIONAL</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="RUT" value="" /></td>
                                    <td><input type="text" name="NOMBRE" value="" /></td>
                                    <td><input type="text" name="CARGO" value="" /></td>
                                    <td><input type="text" name="TIPOCONTRATO" value="" /></td>
                                    <td><input type="text" name="DIASTRABAJADOS" value="" /></td>
                                    <td><input type="text" name="RENTABRUTA" value="" /></td>
                                    <td><input type="text" name="HORASEXTRAS" value="" /></td>
                                    <td><input type="text" name="BONOS" value="" /></td>
                                    <td><input type="text" name="RENTA" value="" /></td>
                                    <td><input type="text" name="ASIGNACIONES" value="" /></td>
                                    <td><input type="text" name="TOTALREMUNERACION" value="0" /></td>
                                    <td><input type="text" name="TOTALHABERES" value="0" /></td>
                                    <td><input type="text" name="ASIGNACION" value="" /></td>
                                    <td><input type="text" name="TOTAL" value="0" /></td>
                                    <td><input type="text" name="DESCUENTOSLEGALES"</td> <!--Nosé si va-->
                                    <td><input type="text" name="AFP" value="" /></td>
                                    <td><input type="text" name="AFC" value="" /></td>
                                    <td><input type="text" name="ISAPREOBLIGATORIO" value="" /></td>
                                    <td><input type="text" name="ISAPREADICIONAL" value="" /></td>
                                    <td><input type="text" name="FONASA" value="" /></td>
                                    <td><input type="text" name="CAJAOBLIGATORIO" value="" /></td>
                                    <td><input type="text" name="APV" value="" /></td>
                                    <td><input type="text" name="TOTALDESCUENTOSLEGALES" value="0" /></td>
                                    <td><input type="text" name="IUT" value="" /></td>
                                    <td><input type="text" name="TOTALHABERES" value="0" /></td>
                                    <td><input type="text" name="PRESTACIONES" value="" /></td>
                                    <!--ALGO PASA QUE DEBO REPETIR ESTOS INPUT PARA QUE APAREZCAN!!!-->
                                    <td><input type="text" name="ANTICIPOS" value="0" /></td>
                                    <td><input type="text" name="TOTAL DESCUENTOS" value="0" /></td>
                                    <td><input type="text" name="ANTICIPOS" value="0" /></td>
                                    <td><input type="text" name="TOTAL DESCUENTOS" value="0" /></td>
                                </tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                <tr> <td><input type="text"/></td></tr>
                                
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
	<br><br>
    </div>
</div>
