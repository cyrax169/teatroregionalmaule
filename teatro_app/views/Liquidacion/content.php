
    <div id="principal">
        <div class="post" align="center">
            <h2>LIQUIDACIÓN DE SUELDO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
       </div>
        <br><br><br><br>
        <form name="frm" method="post" action="<?=base_url()?>index.php/liquidacion_controlador/BuscaRut">
            <div align="center">RUT:
                <input type="text" name="rut" maxlength="8" /> -
                <input type="text" name="digito" size="2" maxlength="1" />
                <br><br>
                <select name="mes">
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
                <select name="anio">
                    <option selected="selected" >2010</option>
                    <option>2010</option>
                    <option>2011</option>
                    <option>2012</option>
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                </select>
            </div>
            <br><br><br><br><br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Buscar"/>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
            <br><br><br>
    </div>
</div>