    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>LIQUIDACIÓN DE SUELDO</h2>
        </div>
        <br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/liquidacion_controlador/BuscaRut">
           <div align="center">
               <select name="mes">
                   <option selected><?echo $mes?></option>
                    <option>Enero</option>
                    <option>Febrero</option>
                    <option>Marzo</option>
                    <option>Abril</option>
                    <option>Mayo</option>
                    <option>Junio</option>
                    <option>Julio</option>
                    <option>Agosto</option>
                    <option>Septiembre</option>
                    <option>Octubre</option>
                    <option>Noviembre</option>
                    <option>Diciembre</option>
                </select>
                <select name="anio">
                    <option selected="selected" >2009</option>
                    <option>2010</option>
                    <option>2011</option>
                    <option>2012</option>
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                </select>
                </div>
             <br>
            <table id="tabla_simple" cellpadding="0" cellspacing="0" border="1" align="center">
                <?php $i=0?>
                <?php foreach($result as $row):?>
                    <?php if($i<$num): $i++;?>
                        <?php if($row->Estado ==1):?>
                    <tr>
                        
                        <td><input type="text" name="rut<?php echo $i;?>" size="8" value="<?=$row->Rut?>-<?=$row->Digito?>" /></td>
                        <td><input type="text" name="nombre<?php echo $i;?>" value="<?=$row->Nombre?>" />
                        <input type="radio" name="imprime" value="<?php echo $i;?>" /></td>
                      
                    </tr>
                        <?php endif;?>
                    <?php endif;?>
                <?php endforeach;?>
            </table>
            <br>
            
            <br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Mostrar"/>
            </div>
            <br>
        </form>
        <br><br><br>
    </div>
</div>
