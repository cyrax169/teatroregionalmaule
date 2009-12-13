    <div id="principal">
        <div class="post" align="center">
            <h2>UTM</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br>
        <form action="<?=base_url()?>index.php/welcome/utm1" method="Post">
        <table border="1" align="center" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th align="center">Año</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><select name="ano">
                    <option> </option>
                    <?
                    for($i=2007;$i<2021;$i++){
                        echo "<option> $i </option>";
                    }
                    ?>
                </select></td>
                    
                </tr>
                
            </tbody>
        </table>
        <br><br><br><br>
        <div id="form" align="center">
            <input class="btn" type="submit" value="Guardar" name="guardar" />
        </div>
        </form>
        <br><br><br><br><br><br><br><br>
    </div>
</div>