    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h1>Bienvenidos al Sistema TRM</h1>
        </div>
        <br/><br/>
        <div align="left" id="form">
            <form name="frm" method="post" action="">
                <table style="margin-left:50px;" cellspacing="30px">
                    <tr>
                        <td>
                            <p>Ingrese el valor de la UF para almacenarlo en el sistema.</p>
                            <label>Ingrese UF</label>
                            <input align="left" type="text" name="uf" id="uf"/>
                            <input type="button" name="submit" class="btn" value="Enviar" onclick="actualizaUF();"/>
                        </td>
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
                            

                        </td>
                    </tr>
                </table>
            </form>
            <table>
                <tr>
                    <td>
                        <table border="1" style="margin-left:120px;width:80%;">
                        <thead>
                            <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    foreach($UF -> result() as $uf_data):
                                        echo "<tr>";
                                        echo  "<td>$uf_data->Fecha</td>";
                                        echo "<td>$uf_data->Monto</td>";
                                        echo "</tr>";
                                    endforeach;
                                ?>
                        </tbody>
                    </table>
                    </td>
                    <td>
                        <table border="1" style="margin-left:200px;width:80%;">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($UTM -> result() as $utm_data):
                                            echo  "<tr><td>$utm_data->Fecha</td>";
                                            echo "<td>$utm_data->MontoUTM</td></tr>";
                                        endforeach;
                                    ?>
                            </tbody>
                        </table>
                   </td>
                </tr>
            </table>
                <div  id="msj_response1" style="color:red;text-align:center;"></div>
                <div  id="msj_response" style="color:red;text-align:center;"></div>
 
            <br/>
        </div>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
   </div>

