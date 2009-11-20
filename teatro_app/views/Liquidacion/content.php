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
            <h2>LIQUIDACIÓN DE SUELDO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
       </div>
        <br>
        <div align="center"><B> CORPORACIÓN DE AMIGOS</B> </div>
        <div align="center"><B>DEL TEATRO REGIONAL DEL MAULE</B></div>
        <div align="center">RUT:65,560,740-4</div>
        <div align="center">Uno Oriente #1484, Talca.</div>
        <br><br>
        <table width="700" border="1" cellpadding="0" cellspacing="0" align="center">
            <thead>
                <tr>
                    <td width="90">MES</td>
                    <td><input type="text" name="MES" value="" size="38"/></td>
                    <td width="100">TIPO CONTRATO</td>
                    <td><input type="text" name="TIPOCONTRATO" value=""size="38" /></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="90">NOMBRE</td>
                    <td><input type="text" name="NOMBRE" value=""size="38" /></td>
                    <td width="100">CARGO</td>
                    <td><input type="text" name="CARGO" value=""size="38" /></td>
                </tr>
                <tr>
                    <td width="90">RUT</td>
                    <td><input type="text" name="RUT" value="" size="38"/></td>
                    <td width="100">FECHA DE PAGO</td>
                    <td><input type="text" name="FECHAPAGO" value=""size="38" /></td>
                </tr>
             </tbody>
         </table>
        <br><br>
        <ul>
            <table width=375" border="1" align="right" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="500" ></th>
                        <th width="40">DESCUENTOS</th>
                        <th width="40" ></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>AFP</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>APV</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>AFC</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>SALUD</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>OTROS SALUD</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>IUT</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>OTROS DESCUENTOS</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                    <tr>
                        <td>ANTICIPOS</td>
                        <td><input type="text" name="NOMBRE" size=15 /></td>
                        <td><input type="text" name="PORCENTAJE" size=15 /></td>
                    </tr>
                </tbody>
             </table>
        </ul>
        <dl>
            <table border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center">IMPONIBLE</th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>DIAS TRABAJADOS EN EL MES</td>
                        <td width="100" scope="col"><input type="text" name="diastrabajados" value="" /></td>
                    </tr>
                    <tr>
                        <td>HORAS EXTRAS</td>
                        <td width="100" scope="col"><input type="text" name="horasextras" value="" /></td>
                    </tr>
                    <tr>
                        <td>BONO PRODUCTIVIDAD</td>
                        <td width="100" scope="col"><input type="text" name="bono" value="" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL IMPONIBLE</td>
                        <td width="100" scope="col"><input type="text" name="imponible" value="0" /></td>
                    </tr>
                </tbody>
            </table>
        </dl>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="200" align="center">NO IMPONIBLE</th>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MOVILIZACION</td>
                        <td><input type="text" name="MOVILIZACION" value="" /></td>
                    </tr>
                    <tr>
                        <td>COMIDA</td>
                        <td><input type="text" name="COMIDA" value="" /></td>
                    </tr>
                    <tr>
                        <td>TOTAL NO IMPONIBLE</td>
                        <td><input type="text" name="NOIMPONIBLE" value="0" /></td>
                    </tr>
                </tbody>
            </table>
        </dl>
        <ul>
            <table width="375" border="1"  align="right" cellpadding="0" cellspacing="0">
                <tr>
                        <th width="150">TOTAL DESCUENTOS</th>
                        <td width="40"><input type="text" name="DESCUENTOS" size=35 value="0"/></td>
                    </tr>
            </table>
        </ul>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL HABERES</th>
                        <th><input type="text" name="HABERES" value="0" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <dl>
            <table width="315" border="1" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center" width="200">TOTAL LIQUIDO A PAGAR</th>
                        <th><input type="text" name="LIQUIDO" value="0" /></th>
                    </tr>
                </thead>
            </table>
        </dl>
        <div align="center">Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción</div>
        <div align="center">el total líquido a pagar, indicado en la presente Liquidación de Remuneraciones y no tengo cargo ni cobro alguno</div>
        <div align="center">posterior que hacer,  por ninguno de los conceptos comprendidos en ella.</div>
        <br><br><br><br><br><br>

        <table border="0">
            <thead>
                <tr>
                    <td width="500" scope="col" align="center">p.p. Corp. De Amigos</td>
                    <td width="500" scope="col" align="center">recibí conforme</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">del Teatro Regional del Maule</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
            <br><br>
            <div align="center">
            <input type="submit" value="Imprimir" />
        </div>
            <br><br><br>
    </div>
</div>