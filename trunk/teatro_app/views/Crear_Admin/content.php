    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>CREAR ADMINISTRADOR</h2>
        </div>
        <br><br><br><br><br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/IngresoUsuario">
            <table align="center">
                <thead>
                    <tr>
                        <td>NOMBRE</td>
                        <td><input type="text" name="nombre" value="" size="29"/></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RUT</td>
                        <td>
                            <input type="text" name="rut" value="" maxlength="8" /> -
                            <input type="text" name="digito" size="2" maxlength="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>LOGIN</td>
                        <td><input type="text" name="login" value="" size="29"/></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td><input type="password" name="password" value="" size="29" /></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
             <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Guardar"/>
             </div>
             <br><br><br><br><br><br><br><br><br><br>
         </form>
    </div>
</div>
