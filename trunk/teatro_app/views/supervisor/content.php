    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>MODIFICAR SUPERVISOR</h2>
        </div>
        <br><br><br><br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/Modifica_supervisor">
            <div align="center">
            <table border="1">
                     <tr>
                        <th>RUT:</th>
                        <th><input type="text" name="RUT" size="13" value="" maxlength="8" /> -
                        <input type="text" name="DIGITO" size="1" maxlength="1" /></th>
                    </tr>
                     <tr>
                        <th>PASSWORD:</th>
                        <th><input type="password" name="password" /></th>
                    </tr>


            </table>
</div>
            <br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Buscar"/>
             </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
   </div>
</div>
