    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>ADMINISTRADOR ELIMINADO</h2>
        </div>
        <br><br><br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/EliminarAdmin">
        <table align="center" border="0" cellpadding="0" cellspacing="0">
            <?php foreach($result as $row):?>
            <tr>
                <td width="100" align="left">NOMBRE:</td>
            <td><input type="text" name="nombre" value="<?=$row->Nombre?>" readonly="readonly" /></td>
                 </tr>
            <tr>
                <td width="100" align="left">RUT:</td>
                <td><input type="text" name="rut" value="<?=$row->Rut?>" readonly="readonly" /></td>
                </tr>
            <tr>
                <td width="100" align="left">LOGIN:</td>
                <td><input type="text" name="login" value="<?=$row->login?>" readonly="readonly" /></td>
                <?php endforeach;?>
            </tr>
        </table>
        <br><br><br><br><br><br>
        <div id="form" align="center">
            
                <input class="btn" type="submit" name="Continuar" value="Continuar"/>
            
        </div>
        </form>
        <br><br><br><br><br><br><br><br>
    </div>
</div>
