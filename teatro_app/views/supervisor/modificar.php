    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>DATOS SUPERVISOR</h2>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="../welcome/Actualiza_supervisor">
            <table align="center" >
                <?php foreach($result as $row):?>
                <tr>
                    <td>NOMBRE:</td>
                    <td >
                        <input type="text" name="nombre" value="<?=$row->Nombre?>"/>
                    </td>
                </tr>
                <tr>
                    <td >RUT:</td>
                    
                      <td >  <input type="text" size="12"name="rut" value="<?=$row->Rut?>" maxlength="8"/> -
                        <input type="text" name="Digito" size="1" value="<?=$row->Digito?>" /></td >
                    
                </tr>
                <tr>
                    <td>LOGIN:</td>
                    <td>
                        <input type="text" name="login" value="<?=$row->login?>"/>
                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td>PASSWORD:</td>
                    <td align="left">
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
