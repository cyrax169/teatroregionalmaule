<!-- CREO QUE ESTA VISTA HAY QUE EDITARLA, YA QUE NO COINCIDE CON LOS DATOS QUE SE ESTAN PIDIENDO EN LA BD!!!!
     De todos modos se creo el controlador que solo verifica que los datos se lean correctamente.
-->
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
        <table width="764" border="0" align="center">
            <?php foreach($result as $row):?>
            <tr>
                <td width="194" height="27">RAZÓN SOCIAL</td>
                <td width="560"><input type="text" name="rsocial" value="<?=$row->RazonSocial?>" readonly/></td>
            </tr>
            <tr>
                <td>RUT</td>
                <td><input type="text" name="rut" value="<?=$row->Rut?>" readonly/></td>
            </tr>
            <tr>
                <td>DIRECCIÓN</td>
                <td><input type="text" name="direccion" value="<?=$row->Direccion?>" readonly/></td>
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
                        <input type="text" name="cajasi" value="<?=$row->CajaCompensacion?>" readonly/>
                            (si es si sale este cuadrado para poder colocar el nombre de la caja)
                    </p>
                </td>
            </tr>
            <tr>
                <td valign="top">APORTE PATRONAL</td>
                <td>
                    <table width="200" border="0">
                        <tr> <!-- Hay que hacer que la palabra Monto% desaparezca al momento de seleccionar la casila-->
                            <td>
                                <input name="apatronal" type="text" value="<?=$row->AportePatronal?>" readonly>
                            </td>
                            <th><input name="monto" type="text" value="<?=$row->MontoAporte?>" readonly/></th>
                        </tr>
                    </table>
                    <p>(actualizar una vez al año) </p>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <br><br>
        <br><br><br><br>
    </div>

</div>