    <div id="principal">
        <div class="post" align="center">
            <h2>MODIFICAR SUPERVISOR</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/Modifica_supervisor">
            <div align="center">RUT:
                <input type="text" name="RUT" value="" maxlength="8" /> -
                <input type="text" name="DIGITO" size="2" maxlength="1" />
            </div>
            <br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Buscar"/>
             </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
   </div>
</div>
