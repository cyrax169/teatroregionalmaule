<div id="principal">
    <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
    <div class="post" align="center">
        <h2>COTIZACIONES AFP</h2>
    </div>
        <br><br><br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Afp1">
        <table border="1" align="center" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th align="center">Afp</th>
                    <th align="center">%</th>
                </tr>
            </thead>
            <tbody>
                <?$i=0?>
                <?php foreach($result as $row):?>
                <?if ($i<6):$i++;?>
                <tr>
                    <td><input type="text" name="afp<?echo $i?>" value="<?=$row->NombreAfp?>" readonly/></td>
                    <td><input type="text" name="monto<?echo $i?>" value="<?=$row->PorcentajeAfp?>"/></td>
                </tr>
                    <?endif;?>
               <?php endforeach;?>
            </tbody>
        </table>
            <br>
            <div align="center"><label style="color:red"><?echo $mensaje?><label><div>
        <br><br><br><br>
        <div id="form" align="center">
            <input class="btn" type="submit" value="Guardar" name="guardar"/>
        </div>
        </form>

        <br><br><br><br><br><br><br><br>
    </div>
