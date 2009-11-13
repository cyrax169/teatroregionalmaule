<div id="content">
    <div id="colOne">
        <div id="menu">
            <ul>
                <br><br><br>
                <li>Gestión de Usuarios</li>
                <blockquote> <li><a href="../../index.php/welcome/Vida" accesskey="2" title="">Crear Trabajador</a></li></blockquote>
                <blockquote> <li><a href="../../index.php/welcome/Buscar" accesskey="3" title="">Eliminar Trabajador</a></li></blockquote>
                <blockquote> <li><a href="../../index.php/welcome/Buscar" accesskey="4" title="">Buscar Trabajador</a></li></blockquote>
                <li>Impresiones</li>
                <blockquote> <li><a href="../../index.php/welcome/planilla" accesskey="6" title="">Planilla de Remuneraciones</a></li></blockquote>
                <blockquote> <li><a href="../../index.php/welcome/Liquidacion" accesskey="7" title="">Liquidación de Sueldo</a></li></blockquote>
                <li>Gestión de Usuarios</li>
                <blockquote> <li><a href="../../index.php/welcome/Crear_Admin" accesskey="9" title="">Crear Administrador</a></li></blockquote>
                <blockquote> <li><a href="../../index.php/welcome/Buscar_Admin" accesskey="10" title="">Modificar Administrador</a></li></blockquote>
                <blockquote> <li><a href="../../index.php/welcome/Buscar_Admin" accesskey="11" title="">Eliminar Administrador</a></li></blockquote>
                <blockquote> <li><a href="../../index.php/welcome/Empresa" accesskey="12" tittle="">Datos Empresa</a></li></blockquote>
                <li>tablas</li>
                <blockquote> <li><a href="../../index.php/welcome/tablaIUT" accesskey="12" tittle="">IUT</a></li></blockquote>
                <blockquote> <li><a href="#" accesskey="12" tittle="">TRAMOS FONASA</a></li></blockquote>
                 </div>
        </div>
    <div id="colTwo">
            <div class="post" align="center">
                <h2>LIQUIDACIÓN DE SUELDO</h2>
           </div>
            
        <br><br><br><br>
        <div align="center"><B> CORPORACION DE AMIGOS</B> </div>
         <div align="center"><B>DEL TEATRO REGIONAL DEL MAULE</B></div>
         <div align="center">RUT:65,560,740-4</div>
         <div align="center">Uno Oriente #1484, Talca.</div>
         <!--<ul>
                            <li><a href="index.php/welcome/Vida" accesskey="1" title="">Hoja de Vida</a></li>
                            <li><a href="index.php/welcome/Empresa" accesskey="1" title="">Hoja de Empresa</a></li>
                            <li><a href="#" accesskey="5" title="">Contáctame</a></li>

                        </ul>  -->
         <br><br>
         <table width="700" border="1">
             <thead>
                 <tr>
                     <td width="90">MES</td>
                     <td><input type="text" name="MES" value="" size="36"/></td>
                     <td width="100">TIPO CONTRATO</td>
                     <td><input type="text" name="TIPOCONTRATO" value=""size="36" /></td>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td width="90">NOMBRE</td>
                     <td><input type="text" name="NOMBRE" value=""size="36" /></td>
                     <td width="100">CARGO</td>
                     <td><input type="text" name="CARGO" value=""size="36" /></td>
                 </tr>
                 <tr>
                     <td width="90">RUT</td>
                     <td><input type="text" name="RUT" value="" size="36"/></td>
                     <td width="100">FECHA DE PAGO</td>
                     <td><input type="text" name="FECHAPAGO" value=""size="36" /></td>
                 </tr>
             </tbody>
         </table>
         <br><br>
         <table border="1" border="1">
             <thead>
                 <tr>
                     <th>IMPONIBLE</th>
                     <th width="100" scope="col"></th>
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
         <br><br>


         <table border="1">
             <thead>
                 <tr>
                     <th width="144" scope="col">NO IMPONIBLE</th>
                     <th width="100" scope="col"></th>
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
         <br><br>
         <table border="1">
             <thead>
                 <tr>
                     <th width="144" scope="col">TOTAL HABERES</th>
                     <th><input type="text" name="HABERES" value="0" /></th>
                 </tr>
             </thead>
         </table>
         <br><br>
           <table border="1">
             <thead>
                 <tr>
                     <th>TOTAL LIQUIDO A PAGAR</th>
                     <th><input type="text" name="LIQUIDO" value="0" /></th>
                 </tr>
             </thead>
         </table>

<div id="apDiv1">
         <table width=375" border="1">
             <thead>
                 <tr>
                     <th width="320" ></th>
                     <th width="150">DESCUENTOS</th>
                     <th width="150" ></th>
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
    <br><br>
    <table border="1" width="370">
             <thead>
                 <tr>
                     <th width="130">TOTAL DESCUENTOS</th>
                     <td width="150"><input type="text" name="DESCUENTOS" size=35/></td>
                 </tr>
             </thead>
         </table>
</div>
    <br><br><br><br>
        <div align="center">Certifico que he recibido de la Corporación de Amigos del Teatro Regional del Maule a mi entera satisfacción</div>
         <div align="center">el total liquido a pagar, indicado en la presente Liquidación de Remuneraciones y no tengo cargo ni cobro alguno</div>
         <div align="center">posterior que hacer,  por ninguno de los conceptos comprendidos en ella.</div>
  <br><br><br><br

      <table border="0">
      <thead>
          <tr>
              <td width="500" scope="col" align="left">p.p. Corp. De Amigos</td>
              <td width="500" scope="col" align="right">recibí conforme</td>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td align="left">del Teatro Regional del Maule</td>
              <td></td>
          </tr>
      </tbody>
  </table>

      <!--<div align="left">p.p. Corp. De Amigos</div>
      <div align="left">del Teatro Regional del Maule</div>
      <div align="right">recibí conforme</div>-->
    </div>
</div>