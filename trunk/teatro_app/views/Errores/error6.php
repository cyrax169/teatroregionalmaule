<div id="principal">
    <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
    <div class="post" align="center">
        <h2>ERROR</h2>
    </div>
    <br><br><br>
    <h2 align="center">Porfavor, complete todos los campos</h2>
    <br><br><br><br><br>
    <div align="center" id="form">
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/CrearTrabajador">
            <input class="btn" type="submit" name="Volver" value="Volver"/>
        </form>
    </div>
</div>
