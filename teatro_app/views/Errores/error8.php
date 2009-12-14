<div id="principal">
    <div class="post" align="center">
        <h2>ERROR</h2>
        <div align="right" id="form">
        <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
            <input class="btn" type="submit" name="Salir" value="Salir"/>
        </form>
        </div>
    </div>
    <br><br><br>
    <h2 align="center">El rut ya existe en la base de datos</h2>
    <br><br><br><br><br>
    <div align="center" id="form">
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/Modifica_trabajador">
            <input class="btn" type="submit" name="Volver" value="Volver"/>
        </form>
    </div>
</div>
