    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>ELIMINAR ADMINISTRADOR</h2>
        </div>
        <br><br><br><br><br><br><br>
      <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/Elimina_Admin">
             <div align="center">RUT:
                <input type="text" name="RUT" value="" maxlength="8" /> -
                <input type="text" name="DIGITO" size="2" maxlength="1" />
            </div>
        <!--     <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="center">
                <?php $i=0?>
                <?php foreach($result as $row):?>
                    <?php if($i<$num): $i++;?>
                       
                    <tr>

                        <td><input type="text" name="rut<?php echo $i;?>" size="8"value="<?=$row->Rut?>-<?=$row->Digito?>" /></td>
                        <td><input type="text" name="nombre<?php echo $i;?>" value="<?=$row->Nombre?>" />
                        <input type="radio" name="imprime" value="<?php echo $i;?>" /></td>

                    </tr>
                        
                    <?php endif;?>
                <?php endforeach;?>
            </table>-->
            <br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Buscar"/>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
   </div>
</div>
