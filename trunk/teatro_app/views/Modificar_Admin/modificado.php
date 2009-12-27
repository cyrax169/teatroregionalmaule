    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>ADMINISTRADOR MODIFICADO</h2>
        </div>
        <br><br><br><br><br><br>
        <table align="center" border="0" cellpadding="0" cellspacing="0">
            <?php foreach($result as $row):?>
            <tr>
                <td width="100" align="left">NOMBRE:</td>
                <td width="100" align="left"><?=$row->Nombre?></td>
                 </tr>
            <tr>
                <td width="100" align="left">RUT:</td>
                <td width="100" align="left"><?=$row->Rut?></td>
                </tr>
            <tr>
                <td width="100" align="left">LOGIN:</td>
                <td width="100" align="left"><?=$row->login?></td>
                <?php endforeach;?>
            </tr>
        </table>
        <br><br><br><br><br><br>
        <div id="form" align="center">
            <form name="frm" method="post" action="../welcome/Modificar_Admini">
                <input class="btn" type="submit" name="Continuar" value="Continuar"/>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
</div>
