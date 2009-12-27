    <div id="principal">
        <div class="post" align="center">
            <h2>ELIMINAR ADMINISTRADOR</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/EliminarAdmin">
        <h2 align="center"> El Rut no exixte en la Base de datos</h2>
            <br><br><br><br><br><br><br><br><br><br><br><br>
             <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="continuar"/>
             </div>
            </form>
   </div>
</div>
