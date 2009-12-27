    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>DATOS SUPERVISOR</h2>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="../welcome/Actualiza_supervisor">
            <table align="center" border="0" cellpadding="0" cellspacing="0">
                <?php foreach($result as $row):?>
                <tr>
                    <td width="100" align="left">NOMBRE:</td>
                    <td width="100" align="left">
                        <input type="text" name="nombre" value="<?=$row->Nombre?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">RUT:</td>
                    <td width="100" align="left"
                        <input name="rut" value="<?=$row->Rut?>" maxlength="8"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="left">LOGIN:</td>
                    <td width="100" align="left">
                        <input type="text" name="login" value="<?=$row->login?>"/>
                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td width="100" align="left">PASSWORD:</td>
                    <td width="100" align="left">
                        <input type="password" name="password" value=""/>
                    </td>
                </tr>
            </table>
            <br><br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Modificar"/>
            </div>
         </form>
        <br><br><br><br><br><br><br><br>
   </div>
</div>
