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
                <td width="652"><input type="text" size="29" name="nombres" /></td>
            </tr>
            <tr>
                <td width="150">RUT</td>
                <td><input type="text" name="rut" value="" maxlength="8" /> -
                <input type="text" name="digito" size="2" maxlength="1" /></td>
            </tr>
            <tr>
                <td width="150">FECHA DE NACIMIENTO</td>
                <td>
                    <select name="dia1">
                        <option selected="selected">Día</option>
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
                        <option>Día</option>
                    </select>
                    <select name="mes1">
                        <option selected="selected">Mes</option>
                        <option>Enero</option>
                        <option>Febrero</option>
                        <option>Marzo</option>
                        <option>Abril</option>
                        <option>Mayo</option>
                        <option>Junio</option>
                        <option>Julio</option>
                        <option>Agosto</option>
                        <option>Septiembre</option>
                        <option>Octubre</option>
                        <option>Noviembre</option>
                        <option>Diciembre</option>
                    </select>
                    <select name="ano1">
                        <option selected="selected">Año</option>
                        <option>2010</option>
                        <option>2009</option>
                        <option>2008</option>
                        <option>2007</option>
                        <option>2006</option>
                        <option>2005</option>
                        <option>2004</option>
                        <option>2003</option>
                        <option>2002</option>
                        <option>2001</option>
                        <option>2000</option>
                        <option>1999</option>
                        <option>1998</option>
                        <option>1997</option>
                        <option>1996</option>
                        <option>1995</option>
                        <option>1994</option>
                        <option>1993</option>
                        <option>1992</option>
                        <option>1991</option>
                        <option>1990</option>
                        <option>1989</option>
                        <option>1988</option>
                        <option>1987</option>
                        <option>1986</option>
                        <option>1985</option>
                        <option>1984</option>
                        <option>1983</option>
                        <option>1982</option>
                        <option>1981</option>
                        <option>1980</option>
                        <option>1979</option>
                        <option>1978</option>
                        <option>1977</option>
                        <option>1976</option>
                        <option>1975</option>
                        <option>1974</option>
                        <option>1973</option>
                        <option>1972</option>
                        <option>1971</option>
                        <option>1970</option>
                        <option>1969</option>
                        <option>1968</option>
                        <option>1967</option>
                        <option>1966</option>
                        <option>1965</option>
                        <option>1964</option>
                        <option>1963</option>
                        <option>1962</option>
                        <option>1961</option>
                        <option>1960</option>
                        <option>1959</option>
                        <option>1959</option>
                        <option>1958</option>
                        <option>1957</option>
                        <option>1956</option>
                        <option>1954</option>
                        <option>1953</option>
                        <option>1952</option>
                        <option>1951</option>
                        <option>1950</option>
                        <option>1949</option>
                        <option>1948</option>
                        <option>1947</option>
                        <option>1946</option>
                        <option>1945</option>
                        <option>1944</option>
                        <option>1943</option>
                        <option>1942</option>
                        <option>1941</option>
                        <option>1940</option>
                        <option>1939</option>
                        <option>1938</option>
                        <option>1937</option>
                        <option>1936</option>
                        <option>1935</option>
                        <option>1934</option>
                        <option>1933</option>
                        <option>1932</option>
                        <option>1931</option>
                        <option>1930</option>
                        <option>1929</option>
                        <option>1928</option>
                        <option>1927</option>
                        <option>1926</option>
                        <option>1925</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">DIRECCIÓN</td>
                <td><input type="text" name="direccion" size="29" /></td>
            </tr>
            <tr>
                <td width="150">TELEFONO</td>
                <td><input type="text" name="telefono" size="29" /></td>
            </tr>
            <tr>
                <td width="150">CARGO/FUNCIÓN<td><input type="text" name="cargo" value="" size="29"/></td>

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
                        <option selected="selected">Día</option>
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
                        <option>Día</option>
                    </select>
                    <select name="mes2">
                        <option selected="selected">Mes</option>
                        <option>Enero</option>
                        <option>Febrero</option>
                        <option>Marzo</option>
                        <option>Abril</option>
                        <option>Mayo</option>
                        <option>Junio</option>
                        <option>Julio</option>
                        <option>Agosto</option>
                        <option>Septiembre</option>
                        <option>Octubre</option>
                        <option>Noviembre</option>
                        <option>Diciembre</option>
                    </select>
                    <select name="ano2">
                        <option selected="selected">Año</option>
                        <option>2010</option>
                        <option>2009</option>
                        <option>2008</option>
                        <option>2007</option>
                        <option>2006</option>
                        <option>2005</option>
                        <option>2004</option>
                        <option>2003</option>
                        <option>2002</option>
                        <option>2001</option>
                        <option>2000</option>
                        <option>1999</option>
                        <option>1998</option>
                        <option>1997</option>
                        <option>1996</option>
                        <option>1995</option>
                        <option>1994</option>
                        <option>1993</option>
                        <option>1992</option>
                        <option>1991</option>
                        <option>1990</option>
                        <option>1989</option>
                        <option>1988</option>
                        <option>1987</option>
                        <option>1986</option>
                        <option>1985</option>
                        <option>1984</option>
                        <option>1983</option>
                        <option>1982</option>
                        <option>1981</option>
                        <option>1980</option>
                        <option>1979</option>
                        <option>1978</option>
                        <option>1977</option>
                        <option>1976</option>
                        <option>1975</option>
                        <option>1974</option>
                        <option>1973</option>
                        <option>1972</option>
                        <option>1971</option>
                        <option>1970</option>
                        <option>1969</option>
                        <option>1968</option>
                        <option>1967</option>
                        <option>1966</option>
                        <option>1965</option>
                        <option>1964</option>
                        <option>1963</option>
                        <option>1962</option>
                        <option>1961</option>
                        <option>1960</option>
                        <option>1959</option>
                        <option>1959</option>
                        <option>1958</option>
                        <option>1957</option>
                        <option>1956</option>
                        <option>1954</option>
                        <option>1953</option>
                        <option>1952</option>
                        <option>1951</option>
                        <option>1950</option>
                        <option>1949</option>
                        <option>1948</option>
                        <option>1947</option>
                        <option>1946</option>
                        <option>1945</option>
                        <option>1944</option>
                        <option>1943</option>
                        <option>1942</option>
                        <option>1941</option>
                        <option>1940</option>
                        <option>1939</option>
                        <option>1938</option>
                        <option>1937</option>
                        <option>1936</option>
                        <option>1935</option>
                        <option>1934</option>
                        <option>1933</option>
                        <option>1932</option>
                        <option>1931</option>
                        <option>1930</option>
                        <option>1929</option>
                        <option>1928</option>
                        <option>1927</option>
                        <option>1926</option>
                        <option>1925</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA TÉRMINO CONTRATO</td>
                <td>
                    <select name="dia3">
                        <option selected="selected">Día</option>
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
                        <option selected="selected">Mes</option>
                        <option>Enero</option>
                        <option>Febrero</option>
                        <option>Marzo</option>
                        <option>Abril</option>
                        <option>Mayo</option>
                        <option>Junio</option>
                        <option>Julio</option>
                        <option>Agosto</option>
                        <option>Septiembre</option>
                        <option>Octubre</option>
                        <option>Noviembre</option>
                        <option>Diciembre</option>
                    </select>
                    <select name="ano3">
                        <option selected="selected">Año</option>
                        <option>2010</option>
                        <option>2009</option>
                        <option>2008</option>
                        <option>2007</option>
                        <option>2006</option>
                        <option>2005</option>
                        <option>2004</option>
                        <option>2003</option>
                        <option>2002</option>
                        <option>2001</option>
                        <option>2000</option>
                        <option>1999</option>
                        <option>1998</option>
                        <option>1997</option>
                        <option>1996</option>
                        <option>1995</option>
                        <option>1994</option>
                        <option>1993</option>
                        <option>1992</option>
                        <option>1991</option>
                        <option>1990</option>
                        <option>1989</option>
                        <option>1988</option>
                        <option>1987</option>
                        <option>1986</option>
                        <option>1985</option>
                        <option>1984</option>
                        <option>1983</option>
                        <option>1982</option>
                        <option>1981</option>
                        <option>1980</option>
                        <option>1979</option>
                        <option>1978</option>
                        <option>1977</option>
                        <option>1976</option>
                        <option>1975</option>
                        <option>1974</option>
                        <option>1973</option>
                        <option>1972</option>
                        <option>1971</option>
                        <option>1970</option>
                        <option>1969</option>
                        <option>1968</option>
                        <option>1967</option>
                        <option>1966</option>
                        <option>1965</option>
                        <option>1964</option>
                        <option>1963</option>
                        <option>1962</option>
                        <option>1961</option>
                        <option>1960</option>
                        <option>1959</option>
                        <option>1959</option>
                        <option>1958</option>
                        <option>1957</option>
                        <option>1956</option>
                        <option>1954</option>
                        <option>1953</option>
                        <option>1952</option>
                        <option>1951</option>
                        <option>1950</option>
                        <option>1949</option>
                        <option>1948</option>
                        <option>1947</option>
                        <option>1946</option>
                        <option>1945</option>
                        <option>1944</option>
                        <option>1943</option>
                        <option>1942</option>
                        <option>1941</option>
                        <option>1940</option>
                        <option>1939</option>
                        <option>1938</option>
                        <option>1937</option>
                        <option>1936</option>
                        <option>1935</option>
                        <option>1934</option>
                        <option>1933</option>
                        <option>1932</option>
                        <option>1931</option>
                        <option>1930</option>
                        <option>1929</option>
                        <option>1928</option>
                        <option>1927</option>
                        <option>1926</option>
                        <option>1925</option>
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
                    <input name="monto_afp" type="text" value="" />
                    (actualizar una vez al a&ntilde;o)
                </td>
            </tr>
            <tr>
                <td valign="middle">SALUD</td>
                <td>
                    <p>
                        <input name="tipo_salud" type="radio" value="fonasa" />
                            FONASA
                        <input name="monto_fonasa" type="text" value="" />
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
                                <input type="text" name="nombrecarga" />
                            </td>
                            <td>
                                <select name="tipocarga">
                                    <option selected="selected"> </option>
                                    <option>Conyuge</option>
                                    <option>Hijo /a</option>
                                    <option>Padre</option>
                                    <option>Madre</option>
                                </select>
                            </td>
                            <td>
                                <select name="dia4">
                                    <option selected="selected">Día</option>
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
                                <select name="mes4">
                                    <option selected="selected">Mes</option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Agosto</option>
                                    <option>Septiembre</option>
                                    <option>Octubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>
                                <select name="ano4">
                                    <option selected="selected">Año</option>
                                    <option>2020</option>
                                    <option>2019</option>
                                    <option>2018</option>
                                    <option>2017</option>
                                    <option>2016</option>
                                    <option>2015</option>
                                    <option>2014</option>
                                    <option>2013</option>
                                    <option>2012</option>
                                    <option>2011</option>
                                    <option>2010</option>
                                    <option>2009</option>
                                    <option>2008</option>
                                    <option>2007</option>
                                    <option>2006</option>
                                    <option>2005</option>
                                    <option>2004</option>
                                    <option>2003</option>
                                    <option>2002</option>
                                    <option>2001</option>
                                    <option>2000</option>
                                    <option>1999</option>
                                    <option>1998</option>
                                    <option>1997</option>
                                    <option>1996</option>
                                    <option>1995</option>
                                    <option>1994</option>
                                    <option>1993</option>
                                    <option>1992</option>
                                    <option>1991</option>
                                    <option>1990</option>
                                    <option>1989</option>
                                    <option>1988</option>
                                    <option>1987</option>
                                    <option>1986</option>
                                    <option>1985</option>
                                    <option>1984</option>
                                    <option>1983</option>
                                    <option>1982</option>
                                    <option>1981</option>
                                    <option>1980</option>
                                    <option>1979</option>
                                    <option>1978</option>
                                    <option>1977</option>
                                    <option>1976</option>
                                    <option>1975</option>
                                    <option>1974</option>
                                    <option>1973</option>
                                    <option>1972</option>
                                    <option>1971</option>
                                    <option>1970</option>
                                    <option>1969</option>
                                    <option>1968</option>
                                    <option>1967</option>
                                    <option>1966</option>
                                    <option>1965</option>
                                    <option>1964</option>
                                    <option>1963</option>
                                    <option>1962</option>
                                    <option>1961</option>
                                    <option>1960</option>
                                    <option>1959</option>
                                    <option>1959</option>
                                    <option>1958</option>
                                    <option>1957</option>
                                    <option>1956</option>
                                    <option>1954</option>
                                    <option>1953</option>
                                    <option>1952</option>
                                    <option>1951</option>
                                    <option>1950</option>
                                    <option>1949</option>
                                    <option>1948</option>
                                    <option>1947</option>
                                    <option>1946</option>
                                    <option>1945</option>
                                    <option>1944</option>
                                    <option>1943</option>
                                    <option>1942</option>
                                    <option>1941</option>
                                    <option>1940</option>
                                    <option>1939</option>
                                    <option>1938</option>
                                    <option>1937</option>
                                    <option>1936</option>
                                    <option>1935</option>
                                    <option>1934</option>
                                    <option>1933</option>
                                    <option>1932</option>
                                    <option>1931</option>
                                    <option>1930</option>
                                    <option>1929</option>
                                    <option>1928</option>
                                    <option>1927</option>
                                    <option>1926</option>
                                    <option>1925</option>
                                            </select>
                            </td>
                            <td>
                                <div align="center">
                                    <input name="rutcarga" type="text" size="20" maxlength="8"/> - 
                                    <input name="digitocarga" type="text" size="2" maxlength="1" />
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
                <td align="center"><input type="reset" value="Limpiar" name="limpiar" /></td>
              </tr>
        </table>
        </form>
        </div>
        <br><br>
    </div>