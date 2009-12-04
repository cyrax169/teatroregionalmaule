    <div id="principal">
        <div class="post" align="center">
            <h2>DATOS ADMINISTRADOR</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="../welcome/Actualiza_Trabajador">
            <table align="center" border="0" cellpadding="0" cellspacing="0">
                <?php foreach($result and $result1 as $row):?>
                <tr>
                    <td width="100" align="left">NOMBRE:</td>
                    <td width="100" align="left">
                        <input type="text" name="nombres" value="<?=$row->Nombre?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">RUT:</td>
                    <td width="100" align="left"
                        <input readonly name="rut" value="<?=$row->Rut?>" maxlength="8"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">FECHA DE NACIMIENTO:</td>
                    <td width="100" align="left"
                        <input name="fechanacimiento" value="<?=$row->FechaNacimiento?>" maxlength="10"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">DIRECCIÓN</td>
                    <td width="100" align="left">
                        <input type="text" name="direccion" value="<?=$row->Direccion?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">TELEFONO</td>
                    <td width="100" align="left">
                        <input type="text" name="telefonos" value="<?=$row->Telefono?>"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">TIPO DE CONTRATO</td>
                    <td width="100" align="left">
                        <input type="text" name="tipo_con" value="<?=$row->TipoContrato?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">AFC:</td>
                    <td width="100" align="left"
                        <input name="afc" value="<?=$row->Afc?>" maxlength="10"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">CARGO/FUNCIÓN</td>
                    <td width="100" align="left">
                        <input type="text" name="cargo" value="<?=$row->Cargo?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">FECHA INICIO CONTRATO:</td>
                    <td width="100" align="left"
                        <input name="fechainiciocontrato" value="<?=$row->FechaInicioContrato?>" maxlength="10"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">FECHA TERMINO CONTRATO:</td>
                    <td width="100" align="left"
                        <input name="fechaterminocontrato" value="<?=$row->FechaTerminoContrato?>" maxlength="10"/>
                    </td>
                </tr>
                  <tr>
                    <td width="100" align="left">REMUNERACION</td>
                    <td width="100" align="left">
                        <input type="text" name="remuneracion" value="<?=$row->Salario?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">CAJA:</td>
                    <td width="100" align="left"
                        <input name="caja" value="<?=$row->Acaja?>" maxlength="10"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">MOVILIZACION:</td>
                    <td width="100" align="left"
                        <input name="movilizacion" value="<?=$row->Amovilizacion?>" maxlength="10"/>
                    </td>
                </tr>
                  <tr>
                    <td width="100" align="left">COLACION</td>
                    <td width="100" align="left">
                        <input type="text" name="colacion" value="<?=$row->Acolacion?>"/>
                    </td>
                </tr>
                   <tr>
                    <td width="100" align="left">AFP</td>
                    <td width="100" align="left">
                        <input type="text" name="afp" value="<?=$row->NombreAfp?>"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">Porcentaje AFP</td>
                    <td width="100" align="left">
                        <input type="text" name="monto_afp" value="<?=$row->PorcentajeAfp?>"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">FONASA</td>
                    <td width="100" align="left">
                        <input type="text" name="montofonasa" value="<?=$row->Acolacion?>"/>
                    </td>
                </tr>
                   <tr>
                    <td width="100" align="left">ISAPRE</td>
                    <td width="100" align="left">
                        <input type="text" name="nombre_isapre" value="<?=$row->NombreAfp?>"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">MONTO ISAPRE</td>
                    <td width="100" align="left">
                        <input type="text" name="monto_isapre" value="<?=$row->PorcentajeAfp?>"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">DIAS TRABAJADOS</td>
                    <td width="100" align="left">
                        <input type="text" name="diastrabajados" value="<?=$row->DiasTrabajados?>"/>
                    </td>
                </tr>
                  <tr>
                    <td width="100" align="left">BONOS</td>
                    <td width="100" align="left">
                        <input type="text" name="bonos" value="<?=$row->Bonos?>"/>
                    </td>
                </tr>
                
                  <tr>
                    <td width="100" align="left">NOMBRE CARGA</td>
                    <td width="100" align="left">
                        <input type="text" name="nombrescargas" value="<?=$row->Nombres?>"/>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="left">RUT CARGA</td>
                    <td width="100" align="left">
                        <input type="text" name="rutcarga" value="<?=$row->Rut?>"/>
                    </td>
                </tr>
                  <tr>
                    <td width="100" align="left">TIPO CARGA</td>
                    <td width="100" align="left">
                        <input type="text" name="tipocarga" value="<?=$row->Tipo?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">FECHA VENCIMIENTO</td>
                    <td width="100" align="left">
                        <input type="text" name="fechavencimiento" value="<?=$row->FechaVencimiento?>"/>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
            <br><br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Modificar"/>
            </div>
         </form>
        <br><br><br><br><br><br><br><br>
   </div>
</div>
