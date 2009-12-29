    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>ERROR</h2>
        </div>
        <br><br><br>
        <h2 align="center">Por favor ingrese el valor:  UTM</h2>
            <br>
       <div align="center" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/welcome/tablaIUT">
       
            <form name="frm" method="post" action="">
                <table style="margin-left:50px;" cellspacing="30px">
                    <tr>
                               <td>
                            <p>Seleccione el mes e ingrese el valor de la U.T.M.<br/>Nota:Se ingresaran para el año actual <?php echo date('Y');?></p>
                            <select id="combo_meses">
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                           </select>
                             
                            <input type="text" name="utm" id="utm"/>

                            <input type="button" name="submit" class="btn" value="Enviar" onclick="storeUTM();"/>
                            <br><br>
                            <div  id="msj_response1" style="color:red;text-align:center;"></div>
                        </td>
                    </tr>
                </table>
                    <input class="btn" type="submit" name="Volver" value="Volver"/>
                </form>
            </div>
   </div>
</div>
