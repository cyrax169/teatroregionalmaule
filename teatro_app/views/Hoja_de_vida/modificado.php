    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>TRABAJADOR ELIMINADO</h2>
        </div>
        <br><br><br><br><br><br>
        <h2 align="center">Trabajador Modificado con Éxito</h2>
        <br><br><br><br><br><br>
        <div id="form" align="center">
            <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/Modifica_Trabajador">
                <input class="btn" type="submit" name="Continuar" value="Continuar"/>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
</div>
