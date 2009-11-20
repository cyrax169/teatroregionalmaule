<div id="content">
    <div id="lateral">
        <ul>
        <br><br><br>
            <li>Hoja de Empresa</li>
        <blockquote>
            <li><a href="../../index.php/welcome/Empresa" accesskey="12" title="">Datos Empresa</a></li>
        </blockquote>
        <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="../../index.php/welcome/Vida" accesskey="2" title="">Crear Trabajador</a></li>
            <li><a href="../../index.php/welcome/Buscar" accesskey="3" title="">Eliminar Trabajador</a></li>
            <li><a href="../../index.php/welcome/Buscar" accesskey="4" title="">Buscar Trabajador</a></li>
        </blockquote>
            <li>Impresiones</li>
        <blockquote>
            <li><a href="../../index.php/welcome/planilla" accesskey="6" title="">Planilla de Remuneraciones</a></li>
            <li><a href="../../index.php/welcome/Liquidacion" accesskey="7" title="">Liquidación de Sueldo</a></li>
        </blockquote>
            <li>Gestión de Usuarios</li>
        <blockquote>
            <li><a href="../../index.php/welcome/Crear_Admin" accesskey="9" title="">Crear Administrador</a></li>
            <li><a href="../../index.php/welcome/Buscar_Admin" accesskey="10" title="">Modificar Administrador</a></li>
            <li><a href="../../index.php/welcome/Buscar_Admin" accesskey="11" title="">Eliminar Administrador</a></li>
        </blockquote>
             <li>Tablas</li>
        <blockquote>
            <li><a href="../../index.php/welcome/tablaIUT" accesskey="12" title="">Impuesto Único Tributario</a></li>
            <li><a href="#" accesskey="12" title="">Tramos Fonasa</a></li>
        </blockquote>
    </div>
    <div id="principal">
        <div class="post" align="center">
            <h2>HOJA DE VIDA</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br>
        <table border="0" align="left" cellspacing="0">
            <tr>
                <td width="150" height="27">NOMBRES</td>
                <td width="652"><input type="text" name="NOMBRES" /></td>
            </tr>
            <tr>
                <td width="150">RUT</td>
                <td><input type="text" name="RUT" /></td>
            </tr>
            <tr>
                <td width="150">FFECHA DE NACIMIENTO</td>
                <td>
                    <select name="DIA1">
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
                    <select name="MES1">
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
                        <option selected="selected">MES</option>
                    </select>
                    <select name="AÑO">
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
                        <option selected="selected">A&Ntilde;O</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">DIRECCIÓN</td>
                <td><input type="text" name="DIRECCION" /></td>
            </tr>
            <tr>
                <td width="150">TELEFONOS</td>
                <td><input type="text" name="TELEFONOS" /></td>
            </tr>
            <tr>
                <td width="150">CARGO/FUNCIÓN<td><input type="text" name="CARGO" value="" /></td>
                
            </tr>
            <tr>
                <td width="150">TIPO DE CONTRATO</td>
                <td><p>
                    <input name="FIJO" type="radio" value="radiobutton" />
                        FIJO
                    <input name="INDEFINIDO" type="radio" value="radiobutton" />
                        INDEFINIDO
                    </p>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA INICIO CONTRATO</td>
                <td>
                    <select name="DIA2">
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
                    <select name="MES2">
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
                        <option selected="selected">MES</option>
                    </select>
                    <select name="AÑO2">
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
                        <option selected="selected">A&Ntilde;O</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">FECHA TÉRMINO CONTRATO</td>
                <td>
                    <select name="DIA3">
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
                    <select name="MES3">
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
                        <option selected="selected">MES</option>
                    </select>
                    <select name="AÑO3">
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
                        <option selected="selected">A&Ntilde;O</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150">DÍAS TRABAJADOS </td>
                <td><input type="text" name="DTRABAJADOS" /></td>
            </tr>
            <tr>
                <td width="150">REMUNERACIÓN</td>
                <td><input type="text" name="REMUNERACION" /></td>
            </tr>
            <tr>
                <td width="150">BONOS</td>
                <td>
                    <input name="BONOS" type="text" value="TIPO DE BONO" />
                    <input name="MONTO" type="text" value="MONTO" />
                    ( puede ser mas de uno)
                </td>
            </tr>
            <tr>
                <td width="150">HORAS EXTRAS</td>
                <td>
                    <input name="HEXTRA" type="text" value="HORAS" />
                    <input name="HMONTO" type="text" value="$MONTO" />
                </td>
            </tr>
            <tr>
                <td width="150">ASIGNACIONES</td>
                <td>
                    <table width="150" border="1" cellpadding="0">
                        <tr>
                            <td align="center">DE CAJA</td>
                            <td scope="col"><input name="AMONTO1" type="text" /></td>
                        </tr>
                        <tr>
                            <td align="center">DE MOVILIAZACIÓN </td>
                            <td>
                                <input name="AMONTO2" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">DE COLACIÓN</td>
                            <td>
                                <input name="AMONTO3" type="text" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150">ANTICIPO</td>
                <td>
                    <input type="text" name="ANTICIPO" />
                    (puede ser mas de uno)
                </td>
            </tr>
            <tr>
                <td width="150">AFP</td>
                <td>
                    <select name="AFP">
                        <option>PROVIDA</option>
                        <option>CUPRUM</option>
                        <option selected="selected">...</option>
                    </select>
                    <input name="PORCENTAJEAFP" type="text" value="MONTO" />
                    (actualizar una vez al a&ntilde;o)
                </td>
            </tr>
            <tr>
                <td width="150">AFC</td>
                <td>
                    <input name="AFCSI" type="radio" value="radiobutton" />
                        SI
                    <input name="AFCNO" type="radio" value="radiobutton" />
                        NO    (automatica dependiendo del tipo de contrato)
                </td>
            </tr>
            <tr>
                <td valign="middle">SALUD</td>
                <td>
                    <p>
                        <input name="SALUDFONASA" type="radio" value="radiobutton" />
                            FONASA
                        <input name="textfield22432" type="text" value="MONTO" />
                            ( 7 &oacute; 6.4, depende de caja de compensaci&oacute;n)
                    </p>
                    <p>
                        <input name="SALUDISAPRE" type="radio" value="radiobutton" />
                            ISAPRE
                        <select name="ISAPRE">
                            <option>BANMÉDICA</option>
                            <option>CONSALUD</option>
                            <option selected="selected"> </option>
                        </select>
                        <input name="MONTOISAPRE" type="text" value="MONTO" />
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
                                <input type="text" name="UF" />
                            </td>
                        </tr>
                        <tr>
                            <td>PESOS</td>
                            <td>
                                <input type="text" name="PESOS" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150" valign="middle">CARGAS FAMILIARES</td>
                <td>
                    <p>
                        <input name="CARGASSI" type="radio" value="radiobutton" checked="checked" />
                            SI
                        <input name="CARGASNO" type="radio" value="radiobutton" />
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
                                    <option selected="selected">MES</option>
                                </select>
                                <select name="AÑO4">
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
                                    <option selected="selected">A&Ntilde;O</option>
                                </select>
                            </td>
                            <td>
                                <div align="center">
                                    <input name="RUTCARGA" type="text" size="20" />
                                </div>
                            </td>
                        </tr>
                        <tr>  <!--Este campo se generará automáticamente por lo que el nombre de las variables no las cambiaré-->
                            <td>
                                <input type="text" name="textfield22532" />
                            </td>
                            <td>
                                <select name="select13">
                                    <option selected="selected"> </option>
                                    <option>CONYUGE</option>
                                    <option>HIJO /A</option>
                                    <option>PADRE</option>
                                    <option>MADRE</option>
                                </select>
                            </td>
                            <td>
                                <select name="select11">
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
                                <select name="select11">
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
                                    <option selected="selected">MES</option>
                                </select>
                                <select name="select11">
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
                                    <option selected="selected">A&Ntilde;O</option>
                                </select>
                            </td>
                            <td>
                                <div align="center">
                                <input name="RUTCARGA2" type="text" size="20" />
                                </div>
                            </td>
                        </tr>
                    </table>
                    <p>(se deben poder agregas muchas mas , si se elije la opcion no la tabla debe desaparecer) </p>
                </td>
            </tr>
            <tr>
                <td width="150" height="120" valign="middle">VACACIONES</td>
                <td>
                    <table width="635" border="1">
                        <tr>
                            <th width="231" height="24" scope="col">DESDE</th>
                            <th width="237" scope="col">HASTA</th>
                            <th width="125" scope="col">TOTAL DÍAS</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="DIA5">
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
                                <select name="MES5">
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
                                    <option selected="selected">MES</option>
                                </select>
                                <select name="AÑO5">
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
                                    <option selected="selected">A&Ntilde;O</option>
                                </select>
                            </td>
                            <td>
                                <select name="DIA6">
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
                                <select name="MES6">
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
                                    <option selected="selected">MES</option>
                                </select>
                                <select name="AÑO6">
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
                                    <option selected="selected">A&Ntilde;O</option>
                                </select>
                            </td>
                            <td>
                                <input name="TOTALDIAS" type="text" value="CALCULAR" size="20" />
                            </td>
                        </tr>
                    </table>
                    <p>(Total Dias = 1.25 * (total meses trabajados )) ; meses trabajados: si entra antes del 15 se cuenta como mes // se agranda automaticamente todos los a&ntilde;os // se tienen que ver todas las vacaciones anteriores </p>
                </td>
            </tr>
            <tr>
                <td width="150" valign="middle">LICENCIAS MÉDICAS</td>
                <td>
                    <p>DÍAS
                        <input name="textfield225323" type="text" size="10" />
                            INICIO
                        <input type="text" name="textfield225324" />
                            TÉRMINO
                        <input type="text" name="textfield225325" />
                    </p>
                    <p>1-3 : no se descuentan de los dias trabajados ; 1 - 10 : se empiezan a descontar desde el 4 dia ; 1 - 11: se descuentan todos los dias </p>
                </td>
            </tr>
            <tr>
                <td width="150" valign="middle">PERMISOS</td>
                <td>
                    <p>DÍAS
                        <input name="DIASPERMISOS" type="text" size="10" />
                            INICIO
                        <input type="text" name="INICIOPERMISOS" />
                            TÉRMINO
                        <input type="text" name="TERMINOPERMISO" />
                    </p>
                    <p>
                        <input name="GOCEDESUELDOSI" type="radio" value="radiobutton" />
                            SI
                        <input name="GOCEDESUELDONO" type="radio" value="radiobutton" />
                            NO (Si es con goce de sueldo no se le descuentan).
                    </p>
                </td>
            </tr>
            <tr>
                <td width="150">PRESTACIONES</td>
                <td>
                    <p>INSTITUCIÓN
                        <input name="INSTITUCION" type="text" size="15" />
                            TIPO DE PRESTACIÓN
                        <input name="TIPOPRESTACION" type="text" size="15" />
                            MONTO
                        <input name="MONTOPRESTACION" type="text" size="15" />
                    </p>
                    <p>(botón que de la opción de agregar)</p>
                </td>
            </tr>
        </table>
        <table align="center" width="600" border="0">
            <tr>
                <td align="left"><input type="submit" value="Agregar" name="Agregar"/></td>
            </tr>
        </table>
        <br><br>
        <table width="150" border="0" align="center">
            <tr>
                <td align="center"><input type="submit" value="Cargar" name="cargar" /></td>
                <td align="center"><input type="submit" value="Limpiar" name="limpiar" /></td>
                <td align="center"><input type="submit" value="Modificar" name="modificar" /></td>
            </tr>
        </table>
        <br><br>
    </div>
</div>