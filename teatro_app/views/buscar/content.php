    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>CREAR TRABAJADOR</h2>
        </div>
        <br><br><br><br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Buscar_Trabajador">
            <div align="center">RUT:
                <input type="text" name="RUT" maxlength="8"/> -
                <input type="text" name="DIGITO" size="2" maxlength="2"/>
            </div>
            <br><br><br><br><br><br><br><br>
            <div align="center" id="form">
                <input class="btn" type="submit" name="Continuar" value="Continuar"/>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
    </div>
</div>
