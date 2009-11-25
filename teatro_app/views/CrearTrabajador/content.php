    <div id="principal">
        <div class="post" align="center">
            <h2>CREAR TRABAJADOR</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <form name="ingreso" method="post" action="<?=base_url()?>index.php/welcome/Crear_Trabajador">
        <table border="0" align="left" cellspacing="0">
            <tr>
                <td width="150" height="27">NOMBRES</td>
                <td width="652"><input type="text" name="nombres" /></td>
            </tr>
            <tr>
                <td width="150">RUT</td>
                <td><input type="text" name="rut" /></td>
            </tr>
            <tr>
                <td width="150">FECHA DE NACIMIENTO</td>
                <td>
                    <select name="dia1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        <option>DÍA</option>
                    </select>
                    <select name="mes1">
                        <option selected="selected">MES</option>
                        <option>ENERO</option>
                        <option>FEBRERO</option>
                        <option>MARZO</option>
                        <option>ABRIL</option>
                        <option>MAYO</option>
                        <option>JUNIO</option>
                        <option>JULIO</option>
                        <option>AGOSTO</option>
                        <option>SEPTIEMBRE</option>
                        <option>OCTUBRE</option>
                        <option>NOVIEMBRE</option>
                        <option>DICIEMBRE</option>
                    </select>
                    <select name="ano1">
                        <option selected="selected">A&Ntilde;O</option>
                        <option>1970</option>
                        <option>1971</option>
                        <option>1972</option>
                        <option>1973</option>
                        <option>1974</option>
                        <option>1975</option>
                        <option>1976</option>
                        <option>1977</option>
                        <option>1978</option>
                        <option>1979</option>
                        <option>1980</option>
                        <option>1981</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">DIRECCIÓN</td>
                <td><input type="text" name="direccion" /></td>
            </tr>
            <tr>
                <td width="150">TELEFONO</td>
                <td><input type="text" name="telefono" /></td>
            </tr>
            <tr>
                <td width="150">CARGO/FUNCIÓN<td><input type="text" name="cargo" value="" /></td>

            </tr>
            <tr>
                <td width="150">TIPO DE CONTRATO</td>
                <td><p>
                    <input name="tipo_con" type="radio" value="fijo" />
                        FIJO
                    <input name="tipo_con" type="radio" value="indefinido" />
                        INDEFINIDO
                    </p>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA INICIO CONTRATO</td>
                <td>
                    <select name="dia2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        <option>DÍA</option>
                    </select>
                    <select name="mes2">
                        <option selected="selected">MES</option>
                        <option>ENERO</option>
                        <option>FEBRERO</option>
                        <option>MARZO</option>
                        <option>ABRIL</option>
                        <option>MAYO</option>
                        <option>JUNIO</option>
                        <option>JULIO</option>
                        <option>AGOSTO</option>
                        <option>SEPTIEMBRE</option>
                        <option>OCTUBRE</option>
                        <option>NOVIEMBRE</option>
                        <option>DICIEMBRE</option>
                    </select>
                    <select name="ano2">
                        <option selected="selected">A&Ntilde;O</option>
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA TÉRMINO CONTRATO</td>
                <td>
                    <select name="dia3">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        <option>Dia</option>
                    </select>
                    <select name="mes3">
                        <option selected="selected">MES</option>
                        <option>ENERO</option>
                        <option>FEBRERO</option>
                        <option>MARZO</option>
                        <option>ABRIL</option>
                        <option>MAYO</option>
                        <option>JUNIO</option>
                        <option>JULIO</option>
                        <option>AGOSTO</option>
                        <option>SEPTIEMBRE</option>
                        <option>OCTUBRE</option>
                        <option>NOVIEMBRE</option>
                        <option>DICIEMBRE</option>
                    </select>
                    <select name="ano3">
                        <option selected="selected">A&Ntilde;O</option>
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td width="150">REMUNERACIÓN</td>
                <td><input type="text" name="remuneracion" /></td>
            </tr>
            <tr>
                <td width="150">ASIGNACIONES</td>
                <td>
                    <table width="150" border="1" cellpadding="0">
                        <tr>
                            <td align="center">DE CAJA</td>
                            <td scope="col"><input name="acaja" type="text" /></td>
                        </tr>
                        <tr>
                            <td align="center">DE MOVILIAZACIÓN </td>
                            <td>
                                <input name="amovilizacion" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">DE COLACIÓN</td>
                            <td>
                                <input name="acolacion" type="text" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150">AFP</td>
                <td>
                    <select name="afp">
                        <option>PROVIDA</option>
                        <option>CUPRUM</option>
                        <option>CUPRUM</option>
                        <option>CUPRUM</option>
                        <option>CUPRUM</option>
                        <option>CUPRUM</option>
                        <option selected="selected">...</option>
                    </select>
                    <input name="monto_afp" type="text" value="MONTO" />
                    (actualizar una vez al a&ntilde;o)
                </td>
            </tr>
            <tr>
                <td valign="middle">SALUD</td>
                <td>
                    <p>
                        <input name="tipo_salud" type="radio" value="fonasa" />
                            FONASA
                        <input name="monto_fonasa" type="text" value="MONTO" />
                            ( 7 &oacute; 6.4, depende de caja de compensaci&oacute;n)
                    </p>
                    <p>
                        <input name="tipo_salud" type="radio" value="isapre" />
                            ISAPRE
                        <select name="nombre_isapre">
                            <option>BANMEDICA</option>
                            <option>CONSALUD</option>
                            <option selected="selected"> </option>
                        </select>
                        <input name="monto_isapre" type="text" value="monto" />
                            Monto personalizado en UF ( dos decimales )
                    </p>
                </td>
            </tr>
            <tr>
                <td width="150">APV</td>
                <td>
                    <table width="150" border="0">
                        <tr>
                            <td>U.F.</td>
                            <td>
                                <input type="text" name="uf" />
                            </td>
                        </tr>
                        <tr>
                            <td>PESOS</td>
                            <td>
                                <input type="text" name="pesos" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150" valign="middle">CARGAS FAMILIARES</td>
                <td>
                    <p>
                        <input name="cargas" type="radio" value="si" checked="checked" />
                            SI
                        <input name="cargas" type="radio" value="no" />
                            NO
                    </p>
                    <table width="634" border="1">
                        <tr>
                            <th width="144" scope="col">NOMBRES</th>
                            <th width="93" scope="col">TIPO</th>
                            <th width="236" scope="col">FECHA VENC. </th>
                            <th width="144" scope="col">RUT</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="NOMBRESCARGA" />
                            </td>
                            <td>
                                <select name="TIPOCARGA">
                                    <option selected="selected"> </option>
                                    <option>CONYUGE</option>
                                    <option>HIJO /A</option>
                                    <option>PADRE</option>
                                    <option>MADRE</option>
                                </select>
                            </td>
                            <td>
                                <select name="DIA4">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                    <option>DÍA</option>
                                </select>
                                <select name="MES4">
                                    <option selected="selected">MES</option>
                                    <option>ENERO</option>
                                    <option>FEBRERO</option>
                                    <option>MARZO</option>
                                    <option>ABRIL</option>
                                    <option>MAYO</option>
                                    <option>JUNIO</option>
                                    <option>JULIO</option>
                                    <option>AGOSTO</option>
                                    <option>SEPTIEMBRE</option>
                                    <option>OCTUBRE</option>
                                    <option>NOVIEMBRE</option>
                                    <option>DICIEMBRE</option>
                                </select>
                                <select name="ano4">
                                    <option selected="selected">A&Ntilde;O</option>
                                    <option>2000</option>
                                    <option>2001</option>
                                    <option>2002</option>
                                    <option>2003</option>
                                    <option>2004</option>
                                    <option>2005</option>
                                    <option>2006</option>
                                    <option>2007</option>
                                    <option>2008</option>
                                    <option>2009</option>
                                    <option>2010</option>
                                </select>
                            </td>
                            <td>
                                <div align="center">
                                    <input name="rutcarga" type="text" size="20" />
                                </div>
                            </td>
                        </tr>
                    </table>
                    <p>(se deben poder agregas muchas mas , si se elije la opcion no la tabla debe desaparecer) </p>
                </td>
            </tr>
         </table>
        <table align="center" width="600" border="0">
        </table>

        <br><br><br><br>
        <table width="150" border="0" align="center">

         <tr>
                <td align="center"><input type="submit" value="Cargar" name="cargar" /></td>
                <td align="center"><input type="submit" value="Limpiar" name="limpiar" /></td>
                <td align="center"><input type="submit" value="Modificar" name="modificar" /></td>
            </tr>
        </table>
        </form>
        </div>
        <br><br>
    </div>