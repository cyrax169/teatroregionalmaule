    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>ELIMINAR TRABAJADOR</h2>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/EliminaTrabajador">
            <div align="center">RUT:
                <input type="text" name="rut" value="" maxlength="8" /> -
                <input type="text" name="digito" size="2" maxlength="1" />
            </div>
            <br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Buscar"/>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
   </div>
</div>
