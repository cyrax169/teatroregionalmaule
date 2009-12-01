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
                <?php foreach($result as $row):?>
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
                    <td width="100" align="left">CARGO/FUNCIÓN</td>
                    <td width="100" align="left">
                        <input type="text" name="cargo" value="<?=$row->Cargo?>"/>
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
