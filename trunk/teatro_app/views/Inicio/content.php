    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center" id="form">
            <form name="frm" method="post" action="">
                <table>
                    <tr>
                        <td><label>Ingrese UF</label></td>
                        <td><input align="left" type="text" name="uf" id="uf"/></td>
                        <td><input type="button" name="submit" class="btn" value="Enviar" onclick="actualizaUF();"/></td>
                    </tr>
                </table>
            </form>
        <div id="msj_response"></div>
        </div>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
   </div>

